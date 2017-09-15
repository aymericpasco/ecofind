@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')

    <section class="place">
        <div class="container">
            <div class="columns is-mobile">
                <div class="column is-12-mobile is-10-tablet is-offset-1-tablet is-8-desktop is-offset-2-desktop is-one-6-widescreen is-offset-3-widescreen is-6-fullhd is-offset-3-fullhd">
                    <div class="card card-place">

                        <div class="card-content">
                            <p class="title title-place">
                                <a href="{{ action('PlaceController@show', $place->slug) }}">{!! $place->name !!}</a>
                            </p>
                            <p class="subtitle">
                                <i>
                                    @if($place->type === 'vetement')
                                        Magasin de vêtement
                                    @elseif($place->type === 'restaurant')
                                        Restaurant
                                    @elseif($place->type === 'alimentaire')
                                        Magasin alimentaire
                                    @endif
                                </i>
                            </p>
                            <div class="place-address">{!! $place->address !!}</div>
                            <div class="field is-grouped is-grouped-multiline">
                                <div class="control">
                                    <div class="tags has-addons">
                                        <span class="tag">Prix</span>
                                        <span class="tag is-danger">
                                        @if($place->cost === 1)
                                                €
                                            @elseif($place->cost === 2)
                                                €€
                                            @elseif($place->cost === 3)
                                                €€€
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                @if($avg !== NULL)
                                <div class="control">
                                    <div class="tags has-addons">
                                        <span class="tag">Moyenne</span>
                                        <span class="tag is-danger">
                                        {!! $avg !!}/5
                                        </span>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="content is-hidden-touch">
                                {!! $place->description !!}
                            </div>
                        </div>
                        <footer class="card-footer add-review">
                            <form method="post">

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
                                    <label class="label">Votre avis</label>
                                    <div class="control">
                                        <input class="input" type="text" id="title" name="title">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Votre note</label>
                                    <div class="control">
                                        <div class="select">
                                            <select id="grade" name="grade">
                                                <option value="1" id="grade" name="grade">1</option>
                                                <option value="2" id="grade" name="grade">2</option>
                                                <option value="3" id="grade" name="grade">3</option>
                                                <option value="4" id="grade" name="grade">4</option>
                                                <option value="5" id="grade" name="grade">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <textarea class="textarea" id="description" name="description" placeholder="Commentez votre avis (optionnel)"></textarea>
                                    </div>
                                </div>
                                <div class="is-centered">{!! app('captcha')->display(); !!}</div>
                                <button class=" button is-medium is-primary submit-review is-pulled-right" type="submit">Ajouter votre avis</button>
                            </form>
                        </footer>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <style> @media screen and (max-height: 575px){ #rc-imageselect, .g-recaptcha {transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;} } </style>

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
    <hr>

    <div>
        <div>

            <form method="post">

                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach

                @if (session('status'))
                    <div>
                        {{ session('status') }}
                    </div>
                @endif

                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                <fieldset>
                    <legend>Ajouter review</legend>

                    <div>
                        <label for="title">Avis</label>
                        <div>
                            <input type="text" id="title" name="title">
                        </div>
                    </div>

                    <br>

                    <label for="grade"> Note
                        <input type="radio" name="grade" id="grade" value="1"> 1
                        <input type="radio" name="grade" id="grade" value="2"> 2
                        <input type="radio" name="grade" id="grade" value="3"> 3
                        <input type="radio" name="grade" id="grade" value="4"> 4
                        <input type="radio" name="grade" id="grade" value="5"> 5
                    </label>
                    <br><br>
                    <div >
                        <label>Description de votre avis (optionnel)</label>
                        <div>
                            <textarea rows="3" id="description" name="description"></textarea>
                        </div>
                    </div>

                    <div>
                        <div>
                            <button type="reset">Cancel</button>
                            <button type="submit">Submit</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

@endsection

@section('footer')
    @include('layouts.footer')
@endsection