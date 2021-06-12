

// 2021-06-05 OG NEW - Get the info from the page that will be provided to map api
//                     This function can be changed to obtain the address info from a different source
//                     As long as it return an array of objects with the corresponding properties
function getAddresses() {
    // 2021-06-05 OG NEW - Get all the cards from the page 
    var groups = document.getElementsByClassName('card-info');
    // 2021-06-05 OG NEW - Initialize an empty array to store the info 
    var result = [];
    // 2021-06-05 OG NEW - Go through each group and format the info into an object 
    for (var i = 0; i < groups.length; i++) {
        result.push({
            type: groups[i].children[2].innerHTML, // The type of group
            value: groups[i].children[3].innerHTML + " " + groups[i].children[4].innerHTML, // The address value
            markup: groups[i].innerHTML // The entire markup to be used in the info window
        });
    }

    return result;
}

// 2021-06-05 OG NEW - Get geocode of an address and provide it to a callback function to set up the markers
function getGeocode(map, addresses, i, callback) {
    // 2021-06-05 OG NEW - Instantiate a new geocoder and pass in the address value 
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({'address': addresses[i].value}, function(results, status) {
        // 2021-06-05 OG NEW - if everything's ok... 
        if (status == 'OK') {
            // 2021-06-05 OG NEW - Call the addMarker function 
            callback({
                position:results[0].geometry.location,
                map: map,
                icon: addresses[i].type,
                infoMarkup: addresses[i].markup
            });
            
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

// 2021-06-04 OG NEW - Function to add a marker on the map 
function addMarker(details) {
    var marker = new google.maps.Marker({
        position: details.position,
        map: details.map,
        icon: '../images/map_markers/'+ details.icon +'.png'
    });

    var infoWindow = new google.maps.InfoWindow({
        content: details.infoMarkup
    });

    marker.addListener('click', function(){
        infoWindow.open(details.map, marker);
    });
}



// 2021-06-04 OG NEW - Attach your callback function to the `window` object 
function initMap() {
    // 2021-06-04 OG NEW - JS API is loaded and available

    // 2021-06-04 OG NEW - Map options 
    var options = {
        zoom: 12,
        center: {lat: 34.0975, lng: -117.6484}
    }

    // 2021-06-04 OG NEW - Map 
    var map = new google.maps.Map(document.getElementById('map'), options);

    // 2021-06-05 OG NEW - Get addresses for the api 
    var addresses = getAddresses();
    
    // 2021-06-05 OG NEW - Go through each address that gets the geocode and then runs the addMarker 
    for (var i = 0; i < addresses.length; i++) {
        getGeocode(map, addresses, i, addMarker);
    }

};
