@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Peta Tempat Sampah</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <head>
                            <title>Peta Tempat Sampah</title>
                            <style>
                                #map {
                                    height: 550px;
                                    width: 100%;
                                }

                                .progress-bar-container {
                                    width: 100px;
                                    height: 10px;
                                    background-color: #f1f1f1;
                                    border-radius: 5px;
                                    overflow: hidden;
                                }

                                .progress-bar {
                                    height: 100%;
                                    border-radius: 5px;
                                }

                                .percentage-text {
                                    font-size: 10px;
                                }

                                /* Rentang persentase dan warna yang sesuai */
                                .progress-bar.green {
                                    background-color: #4CAF50;
                                }

                                .progress-bar.yellow {
                                    background-color: #FFC107;
                                }

                                .progress-bar.red {
                                    background-color: #FF5733;
                                }
                            </style>
                        </head>

                        <body>
                            <div id="map"></div>
                            <script>
                                function initMap() {
                                    $.ajax({
                                        url: "{{ route('maps.data') }}",
                                        method: 'GET',
                                        success: function(data) {
                                            var mapOptions = {
                                                center: {
                                                    lat: -0.055324,
                                                    lng: 109.349498
                                                },
                                                zoom: 16,
                                            };

                                            var map = new google.maps.Map(document.getElementById('map'), mapOptions);
                                            var locations = [{
                                                    lat: -0.060109,
                                                    lng: 109.345409,
                                                    name: 'Universitas Tanjungpura',
                                                    TempatSampah1: data.untan.volumeorganik,
                                                    TempatSampah2: data.untan.volumenonorganik,
                                                    TempatSampah3: data.untan.volumeB3,
                                                    TotalVolume: data.untan.volumetotaledge,
                                                    Ranking: data.rankUntan.ranking
                                                },
                                                {
                                                    lat: -0.059313,
                                                    lng: 109.352204,
                                                    name: 'Universitas Muhammadiyah Pontianak',
                                                    TempatSampah1: data.ump.volumeorganik,
                                                    TempatSampah2: data.ump.volumenonorganik,
                                                    TempatSampah3: data.ump.volumeB3,
                                                    TotalVolume: data.ump.volumetotaledge,
                                                    Ranking: data.rankUmp.ranking
                                                },
                                                {
                                                    lat: -0.062003,
                                                    lng: 109.348687,
                                                    name: 'Rusunawa UNTAN',
                                                    TempatSampah1: data.rusunawa.volumeorganik,
                                                    TempatSampah2: data.rusunawa.volumenonorganik,
                                                    TempatSampah3: data.rusunawa.volumeB3,
                                                    TotalVolume: data.rusunawa.volumetotaledge,
                                                    Ranking: data.rankRusunawa.ranking
                                                },
                                                {
                                                    lat: -0.053803,
                                                    lng: 109.347326,
                                                    name: 'Politeknik Negeri Pontianak',
                                                    TempatSampah1: data.polnep.volumeorganik,
                                                    TempatSampah2: data.polnep.volumenonorganik,
                                                    TempatSampah3: data.polnep.volumeB3,
                                                    TotalVolume: data.polnep.volumetotaledge,
                                                    Ranking: data.rankPolnep.ranking
                                                },
                                                // Tambahkan data lokasi lainnya di sini
                                            ];
                                            for (var i = 0; i < locations.length; i++) {
                                                var marker = new google.maps.Marker({
                                                    position: {
                                                        lat: locations[i].lat,
                                                        lng: locations[i].lng
                                                    },
                                                    map: map,
                                                    title: locations[i].name,
                                                });

                                                // Fungsi untuk menentukan kelas warna progres bar berdasarkan rentang persentase
                                                function getColorClass(percentage) {
                                                    if (percentage <= 33) {
                                                        return 'green'; // Persentase rendah, warna hijau
                                                    } else if (percentage <= 66) {
                                                        return 'yellow'; // Persentase sedang, warna kuning
                                                    } else {
                                                        return 'red'; // Persentase tinggi, warna merah
                                                    }
                                                }
                                                var contentString = `
                                                <div style="width: 140px; padding: 5px; background-color: #FFFFFF;">
                                                    <h3 style="font-size: 10px; margin-bottom: 4px;">Informasi Kapasitas Sampah</h3>
                                                    <div style="font-size: 10px;">
                                                        <h3 style="font-size: 10px; margin-bottom: 4px; color:blue;">Prioritas pengambilan ke : ${locations[i].Ranking}</h3>
                                                        <span class="percentage-text"><strong>Lokasi : ${locations[i].name}</strong> </span><br>
                                                        <div class="progress-bar-container">

                                                            <div class="progress-bar ${getColorClass(locations[i].TempatSampah1)}" style="width: ${locations[i].TempatSampah1}%"></div>
                                                            </div>
                                                            <span class="percentage-text"><strong>Tempat Sampah 1: ${locations[i].TempatSampah1}%</strong></span><br>

                                                            <div class="progress-bar-container">
                                                                <div class="progress-bar ${getColorClass(locations[i].TempatSampah2)}" style="width: ${locations[i].TempatSampah2}%"></div>
                                                            </div>
                                                            <span class="percentage-text"><strong>Tempat Sampah 2: ${locations[i].TempatSampah2}%</strong></span><br>

                                                            <div class="progress-bar-container">
                                                                <div class="progress-bar ${getColorClass(locations[i].TempatSampah3)}" style="width: ${locations[i].TempatSampah3}%"></div>
                                                            </div>
                                                            <span class="percentage-text"><strong>Tempat Sampah 3: ${locations[i].TempatSampah3}%</strong></span><br>

                                                            <div class="progress-bar-container">
                                                                <div class="progress-bar ${getColorClass(locations[i].TotalVolume)}" style="width: ${locations[i].TotalVolume}%"></div>
                                                            </div>
                                                            <span class="percentage-text"><strong>Total Volume: ${locations[i].TotalVolume}%</strong></span>
                                                            </div>
                                                    </div>
                                                </div>
                                                `;


                                                var infoWindow = new google.maps.InfoWindow({
                                                    content: contentString,
                                                    disableAutoPan: true
                                                });

                                                infoWindow.open(map, marker);
                                                // marker.openInfoWindowHtml("No Close Button",{buttons:{close:{show:4}}});
                                            }



                                            setTimeout(initMap, 60000)
                                        }
                                    });

                                }
                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFbKbk77K6DiYaHNEFRtkFjmufF1Bribw&callback=initMap" async
                                defer></script>
                        </body>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
