@extends('public.layout.main')
@section('content')
<main class="container">
    <div class="container">
        <div class="mb-3 mt-5 row text-center">
            <div class="rounded-background1 mx-auto box-shadow">
            <h3><b>DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN</b></h3>
            <h3><b>KABUPATEN BANYUWANGI</b></h3>
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

        <div class="container bg-light text-dark shadow rounded-box box-shadow">
            <div class="row">
                <div class="col-md-8 mb-3 mt-3" style="text-align: justify;">
                    <p><h3><b>DASAR DARMA</b></h3></p>
                    <p>1. PENCEGAHAN DAN PENGENDALIAN KEBAKARAN
                        <br>
                        2. PEMADAMAN KEBAKARAN
                        <br>
                        3. PENYELAMATAN
                        <br>
                        4. PEMBERDAYAAN MASYARAKAT
                        <br>
                        5. PENANGANAN KEBAKARAN BAHAN BERBAHAYA DAN BERACUN</p>
                </div>
                <div class="col-md-4 mb-3 mt-3 justify-content-center blue-box" style="display: flex;">
                    <img src="images/damkarbwi.jpg" class="img-fluid" alt="Gambar">
                </div>
            </div>
        </div>
    </div>

    <!-- keterangan about -->
    <!-- card -->
    <section id="card">
        <div class="container">
            <div class="mb-3 mt-5 row text-center mb-4">
                <div class="rounded-background2 mx-auto">
                <h3><b>PELAYANAN DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN</b></h3>
                <h3><b>KABUPATEN BANYUWANGI</b></h3>
            </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col mb-5">
                    <div class="card h-100 text-center">
                        <img src="images/pemadaman_kebakaran.JPG" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">PEMADAMAN KEBAKARAN</h5>
                            <p class="card-text" style="text-align: justify;">
                                Fokus utama penanganan oleh Dinas Pemedam Kebakaran dan Penyelamatan Kabupaten Banyuwangi,
                                yaitu penanganan kejadian kebakaran di seluruh wilayah Kabupaten Banyuwangi dengan <b>pelayanan dan penanganan
                                24 jam serta tidak dipungut biaya.</b>
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100 text-center">
                        <img src="images/lepas_cincin.JPG" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">PENYELAMATAN JIWA</h5>
                            <p class="card-text" style="text-align: justify;">
                                Unit pemadam kebakaran (damkar) terdapat aksi penyelamatan jiwa mencakup upaya-upaya untuk melindungi,
                                membantu, atau menyelamatkan individu dari ancaman atau kondisi yang dapat merugikan atau membahayakan keberadaan mereka,
                                baik secara fisik maupun metafisik. <b>Pelayanan dan penanganan 24 jam serta tidak dipungut biaya.</b>
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100 text-center">
                        <img src="images/penyelamatan_hewan.JPG" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">PENYELAMATAN HEWAN</h5>
                            <p class="card-text" style="text-align: justify;">
                                Unit pemadam kebakaran (damkar) terdapat aksi upaya untuk menyelamatkan hewan yang terjebak dalam situasi berbahaya, seperti kebakaran, kecelakaan lalu lintas,
                                atau bencana alam. Unit damkar dilatih untuk merespons dengan cepat dan efisien untuk menyelamatkan hewan-hewan yang terperangkap atau terancam
                                dalam berbagai kondisi darurat. <b>Pelayanan dan penanganan 24 jam serta tidak dipungut biaya.</b>
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan card lainnya di sini -->
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col mb-5">
                    <div class="card h-100 text-center">
                        <img src="images/kegiatan_sosial.JPG" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">PENANGANAN SOSIAL</h5>
                            <p class="card-text" style="text-align: justify;">
                                Penanganan sosial oleh unit pemadam kebakaran (damkar) melibatkan berbagai aspek dalam membantu masyarakat selama dan setelah kejadian darurat
                                seperti evakuasi dan penyelamatan, edukasi masyarakat, bantuan sosial maupun logistik dan sebagainya. <b>Pelayanan dan penanganan 24 jam serta tidak dipungut biaya.</b>
                            </p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100 text-center">
                        <img src="images/damkarbwi.jpg" class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">DOKUMENTASI KEGIATAN</h5>
                            <p class="card-text" style="text-align: justify;">
                                Pengunjung dapat melihat beberapa dokumentasi kegiatan Pelayanan dan penanganan yang dilakukan oleh Dinas Pemadam Kebakaran dan Penyelamatan Kabupaten Banyuwangi.
                            </p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" onclick="window.location.href = '${cardData.link}';">Lihat Dokumentasi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
