@extends('layouts.app')
@section('title', 'Ajouter review')

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