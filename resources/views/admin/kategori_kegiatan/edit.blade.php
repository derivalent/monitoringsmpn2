@extends('admin.layout.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4"><b>KATEGORI KEGIATAN - ADMIN </b></h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ 'dashboard_admin' }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Form Edit Kategori Kegiatan</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <b>EDIT KATEGORI KEGIATAN</b>
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('KategoriKegiatan.update', $kategoriKegiatan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="kategori_kegiatan" class="form-label">Kategori Kegiatan :</label>
                    <input type="text" class="form-control" id="kategori_kegiatan" name="kategori_kegiatan" value="{{ old('kategori_kegiatan', $kategoriKegiatan->kategori_kegiatan) }}" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan  :</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan', $kategoriKegiatan->keterangan) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
                {{-- <form action="{{ route('KategoriKegiatan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kategori_kegiatan" class="form-label">Kategori Kegiatan :</label>
                        <input type="text" class="form-control" id="kategori_kegiatan" name="kategori_kegiatan" value="#" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan  :</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form> --}}
            </div>
        </div>
    </div>
</main>
@endsection
