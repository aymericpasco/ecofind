@extends('layouts.app')

@section('content')
    <div class="home-page">
        <section class="hero is-primary is-medium">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="home title is-size-3-widescreen is-size-4-touch">
                        Découvrez des restaurants et magasins éco-responsables,

                        <div class="is-centered has-text-centered home-search">
                            <p class="is-inline-desktop is-block-touch">
                                <a class="button is-primary is-inverted is-outlined is-medium">Près de chez vous</a>
                            </p>
                            <p class="is-inline-desktop is-block-touch"> ou </p>
                            <p class="is-inline-desktop is-block-touch">
                                <input class="input is-medium search-bar-home" type="text" placeholder="Recherchez par ville, adresse...">
                            </p>
                        </div>
                    </h1>
                    {{--<h2 class="subtitle">--}}
                        {{--Medium subtitle--}}
                    {{--</h2>--}}
                </div>
            </div>
        </section>

        <div class="container">
            <div class="home-columns"></div>
        </div>
    </div>
@endsection
