@extends('layouts.app')

@section('maps-api')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAp0YwuMWioEzFiKeAV5XOy3LhicJQfC3I&libraries=places&sensor=true" data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
@stop

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    <style>
        .footer {
            margin-top: 70px;
        }
    </style>
    <div class="home-page">
        <section class="hero is-primary is-medium">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="home title is-size-3-widescreen is-size-4-touch">
                        Découvrez des restaurants et magasins éco-responsables,

                        <div class="is-centered has-text-centered home-search">
                                <p class="is-inline-desktop is-block-touch">
                                    <a class="button is-primary is-inverted is-outlined is-medium" href="{{ url('/geolocate') }}">Près de chez vous</a>
                                </p>
                            {!! Form::open(['action' => 'SearchController@search', 'method' => 'get', 'id' => 'homeSearch', 'class' => 'is-inline-desktop']) !!}
                                <p class="is-inline-desktop is-block-touch is-size-5-touch"> ou </p>
                                <p class=" is-inline-desktop is-block-touch has-icons-right">
                                    <input id="home_search" class="input is-medium search-bar-home" type="text" placeholder="Recherchez par ville, ...">
                                    <input id="administrative_area_level_2" name="administrative_area_level_2" type="hidden" >
                                    <input id="locality" name="locality" type="hidden" >
                                </p>
                            {!! Form::close() !!}
                        </div>
                    </h1>

                </div>
            </div>
        </section>

        <section class="presentation">
            <div class="container is-fluid">
                    <div class="columns has-text-centered">
                        <div class="column home-columns">
                            <img src="{{ asset('img/restaurant.png') }}" style="max-width: 100px">
                            <h3 class="icon-title title is-size-3-desktop is-size-4-touch">Restaurants</h3>
                        </div>
                        <hr class="is-hidden-desktop-only">
                        <div class="column home-columns">
                            <img src="{{ asset('img/food-store.png') }}" style="max-width: 100px">
                            <h3 class=" icon-title title is-size-3-desktop is-size-4-touch">Magasins alimentaires</h3>
                        </div>
                        <hr class="is-hidden-desktop-only">
                        <div class="column home-columns">
                            <img src="{{ asset('img/store.png') }}" style="max-width: 100px">
                            <h3 class="icon-title title is-size-3-desktop is-size-4-touch">Magasins de vêtements</h3>
                        </div>
                    </div>
            </div>
        </section>
    </div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
