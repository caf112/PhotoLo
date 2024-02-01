<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function store($locationId) {
        $user = \Auth::user();
        if (!$user->is_bookmark($locationId)) {
            $user->bookmark_locations()->attach($locationId);
        }
        return back();
    }
    public function destroy($locationId) {
        $user = \Auth::user();
        if ($user->is_bookmark($locationId)) {
            $user->bookmark_locations()->detach($locationId);
        }
        return back();
    }
}
