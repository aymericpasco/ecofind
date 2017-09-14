<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function index(Request $request) {
        if ($request->has('administrative_area_level_2')) {
            $places = Place::search($request->administrative_area_level_2)->get();
        } else {
            return url('/');
        }
        return view('place.index',compact('places'));
    }

}
