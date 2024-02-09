<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::orderBy('created_at','desc')->paginate(10);
        $data = ['locations' => $locations];
        return view('locations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location = new Location();
        $data = ['location' => $location];
        return view('locations.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
            'images_path' => 'required|image|mimes:jpeg,png,jpg,gif,heic,JPEG,PNG,JPG,GIF',
        ]);
        $location = new Location();
        $location->user_id = \Auth::id();
        $location->title = $request->title;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $imagesPath = $request->file('images_path')->store('images', 'public');
        \Illuminate\Support\Facades\Log::info($imagesPath);
        $location->images_path = $imagesPath;
        $location->body = $request->body;
        $location->save();

        return redirect(route('locations.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $locations
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        $imageUrl = Storage::url($location->images_path);
        $data = ['location' => $location,'imageUrl'=>$imageUrl];
        return view('locations.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $locations
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $this->authorize($location);
        $data = ['location' => $location];
        return view('locations.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $locations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $this->authorize($location); 
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
            'images_path' => 'required|image|mimes:jpeg,png,jpg,gif,heic,JPEG,PNG,JPG,GIF',
        ]);
        $location->title = $request->title;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $imagesPath = $request->file('images_path')->store('images', 'public');
        $location->images_path = $imagesPath;
        $location->body = $request->body;
        $location->save();
        return redirect(route('locations.show', $location));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $locations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $this->authorize($location);
        $location->delete();
        return redirect(route('locations.index'));
    }

    public function bookmark_locations()
    {
        $locations = \Auth::user()->bookmark_locations()->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'locations' => $locations,
        ];
        return view('locations.bookmarks', $data);
    }
}
