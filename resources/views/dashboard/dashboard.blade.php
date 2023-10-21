@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row mt-4">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Volume Edge Untan :</div>
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    {{ $untan->volumetotaledge }}%</div>
                                <div class="progress-container">
                                    <div class="progress">
                                        @if ($untan->volumetotaledge <= 33)
                                            <div class="progress-bar"
                                                style="width: {{ $untan->volumetotaledge }}%; background-color: #2ecc71;">
                                            </div>
                                        @elseif($untan->volumetotaledge <= 66)
                                            <div class="progress-bar"
                                                style="width: {{ $untan->volumetotaledge }}%; background-color: #f1c40f;">
                                            </div>
                                        @else
                                            <div class="progress-bar"
                                                style="width: {{ $untan->volumetotaledge }}%; background-color: #e74c3c;">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-trash fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Volume Edge Polnep :
                                </div>
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    {{ $polnep->volumetotaledge }}%</div>
                                <div class="progress-container">
                                    <div class="progress">
                                        @if ($polnep->volumetotaledge <= 33)
                                            <div class="progress-bar"
                                                style="width: {{ $polnep->volumetotaledge }}%; background-color: #2ecc71;">
                                            </div>
                                        @elseif($polnep->volumetotaledge <= 66)
                                            <div class="progress-bar"
                                                style="width: {{ $polnep->volumetotaledge }}%; background-color: #f1c40f;">
                                            </div>
                                        @else
                                            <div class="progress-bar"
                                                style="width: {{ $polnep->volumetotaledge }}%; background-color: #e74c3c;">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-trash fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Volume Edge Siskom :
                                </div>
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ $total_siskom }}%
                                </div>
                                <div class="progress-container">
                                    <div class="progress">
                                        @if ($total_siskom <= 33)
                                            <div class="progress-bar"
                                                style="width: {{ $total_siskom }}%; background-color: #2ecc71;"></div>
                                        @elseif($total_siskom <= 66)
                                            <div class="progress-bar"
                                                style="width: {{ $total_siskom }}%; background-color: #f1c40f;"></div>
                                        @else
                                            <div class="progress-bar"
                                                style="width: {{ $total_siskom }}%; background-color: #e74c3c;"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-trash fa-2x text-gray-300"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Volume Edge Rusunawa :
                                </div>
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    {{ $rusunawa->volumetotaledge }}%</div>
                                <div class="progress-container">
                                    <div class="progress">
                                        @if ($rusunawa->volumetotaledge <= 33)
                                            <div class="progress-bar"
                                                style="width: {{ $rusunawa->volumetotaledge }}%; background-color: #2ecc71;">
                                            </div>
                                        @elseif($rusunawa->volumetotaledge <= 66)
                                            <div class="progress-bar"
                                                style="width: {{ $rusunawa->volumetotaledge }}%; background-color: #f1c40f;">
                                            </div>
                                        @else
                                            <div class="progress-bar"
                                                style="width: {{ $rusunawa->volumetotaledge }}%; background-color: #e74c3c;">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-trash fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-4">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Website Pemantauan Tempat Sampah</h6>
                        {{-- <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div> --}}
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <p>Website ini dibuat untuk memenuhi salah satu persyaratan memperoleh gelar S.kom</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
