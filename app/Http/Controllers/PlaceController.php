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


    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $place = Place::whereSlug($slug)->firstOrFail();
        $user = $place->user()->get();
        $reviews = $place->reviews()->get();
        $avg = $reviews->avg('grade');
        // = $reviews->user()->get('name');
        return view('place.show', compact('place', 'user', 'reviews', 'avg'));
    }
    
}
