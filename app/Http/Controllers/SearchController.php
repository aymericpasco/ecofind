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
            $get_locality = $request->get('locality');
            $locality_json = \GoogleMaps::load('geocoding')->setParam(['address' => $get_locality])->get();
            $locality_decoded = \GuzzleHttp\json_decode($locality_json, true);

            $lat= $locality_decoded['results'][0]['geometry']['location']['lat'];
            $lng = $locality_decoded['results'][0]['geometry']['location']['lng'];

            $places = Place::search($request->administrative_area_level_2)->get();
        } else {
            return url('/');
        }
        return view('place.index',compact('places', 'lat', 'lng'));
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
        return view('place.index',compact('places', 'lat', 'lng'));
    }

}
