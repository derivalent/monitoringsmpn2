{{-- @extends('admin.layout.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4"><b>TAMBAH BERITA ADMIN</b></h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('KategoriKegiatan.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('Berita.index') }}">Berita Admin</a></li>
            <li class="breadcrumb-item active">Tambah Berita Admin</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                Tambah Berita Admin
            </div>
            <div class="card-body">
                <form action="{{ route('Berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="gambar">Gambar:</label>
                        <input type="file" name="gambar" id="gambar" class="form-control-file" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="isi" class="form-label">Isi</label>
                        <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>
 --}}




{{-- ini ck editor bisa --}}
{{--
 @extends('admin.layout.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4"><b>TAMBAH BERITA ADMIN</b></h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('KategoriKegiatan.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('Berita.index') }}">Berita Admin</a></li>
            <li class="breadcrumb-item active">Tambah Berita Admin</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                Tambah Berita Admin
            </div>
            <div class="card-body">
                <form action="{{ route('Berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="gambar">Gambar:</label>
                        <input type="file" name="gambar" id="gambar" class="form-control-file" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="isi" class="form-label">Isi</label>
                        <textarea type="text" class="form-control" id="isi" name="isi" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#isi'))
        .catch(error => {
            console.error(error);
        });

    document.querySelector('#beritaForm').addEventListener('submit', function (e) {
        document.querySelector('#isi').value = ClassicEditor.instances.isi.getData();
    });
</script>
@endsection --}}








@extends('admin.layout.main')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>TAMBAH BERITA ADMIN</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ route('KategoriKegiatan.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('Berita.index') }}">Berita Admin</a></li>
                <li class="breadcrumb-item active">Tambah Berita Admin</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    Tambah Berita Admin
                </div>
                <div class="card-body">
                    <form id="beritaForm" action="{{ route('Berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="gambar">Gambar:</label>
                            <input type="file" name="gambar" id="gambar" class="form-control-file" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="isi" class="form-label">Isi</label>
                            <textarea class="form-control" id="isi" name="isi" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
{{-- 
@section('scripts')
    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script>
        let editorInstance;
        ClassicEditor
            .create(document.querySelector('#isi'))
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => {
                console.error(error);
            });

        document.querySelector('#beritaForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Set the value of the textarea to the HTML content of the editor
            document.querySelector('#isi').value = editorInstance.getData();
            // Submit the form
            this.submit();
        });
    </script>
@endsection --}}
