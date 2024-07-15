<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMPN 2 SEMPU</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <link href="{{ asset('public/css/style_public.css') }}" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="{{ asset ('css/style_public.css') }}" />



    {{-- <style>
        #grafik-container {
            width: 600px;
            height: 400px;
        }

        .navbar-brand .logo-img {
            width: 15vw;
            /* Ukuran gambar responsif */
            max-width: 150px;
            /* Batasan maksimum ukuran gambar */
            height: auto;
            /* Menjaga proporsi gambar */
            margin-right: 10px;
            /* Menambahkan jarak antara gambar dan teks */
        }

        @media (max-width: 768px) {
            .navbar-brand .logo-img {
                min-width: 110px;
                /* Batasan minimum ukuran gambar untuk tablet dan handphone */
            }
        }

        .bg-medium-blue {
            background-color: #0000CD;
            /* Medium blue */
        }

        .navbar .brand-text {
            color: white;
            /* Warna teks putih */
            margin-top: 5px;
            /* Jarak atas */
            margin-bottom: 0;
            /* Hapus margin bawah */
        }

        @media (max-width: 576px) {
            .navbar .brand-text {
                margin-top: 0;
                /* Jarak atas */
                font-size: 0.8rem;
                /* Ukuran teks untuk perangkat seluler */
            }
        }

        .red-box {
            background-color: crimson;
            padding: 7px;
            border-radius: 3px;
        }

        .blue-box {
            background-color: mediumblue;
            padding: 7px;
            border-radius: 3px;
        }

        .box-shadow {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 -4px 6px rgba(0, 0, 0, 0.1), 4px 0 6px rgba(0, 0, 0, 0.1), -4px 0 6px rgba(0, 0, 0, 0.1);
        }

        .card {
            /* border: 1px solid red; Memberikan border merah */
            box-shadow: 0 9px 9px rgba(1, 1, 1, 0.1);
            /* Memberikan shadow */
        }


        /* Atur lebar dan tinggi gambar dalam kartu */
        .card-img-top {
            width: 100%;
            /* Lebar maksimum */
            height: 200px;
            /* Tinggi tetap */
            object-fit: cover;
            /* Memastikan gambar terpotong atau memperluas sesuai proporsi yang ditetapkan */
        }

        .card-title {
            font-weight: bold;
            /* Membuat judul tebal */
            color: black;
            /* Mengubah warna teks menjadi hitam */
            text-decoration: none;
            /* Menghapus garis bawah */
            font-weight: bold;
        }

        canvas {
            width: 100%;
            height: auto;
        }

        .chart-title {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .box-shadow {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 -4px 6px rgba(0, 0, 0, 0.1), 4px 0 6px rgba(0, 0, 0, 0.1), -4px 0 6px rgba(0, 0, 0, 0.1);
        }

        .rounded-box {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3), 0 -4px 6px rgba(0, 0, 0, 0.3), 4px 0 6px rgba(0, 0, 0, 0.3), -4px 0 6px rgba(0, 0, 0, 0.3);
            padding: 20px;
            margin: 20px 0;
        }

        .rounded-background1 {
            background-color: crimson;
            border-radius: 15px;
            /* Sudut tumpul */
            padding: 20px;
            /* Spasi dalam */
            display: inline-block;
            color: white;
        }

        .rounded-background2 {
            background-color: mediumblue;
            border-radius: 15px;
            /* Sudut tumpul */
            padding: 20px;
            /* Spasi dalam */
            display: inline-block;
            color: white;
        }

        .recent-post-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
        }

        .recent-posts-container {
            max-height: 400px;
            max-width: 100%;
            overflow-y: scroll;
        }

        .list-group-item {
            display: flex;
            align-items: center;
            padding: 0.5rem;
        }

        .list-group-item img {
            flex-shrink: 0;
        }

        .list-group-item div {
            flex-grow: 1;
            padding-left: 0.5rem;
        }


        .footer {
            background-color: #0000CD;
            color: #fff;
            padding: 20px 0;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer .contact-info i {
            color: #ffc107;
            font-size: 24px;
            margin-right: 10px;
            /* Tambahkan margin kanan pada ikon */
        }

        .footer .social-icons a {
            color: #fff;
            margin-right: 15px;
            font-size: 24px;
        }

        .footer .bottom-bar {
            /* background-color: #000; */
            background-color: rgba(137, 174, 226, 0.375);
            color: #fff;
            padding: 10px 0;
        }
    </style> --}}
</head>

<body>
   @include('public.layout.header')
    <!-- slide gambar -->
    @yield('content')

    @include('public.layout.footer')

    <!-- <footer class="footer bg-gradient bg-medium-blue">
        <div class="container py-4">
            <div class="row align-items-center">

                <div class="col-md-6 mb-2">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-3">
                            <a href="#">
                                <i class="fab fa-facebook fa-lg text-white"></i>
                            </a>
                        </li>
                        <li class="list-inline-item me-3">
                            <a href="#">
                                <i class="fab fa-twitter fa-lg text-white"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-instagram fa-lg text-white"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6 mb-3"> <b>
                    <p class="text-white mb-0">Dinas Pemadam Kebakaran dan Penyelamatan Kabupaten Banyuwangi.</p>
                    <p class="text-white mb-0">Nomor Telepon : 088888888888 / 112</p>
                    <p class="text-white mb-0">Email : </p> </b>
                </div>
                <button class="col-md-2" id="scroll-to-top-btn" class="btn btn-primary" style="display: none;">Scroll to Top</button>
            </div>
        </div>
    </footer> -->
    <!-- Bootstrap JavaScript (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script_public.js') }}"></script>
    <script src="{{ asset('js/display_card_berita.js') }}"></script>
    <script src="{{ asset('js/recent_post_berita.js') }}"></script>

</body>


</html>
