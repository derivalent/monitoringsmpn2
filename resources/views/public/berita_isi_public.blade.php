{{-- @extends('public.layout.main')
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
@endsection --}}

{{-- ini udah kena, tapi recent postnya gak bisa scroll --}}
@extends('public.layout.main')
@section('content')
    <main class="container">
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/images_berita/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $berita->judul }}</h5>
                            <p class="card-text"><small class="text-muted">Tanggal Rilis: {{ \Carbon\Carbon::parse($berita->created_at)->format('d F Y') }}</small></p>
                            <p class="card-text">{{ $berita->isi }}</p>
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

@section('scripts')
    <script>
        const recentPosts = @json($recentPosts);

        const formattedPosts = recentPosts.map(item => ({
            title: item.judul,
            date: new Date(item.created_at).toLocaleDateString(),
            img: `{{ asset('storage/images_berita') }}/${item.gambar}`,
            link: `{{ url('/berita_isi_public') }}/${item.id}`
        }));

        function sortPostsByDate(posts) {
            return posts.sort((a, b) => new Date(b.date) - new Date(a.date));
        }

        function displayRecentPosts(posts) {
            const sortedPosts = sortPostsByDate(posts);
            const recentPostsContainer = document.getElementById('recent-posts');
            recentPostsContainer.innerHTML = '';

            sortedPosts.forEach(post => {
                const postElement = document.createElement('a');
                postElement.href = post.link;
                postElement.className = 'list-group-item list-group-item-action';

                postElement.innerHTML = `
                    <img src="${post.img}" alt="Gambar Berita Kecil" class="recent-post-img">
                    <div>
                        <h6 class="mb-1">${post.title}</h6>
                        <small class="text-muted">${post.date}</small>
                    </div>
                `;

                recentPostsContainer.appendChild(postElement);
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            displayRecentPosts(formattedPosts);
        });
    </script>
@endsection
