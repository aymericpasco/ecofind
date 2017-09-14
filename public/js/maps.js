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
}

/**
 * Listener for home view
 */
google.maps.event.addDomListener(window, 'load', function() {
    initializeAutocompleteHomeSearch('home_search');
});