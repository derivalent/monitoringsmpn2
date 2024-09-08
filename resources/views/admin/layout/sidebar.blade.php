<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('KategoriKegiatan.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                <div class="sb-sidenav-menu-heading">Konten</div>
                <a class="nav-link" href="{{ route('Berita.index') }}">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-newspaper"></i></div>
                    Berita
                </a>
                @endif
                {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Konten
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a> --}}
                {{-- <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Berita</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Dokumentasi</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                    </nav>
                </div> --}}
                <div class="sb-sidenav-menu-heading">Data</div>
                @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Monitoring
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                {{-- @endif --}}
                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('Penugasan.index') }}">Monitoring - Tanggungan Kinerja</a>
                        <a class="nav-link" href="{{ route('MonitoringLaporanKegiatan') }}">Monitoring - Laporan Kegiatan</a>
                        {{-- <a class="nav-link" href="layout-sidenav-light.html">Notulensi</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a> --}}
                    </nav>
                </div>
                @endif
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Penugasan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('Penugasan.index_data') }}">Tanggungan Kinerja</a>
                        <a class="nav-link" href="{{ route('LaporanKegiatan.index') }}">Laporan Kegiatan</a>
                    </nav>
                </div>
                {{-- <div class="sb-sidenav-menu-heading">User Management</div>
                <a class="nav-link" href="{{ route('kelola_pengguna') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                    Kelola Pengguna
                </a> --}}
                @if(Auth::user()->role == 1)
                <div class="sb-sidenav-menu-heading">User Management</div>
                <a class="nav-link" href="{{ route('kelola_pengguna') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                    Kelola Pengguna
                </a>
                @endif
            </div>
        </div>
        {{-- <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div> --}}
        <div class="sb-sidenav-footer">
            <form method="POST" action="{{ route('Logout') }}">
                @csrf
                <button type="submit" class="nav-link btn btn-link">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i> Logout</div>
                </button>
            </form>
        </div>
    </nav>
</div>
