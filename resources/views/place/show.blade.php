@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    <div>
        <div>
            <div>
                <h2>{!! $place->name !!}</h2>
                <p> {!! $place->address !!} </p>
                <p> {!! $place->description !!} </p>
                <p> {!! $place->type !!} </p>
                <p>Cost grade : {!! $place->cost !!} </p>
                <p> {!! $place->user->name !!} </p>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>

    @foreach($reviews as $review)
        <div>
            <div>
                <hr>
                <p>{!! $review->title !!}</p>
                <p>Note : {!! $review->grade !!}</p>
                <p>{{ \App\User::find($review->user_id)->name }}</p>
                <p>{!! $review->description !!}</p>
            </div>
        </div>
    @endforeach

@endsection

@section('footer')
    @include('layouts.footer')
@endsection