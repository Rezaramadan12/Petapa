@extends('layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-xl-12 col-lg-4">
                <div class="card shadow mb-2">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
                        <h6 class="m-0 font-weight-bold text-primary text-center">Pemantauan Volume Sampah Pada Empat Titik Lokasi Yang Berbeda</h6>
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
                        <div class="row mt-1">
                            <!-- Card Lokasi I -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Volume
                                                    Rata - Rata
                                                    Sampah Lokasi I :</div>
                                                <!-- Add Progres Bar -->
                                                <div class="progress">
                                                    @if ($untan->volumetotaledge <= 33)
                                                        <div class="progress-bar"
                                                            style="width: {{ $untan->volumetotaledge }}%; background-color: #2ecc71;">
                                                            {{ $untan->volumetotaledge }}%</div>
                                                    @elseif($untan->volumetotaledge <= 66)
                                                        <div class="progress-bar"
                                                            style="width: {{ $untan->volumetotaledge }}%; background-color: #f1c40f;">
                                                            {{ $untan->volumetotaledge }}%</div>
                                                    @else
                                                        <div class="progress-bar"
                                                            style="width: {{ $untan->volumetotaledge }}%; background-color: #e74c3c;">
                                                            {{ $untan->volumetotaledge }}%</div>
                                                    @endif
                                                </div>
                                                <!-- Add Details Button -->
                                                <button type="button" class="btn btn-sm btn-info mt-2"
                                                    style="font-size: 10px;" data-toggle="modal"
                                                    data-target="#detailsModal{{ $untan->id }}">
                                                    Details Volume Sampah
                                                </button>

                                                <!-- Details Modal -->
                                                <div class="modal fade" id="detailsModal{{ $untan->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="detailsModalLabel{{ $untan->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="detailsModalLabel{{ $untan->id }}">Volume
                                                                    Tempat Sampah Lokasi I</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 1:</p>
                                                                <div class="progress" style="margin-bottom: 10px;">
                                                                    @if ($untan->volumeorganik <= 33)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $untan->volumeorganik }}%; background-color: #2ecc71;">
                                                                            {{ $untan->volumeorganik }}%</div>
                                                                    @elseif($untan->volumetotaledge <= 66)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $untan->volumeorganik }}%; background-color: #f1c40f;">
                                                                            {{ $untan->volumeorganik }}%</div>
                                                                    @else
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $untan->volumeorganik }}%; background-color: #e74c3c;">
                                                                            {{ $untan->volumeorganik }}%</div>
                                                                    @endif
                                                                </div>
                                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 2:</p>
                                                                <div class="progress" style="margin-bottom: 10px;">
                                                                    @if ($untan->volumenonorganik <= 33)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $untan->volumenonorganik }}%; background-color: #2ecc71;">
                                                                            {{ $untan->volumenonorganik }}%</div>
                                                                    @elseif($untan->volumenonorganik <= 66)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $untan->volumenonorganik }}%; background-color: #f1c40f;">
                                                                            {{ $untan->volumenonorganik }}%</div>
                                                                    @else
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $untan->volumenonorganik }}%; background-color: #e74c3c;">
                                                                            {{ $untan->volumenonorganik }}%</div>
                                                                    @endif
                                                                </div>
                                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 3:</p>
                                                                <div class="progress" style="margin-bottom: 10px;">
                                                                    @if ($untan->volumeB3 <= 33)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $untan->volumeB3 }}%; background-color: #2ecc71;">
                                                                            {{ $untan->volumeB3 }}%</div>
                                                                    @elseif($untan->volumeB3 <= 66)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $untan->volumeB3 }}%; background-color: #f1c40f;">
                                                                            {{ $untan->volumeB3 }}%</div>
                                                                    @else
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $untan->volumeB3 }}%; background-color: #e74c3c;">
                                                                            {{ $untan->volumeB3 }}%</div>
                                                                    @endif
                                                                </div>
                                                                <!-- Add more details as needed -->
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
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

                            <!-- Card Lokasi II -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Volume
                                                    Rata - Rata Sampah Lokasi II :
                                                </div>
                                                <!-- Add Progres Bar -->
                                                <div class="progress">
                                                    @if ($polnep->volumetotaledge <= 33)
                                                        <div class="progress-bar"
                                                            style="width: {{ $polnep->volumetotaledge }}%; background-color: #2ecc71;">
                                                            {{ $polnep->volumetotaledge }}%</div>
                                                    @elseif($polnep->volumetotaledge <= 66)
                                                        <div class="progress-bar"
                                                            style="width: {{ $polnep->volumetotaledge }}%; background-color: #f1c40f;">
                                                            {{ $polnep->volumetotaledge }}%</div>
                                                    @else
                                                        <div class="progress-bar"
                                                            style="width: {{ $polnep->volumetotaledge }}%; background-color: #e74c3c;">
                                                            {{ $polnep->volumetotaledge }}%</div>
                                                    @endif
                                                </div>
                                                <!-- Add Details Button -->
                                                <button type="button" class="btn btn-sm btn-info mt-2"
                                                    style="font-size: 10px;" data-toggle="modal"
                                                    data-target="#detailsModal{{ $polnep->id }}">
                                                    Details Volume Sampah
                                                </button>

                                                <!-- Details Modal -->
                                                <div class="modal fade" id="detailsModal{{ $polnep->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="detailsModalLabel{{ $polnep->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="detailsModalLabel{{ $polnep->id }}">Volume
                                                                    Tempat Sampah Lokasi II</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 1:</p>
                                                                <div class="progress" style="margin-bottom: 10px;">
                                                                    @if ($polnep->volumeorganik <= 33)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $polnep->volumeorganik }}%; background-color: #2ecc71;">
                                                                            {{ $polnep->volumeorganik }}%</div>
                                                                    @elseif($polnep->volumetotaledge <= 66)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $polnep->volumeorganik }}%; background-color: #f1c40f;">
                                                                            {{ $polnep->volumeorganik }}%</div>
                                                                    @else
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $polnep->volumeorganik }}%; background-color: #e74c3c;">
                                                                            {{ $polnep->volumeorganik }}%</div>
                                                                    @endif
                                                                </div>
                                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 2:</p>
                                                                <div class="progress" style="margin-bottom: 10px;">
                                                                    @if ($polnep->volumenonorganik <= 33)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $polnep->volumenonorganik }}%; background-color: #2ecc71;">
                                                                            {{ $polnep->volumenonorganik }}%</div>
                                                                    @elseif($polnep->volumenonorganik <= 66)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $polnep->volumenonorganik }}%; background-color: #f1c40f;">
                                                                            {{ $polnep->volumenonorganik }}%</div>
                                                                    @else
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $polnep->volumenonorganik }}%; background-color: #e74c3c;">
                                                                            {{ $polnep->volumenonorganik }}%</div>
                                                                    @endif
                                                                </div>
                                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 3:</p>
                                                                <div class="progress" style="margin-bottom: 10px;">
                                                                    @if ($polnep->volumeB3 <= 33)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $polnep->volumeB3 }}%; background-color: #2ecc71;">
                                                                            {{ $polnep->volumeB3 }}%</div>
                                                                    @elseif($polnep->volumeB3 <= 66)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $polnep->volumeB3 }}%; background-color: #f1c40f;">
                                                                            {{ $polnep->volumeB3 }}%</div>
                                                                    @else
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $polnep->volumeB3 }}%; background-color: #e74c3c;">
                                                                            {{ $polnep->volumeB3 }}%</div>
                                                                    @endif
                                                                </div>
                                                                <!-- Add more details as needed -->
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
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

                            <!-- Card Lokasi III -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Volume
                                                    Rata - Rata Sampah Lokasi III :
                                                </div>
                                                <!-- Add Progres Bar -->
                                                <div class="progress">
                                                    @if ($rusunawa->volumetotaledge <= 33)
                                                        <div class="progress-bar"
                                                            style="width: {{ $rusunawa->volumetotaledge }}%; background-color: #2ecc71;">
                                                            {{ $rusunawa->volumetotaledge }}%</div>
                                                    @elseif($rusunawa->volumetotaledge <= 66)
                                                        <div class="progress-bar"
                                                            style="width: {{ $rusunawa->volumetotaledge }}%; background-color: #f1c40f;">
                                                            {{ $rusunawa->volumetotaledge }}%</div>
                                                    @else
                                                        <div class="progress-bar"
                                                            style="width: {{ $rusunawa->volumetotaledge }}%; background-color: #e74c3c;">
                                                            {{ $rusunawa->volumetotaledge }}%</div>
                                                    @endif
                                                </div>
                                                <!-- Add Details Button -->
                                                <button type="button" class="btn btn-sm btn-info mt-2"
                                                    style="font-size: 10px;" data-toggle="modal"
                                                    data-target="#detailsModal{{ $rusunawa->id }}">
                                                    Details Volume Sampah
                                                </button>

                                                <!-- Details Modal -->
                                                <div class="modal fade" id="detailsModal{{ $rusunawa->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="detailsModalLabel{{ $rusunawa->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="detailsModalLabel{{ $rusunawa->id }}">Volume
                                                                    Tempat Sampah Lokasi III</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 1:</p>
                                                                <div class="progress" style="margin-bottom: 10px;">
                                                                    @if ($rusunawa->volumeorganik <= 33)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $rusunawa->volumeorganik }}%; background-color: #2ecc71;">
                                                                            {{ $rusunawa->volumeorganik }}%</div>
                                                                    @elseif($rusunawa->volumetotaledge <= 66)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $rusunawa->volumeorganik }}%; background-color: #f1c40f;">
                                                                            {{ $rusunawa->volumeorganik }}%</div>
                                                                    @else
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $rusunawa->volumeorganik }}%; background-color: #e74c3c;">
                                                                            {{ $rusunawa->volumeorganik }}%</div>
                                                                    @endif
                                                                </div>
                                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 2:</p>
                                                                <div class="progress" style="margin-bottom: 10px;">
                                                                    @if ($rusunawa->volumenonorganik <= 33)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $rusunawa->volumenonorganik }}%; background-color: #2ecc71;">
                                                                            {{ $rusunawa->volumenonorganik }}%</div>
                                                                    @elseif($rusunawa->volumenonorganik <= 66)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $rusunawa->volumenonorganik }}%; background-color: #f1c40f;">
                                                                            {{ $rusunawa->volumenonorganik }}%</div>
                                                                    @else
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $rusunawa->volumenonorganik }}%; background-color: #e74c3c;">
                                                                            {{ $rusunawa->volumenonorganik }}%</div>
                                                                    @endif
                                                                </div>
                                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 3:</p>
                                                                <div class="progress" style="margin-bottom: 10px;">
                                                                    @if ($rusunawa->volumeB3 <= 33)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $rusunawa->volumeB3 }}%; background-color: #2ecc71;">
                                                                            {{ $rusunawa->volumeB3 }}%</div>
                                                                    @elseif($rusunawa->volumeB3 <= 66)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $rusunawa->volumeB3 }}%; background-color: #f1c40f;">
                                                                            {{ $rusunawa->volumeB3 }}%</div>
                                                                    @else
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $rusunawa->volumeB3 }}%; background-color: #e74c3c;">
                                                                            {{ $rusunawa->volumeB3 }}%</div>
                                                                    @endif
                                                                </div>
                                                                <!-- Add more details as needed -->
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
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

                            <!-- Card Lokasi IV -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Volume
                                                    Rata - Rata Sampah Lokasi IV :
                                                </div>
                                                <!-- Add Progres Bar -->
                                                <div class="progress">
                                                    @if ($total_siskom <= 33)
                                                        <div class="progress-bar"
                                                            style="width: {{ $total_siskom }}%; background-color: #2ecc71;">
                                                            {{ $total_siskom }}%</div>
                                                    @elseif($total_siskom <= 66)
                                                        <div class="progress-bar"
                                                            style="width: {{ $total_siskom }}%; background-color: #f1c40f;">
                                                            {{ $total_siskom }}%</div>
                                                    @else
                                                        <div class="progress-bar"
                                                            style="width: {{ $total_siskom }}%; background-color: #e74c3c;">
                                                            {{ $total_siskom }}%</div>
                                                    @endif
                                                </div>
                                                <!-- Add Details Button -->
                                                <button type="button" class="btn btn-sm btn-info mt-2"
                                                    style="font-size: 10px;" data-toggle="modal"
                                                    data-target="#detailsModal{{ $siskom_tps1->kapasitas }}_{{ $siskom_tps2->kapasitas }}">
                                                    Details Volume Sampah
                                                </button>

                                                <!-- Details Modal -->
                                                <div class="modal fade"
                                                    id="detailsModal{{ $siskom_tps1->kapasitas }}_{{ $siskom_tps2->kapasitas }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="detailsModalLabel{{ $siskom_tps1->kapasitas }}_{{ $siskom_tps2->kapasitas }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="detailsModalLabel{{ $siskom_tps1->kapasitas }}_{{ $siskom_tps2->kapasitas }}">
                                                                    Volume
                                                                    Tempat Sampah Lokasi IV</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 1:</p>
                                                                <div class="progress" style="margin-bottom: 10px;">
                                                                    @if ($siskom_tps1->kapasitas <= 33)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $siskom_tps1->kapasitas }}%; background-color: #2ecc71;">
                                                                            {{ $siskom_tps1->kapasitas }}%</div>
                                                                    @elseif($untan->volumetotaledge <= 66)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $siskom_tps1->kapasitas }}%; background-color: #f1c40f;">
                                                                            {{ $siskom_tps1->kapasitas }}%</div>
                                                                    @else
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $siskom_tps1->kapasitas }}%; background-color: #e74c3c;">
                                                                            {{ $siskom_tps1->kapasitas }}%</div>
                                                                    @endif
                                                                </div>
                                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 2:</p>
                                                                <div class="progress" style="margin-bottom: 10px;">
                                                                    @if ($siskom_tps2->kapasitas <= 33)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $siskom_tps2->kapasitas }}%; background-color: #2ecc71;">
                                                                            {{ $siskom_tps2->kapasitas }}%</div>
                                                                    @elseif($siskom_tps2->kapasitas <= 66)
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $siskom_tps2->kapasitas }}%; background-color: #f1c40f;">
                                                                            {{ $siskom_tps2->kapasitas }}%</div>
                                                                    @else
                                                                        <div class="progress-bar"
                                                                            style="width: {{ $siskom_tps2->kapasitas }}%; background-color: #e74c3c;">
                                                                            {{ $siskom_tps2->kapasitas }}%</div>
                                                                    @endif
                                                                </div>
                                                                <!-- Add more details as needed -->
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
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
                        {{-- <p>Website ini dibuat untuk memenuhi salah satu persyaratan memperoleh gelar S.kom</p> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row mt-1">
            <!-- Card Lokasi I -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Volume Rata - Rata
                                    Sampah Lokasi I :</div>
                                <!-- Add Progres Bar -->
                                <div class="progress">
                                    @if ($untan->volumetotaledge <= 33)
                                        <div class="progress-bar"
                                            style="width: {{ $untan->volumetotaledge }}%; background-color: #2ecc71;">
                                            {{ $untan->volumetotaledge }}%</div>
                                    @elseif($untan->volumetotaledge <= 66)
                                        <div class="progress-bar"
                                            style="width: {{ $untan->volumetotaledge }}%; background-color: #f1c40f;">
                                            {{ $untan->volumetotaledge }}%</div>
                                    @else
                                        <div class="progress-bar"
                                            style="width: {{ $untan->volumetotaledge }}%; background-color: #e74c3c;">
                                            {{ $untan->volumetotaledge }}%</div>
                                    @endif
                                </div>
                                <!-- Add Details Button -->
                                <button type="button" class="btn btn-sm btn-info mt-2" style="font-size: 8px;"
                                    data-toggle="modal" data-target="#detailsModal{{ $untan->id }}">
                                    Details Volume Sampah
                                </button>

                                <!-- Details Modal -->
                                <div class="modal fade" id="detailsModal{{ $untan->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="detailsModalLabel{{ $untan->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailsModalLabel{{ $untan->id }}">Volume
                                                    Tempat Sampah Lokasi I</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 1:</p>
                                                <div class="progress" style="margin-bottom: 10px;">
                                                    @if ($untan->volumeorganik <= 33)
                                                        <div class="progress-bar"
                                                            style="width: {{ $untan->volumeorganik }}%; background-color: #2ecc71;">
                                                            {{ $untan->volumeorganik }}%</div>
                                                    @elseif($untan->volumetotaledge <= 66)
                                                        <div class="progress-bar"
                                                            style="width: {{ $untan->volumeorganik }}%; background-color: #f1c40f;">
                                                            {{ $untan->volumeorganik }}%</div>
                                                    @else
                                                        <div class="progress-bar"
                                                            style="width: {{ $untan->volumeorganik }}%; background-color: #e74c3c;">
                                                            {{ $untan->volumeorganik }}%</div>
                                                    @endif
                                                </div>
                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 2:</p>
                                                <div class="progress" style="margin-bottom: 10px;">
                                                    @if ($untan->volumenonorganik <= 33)
                                                        <div class="progress-bar"
                                                            style="width: {{ $untan->volumenonorganik }}%; background-color: #2ecc71;">
                                                            {{ $untan->volumenonorganik }}%</div>
                                                    @elseif($untan->volumenonorganik <= 66)
                                                        <div class="progress-bar"
                                                            style="width: {{ $untan->volumenonorganik }}%; background-color: #f1c40f;">
                                                            {{ $untan->volumenonorganik }}%</div>
                                                    @else
                                                        <div class="progress-bar"
                                                            style="width: {{ $untan->volumenonorganik }}%; background-color: #e74c3c;">
                                                            {{ $untan->volumenonorganik }}%</div>
                                                    @endif
                                                </div>
                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 3:</p>
                                                <div class="progress" style="margin-bottom: 10px;">
                                                    @if ($untan->volumeB3 <= 33)
                                                        <div class="progress-bar"
                                                            style="width: {{ $untan->volumeB3 }}%; background-color: #2ecc71;">
                                                            {{ $untan->volumeB3 }}%</div>
                                                    @elseif($untan->volumeB3 <= 66)
                                                        <div class="progress-bar"
                                                            style="width: {{ $untan->volumeB3 }}%; background-color: #f1c40f;">
                                                            {{ $untan->volumeB3 }}%</div>
                                                    @else
                                                        <div class="progress-bar"
                                                            style="width: {{ $untan->volumeB3 }}%; background-color: #e74c3c;">
                                                            {{ $untan->volumeB3 }}%</div>
                                                    @endif
                                                </div>
                                                <!-- Add more details as needed -->
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
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

            <!-- Card Lokasi II -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Volume Rata - Rata
                                    Sampah Lokasi II :
                                </div>
                                <!-- Add Progres Bar -->
                                <div class="progress">
                                    @if ($polnep->volumetotaledge <= 33)
                                        <div class="progress-bar"
                                            style="width: {{ $polnep->volumetotaledge }}%; background-color: #2ecc71;">
                                            {{ $polnep->volumetotaledge }}%</div>
                                    @elseif($polnep->volumetotaledge <= 66)
                                        <div class="progress-bar"
                                            style="width: {{ $polnep->volumetotaledge }}%; background-color: #f1c40f;">
                                            {{ $polnep->volumetotaledge }}%</div>
                                    @else
                                        <div class="progress-bar"
                                            style="width: {{ $polnep->volumetotaledge }}%; background-color: #e74c3c;">
                                            {{ $polnep->volumetotaledge }}%</div>
                                    @endif
                                </div>
                                <!-- Add Details Button -->
                                <button type="button" class="btn btn-sm btn-info mt-2" style="font-size: 8px;"
                                    data-toggle="modal" data-target="#detailsModal{{ $polnep->id }}">
                                    Details Volume Sampah
                                </button>

                                <!-- Details Modal -->
                                <div class="modal fade" id="detailsModal{{ $polnep->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="detailsModalLabel{{ $polnep->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailsModalLabel{{ $polnep->id }}">Volume
                                                    Tempat Sampah Lokasi II</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 1:</p>
                                                <div class="progress" style="margin-bottom: 10px;">
                                                    @if ($polnep->volumeorganik <= 33)
                                                        <div class="progress-bar"
                                                            style="width: {{ $polnep->volumeorganik }}%; background-color: #2ecc71;">
                                                            {{ $polnep->volumeorganik }}%</div>
                                                    @elseif($polnep->volumetotaledge <= 66)
                                                        <div class="progress-bar"
                                                            style="width: {{ $polnep->volumeorganik }}%; background-color: #f1c40f;">
                                                            {{ $polnep->volumeorganik }}%</div>
                                                    @else
                                                        <div class="progress-bar"
                                                            style="width: {{ $polnep->volumeorganik }}%; background-color: #e74c3c;">
                                                            {{ $polnep->volumeorganik }}%</div>
                                                    @endif
                                                </div>
                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 2:</p>
                                                <div class="progress" style="margin-bottom: 10px;">
                                                    @if ($polnep->volumenonorganik <= 33)
                                                        <div class="progress-bar"
                                                            style="width: {{ $polnep->volumenonorganik }}%; background-color: #2ecc71;">
                                                            {{ $polnep->volumenonorganik }}%</div>
                                                    @elseif($polnep->volumenonorganik <= 66)
                                                        <div class="progress-bar"
                                                            style="width: {{ $polnep->volumenonorganik }}%; background-color: #f1c40f;">
                                                            {{ $polnep->volumenonorganik }}%</div>
                                                    @else
                                                        <div class="progress-bar"
                                                            style="width: {{ $polnep->volumenonorganik }}%; background-color: #e74c3c;">
                                                            {{ $polnep->volumenonorganik }}%</div>
                                                    @endif
                                                </div>
                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 3:</p>
                                                <div class="progress" style="margin-bottom: 10px;">
                                                    @if ($polnep->volumeB3 <= 33)
                                                        <div class="progress-bar"
                                                            style="width: {{ $polnep->volumeB3 }}%; background-color: #2ecc71;">
                                                            {{ $polnep->volumeB3 }}%</div>
                                                    @elseif($polnep->volumeB3 <= 66)
                                                        <div class="progress-bar"
                                                            style="width: {{ $polnep->volumeB3 }}%; background-color: #f1c40f;">
                                                            {{ $polnep->volumeB3 }}%</div>
                                                    @else
                                                        <div class="progress-bar"
                                                            style="width: {{ $polnep->volumeB3 }}%; background-color: #e74c3c;">
                                                            {{ $polnep->volumeB3 }}%</div>
                                                    @endif
                                                </div>
                                                <!-- Add more details as needed -->
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
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

            <!-- Card Lokasi III -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Volume Rata - Rata
                                    Sampah Lokasi III :
                                </div>
                                <!-- Add Progres Bar -->
                                <div class="progress">
                                    @if ($rusunawa->volumetotaledge <= 33)
                                        <div class="progress-bar"
                                            style="width: {{ $rusunawa->volumetotaledge }}%; background-color: #2ecc71;">
                                            {{ $rusunawa->volumetotaledge }}%</div>
                                    @elseif($rusunawa->volumetotaledge <= 66)
                                        <div class="progress-bar"
                                            style="width: {{ $rusunawa->volumetotaledge }}%; background-color: #f1c40f;">
                                            {{ $rusunawa->volumetotaledge }}%</div>
                                    @else
                                        <div class="progress-bar"
                                            style="width: {{ $rusunawa->volumetotaledge }}%; background-color: #e74c3c;">
                                            {{ $rusunawa->volumetotaledge }}%</div>
                                    @endif
                                </div>
                                <!-- Add Details Button -->
                                <button type="button" class="btn btn-sm btn-info mt-2" style="font-size: 8px;"
                                    data-toggle="modal" data-target="#detailsModal{{ $rusunawa->id }}">
                                    Details Volume Sampah
                                </button>

                                <!-- Details Modal -->
                                <div class="modal fade" id="detailsModal{{ $rusunawa->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="detailsModalLabel{{ $rusunawa->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailsModalLabel{{ $rusunawa->id }}">Volume
                                                    Tempat Sampah Lokasi III</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 1:</p>
                                                <div class="progress" style="margin-bottom: 10px;">
                                                    @if ($rusunawa->volumeorganik <= 33)
                                                        <div class="progress-bar"
                                                            style="width: {{ $rusunawa->volumeorganik }}%; background-color: #2ecc71;">
                                                            {{ $rusunawa->volumeorganik }}%</div>
                                                    @elseif($rusunawa->volumetotaledge <= 66)
                                                        <div class="progress-bar"
                                                            style="width: {{ $rusunawa->volumeorganik }}%; background-color: #f1c40f;">
                                                            {{ $rusunawa->volumeorganik }}%</div>
                                                    @else
                                                        <div class="progress-bar"
                                                            style="width: {{ $rusunawa->volumeorganik }}%; background-color: #e74c3c;">
                                                            {{ $rusunawa->volumeorganik }}%</div>
                                                    @endif
                                                </div>
                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 2:</p>
                                                <div class="progress" style="margin-bottom: 10px;">
                                                    @if ($rusunawa->volumenonorganik <= 33)
                                                        <div class="progress-bar"
                                                            style="width: {{ $rusunawa->volumenonorganik }}%; background-color: #2ecc71;">
                                                            {{ $rusunawa->volumenonorganik }}%</div>
                                                    @elseif($rusunawa->volumenonorganik <= 66)
                                                        <div class="progress-bar"
                                                            style="width: {{ $rusunawa->volumenonorganik }}%; background-color: #f1c40f;">
                                                            {{ $rusunawa->volumenonorganik }}%</div>
                                                    @else
                                                        <div class="progress-bar"
                                                            style="width: {{ $rusunawa->volumenonorganik }}%; background-color: #e74c3c;">
                                                            {{ $rusunawa->volumenonorganik }}%</div>
                                                    @endif
                                                </div>
                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 3:</p>
                                                <div class="progress" style="margin-bottom: 10px;">
                                                    @if ($rusunawa->volumeB3 <= 33)
                                                        <div class="progress-bar"
                                                            style="width: {{ $rusunawa->volumeB3 }}%; background-color: #2ecc71;">
                                                            {{ $rusunawa->volumeB3 }}%</div>
                                                    @elseif($rusunawa->volumeB3 <= 66)
                                                        <div class="progress-bar"
                                                            style="width: {{ $rusunawa->volumeB3 }}%; background-color: #f1c40f;">
                                                            {{ $rusunawa->volumeB3 }}%</div>
                                                    @else
                                                        <div class="progress-bar"
                                                            style="width: {{ $rusunawa->volumeB3 }}%; background-color: #e74c3c;">
                                                            {{ $rusunawa->volumeB3 }}%</div>
                                                    @endif
                                                </div>
                                                <!-- Add more details as needed -->
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
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

            <!-- Card Lokasi IV -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Volume Rata - Rata
                                    Sampah Lokasi IV :
                                </div>
                                <!-- Add Progres Bar -->
                                <div class="progress">
                                    @if ($total_siskom <= 33)
                                        <div class="progress-bar"
                                            style="width: {{ $total_siskom }}%; background-color: #2ecc71;">
                                            {{ $total_siskom }}%</div>
                                    @elseif($total_siskom <= 66)
                                        <div class="progress-bar"
                                            style="width: {{ $total_siskom }}%; background-color: #f1c40f;">
                                            {{ $total_siskom }}%</div>
                                    @else
                                        <div class="progress-bar"
                                            style="width: {{ $total_siskom }}%; background-color: #e74c3c;">
                                            {{ $total_siskom }}%</div>
                                    @endif
                                </div>
                                <!-- Add Details Button -->
                                <button type="button" class="btn btn-sm btn-info mt-2" style="font-size: 8px;"
                                    data-toggle="modal"
                                    data-target="#detailsModal{{ $siskom_tps1->kapasitas }}_{{ $siskom_tps2->kapasitas }}">
                                    Details Volume Sampah
                                </button>

                                <!-- Details Modal -->
                                <div class="modal fade"
                                    id="detailsModal{{ $siskom_tps1->kapasitas }}_{{ $siskom_tps2->kapasitas }}"
                                    tabindex="-1" role="dialog"
                                    aria-labelledby="detailsModalLabel{{ $siskom_tps1->kapasitas }}_{{ $siskom_tps2->kapasitas }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="detailsModalLabel{{ $siskom_tps1->kapasitas }}_{{ $siskom_tps2->kapasitas }}">
                                                    Volume
                                                    Tempat Sampah Lokasi IV</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 1:</p>
                                                <div class="progress" style="margin-bottom: 10px;">
                                                    @if ($siskom_tps1->kapasitas <= 33)
                                                        <div class="progress-bar"
                                                            style="width: {{ $siskom_tps1->kapasitas }}%; background-color: #2ecc71;">
                                                            {{ $siskom_tps1->kapasitas }}%</div>
                                                    @elseif($untan->volumetotaledge <= 66)
                                                        <div class="progress-bar"
                                                            style="width: {{ $siskom_tps1->kapasitas }}%; background-color: #f1c40f;">
                                                            {{ $siskom_tps1->kapasitas }}%</div>
                                                    @else
                                                        <div class="progress-bar"
                                                            style="width: {{ $siskom_tps1->kapasitas }}%; background-color: #e74c3c;">
                                                            {{ $siskom_tps1->kapasitas }}%</div>
                                                    @endif
                                                </div>
                                                <p style="margin-bottom: 1px;">Volume Tempat Sampah 2:</p>
                                                <div class="progress" style="margin-bottom: 10px;">
                                                    @if ($siskom_tps2->kapasitas <= 33)
                                                        <div class="progress-bar"
                                                            style="width: {{ $siskom_tps2->kapasitas }}%; background-color: #2ecc71;">
                                                            {{ $siskom_tps2->kapasitas }}%</div>
                                                    @elseif($siskom_tps2->kapasitas <= 66)
                                                        <div class="progress-bar"
                                                            style="width: {{ $siskom_tps2->kapasitas }}%; background-color: #f1c40f;">
                                                            {{ $siskom_tps2->kapasitas }}%</div>
                                                    @else
                                                        <div class="progress-bar"
                                                            style="width: {{ $siskom_tps2->kapasitas }}%; background-color: #e74c3c;">
                                                            {{ $siskom_tps2->kapasitas }}%</div>
                                                    @endif
                                                </div>
                                                <!-- Add more details as needed -->
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
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
                        <div class="dropdown no-arrow">
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
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <p>Website ini dibuat untuk memenuhi salah satu persyaratan memperoleh gelar S.kom</p>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
