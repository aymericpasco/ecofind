@extends('layouts.app')

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
                            {!! Form::open(['action' => 'SearchController@index', 'method' => 'get']) !!}
                            <form method="get">
                                <p class="is-inline-desktop is-block-touch">
                                    <a class="button is-primary is-inverted is-outlined is-medium">Près de chez vous</a>
                                </p>
                                <p class="is-inline-desktop is-block-touch is-size-5-touch"> ou </p>
                                <p class="is-inline-desktop is-block-touch">
                                    <input id="home_search" class="input is-medium search-bar-home" type="text" placeholder="Recherchez par ville...">
                                    <input id="administrative_area_level_2" name="administrative_area_level_2" type="hidden" >
                                </p>
                            </form>
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
