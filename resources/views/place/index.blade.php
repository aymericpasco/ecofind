@extends('layouts.app')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('maps-api')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAp0YwuMWioEzFiKeAV5XOy3LhicJQfC3I&callback=initMap" data-turbolinks-eval="false" data-turbolinks-track="reload" async defer></script>
    <script>
        function initMap() {
            /**
             * Custom map style
             * @type {google.maps.StyledMapType}
             */
            var styledMapType = new google.maps.StyledMapType(
                [
                    {
                        "featureType": "all",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "saturation": 36
                            },
                            {
                                "color": "#333333"
                            },
                            {
                                "lightness": 40
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 17
                            },
                            {
                                "weight": 1.2
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#dedede"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 29
                            },
                            {
                                "weight": 0.2
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 18
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#f2f2f2"
                            },
                            {
                                "lightness": 19
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#e9e9e9"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    }
                ],
                {name: 'ecofind-map'}
            );

            var init_lat = {!! $lat !!};
            var init_lng = {!! $lng !!};

            /**
             * Declare map
             * @type {google.maps.Map}
             */
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: init_lat, lng: init_lng},
                zoom: 12,
                mapTypeId: 'roadmap',
                mapTypeControl: false,
                streetViewControl: false,
                fullscreenControl: false
            });

            var icons = {
                restaurant: {
                    icon: '{{ asset('img/icons/restaurant.png') }}'
                },
                vetement: {
                    icon: '{{ asset('img/icons/vetement.png') }}'
                },
                alimentaire: {
                    icon: '{{ asset('img/icons/shop.png') }}'
                }
            };

            var features = [
                @foreach($places as $place)
                {
                    name: '{!! $place->name !!}',
                    address: '{!! $place->address !!}',
                    position: new google.maps.LatLng({!! $place->lat !!}, {!! $place->lng !!}),
                    description: '{!! $place->description !!}',
                    type: '{!! $place->type !!}',
                    cost: '{!! $place->cost !!}',
                    user: '{!! $place->user->name !!}'
                },
                @endforeach
            ];

            var infoWindow = new google.maps.InfoWindow();

            features.forEach(function(feature) {
                var marker = new google.maps.Marker({
                    name: feature.name,
                    position: feature.position,
                    icon: icons[feature.type].icon,
                    map: map
                });
                (function (marker) {
                    google.maps.event.addListener(marker, "click", function (e) {
                        //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                        infoWindow.setContent("<h1 class=\"title\">" + marker.name + "</h1>" +
                            "<h2 class=\"subtitle\">Subtitle</h2>");
                        infoWindow.open(map, marker);
                    });
                })(marker);
            });

            map.mapTypes.set('styled_map', styledMapType);
            map.setMapTypeId('styled_map');
        }
    </script>
@stop

@section('content')

    <style>



    </style>

            <div id="map"></div>


{{--@foreach($places as $place)--}}
    {{--<div>--}}
        {{--<div>--}}

            {{--<p>{!! $place->name !!}</p>--}}
            {{--<p>{!! $place->address !!}</p>--}}

        {{--</div>--}}
    {{--</div>--}}
    {{--<hr>--}}
{{--@endforeach--}}

@endsection