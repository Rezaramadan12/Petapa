@extends('layouts.main')

@section('container')
    <div class="col-xl-12 col-lg-4">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Smart Trash Bin Universitas Muhammadiyah Pontianak</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kapasitas TS1</th>
                                <th>Kapasitas TS2</th>
                                <th>Kapasitas TS3</th>
                                <th>Total Kapasitas</th>
                                <th>Keterangan</th>
                                <th>Log</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ump as $data)
                                <tr class="text-center">
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->volumeorganik }} %</td>
                                    <td>{{ $data->volumenonorganik }} %</td>
                                    <td>{{ $data->volumeB3 }} %</td>
                                    <td>{{ $data->volumetotaledge }} %</td>
                                    <td>
                                        <div class="d-flex justify-content-end flex-shrink-0">
                                            @if ($data->volumetotaledgeump <=33)
                                                <span class="badge badge-pill badge-success fw-bolder px-4 py-2">Cukup</span>
                                            @elseif ($data->volumetotaledgeump <=66)
                                                <span class="badge badge-pill badge-warning fw-bolder px-4 py-2">Sedang</span>
                                            @else
                                                <span class="badge badge-pill badge-danger fw-bolder px-4 py-2">Penuh</span>
                                            @endif


                                        </div>
                                    <td>{{ $data->log }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
