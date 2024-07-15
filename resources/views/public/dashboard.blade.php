@extends('public/layout/main')
@section('content')
<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/smpn2sempu.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/smpn2sempu.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/smpn2sempu.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>
<main class="container">
    <div class="row gx-4 gx-lg-5 align-items-center my-4">
        <div class="col-lg-2 mt-4"><i class="fas fa-graduation-cap education-icon"></i></div>
        <div class="col-lg-10 mt-4">
            <h1 class="font-weight-light"><b>SMP NEGERI 2 SEMPU</b></h1>
            <p style="text-align: justify;">  Dinas Pemadam Kebakaran dan Penyelamatan Kabupaten Banyuwangi terbentuk secara mandiri pada tanggal 3 Januari 2022,
                yang mana sebelumnya masih menjadi satu dengan kesatuan Polisi Pamong Praja.
                Berdasarkan Perda Kabupaten Banyuwangi Tentang Pembentukan dan Susunan Perangkat Daerah serta
                Peraturan Bupati Banyuwangi dan Tentang Kedudukan, Susunan Organisasi, Tugas, Pokok dan Fungsi Serta
                Tata Kerja Dinas Pemadam Kebakaran dan Penyelamatan Kabupaten Banyuwangi.</p>
            <a class="btn btn-success" href="https://dapo.kemdikbud.go.id/sekolah/73F386691EDA5404D49D">Selengkapnya..</a>
        </div>
    </div>

    <div class="container bg-light text-dark shadow mb-2 rounded-box">
        <div class="row">
            <div class="col-md-4 mb-3 mt-3 justify-content-center red-box" style="display: flex;">
                <img src="images/damkarbwi.jpg" class="img-fluid" alt="Gambar">
            </div>
            <div class="col-md-8 mb-3 mt-3" style="text-align: justify;">
                <p><h3><b>VISI</b></h3></p>
                <p>"Terwujudnya perlindungan masyarakat dari ancaman bahaya kebakaran melalui pencegahan dan
                    penanggulangan kebakaran yang antisipasif dan responsif"</p>
                <p><h3><b>MISI</b></h3></p>
                <p>"Memberikan pelayanan pelayanan prima dalam bidang pencegahan dan pemadam kebakaran, serta
                    penyelamatan jiwa pada kebakaran dan kejadian bencana lainnya"</p>
            </div>
        </div>
    </div>

    <!-- Tampilan crad -->
    <div class="row">
        <div class="col-md-12 py-2 mt-2">
            <!--card-->
            <h2 class="mb-4" style="color:black"><center><b>BERITA TERKINI</b></center></h2>
            <!-- Pagination -->
            <div id="card-container" class="row row-cols-1 row-cols-md-3 g-4">
                <!-- Isi card di sini -->
            </div>
            <nav id="pagination" aria-label="Page navigation" class="mt-3 mb-3">
                <ul class="pagination justify-content-center">
                    <!-- Tombol halaman akan ditambahkan di sini secara dinamis -->
                </ul>
            </nav>
        </div>
    </div>

    <hr class="mb-4">

    <div class="row">
        <!-- Maps -->
    <div class="col-md-7 mt-4 mb-4" style="height: 370px;">
        <div id="map" style="width: 100%; height: 100%; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"></div>
        <script>

            //Tampilan Maps
            const map = L.map('map').setView([-8.234256388870639, 114.29139328370496], 9);
            const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
               attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            //Marker
            //Lokasi 1
            var lokasi1 = L.icon({
               iconUrl: 'images/logo_damkar.png',
               iconSize: [65, 40], // size of the icon
            });

            L.marker([-8.302344688448844, 114.19365783986336], { icon: lokasi1 }).addTo(map).bindPopup("<b>SMPN 2 SEMPU</b><br>Telp: (0333)******").openPopup();
         </script>
         </div>
        <div class="col-md-5 mt-4 mb-4" style="height: 350px;">
            <div class="card h-101">
                <div class="card-body">
                    {{-- <iframe src="https://spm.banyuwangikab.go.id/skpd/dinas-pemadam-kebakaran-dan-penyelamatan" style="width: 100%; height: 100%; border: none;"></iframe> --}}
                    <h4><center><b>KOMENTAR</b></center></h4>
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-1">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-1">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-2">
                            <label for="comment" class="form-label">Komentar</label>
                            <textarea class="form-control" id="comment" name="comment" rows="2" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div> <br>

    {{-- <div class="row">
    <div class="col-md-7 mt-4 mb-4" style="height: 350px;">
        <div class="card h-100">
            <div class="card-body">
                <iframe src="https://spm.banyuwangikab.go.id/skpd/dinas-pemadam-kebakaran-dan-penyelamatan" style="width: 100%; height: 100%; border: none;"></iframe>
            </div>
        </div>
    </div>
    <!-- Maps -->
    <div class="col-md-5 mt-4 mb-4" style="height: 350px;">
        <div id="map" style="width: 100%; height: 100%; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"></div>
        <script>

            //Tampilan Maps
            const map = L.map('map').setView([-8.234256388870639, 114.29139328370496], 9);
            const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
               attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            //Marker
            //Lokasi 1
            var lokasi1 = L.icon({
               iconUrl: 'images/logo_damkar.png',
               iconSize: [65, 40], // size of the icon
            });

            L.marker([-8.21124339808114, 114.37976274943635], { icon: lokasi1 }).addTo(map).bindPopup("<b>MAKO DAMKAR BANYUWANGI</b><br>Telp: (0333) 422113").openPopup();

            //Lokasi 2
            var lokasi2 = L.icon({
               iconUrl: 'images/logo_damkar.png',
               iconSize: [65, 40], // size of the icon
            });

            L.marker([-8.397562413652105, 114.26973405885026], { icon: lokasi2 }).addTo(map).bindPopup("<b>SEKTOR SRONO</b><br>Srono")

            //Lokasi 3
            var lokasi3 = L.icon({
               iconUrl: 'images/logo_damkar.png',
               iconSize: [65, 40], // size of the icon
            });

            L.marker([-8.361345425593777, 114.15939366898164], { icon: lokasi3 }).addTo(map).bindPopup("<b>SEKTOR GENTENG</b><br>Genteng")

            //Lokasi 4
            var lokasi4 = L.icon({
               iconUrl: 'images/logo_damkar.png',
               iconSize: [65, 40], // size of the icon
            });

            L.marker([-8.48352765424662, 114.13341408000693], { icon: lokasi4 }).addTo(map).bindPopup("<b>SEKTOR BANGOREJO</b><br>Bangorejo")

            //Tampilan Maps Shareloc
            const maps = L.map('map2').setView([-8.234256388870639, 114.29139328370496], 9);
            const tile = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
               attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            //Lokasi 3
            var sharel = L.icon({
                iconUrl: './assets/image/logo_damkar.png',
                iconSize:     [65, 40], // size of the icon
                });

             L.marker([-8.361345425593777, 114.15939366898164],{icon:lokasi3}).addTo(map).bindPopup("<b>SEKTOR GENTENG</b><br>Genteng")

         </script>
         </div>
    </div> --}}

  </main>
@endsection
