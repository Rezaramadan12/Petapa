<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    {{-- <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-fw fa-user"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a> --}}

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>
    {{-- <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li> --}}
    <!-- Divider -->
    <hr class="sidebar-divider">

    {{-- <li class="nav-item" style="transition: background-color 0.3s;">
        <a class="nav-link" href="/untan" onmouseover="this.style.backgroundColor='#ffd700'"
            onmouseout="this.style.backgroundColor='transparent'">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Data Untan</span>
        </a>
    </li>
    <li class="nav-item" style="transition: background-color 0.3s;">
        <a class="nav-link" href="/polnep" onmouseover="this.style.backgroundColor='#ffd700'"
            onmouseout="this.style.backgroundColor='transparent'">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Data Polnep</span>
        </a>
    </li>
    <li class="nav-item" style="transition: background-color 0.3s;">
        <a class="nav-link" href="/rusunawa" onmouseover="this.style.backgroundColor='#ffd700'"
            onmouseout="this.style.backgroundColor='transparent'">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Data Rusunawa</span>
        </a>
    </li>
    <li class="nav-item" style="transition: background-color 0.3s;">
        <a class="nav-link" href="/siskom" onmouseover="this.style.backgroundColor='#ffd700'"
            onmouseout="this.style.backgroundColor='transparent'">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Data Siskom</span>
        </a>
    </li> --}}
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Lokasi Tempat Sampah</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-warning py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/untan') }}">UNTAN</a>
                <a class="collapse-item" href="{{ url('/polnep') }}">POLNEP</a>
                <a class="collapse-item" href="{{ url('/rusunawa') }}">RUSUNAWA</a>
                <a class="collapse-item" href="{{ url('/siskom') }}">SISKOM</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/maps">
            <i class="fas fa-fw fa-map"></i>
            <span>Peta Tempat Sampah</span>
        </a>
    </li>
    {{-- <li class="nav-item ">
        <a class="nav-link" href="/polnep">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Polnep</span></a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="/rusunawa">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Rusunawa</span></a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="/siskom">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Siskom</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/maps">
            <i class="fas fa-fw fa-map"></i>
            <span>Peta Tempat Sampah</span>
        </a>
    </li> --}}


    {{-- <li class="nav-item"> --}}
    {{-- <form action="/logout" method="post" class="nav-link">
        @csrf
        <button type="submit" class="btn btn-danger">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </button>
    </form> --}}
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
