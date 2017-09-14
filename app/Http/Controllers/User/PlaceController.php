<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\PlaceFormRequest;
use App\Place;
use GoogleMaps\GoogleMaps;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('place.user.add');
    }


    /**
     * @param PlaceFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PlaceFormRequest $request)
    {
        $user_id = Auth::user()->id;
        $department = $request->get('administrative_area_level_2');
        $city = $request->get('locality');
        $address =  $request->get('street_number') . ' ' .
                    $request->get('route') . ', ' .
                    $request->get('locality') . ', ' .
                    $request->get('postal_code') . ' ' .
                    $request->get('country');
        $address_json = \GoogleMaps::load('geocoding')->setParam(['address' => $address])->get();
        $address_decoded = \GuzzleHttp\json_decode($address_json, true);

        $lat= $address_decoded['results'][0]['geometry']['location']['lat'];
        $lng = $address_decoded['results'][0]['geometry']['location']['lng'];

        $place = new Place(array(
            'name' => $request->get('name'),
            'address' => $address,
            'department' => $department,
            'city' => $city,
            'lat' => $lat,
            'lng' => $lng,
            'description' => $request->get('description'),
            'cost' => $request->get('cost'),
            'type' => $request->get('type'),
            'user_id' => $user_id
        ));
        $place->save();

        return redirect()->back()->with('status', 'Place added.');
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
