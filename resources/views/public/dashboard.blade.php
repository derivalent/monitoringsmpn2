@extends('public/layout/main')
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
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
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <main class="container">
        <div class="row gx-4 gx-lg-5 align-items-center my-4">
            <div class="col-lg-2 mt-4"><i class="fas fa-graduation-cap education-icon"></i></div>
            <div class="col-lg-10 mt-4">
                <h1 class="font-weight-light"><b>SMP NEGERI 2 SEMPU</b></h1>
                <p style="text-align: justify;"> SMP Negeri 2 Sempu Banyuwangi merupakan salah satu sekolah menengah pertama
                    unggulan di Kabupaten Banyuwangi. SMP Negeri 2 Sembu berlokasi di Jalan Sragi Gendoh, Desa Gendoh,
                    Kecamatan Sempu, Kabupaten Banyuwangi. Berdiri dengan visi untuk melahirkan generasi penerus bangsa yang
                    berakhlak mulia, berilmu pengetahuan, dan berdaya saing tinggi, kami terus berupaya meningkatkan
                    kualitas pendidikan. Kami menawarkan berbagai program ekstrakurikuler yang menarik untuk mengembangkan
                    minat dan bakat siswa, serta fasilitas yang memadai untuk mendukung proses belajar mengajar.</p>
                <a class="btn btn-success"
                    href="https://dapo.kemdikbud.go.id/sekolah/73F386691EDA5404D49D">Selengkapnya..</a>
            </div>
        </div>

        <div class="container bg-light text-dark shadow mb-2 rounded-box">
            <div class="row">
                <div class="col-md-4 mb-3 mt-3 justify-content-center red-box" style="display: flex;">
                    <img src="images/smpn2sempu.jpg" class="img-fluid" alt="Gambar">
                </div>
                <div class="col-md-8 mb-3 mt-3" style="text-align: justify;">
                    <p>
                    <h3><b>VISI</b></h3>
                    </p>
                    <p>Unggul dalam bidang pengetahuan dan keterampilan yang membantuk kepribadian yang mandiri berlandaskan iman dan taqwa</p>
                    <p>
                    <h3><b>MISI</b></h3>
                    <ul>
                        <li>Meningkatkan prestasi akademis</li>
                        <li>Meningkatkan IPTEK dan IMTAQ warga sekolah</li>
                        <li>Meningkatkan Keterampilan kecakapan hidup</li>
                        <li>Meningkatkan prestasi nonakademis khususnya di bidang seni dan olahraga</li>
                        <li>Meningkatkan prestasi dan kinerja guru dan karyawan</li>
                        <li>Meningkatkan peran masyarakat dan sekolah</li>
                    </ul>
                    </p>
                    {{-- <p>- Meningkatkan prestasi akademis</p>
                    <p>- Meningkatkan IPTEK dan IMTAQ warga sekolah</p>
                    <p>- Meningkatkan Keterampilan kecakapan hidup</p>
                    <p>- Meningkatkan prestasi nonakademis khususnya di bidang seni dan olahraga</p>
                    <p>- Meningkatkan prestasi dan kinerja guru dan karyawan</p>
                    <p>- Meningkatkan peran masyarakat dan sekolah</p> --}}
                    {{-- <p>
                        <ul>
                            <li>- Meningkatkan prestasi akademis</li>
                            <li>- Meningkatkan IPTEK dan IMTAQ warga sekolah</li>
                            <li>- Meningkatkan Keterampilan kecakapan hidup</li>
                            <li>- Meningkatkan prestasi nonakademis khususnya di bidang seni dan olahraga</li>
                            <li>- Meningkatkan prestasi dan kinerja guru dan karyawan</li>
                            <li>- Meningkatkan peran masyarakat dan sekolah</li>
                        </ul>
                    </p> --}}
                </div>
            </div>
        </div>

        <!-- Tampilan crad -->
        <div class="row">
            <div class="col-md-12 py-2 mt-2">
                <!--card-->
                <h2 class="mb-4" style="color:black">
                    {{-- <center><b>BERITA TERKINI</b></center> --}}
                </h2>
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
                        iconUrl: 'images/logosmpn2sempu.png',
                        iconSize: [40, 40], // size of the icon
                    });

                    L.marker([-8.302344688448844, 114.19365783986336], {
                        icon: lokasi1
                    }).addTo(map).bindPopup("<b>SMPN 2 SEMPU</b><br>Telp: (0333)******").openPopup();
                </script>
            </div>
            <div class="col-md-5 mt-4 mb-4" style="height: 350px;">
                <div class="card h-101">
                    <div class="card-body">
                        {{-- <iframe src="https://spm.banyuwangikab.go.id/skpd/dinas-pemadam-kebakaran-dan-penyelamatan" style="width: 100%; height: 100%; border: none;"></iframe> --}}
                        <h4>
                            <center><b>KOMENTAR</b></center>
                        </h4>
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
    </main>
    <script>
        @if ($massage = Session::get('success'))
            <
            script >
                Swal.fire('{{ $massage }}');
    </script>
    @endif
    </script>
@endsection
