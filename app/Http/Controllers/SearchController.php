<?php

namespace App\Http\Controllers;

use App\Place;
use Cviebrock\EloquentSluggable\Sluggable;
use GoogleMaps\GoogleMaps;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search(Request $request) {
        if ($request->has('administrative_area_level_2')) {
            $places = Place::search($request->administrative_area_level_2)->get();
            //var_dump($request->get('administrative_area_level_2'));
        } else {
            return url('/');
        }
        return view('place.index',compact('places'));
    }


    public function geolocate(Request $request) {
        if ($request->has('lat') && $request->has('lng')) {
            $lat = $request->get('lat');
            $lng = $request->get('lng');

            $json = \GoogleMaps::load('geocoding')
                ->setParamByKey('latlng', ''. $lat .','. $lng .'')
                ->get();
            $decoded_json = \GuzzleHttp\json_decode($json, true);

            $locality = $decoded_json['results'][0]['address_components'][2]['long_name'];
            $department = $decoded_json['results'][0]['address_components'][3]['long_name'];

            $places = Place::search($department)->get();
        } else {
            return url('/');
        }
        return view('place.index',compact('places'));
    }

}
