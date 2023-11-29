@extends('layouts.head')

{{-- @section('container') --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">

                    <a class="font-weight-bold  nav-link" href="/dashboard" style="color: black;">
                        <i class="fas fa-fw fa-home"></i>
                        <span>Dashboard</span></a>

                    <h6 class="m-0 font-weight-bold" style="color: black; text-decoration: underline;">Angka Pada Marker
                        Merupakan Urutan Prioritas Pengangkutan Sampah</h6>

                    <h6 class="m-0 font-weight-bold " style="color: black;">Peta Tempat Sampah</h6>
                </div>

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
                                "lat": -0.060109,
                                "lng": 109.345409,
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

                            var customIconUrl = iconUrl = '{{ asset('assets/img/tps.png') }}';

                            // Buat objek ikon dengan gambar kustom
                            var customIcon = L.icon({
                                iconUrl: customIconUrl,
                                iconSize: [20, 30], // Sesuaikan ukuran ikon sesuai kebutuhan
                                iconAnchor: [25, 50], // Posisi pusat bawah ikon, sesuaikan sesuai kebutuhan
                                popupAnchor: [0, -50] // Posisi popup di atas ikon, sesuaikan sesuai kebutuhan
                            });

                            var mainMarker = L.marker([untan[0].lat, untan[0].lng], {
                                icon: warnaIcon1
                            }).addTo(map);

                            var additionalMarkersGroup = L.layerGroup(); // Layer group to manage additional markers

                            mainMarker.on('click', function(e) {
                                var clickedLatLng = e.latlng;

                                var additionalMarkerPositions = [{
                                        lat: -0.060760349412644674,
                                        lng: 109.34469725322089,
                                        name: 'tps 1'
                                    },
                                    {
                                        lat: -0.06005868516545469,
                                        lng: 109.34494513417717,
                                        name: 'tps 2'
                                    },
                                    {
                                        lat: -0.06053398771264797,
                                        lng: 109.34543046871809,
                                        name: 'tps 3'
                                    }
                                    // Add more positions as needed
                                ];

                                // Add additional markers to the layer group
                                additionalMarkerPositions.forEach(function(position) {
                                    var newMarker = L.marker([position.lat, position.lng], {
                                        icon: customIcon
                                    });
                                    newMarker.bindPopup(`<b>${position.name}</b><br>${popupUntan}`);

                                    additionalMarkersGroup.addLayer(newMarker);

                                    // newMarker.on('click', function() {
                                    //     newMarker.openPopup();
                                    // });
                                });

                                // Add the layer group to the map
                                map.addLayer(additionalMarkersGroup);
                            });
                            additionalMarkersGroup.on('click', function(event) {
                                event.layer.openPopup();
                            });

                            // Close the additional markers when clicking elsewhere on the map
                            map.on('click', function(e) {
                                // Remove the layer group from the map
                                map.removeLayer(additionalMarkersGroup);
                            });

                            // Close the additional markers when closing the main marker popup
                            mainMarker.bindPopup(popupUntan).on('popupclose', function() {
                                map.removeLayer(additionalMarkersGroup);
                            });


                            var polnep = [{
                                "lat": -0.053803,
                                "lng": 109.347326,
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

                            var customIconUrl2 = iconUrl = '{{ asset('assets/img/tps.png') }}';

                            // Buat objek ikon dengan gambar kustom
                            var customIcon = L.icon({
                                iconUrl: customIconUrl2,
                                iconSize: [20, 30], // Sesuaikan ukuran ikon sesuai kebutuhan
                                iconAnchor: [25, 50], // Posisi pusat bawah ikon, sesuaikan sesuai kebutuhan
                                popupAnchor: [0, -50] // Posisi popup di atas ikon, sesuaikan sesuai kebutuhan
                            });

                            var mainmarker2 = L.marker([polnep[0].lat, polnep[0].lng], {
                                icon: warnaIcon2
                            }).addTo(map);

                            var markergrup2 = L.layerGroup(); // Layer group to manage additional markers

                            mainmarker2.on('click', function(e) {
                                var clickedLatLng = e.latlng;

                                var additionalMarkerPositions = [{
                                        lat: -0.05334282591816302,
                                        lng: 109.34689872576202,
                                        name: 'tps 1'
                                    },
                                    {
                                        lat: -0.05450616537995313,
                                        lng: 109.34674200372588,
                                        name: 'tps 2'
                                    },
                                    {
                                        lat: -0.054439145744775604,
                                        lng: 109.34579458932136,
                                        name: 'tps 3'
                                    }
                                    // Add more positions as needed
                                ];

                                // Add additional markers to the layer group
                                additionalMarkerPositions.forEach(function(position) {
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


                            var rusunawa = [{
                                    "lat": -0.062003,
                                    "lng": 109.348687,
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

                            var customIconUrl3 = iconUrl = '{{ asset('assets/img/tps.png') }}';

                            // Buat objek ikon dengan gambar kustom
                            var customIcon = L.icon({
                                iconUrl: customIconUrl3,
                                iconSize: [20, 30], // Sesuaikan ukuran ikon sesuai kebutuhan
                                iconAnchor: [25, 50], // Posisi pusat bawah ikon, sesuaikan sesuai kebutuhan
                                popupAnchor: [0, -50] // Posisi popup di atas ikon, sesuaikan sesuai kebutuhan
                            });

                            var mainmarker3 = L.marker([rusunawa[0].lat, rusunawa[0].lng], {
                                icon: warnaIcon3
                            }).addTo(map);

                            var markergrup3 = L.layerGroup(); // Layer group to manage additional markers

                            mainmarker3.on('click', function(e) {
                                var clickedLatLng = e.latlng;

                                var markerposition3 = [{
                                        lat: -0.06187354957575086,
                                        lng: 109.34841356117614,
                                        name: 'tps 1'
                                    },
                                    {
                                        lat: -0.06224444483223947,
                                        lng: 109.34864635056505,
                                        name: 'tps 2'
                                    },
                                    {
                                        lat: -0.06225439873922257,
                                        lng: 109.34814091302509,
                                        name:'tps 3'
                                    }
                                    // Add more positions as needed
                                ];

                                // Add additional markers to the layer group
                                markerposition3.forEach(function(position) {
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


                            var siskom = [{
                                "lat": -0.0571164,
                                "lng": 109.3452931,
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

                            var customIconUrl4 = iconUrl = '{{ asset('assets/img/tps.png') }}';

                            // Buat objek ikon dengan gambar kustom
                            var customIcon = L.icon({
                                iconUrl: customIconUrl4,
                                iconSize: [20, 30], // Sesuaikan ukuran ikon sesuai kebutuhan
                                iconAnchor: [25, 50], // Posisi pusat bawah ikon, sesuaikan sesuai kebutuhan
                                popupAnchor: [0, -50] // Posisi popup di atas ikon, sesuaikan sesuai kebutuhan
                            });

                            var mainmarker4 = L.marker([siskom[0].lat, siskom[0].lng], {
                                icon: warnaIcon4
                            }).addTo(map);

                            var markergrup4 = L.layerGroup(); // Layer group to manage additional markers

                            mainmarker4.on('click', function(e) {
                                var clickedLatLng = e.latlng;

                                var additionalMarkerPositions = [{
                                        lat: -0.056945,
                                        lng: 109.344877,
                                        name: 'tps 1'
                                    },
                                    {
                                        lat: -0.05727264036144048,
                                        lng: 109.3452504530016,
                                        name: 'tps 2'
                                    }
                                    // Add more positions as needed
                                ];

                                // Add additional markers to the layer group
                                additionalMarkerPositions.forEach(function(position) {
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
                            // .bindPopup(popupSiskom)
                            // .openPopup();
                        </script>



                    </body>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}
