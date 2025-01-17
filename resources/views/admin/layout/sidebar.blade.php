<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ 'dashboard_admin' }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Konten</div>
                <a class="nav-link" href="{{ 'berita_admin' }}">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-newspaper"></i></div>
                    Berita
                </a>
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
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Monitoring
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ 'monitoring_tanggungan_kinerja' }}">Monitoring - Tanggungan Kinerja</a>
                        <a class="nav-link" href="{{ 'monitoring_laporan_kegiatan' }}">Monitoring - Laporan Kegiatan</a>
                        {{-- <a class="nav-link" href="layout-sidenav-light.html">Notulensi</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a> --}}
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Penugasan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ 'tanggungan_kinerja' }}">Tanggungan Kinerja</a>
                        <a class="nav-link" href="{{ 'laporan_kegiatan' }}">Laporan Kegiatan</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">User Management</div>
                {{-- <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a> --}}
                <a class="nav-link" href="{{ 'kelola_pengguna' }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Kelola Pengguna
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
