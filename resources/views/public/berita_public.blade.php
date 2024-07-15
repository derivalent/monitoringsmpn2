@extends('public.layout.main')
@section('content')
<main class="container">
    <div class="row">
        <div class="col-md-12 py-2 mt-2">
            <div class="col-md-12 py-2 mt-2">
                <h2 class="mb-4" style="color:black"><center><b>BERITA TERBARU</b></center></h2>
                <!-- Pagination -->
                <div id="card-container-berita" class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Isi card di sini -->
                </div>
                <nav id="pagination" aria-label="Page navigation" class="mt-3 mb-3">
                    <ul class="pagination justify-content-center">
                        <!-- Tombol halaman akan ditambahkan di sini secara dinamis -->
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</main>
@endsection
