<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\ReviewFormRequest;
use App\Place;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function create($slug)
    {
        $place = Place::whereSlug($slug)->firstOrFail();
        return view('review.user.add', compact('place'));
    }


    public function store($slug, ReviewFormRequest $request)
    {
        $place = Place::whereSlug($slug)->firstOrFail();
        $user_id = Auth::user()->id;

        $review = new Review(array(
            'title' => $request->get('title'),
            'grade' => $request->get('grade'),
            'description' => $request->get('description'),
            'place_id' => $place->id,
            'user_id' => $user_id
        ));
        $review->save();

        return redirect()->back()->with('status', 'Review added');
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
