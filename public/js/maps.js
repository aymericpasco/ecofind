/**
 * Add Place search
 */
if (document.getElementById('user_input_autocomplete_address')) {
    /**
     * init autocomplete for add place view
     * @param id
     */
    function initializeAutocompleteAddPlace(id) {
        var element = document.getElementById(id);
        var options = {
            types: ['geocode'],
            componentRestrictions: {country: "fr"}
        };
        if (element) {
            var autocomplete = new google.maps.places.Autocomplete(element, options);
            google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChangedAddPlace);
        }
    }

    /**
     * onPlaceChanged for add view
     */
    function onPlaceChangedAddPlace() {
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

    /**
     * Listener for add view
     */
    google.maps.event.addDomListener(window, 'load', function() {
        initializeAutocompleteAddPlace('user_input_autocomplete_address');
    });
}

/**
 * Home search
 */
if (document.getElementById('homeSearch')) {
    /**
     * init autocomplete for home view search
     * @param id
     */
    function initializeAutocompleteHomeSearch(id) {
        var element = document.getElementById(id);
        var options = {
            types: ['geocode'],
            componentRestrictions: {country: "fr"}
        };
        if (element) {
            var autocomplete = new google.maps.places.Autocomplete(element, options);
            google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChangedHomeSearch);
        }
    }

    /**
     * onPlaceChanged for home view
     */
    function onPlaceChangedHomeSearch() {
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
        document.getElementById('homeSearch').submit();
    }

    /**
     * Listener for home view
     */
    google.maps.event.addDomListener(window, 'load', function() {
        initializeAutocompleteHomeSearch('home_search');
    });
}

/**
 * Geolocation
 */
if (document.getElementById('homeGeolocate')) {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            };


            document.getElementById('homeGeolocate').lat.value = pos.lat;
            document.getElementById('homeGeolocate').lng.value = pos.lng;
            document.getElementById('homeGeolocate').submit();
        })
    } else {
        alert('Your browser doesn\'t support Geolocation.');
    }
}

/**
 * MAP : Home search & Geolocation
 */
if (document.getElementById('map')) {
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

        /**
         * Declare map
         * @type {google.maps.Map}
         */
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 48.856614, lng: 2.3522219},
            zoom: 7,
            mapTypeId: 'roadmap',
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: false
        });

        map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map');
    }
}
