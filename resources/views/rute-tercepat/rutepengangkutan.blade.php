@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Rute Pengangkutan</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <head>
                            <title>Map</title>
                            <style>
                                #map {
                                    height: 400px;
                                }
                            </style>
                        </head>

                        <body>
                            <div id="map"></div>

                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFbKbk77K6DiYaHNEFRtkFjmufF1Bribw"></script>
                            <script>
                                var origin = {
                                    lat: -0.053803,
                                    lng: 109.347326
                                }; // Titik asal (lat dan lng)
                                var destination = {
                                    lat: -0.055248,
                                    lng: 109.350089
                                }; // Titik tujuan (lat dan lng)

                                var directionsService = new google.maps.DirectionsService();
                                var directionsRenderer = new google.maps.DirectionsRenderer();

                                var map = new google.maps.Map(document.getElementById('map'), {
                                    center: origin,
                                    zoom: 15
                                });

                                directionsRenderer.setMap(map);

                                var request = {
                                    origin: origin,
                                    destination: destination,
                                    travelMode: 'DRIVING'
                                };

                                directionsService.route(request, function(response, status) {
                                    if (status === 'OK') {
                                        directionsRenderer.setDirections(response);
                                    } else {
                                        window.alert('Tidak dapat menampilkan rute: ' + status);
                                    }
                                });
                            </script>
                        </body>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
