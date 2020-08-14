<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        {{-- <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCD4JTzve2Q6-tquziaP7Gv7o-4_Yzd0aY&callback=initMap"></script> --}}
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCD4JTzve2Q6-tquziaP7Gv7o-4_Yzd0aY&callback=initMap&libraries=&v=weekly" defer></script> --}}
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            {{-- <div class="content">
                <div style="width: 1000px; height: 500px;">
                    {!! Mapper::render() !!}
                </div>
            </div> --}}

            <div id="map" style="width: 1000px; height: 600px;"></div>
        </div>


        {{-- COLOURED MARKER --}}
        {{-- <script type="text/javascript">
            let map;
            // global array to store the marker object 
            let markersArray = [];

            function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 1.118709, lng: 104.048585},
                zoom: 17
            });
            addMarker({lat: 1.119679, lng: 104.048445}, "yellow");
            addMarker({lat: 1.119758, lng: 104.049405}, "green");
            addMarker({lat: 1.118752, lng: 104.050337}, "blue");
            addMarker({lat: 1.118869, lng: 104.047097}, "green");
            addMarker({lat: 1.117819, lng: 104.047335}, "yellow");

            const contentString = 
            '<div id="content">' +
            '<div id="siteNotice">' +
            "</div>" +
            '<h1 id="firstHeading" class="firstHeading">Sensor Node</h1>' +
            '<div id="bodyContent">' +
            "</div>" +
            "</div>";
            
            }

            function addMarker(latLng, color) {
            let url = "http://maps.google.com/mapfiles/ms/icons/";
            url += color + "-dot.png";

            let marker = new google.maps.Marker({
                map: map,
                position: latLng,
                icon: {
                url: url
                }
            });

            //store the marker object drawn in global array
            markersArray.push(marker);
            }
        </script> --}}


        {{-- DEFAULT MARKER --}}
        {{-- <script type="text/javascript">

        function initMap(){
            var locations = [
                ['SensorNodeA', 1.119679, 104.048445, 1], //GATE POLIBATAM
                ['SensorNodeB', 1.119758, 104.049405, 2], //BASKET FIELD
                ['SensorNodeC', 1.118752, 104.050337, 3], //FUTSAL FIELD
                ['SensorNodeD', 1.118869, 104.047097, 4], //TOWER A PARKING LOT 
                ['SensorNodeE', 1.117819, 104.047335, 5]  //HANGAR POLIBATAM
            ];

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 18,
                center: new google.maps.LatLng(1.118709, 104.048585), //Polibatam
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            
            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            for (i = 0; i < locations.length; i++) {  
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    animation: google.maps.Animation.DROP
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
                })(marker, i));
            }
        }
        </script> --}}

        <!-- CIRCLE MARKER -->
        {{-- <script type="text/javascript">
            const nodemap = {
                SensorNodeA: {
                    title: "Sensor Node A",
                    center: { lat:  1.119679, lng: 104.048445 },
                    population: 200
                },
                SensorNodeB: {
                    title: "Sensor Node B",
                    center: { lat: 1.119758, lng: 104.049405 },
                    population: 200
                },
                SensorNodeC: {
                    title: "Sensor Node C",
                    center: { lat: 1.118752, lng: 104.050337 },
                    population: 200
                },
                SensorNodeD: {
                    title: "Sensor Node D",
                    center: { lat: 1.118869, lng: 104.047097 },
                    population: 200
                },
                SensorNodeE: {
                    title: "Sensor Node E",
                    center: { lat: 1.117819, lng: 104.047335 },
                    population: 200
                }
            };
            


            function initMap() {
            // Create the map.
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 17,
                center: {
                lat: 1.118709,
                lng: 104.048585
                },
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }); 

            for (const node in nodemap) {
                console.log('==============tester===============');
                console.log(nodemap[node]["population"]);
                console.log('==============tester===============');

                var contentString =
                '<div id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h1 id="firstHeading" class="firstHeading">'+nodemap[node]+'</h1>' +
                '<div id="bodyContent">' +
                "<p>Kadar ISPU :</p>" +
                "</div>" +
                "</div>";
                // Add the circle for this city to the map.
                const nodeCircle = new google.maps.Circle({
                    strokeColor: "#00B01D",
                    strokeOpacity: 0.8,
                    strokeWeight: 0,
                    fillColor: "#00B01D",
                    fillOpacity: 0.35,
                    map,
                    center: nodemap[node]["center"],
                    radius: Math.sqrt(nodemap[node]["population"]) * 1
                });

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                google.maps.event.addListener(nodeCircle, 'click', function(ev){
                    // infowindow.setContent(this.getCenter().contentString + "<br>");
                    infowindow.setPosition(this.getCenter());
                    infowindow.open(map);
                })
            }
            }
        </script> --}}


        <script>

                // Create an object containing LatLng, population.
                var nodePoints = {};

                nodePoints[0] = {
                    center: new google.maps.LatLng(1.119679, 104.048445),
                    id: 0,
                    addr: '<div id="content">' +
                            '<div id="siteNotice">' +
                            "</div>" +
                            '<h2 id="firstHeading" class="firstHeading">Sensor Node A</h2>' +
                            '<div id="bodyContent">' +
                            "<p>partikel udara : </p>" +
                            "<p>Kadar ISPU : </p>" +
                            "<p>keterangan : </p>" +
                            "</div>" +
                            "</div>",
                    magnitude: 40 
                };
                nodePoints[1] = {
                    center: new google.maps.LatLng(1.119758, 104.049405),
                    id: 1, 
                    addr: '<div id="content">' +
                            '<div id="siteNotice">' +
                            "</div>" +
                            '<h2 id="firstHeading" class="firstHeading">Sensor Node B</h2>' +
                            '<div id="bodyContent">' +
                            "<p>partikel udara : </p>" +
                            "<p>Kadar ISPU : </p>" +
                            "<p>keterangan : </p>" +
                            "</div>" +
                            "</div>",
                    magnitude: 40
                };
                nodePoints[2] = {
                    center: new google.maps.LatLng(1.118752, 104.050337),
                    id: 2,
                    addr: '<div id="content">' +
                            '<div id="siteNotice">' +
                            "</div>" +
                            '<h2 id="firstHeading" class="firstHeading">Sensor Node C</h2>' +
                            '<div id="bodyContent">' +
                            "<p>partikel udara : </p>" +
                            "<p>Kadar ISPU : </p>" +
                            "<p>keterangan : </p>" +
                            "</div>" +
                            "</div>",
                    magnitude: 40
                }
                nodePoints[3] = {
                    center: new google.maps.LatLng(1.118869, 104.047097),
                    id: 3,
                    addr: '<div id="content">' +
                            '<div id="siteNotice">' +
                            "</div>" +
                            '<h2 id="firstHeading" class="firstHeading">Sensor Node D</h2>' +
                            '<div id="bodyContent">' +
                            "<p>partikel udara : </p>" +
                            "<p>Kadar ISPU : </p>" +
                            "<p>keterangan : </p>" +
                            "</div>" +
                            "</div>",
                    magnitude: 40
                };
                nodePoints[4] = {
                    center: new google.maps.LatLng(1.117819, 104.047335),
                    id: 4,
                    addr: '<div id="content">' +
                            '<div id="siteNotice">' +
                            "</div>" +
                            '<h2 id="firstHeading" class="firstHeading">Sensor Node E</h2>' +
                            '<div id="bodyContent">' +
                            "<p>partikel udara : </p>" +
                            "<p>Kadar ISPU : </p>" +
                            "<p>keterangan : </p>" +
                            "</div>" +
                            "</div>",
                    magnitude: 40
                };
            
                var nodeCircle;
                var infoWindow = new google.maps.InfoWindow();  

                function initialize() {
                var mapOptions = {
                    zoom: 17,
                    center: new google.maps.LatLng(1.118709, 104.048585),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                var map = new google.maps.Map(document.getElementById('map'),
                    mapOptions);

                for (i in nodePoints) {
                    console.log('====================');
                    console.log(nodePoints);
                    console.log('====================');
                        var magnitudeOptions = {
                                strokeColor: "#00B01D",
                                strokeOpacity: 0.8,
                                strokeWeight: 0,
                                fillColor: "#00B01D",
                                fillOpacity: 0.35,
                                map: map,
                                center: nodePoints[i].center,
                                radius: nodePoints[i].magnitude,
                                id:nodePoints[i].id,
                                addr:nodePoints[i].addr,
                                infoWindowIndex: i
                            };
                nodeCircle = new google.maps.Circle(magnitudeOptions);

                    google.maps.event.addListener(nodeCircle, 'click', (function(nodeCircle, i) {
                        return function() {
                            infoWindow.setContent(nodePoints[i].addr);
                            infoWindow.setPosition(nodeCircle.getCenter());
                            infoWindow.open(map);
                        }
                    })(nodeCircle, i));
                }
                }
                google.maps.event.addDomListener(window, 'load', initialize);


        </script>
    </body>
</html>
