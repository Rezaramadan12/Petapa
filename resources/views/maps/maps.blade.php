@extends('layouts.head')

{{-- @section('container') --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">

                    <a class="nav-link" href="/dashboard">
                        <i class="fas fa-fw fa-home"></i>
                        <span>Dashboard</span></a>

                    <h6 class="m-0 font-weight-bold text-primary">Angka Pada Marker Merupakan Urutan Prioritas Pengangkutan Sampah</h6>

                    <h6 class="m-0 font-weight-bold text-primary">Peta Tempat Sampah</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">

                    <head>
                        <title>PETAPA (Pemantauan Tempat Sampah)</title>
                        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
                        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
                        <script>
                            // Fungsi untuk melakukan refresh halaman setiap 5 menit (300,000 milidetik)
                            function autoRefresh() {
                                location.reload();
                            }

                            // Atur interval refresh
                            setTimeout(autoRefresh, 10000); // 300,000 ms = 5 menit
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
                            }).setView([-0.055324, 109.349498], 16);

                            L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                                maxZoom: 20,
                                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                            }).addTo(map);


                            // Tambahkan marker di peta
                            var locations = [{
                                    "lat": -0.060109,
                                    "lng": 109.345409,
                                    "name": 'Lokasi 1',
                                    "volumeorganik": {{ $untan->volumeorganik }},
                                    "volumenonorganik": {{ $untan->volumenonorganik }},
                                    "volumeB3": {{ $untan->volumeB3 }},
                                    "volumetotaledge": {{ $untan->volumetotaledge }},
                                    "ranking": {{ $rankUntan['ranking'] }},
                                },

                                {
                                    "lat": -0.062003,
                                    "lng": 109.348687,
                                    "name": 'Lokasi 3',
                                    "volumeorganik": {{ $rusunawa->volumeorganik }},
                                    "volumenonorganik": {{ $rusunawa->volumenonorganik }},
                                    "volumeB3": {{ $rusunawa->volumeB3 }},
                                    "volumetotaledge": {{ $rusunawa->volumetotaledge }},
                                    "ranking": {{ $rankRusunawa['ranking'] }},
                                },
                                {
                                    "lat": -0.053803,
                                    "lng": 109.347326,
                                    "name": 'Lokasi 2',
                                    "volumeorganik": {{ $polnep->volumeorganik }},
                                    "volumenonorganik": {{ $polnep->volumenonorganik }},
                                    "volumeB3": {{ $polnep->volumeB3 }},
                                    "volumetotaledge": {{ $polnep->volumetotaledge }},
                                    "ranking": {{ $rankPolnep['ranking'] }},
                                },

                            ];

                            // console.log(locations);

                            for (i in locations) {
                                var volumetotaledge = locations[i].volumetotaledge;
                                var ranking = locations[i].ranking;

                                // Hitung persentase volumetotaledge terhadap 100%
                                var volumetotaledgePercentage = (volumetotaledge / 100) * 100;

                                var iconUrl = '';

                                 // Menentukan jenis ikon marker berdasarkan ranking dan persentase volumetotaledge
                                if (ranking === 1) {
                                    if (volumetotaledgePercentage <= 33.33) {
                                        iconUrl = '{{ asset('assets/img/tpshijau1.png') }}'; // Ikon hijau untuk ranking 1 dan volume rendah
                                    } else if (volumetotaledgePercentage <= 66.67) {
                                        iconUrl = '{{ asset('assets/img/tpskuning1.png') }}'; // Ikon kuning untuk ranking 1 dan volume sedang
                                    } else {
                                        iconUrl = '{{ asset('assets/img/tpsmerah1.png') }}'; // Ikon merah untuk ranking 1 dan volume tinggi
                                    }
                                } else if (ranking === 2) {
                                    if (volumetotaledgePercentage <= 33.33) {
                                        iconUrl = '{{ asset('assets/img/tpshijau2.png') }}'; // Ikon hijau untuk ranking 2 dan volume rendah
                                    } else if (volumetotaledgePercentage <= 66.67) {
                                        iconUrl = '{{ asset('assets/img/tpskuning2.png') }}'; // Ikon kuning untuk ranking 2 dan volume sedang
                                    } else {
                                        iconUrl = '{{ asset('assets/img/tpsmerah2.png') }}'; // Ikon merah untuk ranking 2 dan volume tinggi
                                    }
                                } else if (ranking === 3) {
                                    if (volumetotaledgePercentage <= 33.33) {
                                        iconUrl = '{{ asset('assets/img/tpshijau3.png') }}'; // Ikon hijau untuk ranking 3 dan volume rendah
                                    } else if (volumetotaledgePercentage <= 66.67) {
                                        iconUrl = '{{ asset('assets/img/tpskuning3.png') }}'; // Ikon kuning untuk ranking 3 dan volume sedang
                                    } else {
                                        iconUrl = '{{ asset('assets/img/tpsmerah3.png') }}'; // Ikon merah untuk ranking 3 dan volume tinggi
                                    }
                                } else if (ranking === 4) {
                                    if (volumetotaledgePercentage <= 33.33) {
                                        iconUrl = '{{ asset('assets/img/tpshijau4.png') }}'; // Ikon hijau untuk ranking 4 dan volume rendah
                                    } else if (volumetotaledgePercentage <= 66.67) {
                                        iconUrl = '{{ asset('assets/img/tpskuning4.png') }}'; // Ikon kuning untuk ranking 4 dan volume sedang
                                    } else {
                                        iconUrl = '{{ asset('assets/img/tpsmerah4.png') }}'; // Ikon merah untuk ranking 4 dan volume tinggi
                                    }
                                }

                                var warnaIcon = L.icon({
                                    iconUrl: iconUrl,
                                    iconSize: [50, 90],
                                    shadowSize: [50, 64],
                                    iconAnchor: [22, 94],
                                    popupAnchor: [-3, -76]
                                });

                                var marker = L.marker([locations[i].lat, locations[i].lng],{icon: warnaIcon}).addTo(map);


                                var popupContent = `
                                    <b>Prioritas pengambilan ke :</b> ${locations[i].ranking}<br>
                                    <b>Nama Lokasi:</b> ${locations[i].name}<br>
                                    <div class="progress-container">
                                        <div class="volume-label">Volume Organik: ${locations[i].volumeorganik}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(locations[i].volumeorganik)}" style="width: ${locations[i].volumeorganik}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-container">
                                        <div class="volume-label">Volume Nonorganik: ${locations[i].volumenonorganik}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(locations[i].volumenonorganik)}" style="width: ${locations[i].volumenonorganik}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-container">
                                        <div class="volume-label">Volume B3: ${locations[i].volumeB3}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(locations[i].volumeB3)}" style="width: ${locations[i].volumeB3}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-container">
                                        <div class="volume-label">Volume Total Edge: ${locations[i].volumetotaledge}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(locations[i].volumetotaledge)}" style="width: ${locations[i].volumetotaledge}%;"></div>
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

                                marker.bindPopup(popupContent);


                            }
                            var siskom = [{
                                "lat": -0.0571164,
                                "lng": 109.3452931,
                                "name": 'Lokasi 4',
                                "volumeorganik": {{ $siskom_tps1->kapasitas }},
                                "volumenonorganik": {{ $siskom_tps2->kapasitas }},
                                "volumetotaledge": {{ $total_siskom }},
                                "ranking": {{ $rankSiskom['ranking'] }},
                            }, ];



                            var popupSiskom = `
                                    <b>Prioritas pengambilan ke :</b> ${siskom[0].ranking}<br>
                                    <b>Nama Lokasi:</b> ${siskom[0].name}<br>
                                    <div class="progress-container">
                                        <div class="volume-label">Volume Organik: ${siskom[0].volumeorganik}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(siskom[0].volumeorganik)}" style="width: ${siskom[0].volumeorganik}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-container">
                                        <div class="volume-label">Volume Nonorganik: ${siskom[0].volumenonorganik}%</div>
                                        <div class="progress">
                                            <div class="progress-bar ${getColorCategory(siskom[0].volumenonorganik)}" style="width: ${siskom[0].volumenonorganik}%;"></div>
                                        </div>
                                    </div>
                                    <div class="progress-container">
                                        <div class="volume-label">Volume Total Edge: ${siskom[0].volumetotaledge}%</div>
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
                                    if (volumetotaledgePercentage <= 33.33) {
                                        iconUrl = '{{ asset('assets/img/tpshijau1.png') }}'; // Ikon hijau untuk ranking 1 dan volume rendah
                                    } else if (volumetotaledgePercentage <= 66.67) {
                                        iconUrl = '{{ asset('assets/img/tpskuning1.png') }}'; // Ikon kuning untuk ranking 1 dan volume sedang
                                    } else {
                                        iconUrl = '{{ asset('assets/img/tpsmerah1.png') }}'; // Ikon merah untuk ranking 1 dan volume tinggi
                                    }
                                } else if (ranking === 2) {
                                    if (volumetotaledgePercentage <= 33.33) {
                                        iconUrl = '{{ asset('assets/img/tpshijau2.png') }}'; // Ikon hijau untuk ranking 2 dan volume rendah
                                    } else if (volumetotaledgePercentage <= 66.67) {
                                        iconUrl = '{{ asset('assets/img/tpskuning2.png') }}'; // Ikon kuning untuk ranking 2 dan volume sedang
                                    } else {
                                        iconUrl = '{{ asset('assets/img/tpsmerah2.png') }}'; // Ikon merah untuk ranking 2 dan volume tinggi
                                    }
                                } else if (ranking === 3) {
                                    if (volumetotaledgePercentage <= 33.33) {
                                        iconUrl = '{{ asset('assets/img/tpshijau3.png') }}'; // Ikon hijau untuk ranking 3 dan volume rendah
                                    } else if (volumetotaledgePercentage <= 66.67) {
                                        iconUrl = '{{ asset('assets/img/tpskuning3.png') }}'; // Ikon kuning untuk ranking 3 dan volume sedang
                                    } else {
                                        iconUrl = '{{ asset('assets/img/tpsmerah3.png') }}'; // Ikon merah untuk ranking 3 dan volume tinggi
                                    }
                                } else if (ranking === 4) {
                                    if (volumetotaledgePercentage <= 33.33) {
                                        iconUrl = '{{ asset('assets/img/tpshijau4.png') }}'; // Ikon hijau untuk ranking 4 dan volume rendah
                                    } else if (volumetotaledgePercentage <= 66.67) {
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

                            L.marker([siskom[0].lat, siskom[0].lng],{icon: warnaIcon2}).addTo(map)
                                .bindPopup(popupSiskom)
                            // .openPopup();
                        </script>



                    </body>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endsection --}}
