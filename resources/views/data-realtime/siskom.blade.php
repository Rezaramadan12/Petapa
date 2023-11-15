@extends('layouts.head')

{{-- @section('container') --}}
    <div class="col-xl-12 col-lg-4">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <a class="nav-link" href="/dashboard">
                        <i class="fas fa-fw fa-home"></i>
                        <span>Dashboard</span></a>
                <h6 class="m-0 font-weight-bold text-primary">Data Real-Time Lokasi 4</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Volume Organik</th>
                                <th>Volume Nonorganik</th>
                                <th>Total Volume Edge</th>
                                <th>Keterangan</th>
                                <th>Log</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tps1 as $index => $siskom)
                                <tr class="text-center">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $siskom->kapasitas }}</td>
                                    <td>{{ $tps2[$index]->kapasitas }}</td>
                                    <td>{{ (($siskom->kapasitas + $tps2[$index]->kapasitas)/2) }}</td>
                                    <td>
                                        <div class="d-flex justify-content-end flex-shrink-0">
                                            @if ((($siskom->kapasitas + $tps2[$index]->kapasitas)/2)<=33)
                                                <span class="badge badge-pill badge-success fw-bolder px-4 py-2">Sedikit</span>
                                            @elseif ((($siskom->kapasitas + $tps2[$index]->kapasitas)/2) <=66)
                                                <span class="badge badge-pill badge-warning fw-bolder px-4 py-2">Sedang</span>
                                            @else
                                                <span class="badge badge-pill badge-danger fw-bolder px-4 py-2">Penuh</span>
                                            @endif


                                        </div>
                                    </td>
                                    <td>{{ $siskom->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.script')
{{-- @endsection --}}
