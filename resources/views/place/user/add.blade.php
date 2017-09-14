@extends('layouts.app')
@section('title', 'Ajouter place')

@section('maps-api')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAp0YwuMWioEzFiKeAV5XOy3LhicJQfC3I&libraries=places&sensor=true"></script>
@stop

@section('content')
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
                    <legend>Ajouter place</legend>

                    <div>
                        <label for="name">Nom du lieu</label>
                        <div>
                            <input type="text" id="name" name="name">
                        </div>
                    </div>

                    <br>

                    <label for="cost">
                        <input type="radio" name="cost" id="cost" value="1"> €
                        <input type="radio" name="cost" id="cost" value="2"> €€
                        <input type="radio" name="cost" id="cost" value="3"> €€€
                    </label>

                    <br><br>

                     <div >
                        <label>Address</label>
                        <div>
                            <input id="user_input_autocomplete_address" name="address">
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


                    <br>
                    <label class="inline">
                        <input type="radio" name="type" id="type" value="restaurant"> Restaurant

                        <input type="radio" name="type" id="type" value="vetement"> Vêtement

                        <input type="radio" name="type" id="type" value="alimentaire"> Alimentaire
                    </label>
                    <br><br>
                    <div >
                        <label>Description du lieu</label>
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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAp0YwuMWioEzFiKeAV5XOy3LhicJQfC3I&libraries=places"></script>


        <script>
        function initializeAutocomplete(id) {
            var element = document.getElementById(id);
            var options = {
                types: ['geocode'],
                componentRestrictions: {country: "fr"}
            };
            if (element) {
                var autocomplete = new google.maps.places.Autocomplete(element, options);
                google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
            }
        }

        function onPlaceChanged() {
            var place = this.getPlace();

            // console.log(place);  // Uncomment this line to view the full object returned by Google API.

            for (var i in place.address_components) {
                var component = place.address_components[i];
                for (var j in component.types) {  // Some types are ["country", "political"]
                    var type_element = document.getElementById(component.types[j]);
                    if (type_element) {
                        type_element.value = component.long_name;
                    }
                }
            }
        }

        google.maps.event.addDomListener(window, 'load', function() {
            initializeAutocomplete('user_input_autocomplete_address');
        });
    </script>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection