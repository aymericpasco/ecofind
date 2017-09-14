<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    public function index()
    {
        //
    }





    public function show($slug)
    {
        $place = Place::whereSlug($slug)->firstOrFail();
        $user = $place->user()->get();
        $reviews = $place->reviews()->get();
        // = $reviews->user()->get('name');
        return view('place.show', compact('place', 'user', 'reviews'));
    }


}
