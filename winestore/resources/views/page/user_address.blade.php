<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map" style="width: 500px; height: 500px;"></div>
</body>
<style>
    #map {
        height: 100%;
    }

    /* Optional: Makes the sample page fill the window. */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }

    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    .pac-container {
        font-family: Roboto;
    }

    #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
    }

    #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }

    #target {
        width: 345px;
    }
</style>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvW92Vt4aW_Akj8O3Mgqx9i79QW3o4rGs&libraries=places&language=vi&region=VI&callback=initMap"
    async defer></script>
<script>
    var map, marker, infowindow;
    var markers = [];
    var address_infos = {};

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: {
                lat: 10.761055439722465,
                lng: 106.6822583
            },
            streetViewControl: false,
            mapTypeControl: false
        });

        placeMarker({
            lat: 10.761055439722465,
            lng: 106.6822583
        });
        // geocodeAddress(marker.position);
        map.panTo(marker.position);
        markers.push(marker);

        map.addListener("click", function(e) {
            clearMarkers();

            console.log(e.latLng.lat())
            console.log(e.latLng.lng())


            placeMarker(e.latLng);
            fetch('https://nominatim.openstreetmap.org/reverse?format=json&lat=' + e.latLng.lat() + '&lon=' + e
                    .latLng.lng() + '&zoom=18&addressdetails=1')
                .then((response) => response.json())
                .then((data) => alert("địa chỉ đã chọn: " + (data.display_name)));
            // geocodeAddress(e.latLng);
            map.panTo(marker.position);
            markers.push(marker);
        });
        createInfoWindow();
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        // map.addListener('bounds_changed', function() {
        // searchBox.setBounds(map.getBounds());
        // });
        searchBox.addListener("places_changed", function() {
            searchBox.set("map", null);
            clearMarkers();
            var places = searchBox.getPlaces();
            if (places.length == 0) {
                console.log("Returned no place");
                return;
            }
            var bounds = new google.maps.LatLngBounds();
            if (places.length > 1) {
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
                    marker = new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    });
                    marker.bindTo("map", searchBox, "map");
                    marker.addListener("map_changed", function() {
                        if (!this.getMap()) {
                            this.unbindAll();
                        }
                    });
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
                searchBox.set("map", map);
                map.setZoom(Math.min(map.getZoom(), 15));
                // searchBox.setBounds(map.getBounds());
            } else {
                infowindow.close();
                var place = places[0];
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                placeMarker(place.geometry.location);
                marker.bindTo("map", searchBox, "map");
                marker.addListener("map_changed", function() {
                    if (!this.getMap()) {
                        this.unbindAll();
                    }
                });
                create_address_infos(place);
                infowindow.setContent(
                    "<div>" +
                    "<b>Address :</b> " + place.formatted_address + "<br>" +
                    "<b>Latitude :</b> " + place.geometry.location.lat() + "<br>" +
                    "<b>Longitude :</b> " + place.geometry.location.lng() +
                    "</div>"
                );
                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
                map.fitBounds(bounds);
                searchBox.set("map", map);
                map.setZoom(Math.min(map.getZoom(), 15));
                infowindow.open(map, marker);
                markers.push(marker);
            }
        });
    }

    function placeMarker(latLng) {
        marker = new google.maps.Marker({
            position: latLng,
            map: map
        });
    }

    function createInfoWindow() {
        if (infowindow) {
            infowindow.close();
        }
        infowindow = new google.maps.InfoWindow();
    }

    // Hàm này cần có thẻ tín dụng mastercard & visa để sử dụng 
    // function geocodeAddress(latLng) {
    //     var geocoder = new google.maps.Geocoder;
    //     createInfoWindow();
    //     geocoder.geocode({
    //             "location": latLng
    //         },
    //         function(results, status) {
    //             if (status === google.maps.GeocoderStatus.OK) {
    //                 if (results[0]) {
    //                     create_address_infos(results[0]);

    //                     infowindow.setContent(
    //                         "<div>" +
    //                         "<b>Address :</b> " + address_infos["name"] + "<br>" +
    //                         "<b>Latitude :</b> " + address_infos["latitude"] + "<br>" +
    //                         "<b>Longitude :</b> " + address_infos["longitude"] +
    //                         "</div>"
    //                     );
    //                     infowindow.open(map, marker);
    //                 } else {
    //                     console.log("No results found");
    //                 }
    //             } else {
    //                 console.log("Geocoder failed due to: " + status);
    //             }
    //         }
    //     );
    // }

    function clearMarkers() {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null)
        }
        markers = [];
    }

    function create_address_infos(address) {
        address_infos = {
            name: address.formatted_address.toString(),
            latitude: address.geometry.location.lat(),
            longitude: address.geometry.location.lng(),
            prefecture: "",
            city: "",
            town: "",
            choume: "",
            banchi: "",
            gou: ""
        }
    }
</script>
{{-- <script>
    function initMap() {
        var input = document.getElementById("pac-input");
        const searchBox = new google.maps.places.SearchBox(input);

        map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: 10.761055439722465,
                lng: 106.6822583
            },
            zoom: 15,
            // mapTypeId: 'satellite'
        });

        // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // var searchBox = new google.maps.places.SearchBox(
        //     /** @type {HTMLInputElement} */
        //     (input));
        // google.maps.event.addListener(searchBox, 'places_changed', function() {
        //     var places = searchBox.getPlaces();

        //     if (places.length == 0) {
        //         return;
        //     }
        //     for (var i = 0, marker; marker = markers[i]; i++) {
        //         marker.setMap(null);
        //     }
        //     markers = [];
        //     var bounds = new google.maps.LatLngBounds();
        //     for (var i = 0, place; place = places[i]; i++) {
        //         var image = {
        //             url: place.icon,
        //             size: new google.maps.Size(71, 71),
        //             origin: new google.maps.Point(0, 0),
        //             anchor: new google.maps.Point(17, 34),
        //             scaledSize: new google.maps.Size(25, 25)
        //         };
        //         var marker = new google.maps.Marker({
        //             map: map,
        //             icon: image,
        //             title: place.name,
        //             position: place.geometry.location
        //         });

        //         markers.push(marker);

        //         bounds.extend(place.geometry.location);
        //     }

        //     map.fitBounds(bounds);
        // });
        
        map.addListener('click', (e) => {
                console.log(e.latLng.lat())
                console.log(e.latLng.lng())
                const myLatLng = {
                    lat: e.latLng.lat(),
                    lng: e.latLng.lng()
                };
                // new google.maps.Marker({
                //     position: myLatLng,
                //     map,
                //     title: "Hello World!",
                // });
            }

        )
    }


    window.initMap = initMap;
</script> --}}
