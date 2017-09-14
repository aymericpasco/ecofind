@extends('layouts.app')

@section('content')
@foreach($places as $place)
    <div>
        <div>

            <p>{!! $place->name !!}</p>
            <p>{!! $place->address !!}</p>

        </div>
    </div>
    <hr>
@endforeach

@endsection