@extends('layouts.head')

{{-- @section('container') --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                {{-- <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between"> --}}

                {{-- <a class="font-weight-bold  nav-link" href="/dashboard" style="color: black;">
                        <i class="fas fa-fw fa-home"></i>
                        <span>Dashboard</span></a> --}}

                {{-- <h6 class="m-0 font-weight-bold" style="color: black; text-decoration: underline;">Angka Pada Marker
                        Merupakan Urutan Prioritas Pengangkutan Sampah</h6> --}}

                {{-- <button class="btn btn-dark font-weight-bold" id="login">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button> --}}
                <!-- Topbar -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-0 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        {{-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button> --}}
                        {{-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">

                        </div> --}}
                        <h6 class="m-0 font-weight-bold text-primary text-center">Angka Pada
                                Marker
                                Merupakan Urutan Prioritas Pengangkutan Sampah</h6>
                        {{-- <h6 class="m-0 font-weight-bold primary-text center-text">Angka Pada
                            Marker
                            Merupakan Urutan Prioritas Pengangkutan Sampah</h6> --}}


                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        <?php echo auth()->check() ? auth()->user()->name : 'Akun'; ?>
                                    </span>
                                    <img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg">
                                </a>

                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <?php if (auth()->check()): ?>
                                    <!-- Jika sudah login -->
                                    <a class="dropdown-item" href="/dashboard">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Dashboard
                                    </a>
                                    <a class="dropdown-item" href="/untan">
                                        <i class="fas fa-fw fa-chart-line mr-2 text-gray-400"></i>
                                        Untan
                                    </a>
                                    <a class="dropdown-item" href="/polnep">
                                        <i class="fas fa-fw fa-chart-line mr-2 text-gray-400"></i>
                                        Polnep
                                    </a>
                                    <a class="dropdown-item" href="/rusunawa">
                                        <i class="fas fa-fw fa-chart-line mr-2 text-gray-400"></i>
                                        Rusunawa
                                    </a>
                                    <a class="dropdown-item" href="/siskom">
                                        <i class="fas fa-fw fa-chart-line mr-2 text-gray-400"></i>
                                        Siskom
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                    <?php else: ?>
                                    <!-- Jika belum login -->
                                    <a class="dropdown-item" href="/login">
                                        <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Login
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </li>



                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Content Row -->
                        <div class="row">
                            <!-- Area Chart -->
                            @yield('container')
                        </div>
                    </div>
                </div>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    <i class="fas fa-fw fa-times"></i>
                                    <span>Cancel</span>
                                </button>
                                <form action="/logout" method="post" class="nav-link">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-fw fa-sign-out-alt"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}

                <!-- Card Body -->
                <div class="card-body">

                    <head>
                        <title>PETAPA (Pemantauan Tempat Sampah)</title>
                        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
                        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
                        {{-- <script>
                            // Fungsi untuk melakukan refresh halaman setiap 5 menit (300,000 milidetik)
                            function autoRefresh() {
                                location.reload();
                            }

                            // Atur interval refresh
                            setTimeout(autoRefresh, 10000); // 300,000 ms = 5 menit
                        </script> --}}
                        <script>
                            document.getElementById('login').addEventListener('click', function() {
                                // Ganti URL login sesuai dengan rute login Anda
                                window.location.href = '/login';
                            });
                        </script>




                        <style>
                            html,
                            body {
                                height: 100%;
                                margin: 0;
                            }

                            .leaflet-container {
                                height: 400px;
                                width: 600px;
                                max-width: 100%;
                                max-height: 100%;
                            }
                        </style>
                    </head>

                    <body>
                        {{-- <div id="map" style="width: 100%; height: 500px;"></div> --}}
                        <div id="map" style="width: 100%; height: 90vh;"></div>


                        <script>
                            var map = L.map('map', {
                                fullscreenControl: {
                                    pseudoFullscreen: false
                                }
                            }).setView([-0.056986, 109.349103], 16);

                            L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                                maxZoom: 20,
                                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                            }).addTo(map);

                            var untan = [{
                                "lat": -0.06003923078743205,
                                "lng": 109.34541463266854,
                                "name": 'Untan',
                                "volumeorganik": {{ $untan->volumeorganik }},
                                "volumenonorganik": {{ $untan->volumenonorganik }},
                                "volumeB3": {{ $untan->volumeB3 }},
                                "volumetotaledge": {{ $untan->volumetotaledge }},
                                "ranking": {{ $rankUntan['ranking'] }},
                            }, ];

                            var popupUntan = `
                                    <b>Prioritas pengambilan ke: </b><strong>${untan[0].ranking}</strong> <br>
                                    <b>Nama Lokasi:</b> <strong>${untan[0].name}</strong> <br>
                                    <div class="progress-container">
                                        <div class="volume-label">Tempat Sampah 1: ${untan[0].volumeorganik}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(untan[0].volumeorganik)}" style="width: ${untan[0].volumeorganik}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-container">
                                        <div class="volume-label">Tempat Sampah 2: ${untan[0].volumenonorganik}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(untan[0].volumenonorganik)}" style="width: ${untan[0].volumenonorganik}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-container">
                                        <div class="volume-label">Volume Rata - Rata: ${untan[0].volumetotaledge}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(untan[0].volumetotaledge)}" style="width: ${untan[0].volumetotaledge}%;"></div>
                                        </div>
                                    </div>`;

                            function getColorCategory(volume) {
                                if (volume < 33.33) {
                                    return "bg-success"; // Warna hijau untuk kategori rendah
                                } else if (volume < 66.67) {
                                    return "bg-warning"; // Warna kuning untuk kategori sedang
                                } else {
                                    return "bg-danger"; // Warna merah untuk kategori tinggi
                                }
                            }
                            var volumetotaledge = untan[0].volumetotaledge;
                            var ranking = untan[0].ranking;

                            // Hitung persentase volumetotaledge terhadap 100%
                            var volumetotaledgePercentage = (volumetotaledge / 100) * 100;

                            var iconUrl = '';

                            // Menentukan jenis ikon marker berdasarkan ranking dan persentase volumetotaledge
                            if (ranking === 1) {
                                if (volumetotaledgePercentage <= 33) {
                                    iconUrl = '{{ asset('assets/img/tpshijau1.png') }}'; // Ikon hijau untuk ranking 1 dan volume rendah
                                } else if (volumetotaledgePercentage <= 66) {
                                    iconUrl = '{{ asset('assets/img/tpskuning1.png') }}'; // Ikon kuning untuk ranking 1 dan volume sedang
                                } else {
                                    iconUrl = '{{ asset('assets/img/tpsmerah1.png') }}'; // Ikon merah untuk ranking 1 dan volume tinggi
                                }
                            } else if (ranking === 2) {
                                if (volumetotaledgePercentage <= 33) {
                                    iconUrl = '{{ asset('assets/img/tpshijau2.png') }}'; // Ikon hijau untuk ranking 2 dan volume rendah
                                } else if (volumetotaledgePercentage <= 66) {
                                    iconUrl = '{{ asset('assets/img/tpskuning2.png') }}'; // Ikon kuning untuk ranking 2 dan volume sedang
                                } else {
                                    iconUrl = '{{ asset('assets/img/tpsmerah2.png') }}'; // Ikon merah untuk ranking 2 dan volume tinggi
                                }
                            } else if (ranking === 3) {
                                if (volumetotaledgePercentage <= 33) {
                                    iconUrl = '{{ asset('assets/img/tpshijau3.png') }}'; // Ikon hijau untuk ranking 3 dan volume rendah
                                } else if (volumetotaledgePercentage <= 66) {
                                    iconUrl = '{{ asset('assets/img/tpskuning3.png') }}'; // Ikon kuning untuk ranking 3 dan volume sedang
                                } else {
                                    iconUrl = '{{ asset('assets/img/tpsmerah3.png') }}'; // Ikon merah untuk ranking 3 dan volume tinggi
                                }
                            } else if (ranking === 4) {
                                if (volumetotaledgePercentage <= 33) {
                                    iconUrl = '{{ asset('assets/img/tpshijau4.png') }}'; // Ikon hijau untuk ranking 4 dan volume rendah
                                } else if (volumetotaledgePercentage <= 66) {
                                    iconUrl = '{{ asset('assets/img/tpskuning4.png') }}'; // Ikon kuning untuk ranking 4 dan volume sedang
                                } else {
                                    iconUrl = '{{ asset('assets/img/tpsmerah4.png') }}'; // Ikon merah untuk ranking 4 dan volume tinggi
                                }
                            }

                            var warnaIcon1 = L.icon({
                                iconUrl: iconUrl,
                                iconSize: [50, 90],
                                shadowSize: [50, 64],
                                iconAnchor: [22, 94],
                                popupAnchor: [-3, -76]
                            });

                            var mainMarker = L.marker([untan[0].lat, untan[0].lng], {
                                icon: warnaIcon1
                            }).addTo(map);

                            var additionalMarkersGroup = L.layerGroup(); // Layer group to manage additional markers

                            mainMarker.on('click', function(e) {
                                var clickedLatLng = e.latlng;

                                var additionalMarkerPositions = [{
                                        lat: -0.06025183615529076,
                                        lng: 109.34523781712993,
                                        name: 'tps 1'
                                    },
                                    {
                                        lat: -0.0600092781549708,
                                        lng: 109.34526524930074,
                                        name: 'tps 2'
                                    },
                                    {
                                        lat: -0.0602019971769077,
                                        lng: 109.34542803437336,
                                        name: 'tps 3'
                                    }
                                    // Add more positions as needed
                                ];

                                // Add additional markers to the layer group
                                additionalMarkerPositions.forEach(function(position) {
                                    // Determine the icon URL based on the marker name
                                    var iconUrl = getIconUrl(position.name);

                                    // Create a custom icon for the additional marker
                                    var customIcon = L.icon({
                                        iconUrl: iconUrl,
                                        iconSize: [20, 40],
                                        iconAnchor: [25, 50],
                                        popupAnchor: [0, -50]
                                    });

                                    var newMarker = L.marker([position.lat, position.lng], {
                                        icon: customIcon
                                    });

                                    // Open the popup when the marker is clicked
                                    // newMarker.on('click', function() {
                                    //     newMarker.openPopup();
                                    // });

                                    newMarker.bindPopup(`<b>${position.name}</b><br>${popupUntan}`);

                                    // Add the new marker to the layer group
                                    additionalMarkersGroup.addLayer(newMarker);
                                });

                                // Add the layer group to the map
                                map.addLayer(additionalMarkersGroup);

                                // Open the popupUntan for the main marker
                                // mainMarker.bindPopup(popupUntan).openPopup();
                            });
                            additionalMarkersGroup.on('click', function(event) {
                                event.layer.openPopup();
                            });
                            // Close the additional markers when clicking elsewhere on the map
                            map.on('click', function(e) {
                                // Remove the layer group from the map
                                map.removeLayer(additionalMarkersGroup);

                                // Close the popupUntan for the main marker
                                // mainMarker.closePopup();
                            });

                            // Close the additional markers when closing the main marker popup
                            mainMarker.bindPopup(popupUntan).on('popupclose', function() {
                                map.removeLayer(additionalMarkersGroup);
                            });

                            function getIconUrl(markerName) {
                                // Determine the icon URL based on the marker name
                                // You can customize this logic based on your requirements
                                if (markerName === 'tps 1') {
                                    return '{{ asset('assets/img/tps1.png') }}';
                                } else if (markerName === 'tps 2') {
                                    return '{{ asset('assets/img/tps2.png') }}';
                                } else if (markerName === 'tps 3') {
                                    return '{{ asset('assets/img/tps3.png') }}';
                                } else {
                                    // Default icon if the name doesn't match any condition
                                    return '{{ asset('assets/img/tps.png') }}';
                                }
                            }




                            var polnep = [{
                                "lat": -0.05395548111298981,
                                "lng": 109.34704905347925,
                                "name": 'Polnep',
                                "volumeorganik": {{ $polnep->volumeorganik }},
                                "volumenonorganik": {{ $polnep->volumenonorganik }},
                                "volumeB3": {{ $polnep->volumeB3 }},
                                "volumetotaledge": {{ $polnep->volumetotaledge }},
                                "ranking": {{ $rankPolnep['ranking'] }},
                            }, ];



                            var popupPolnep = `
                                    <b>Prioritas pengambilan ke: </b><strong>${polnep[0].ranking}</strong> <br>
                                    <b>Nama Lokasi:</b> <strong>${polnep[0].name}</strong> <br>
                                    <div class="progress-container">
                                        <div class="volume-label">Tempat Sampah 1: ${polnep[0].volumeorganik}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(polnep[0].volumeorganik)}" style="width: ${polnep[0].volumeorganik}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-container">
                                        <div class="volume-label">Tempat Sampah 2: ${polnep[0].volumenonorganik}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(polnep[0].volumenonorganik)}" style="width: ${polnep[0].volumenonorganik}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-container">
                                        <div class="volume-label">Volume Rata - Rata: ${polnep[0].volumetotaledge}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(polnep[0].volumetotaledge)}" style="width: ${polnep[0].volumetotaledge}%;"></div>
                                        </div>
                                    </div>`;

                            function getColorCategory(volume) {
                                if (volume < 33.33) {
                                    return "bg-success"; // Warna hijau untuk kategori rendah
                                } else if (volume < 66.67) {
                                    return "bg-warning"; // Warna kuning untuk kategori sedang
                                } else {
                                    return "bg-danger"; // Warna merah untuk kategori tinggi
                                }
                            }
                            var volumetotaledge = polnep[0].volumetotaledge;
                            var ranking = polnep[0].ranking;

                            // Hitung persentase volumetotaledge terhadap 100%
                            var volumetotaledgePercentage = (volumetotaledge / 100) * 100;

                            var iconUrl = '';

                            // Menentukan jenis ikon marker berdasarkan ranking dan persentase volumetotaledge
                            if (ranking === 1) {
                                if (volumetotaledgePercentage <= 33) {
                                    iconUrl = '{{ asset('assets/img/tpshijau1.png') }}'; // Ikon hijau untuk ranking 1 dan volume rendah
                                } else if (volumetotaledgePercentage <= 66) {
                                    iconUrl = '{{ asset('assets/img/tpskuning1.png') }}'; // Ikon kuning untuk ranking 1 dan volume sedang
                                } else {
                                    iconUrl = '{{ asset('assets/img/tpsmerah1.png') }}'; // Ikon merah untuk ranking 1 dan volume tinggi
                                }
                            } else if (ranking === 2) {
                                if (volumetotaledgePercentage <= 33) {
                                    iconUrl = '{{ asset('assets/img/tpshijau2.png') }}'; // Ikon hijau untuk ranking 2 dan volume rendah
                                } else if (volumetotaledgePercentage <= 66) {
                                    iconUrl = '{{ asset('assets/img/tpskuning2.png') }}'; // Ikon kuning untuk ranking 2 dan volume sedang
                                } else {
                                    iconUrl = '{{ asset('assets/img/tpsmerah2.png') }}'; // Ikon merah untuk ranking 2 dan volume tinggi
                                }
                            } else if (ranking === 3) {
                                if (volumetotaledgePercentage <= 33) {
                                    iconUrl = '{{ asset('assets/img/tpshijau3.png') }}'; // Ikon hijau untuk ranking 3 dan volume rendah
                                } else if (volumetotaledgePercentage <= 66) {
                                    iconUrl = '{{ asset('assets/img/tpskuning3.png') }}'; // Ikon kuning untuk ranking 3 dan volume sedang
                                } else {
                                    iconUrl = '{{ asset('assets/img/tpsmerah3.png') }}'; // Ikon merah untuk ranking 3 dan volume tinggi
                                }
                            } else if (ranking === 4) {
                                if (volumetotaledgePercentage <= 33) {
                                    iconUrl = '{{ asset('assets/img/tpshijau4.png') }}'; // Ikon hijau untuk ranking 4 dan volume rendah
                                } else if (volumetotaledgePercentage <= 66) {
                                    iconUrl = '{{ asset('assets/img/tpskuning4.png') }}'; // Ikon kuning untuk ranking 4 dan volume sedang
                                } else {
                                    iconUrl = '{{ asset('assets/img/tpsmerah4.png') }}'; // Ikon merah untuk ranking 4 dan volume tinggi
                                }
                            }

                            var warnaIcon2 = L.icon({
                                iconUrl: iconUrl,
                                iconSize: [50, 90],
                                shadowSize: [50, 64],
                                iconAnchor: [22, 94],
                                popupAnchor: [-3, -76]
                            });

                            var mainmarker2 = L.marker([polnep[0].lat, polnep[0].lng], {
                                icon: warnaIcon2
                            }).addTo(map);

                            var markergrup2 = L.layerGroup(); // Layer group to manage additional markers

                            mainmarker2.on('click', function(e) {
                                var clickedLatLng = e.latlng;

                                var additionalMarkerPositions = [{
                                        lat: -0.05395133072045861,
                                        lng: 109.34724695347302,
                                        name: 'tps 1'
                                    },
                                    {
                                        lat: -0.05408147841338792,
                                        lng: 109.34708615887618,
                                        name: 'tps 2'
                                    },
                                    {
                                        lat: -0.05397171295080825,
                                        lng: 109.34697937333367,
                                        name: 'tps 3'
                                    }
                                    // Add more positions as needed
                                ];

                                // Add additional markers to the layer group
                                additionalMarkerPositions.forEach(function(position) {
                                    // Determine the icon URL based on the marker name
                                    var iconUrl = getIconUrl2(position.name);

                                    // Create a custom icon for the additional marker
                                    var customIcon = L.icon({
                                        iconUrl: iconUrl,
                                        iconSize: [20, 40],
                                        iconAnchor: [25, 50],
                                        popupAnchor: [0, -50]
                                    });
                                    var newmarker2 = L.marker([position.lat, position.lng], {
                                        icon: customIcon
                                    });
                                    newmarker2.bindPopup(`<b>${position.name}</b><br>${popupPolnep}`);

                                    markergrup2.addLayer(newmarker2);

                                    // newMarker.on('click', function() {
                                    //     newMarker.openPopup();
                                    // });
                                });

                                // Add the layer group to the map
                                map.addLayer(markergrup2);
                            });
                            markergrup2.on('click', function(event) {
                                event.layer.openPopup();
                            });

                            // Close the additional markers when clicking elsewhere on the map
                            map.on('click', function(e) {
                                // Remove the layer group from the map
                                map.removeLayer(markergrup2);
                            });

                            // Close the additional markers when closing the main marker popup
                            mainmarker2.bindPopup(popupPolnep).on('popupclose', function() {
                                map.removeLayer(markergrup2);
                            });

                            function getIconUrl2(markerName) {
                                // Determine the icon URL based on the marker name
                                // You can customize this logic based on your requirements
                                if (markerName === 'tps 1') {
                                    return '{{ asset('assets/img/tps1.png') }}';
                                } else if (markerName === 'tps 2') {
                                    return '{{ asset('assets/img/tps2.png') }}';
                                } else if (markerName === 'tps 3') {
                                    return '{{ asset('assets/img/tps3.png') }}';
                                } else {
                                    // Default icon if the name doesn't match any condition
                                    return '{{ asset('assets/img/tps.png') }}';
                                }
                            }


                            var rusunawa = [{
                                "lat": -0.062049106215126444,
                                "lng": 109.34861849048488,
                                "name": 'Rusunawa',
                                "volumeorganik": {{ $rusunawa->volumeorganik }},
                                "volumenonorganik": {{ $rusunawa->volumenonorganik }},
                                "volumeB3": {{ $rusunawa->volumeB3 }},
                                "volumetotaledge": {{ $rusunawa->volumetotaledge }},
                                "ranking": {{ $rankRusunawa['ranking'] }},
                            }, ];



                            var popupRusunawa = `
                                    <b>Prioritas pengambilan ke: </b><strong>${rusunawa[0].ranking}</strong> <br>
                                    <b>Nama Lokasi:</b> <strong>${rusunawa[0].name}</strong> <br>
                                    <div class="progress-container">
                                        <div class="volume-label">Tempat Sampah 1: ${rusunawa[0].volumeorganik}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(rusunawa[0].volumeorganik)}" style="width: ${rusunawa[0].volumeorganik}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-container">
                                        <div class="volume-label">Tempat Sampah 2: ${rusunawa[0].volumenonorganik}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(rusunawa[0].volumenonorganik)}" style="width: ${rusunawa[0].volumenonorganik}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-container">
                                        <div class="volume-label">Volume Rata - Rata: ${rusunawa[0].volumetotaledge}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(rusunawa[0].volumetotaledge)}" style="width: ${rusunawa[0].volumetotaledge}%;"></div>
                                        </div>
                                    </div>`;

                            function getColorCategory(volume) {
                                if (volume < 33.33) {
                                    return "bg-success"; // Warna hijau untuk kategori rendah
                                } else if (volume < 66.67) {
                                    return "bg-warning"; // Warna kuning untuk kategori sedang
                                } else {
                                    return "bg-danger"; // Warna merah untuk kategori tinggi
                                }
                            }
                            var volumetotaledge = rusunawa[0].volumetotaledge;
                            var ranking = rusunawa[0].ranking;

                            // Hitung persentase volumetotaledge terhadap 100%
                            var volumetotaledgePercentage = (volumetotaledge / 100) * 100;

                            var iconUrl = '';

                            // Menentukan jenis ikon marker berdasarkan ranking dan persentase volumetotaledge
                            if (ranking === 1) {
                                if (volumetotaledgePercentage <= 33) {
                                    iconUrl = '{{ asset('assets/img/tpshijau1.png') }}'; // Ikon hijau untuk ranking 1 dan volume rendah
                                } else if (volumetotaledgePercentage <= 66) {
                                    iconUrl = '{{ asset('assets/img/tpskuning1.png') }}'; // Ikon kuning untuk ranking 1 dan volume sedang
                                } else {
                                    iconUrl = '{{ asset('assets/img/tpsmerah1.png') }}'; // Ikon merah untuk ranking 1 dan volume tinggi
                                }
                            } else if (ranking === 2) {
                                if (volumetotaledgePercentage <= 33) {
                                    iconUrl = '{{ asset('assets/img/tpshijau2.png') }}'; // Ikon hijau untuk ranking 2 dan volume rendah
                                } else if (volumetotaledgePercentage <= 66) {
                                    iconUrl = '{{ asset('assets/img/tpskuning2.png') }}'; // Ikon kuning untuk ranking 2 dan volume sedang
                                } else {
                                    iconUrl = '{{ asset('assets/img/tpsmerah2.png') }}'; // Ikon merah untuk ranking 2 dan volume tinggi
                                }
                            } else if (ranking === 3) {
                                if (volumetotaledgePercentage <= 33) {
                                    iconUrl = '{{ asset('assets/img/tpshijau3.png') }}'; // Ikon hijau untuk ranking 3 dan volume rendah
                                } else if (volumetotaledgePercentage <= 66) {
                                    iconUrl = '{{ asset('assets/img/tpskuning3.png') }}'; // Ikon kuning untuk ranking 3 dan volume sedang
                                } else {
                                    iconUrl = '{{ asset('assets/img/tpsmerah3.png') }}'; // Ikon merah untuk ranking 3 dan volume tinggi
                                }
                            } else if (ranking === 4) {
                                if (volumetotaledgePercentage <= 33) {
                                    iconUrl = '{{ asset('assets/img/tpshijau4.png') }}'; // Ikon hijau untuk ranking 4 dan volume rendah
                                } else if (volumetotaledgePercentage <= 66) {
                                    iconUrl = '{{ asset('assets/img/tpskuning4.png') }}'; // Ikon kuning untuk ranking 4 dan volume sedang
                                } else {
                                    iconUrl = '{{ asset('assets/img/tpsmerah4.png') }}'; // Ikon merah untuk ranking 4 dan volume tinggi
                                }
                            }

                            var warnaIcon3 = L.icon({
                                iconUrl: iconUrl,
                                iconSize: [50, 90],
                                shadowSize: [50, 64],
                                iconAnchor: [22, 94],
                                popupAnchor: [-3, -76]
                            });

                            var mainmarker3 = L.marker([rusunawa[0].lat, rusunawa[0].lng], {
                                icon: warnaIcon3
                            }).addTo(map);

                            var markergrup3 = L.layerGroup(); // Layer group to manage additional markers

                            mainmarker3.on('click', function(e) {
                                var clickedLatLng = e.latlng;

                                var markerposition3 = [{
                                        lat: -0.06200690081364493,
                                        lng: 109.34855070962226,
                                        name: 'tps 1'
                                    },
                                    {
                                        lat: -0.062167937858927075,
                                        lng: 109.34873627527242,
                                        name: 'tps 2'
                                    },
                                    {
                                        lat: -0.06215824413818658,
                                        lng: 109.34850778025569,
                                        name: 'tps 3'
                                    }
                                    // Add more positions as needed
                                ];

                                // Add additional markers to the layer group
                                markerposition3.forEach(function(position) {
                                    // Determine the icon URL based on the marker name
                                    var iconUrl = getIconUrl3(position.name);

                                    // Create a custom icon for the additional marker
                                    var customIcon = L.icon({
                                        iconUrl: iconUrl,
                                        iconSize: [20, 40],
                                        iconAnchor: [25, 50],
                                        popupAnchor: [0, -50]
                                    });
                                    var newmarker3 = L.marker([position.lat, position.lng], {
                                        icon: customIcon
                                    });
                                    newmarker3.bindPopup(`<b>${position.name}</b><br>${popupRusunawa}`);

                                    markergrup3.addLayer(newmarker3);

                                    // newMarker.on('click', function() {
                                    //     newMarker.openPopup();
                                    // });
                                });

                                // Add the layer group to the map
                                map.addLayer(markergrup3);
                            });
                            markergrup3.on('click', function(event) {
                                event.layer.openPopup();
                            });

                            // Close the additional markers when clicking elsewhere on the map
                            map.on('click', function(e) {
                                // Remove the layer group from the map
                                map.removeLayer(markergrup3);
                            });

                            // Close the additional markers when closing the main marker popup
                            mainmarker3.bindPopup(popupRusunawa).on('popupclose', function() {
                                map.removeLayer(markergrup3);
                            });

                            function getIconUrl3(markerName) {
                                // Determine the icon URL based on the marker name
                                // You can customize this logic based on your requirements
                                if (markerName === 'tps 1') {
                                    return '{{ asset('assets/img/tps1.png') }}';
                                } else if (markerName === 'tps 2') {
                                    return '{{ asset('assets/img/tps2.png') }}';
                                } else if (markerName === 'tps 3') {
                                    return '{{ asset('assets/img/tps3.png') }}';
                                } else {
                                    // Default icon if the name doesn't match any condition
                                    return '{{ asset('assets/img/tps.png') }}';
                                }
                            }



                            var siskom = [{
                                "lat": -0.057136052864503024,
                                "lng": 109.34518116062256,
                                "name": 'Siskom',
                                "volumeorganik": {{ $siskom_tps1->kapasitas }},
                                "volumenonorganik": {{ $siskom_tps2->kapasitas }},
                                "volumetotaledge": {{ $total_siskom }},
                                "ranking": {{ $rankSiskom['ranking'] }},
                            }, ];



                            var popupSiskom = `
                                    <b>Prioritas pengambilan ke: </b><strong>${siskom[0].ranking}</strong> <br>
                                    <b>Nama Lokasi:</b> <strong>${siskom[0].name}</strong> <br>
                                    <div class="progress-container">
                                        <div class="volume-label">Tempat Sampah 1: ${siskom[0].volumeorganik}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(siskom[0].volumeorganik)}" style="width: ${siskom[0].volumeorganik}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-container">
                                        <div class="volume-label">Tempat Sampah 2: ${siskom[0].volumenonorganik}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(siskom[0].volumenonorganik)}" style="width: ${siskom[0].volumenonorganik}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-container">
                                        <div class="volume-label">Volume Rata - Rata: ${siskom[0].volumetotaledge}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(siskom[0].volumetotaledge)}" style="width: ${siskom[0].volumetotaledge}%;"></div>
                                        </div>
                                    </div>`;

                            function getColorCategory(volume) {
                                if (volume < 33.33) {
                                    return "bg-success"; // Warna hijau untuk kategori rendah
                                } else if (volume < 66.67) {
                                    return "bg-warning"; // Warna kuning untuk kategori sedang
                                } else {
                                    return "bg-danger"; // Warna merah untuk kategori tinggi
                                }
                            }
                            var volumetotaledge = siskom[0].volumetotaledge;
                            var ranking = siskom[0].ranking;

                            // Hitung persentase volumetotaledge terhadap 100%
                            var volumetotaledgePercentage = (volumetotaledge / 100) * 100;

                            var iconUrl = '';

                            // Menentukan jenis ikon marker berdasarkan ranking dan persentase volumetotaledge
                            if (ranking === 1) {
                                if (volumetotaledgePercentage <= 33) {
                                    iconUrl = '{{ asset('assets/img/tpshijau1.png') }}'; // Ikon hijau untuk ranking 1 dan volume rendah
                                } else if (volumetotaledgePercentage <= 66) {
                                    iconUrl = '{{ asset('assets/img/tpskuning1.png') }}'; // Ikon kuning untuk ranking 1 dan volume sedang
                                } else {
                                    iconUrl = '{{ asset('assets/img/tpsmerah1.png') }}'; // Ikon merah untuk ranking 1 dan volume tinggi
                                }
                            } else if (ranking === 2) {
                                if (volumetotaledgePercentage <= 33) {
                                    iconUrl = '{{ asset('assets/img/tpshijau2.png') }}'; // Ikon hijau untuk ranking 2 dan volume rendah
                                } else if (volumetotaledgePercentage <= 66) {
                                    iconUrl = '{{ asset('assets/img/tpskuning2.png') }}'; // Ikon kuning untuk ranking 2 dan volume sedang
                                } else {
                                    iconUrl = '{{ asset('assets/img/tpsmerah2.png') }}'; // Ikon merah untuk ranking 2 dan volume tinggi
                                }
                            } else if (ranking === 3) {
                                if (volumetotaledgePercentage <= 33) {
                                    iconUrl = '{{ asset('assets/img/tpshijau3.png') }}'; // Ikon hijau untuk ranking 3 dan volume rendah
                                } else if (volumetotaledgePercentage <= 66) {
                                    iconUrl = '{{ asset('assets/img/tpskuning3.png') }}'; // Ikon kuning untuk ranking 3 dan volume sedang
                                } else {
                                    iconUrl = '{{ asset('assets/img/tpsmerah3.png') }}'; // Ikon merah untuk ranking 3 dan volume tinggi
                                }
                            } else if (ranking === 4) {
                                if (volumetotaledgePercentage <= 33) {
                                    iconUrl = '{{ asset('assets/img/tpshijau4.png') }}'; // Ikon hijau untuk ranking 4 dan volume rendah
                                } else if (volumetotaledgePercentage <= 66) {
                                    iconUrl = '{{ asset('assets/img/tpskuning4.png') }}'; // Ikon kuning untuk ranking 4 dan volume sedang
                                } else {
                                    iconUrl = '{{ asset('assets/img/tpsmerah4.png') }}'; // Ikon merah untuk ranking 4 dan volume tinggi
                                }
                            }

                            var warnaIcon4 = L.icon({
                                iconUrl: iconUrl,
                                iconSize: [50, 90],
                                shadowSize: [50, 64],
                                iconAnchor: [22, 94],
                                popupAnchor: [-3, -76]
                            });

                            var mainmarker4 = L.marker([siskom[0].lat, siskom[0].lng], {
                                icon: warnaIcon4
                            }).addTo(map);

                            var markergrup4 = L.layerGroup(); // Layer group to manage additional markers

                            mainmarker4.on('click', function(e) {
                                var clickedLatLng = e.latlng;

                                var additionalMarkerPositions = [{
                                        lat: -0.05707100932922065,
                                        lng: 109.34510136490367,
                                        name: 'tps 1'
                                    },
                                    {
                                        lat: -0.057235173415397564,
                                        lng: 109.34529105200123,
                                        name: 'tps 2'
                                    }
                                    // Add more positions as needed
                                ];

                                // Add additional markers to the layer group
                                additionalMarkerPositions.forEach(function(position) {
                                    // Determine the icon URL based on the marker name
                                    var iconUrl = getIconUrl4(position.name);

                                    // Create a custom icon for the additional marker
                                    var customIcon = L.icon({
                                        iconUrl: iconUrl,
                                        iconSize: [20, 40],
                                        iconAnchor: [25, 50],
                                        popupAnchor: [0, -50]
                                    });
                                    var newmarker4 = L.marker([position.lat, position.lng], {
                                        icon: customIcon
                                    });
                                    newmarker4.bindPopup(`<b>${position.name}</b><br>${popupSiskom}`);

                                    markergrup4.addLayer(newmarker4);

                                    // newMarker.on('click', function() {
                                    //     newMarker.openPopup();
                                    // });
                                });

                                // Add the layer group to the map
                                map.addLayer(markergrup4);
                            });
                            markergrup4.on('click', function(event) {
                                event.layer.openPopup();
                            });

                            // Close the additional markers when clicking elsewhere on the map
                            map.on('click', function(e) {
                                // Remove the layer group from the map
                                map.removeLayer(markergrup4);
                            });

                            // Close the additional markers when closing the main marker popup
                            mainmarker4.bindPopup(popupSiskom).on('popupclose', function() {
                                map.removeLayer(markergrup4);
                            });

                            function getIconUrl4(markerName) {
                                // Determine the icon URL based on the marker name
                                // You can customize this logic based on your requirements
                                if (markerName === 'tps 1') {
                                    return '{{ asset('assets/img/tps1.png') }}';
                                } else if (markerName === 'tps 2') {
                                    return '{{ asset('assets/img/tps2.png') }}';
                                } else if (markerName === 'tps 3') {
                                    return '{{ asset('assets/img/tps3.png') }}';
                                } else {
                                    // Default icon if the name doesn't match any condition
                                    return '{{ asset('assets/img/tps.png') }}';
                                }
                            }

                            // Menambahkan marker pada koordinat yang berbeda dengan ikon kustom
                            var customIconpetugas = L.icon({
                                iconUrl: '{{ asset('assets/img/marker_petugas.png') }}',
                                iconSize: [50, 90],
                                shadowSize: [50, 64],
                                iconAnchor: [22, 94],
                                popupAnchor: [-3, -76]// Posisi popup di atas ikon, sesuaikan sesuai kebutuhan
                            });

                            var customMarker = L.marker([-0.062413997182524286, 109.35063601241691], {
                                icon: customIconpetugas
                            }).addTo(map);
                            customMarker.bindPopup("<b>Petugas!</b>").openPopup();
                        </script>



                    </body>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.script')
@include('layouts.footer')
{{-- @endsection --}}
