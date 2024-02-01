<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class HomeController extends Controller
{
    public function index()
    {
        $locations = \Auth::user()->locations()->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'locations' => $locations,
        ];
        return view('home',$data);
    }
}
