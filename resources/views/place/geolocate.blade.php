@extends('layouts.blank')

@section('content')
    {!! Form::open(['action' => 'SearchController@geolocate', 'method' => 'get', 'id' => 'homeGeolocate']) !!}
        <input id="lat" name="lat" type="hidden">
        <input id="lng" name="lng" type="hidden">
    {!! Form::close() !!}
@endsection
