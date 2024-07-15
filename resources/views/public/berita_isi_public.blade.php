@extends('public.layout.main')
@section('content')
<main class="container">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <img src="https://via.placeholder.com/800x400" class="card-img-top" alt="Gambar Berita">
                    <div class="card-body">
                        <h5 class="card-title">Judul Berita</h5>
                        <p class="card-text"><small class="text-muted">Tanggal Rilis: February 19, 2019</small></p>
                        <p class="card-text">Ini adalah isi berita. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Berita Terkini</h5>
                    </div>
                    <div class="list-group list-group-flush recent-posts-container" id="recent-posts">
                        <!-- Recent posts will be dynamically added here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
