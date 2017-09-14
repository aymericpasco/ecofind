@extends('layouts.app')
@section('title', 'Ajouter place')

@section('maps-api')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAp0YwuMWioEzFiKeAV5XOy3LhicJQfC3I&libraries=places&sensor=true" data-turbolinks-eval="false" data-turbolinks-track="reload"></script>
@stop

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    <section class="hero is-primary is-fullheight">
        <div class="hero-body">
            <div class="card">
                <form method="post">
                <header class="card-header has-text-centered">
                    <p class="card-header-title has-text-centered">
                        + Ajouter un lieu
                    </p>
                </header>
                <div class="card-content">


                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach

                        @if (session('status'))
                            <div>
                                {{ session('status') }}
                            </div>
                        @endif

                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                            <div class="field">
                                <div class="control">
                                    <input class="input" type="text" id="name" name="name" placeholder="Nom du lieu">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Echelle de prix :</label>
                                <div class="control">
                                    <label class="radio" for="cost">
                                        <input type="radio" name="cost" id="cost" value="1">
                                        €
                                    </label>
                                    <label class="radio" for="cost">
                                        <input type="radio" name="cost" id="cost" value="2">
                                        €€
                                    </label>
                                    <label class="radio" for="cost">
                                        <input type="radio" name="cost" id="cost" value="3">
                                        €€€
                                    </label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input class="input" type="text" id="user_input_autocomplete_address" name="address" placeholder="Adresse">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <input id="street_number" name="street_number"  type="hidden">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <input id="route" name="route"  type="hidden">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <input id="locality" name="locality"  type="hidden">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <input id="administrative_area_level_1" name="administrative_area_level_1" type="hidden">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <input id="administrative_area_level_2" name="administrative_area_level_2" type="hidden" >
                                </div>
                            </div>
                            <div>
                                <div>
                                    <input id="postal_code" name="postal_code" type="hidden">
                                </div>
                            </div>
                            <div>
                                <div>
                                    <input id="country" name="country"  type="hidden">
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Type de lieu :</label>
                                <div class="control">
                                    <label class="radio" for="type">
                                        <input type="radio" name="type" id="type" value="restaurant">
                                        Restaurant
                                    </label>
                                    <label class="radio" for="type">
                                        <input type="radio" name="type" id="type" value="vetement">
                                        Magasin de vêtements
                                    </label>
                                    <label class="radio" for="type">
                                        <input type="radio" name="type" id="type" value="alimentaire">
                                        Magasin alimentaire
                                    </label>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <textarea class="textarea" type="text" id="description" name="description" placeholder="Courte description du lieu"></textarea>
                                </div>
                            </div>
                            <div class="is-centered">{!! app('captcha')->display(); !!}</div>

                </div>
                <footer class="has-text-centered">
                    <button class=" button is-medium is-primary is-inverted" type="submit">Valider l'ajout</button>
                </footer>
            </form>
            </div>
        </div>
    </section>
    <style> @media screen and (max-height: 575px){ #rc-imageselect, .g-recaptcha {transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;} } </style>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection