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

    /**
     * ReviewController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($slug)
    {
        $place = Place::whereSlug($slug)->firstOrFail();
        $reviews = $place->reviews()->get();
        $avg = $reviews->avg('grade');
        return view('review.user.add', compact('place', 'avg'));
    }

    /**
     * @param $slug
     * @param ReviewFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
