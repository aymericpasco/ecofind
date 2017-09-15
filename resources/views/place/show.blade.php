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
                            <p class="title">
                                {!! $place->name !!}
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
                            <div class="content">
                                {!! $place->description !!}
                            </div>
                        </div>
                        <footer class="card-footer">
                            <a href="{{ action('User\ReviewController@create', $place->slug) }}" class="card-footer-item">Ajouter un avis</a>
                        </footer>
                    </div>
                </div>
            </div>


            @foreach($reviews as $review)
            <div class="columns is-mobile">
                <div class="column is-12-mobile is-10-tablet is-offset-1-tablet is-8-desktop is-offset-2-desktop is-one-6-widescreen is-offset-3-widescreen is-6-fullhd is-offset-3-fullhd">
                    <div class="card card-review">

                        <article class="media">
                            <figure class="media-left">
                                <p class="image is-64x64">
                                    <img class="img-circle" src="https://graph.facebook.com/{{ \App\User::find($review->user_id)->provider_id }}/picture">
                                </p>
                            </figure>
                            <div class="media-content">
                                <div class="content">
                                    <p>
                                        <small><i class="user-name"><a href="http://facebook.com/{{ \App\User::find($review->user_id)->provider_id }}" target="_blank">{{ \App\User::find($review->user_id)->name }}</a></i></small>
                                        <br>
                                        <strong>{!! $review->title !!}</strong>
                                        <br>
                                        {!! $review->description !!}
                                    </p>
                                </div>
                                <nav class="level is-mobile">
                                    <div class="level-left">
                                        <div class="tags has-addons">
                                            <span class="tag">Note</span>
                                            <span class="tag is-danger">{!! $review->grade !!}/5</span>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </section>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection