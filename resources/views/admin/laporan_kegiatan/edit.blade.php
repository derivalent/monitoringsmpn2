@extends('admin.layout.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4"><b>Edit Laporan Kegiatan</b></h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('KategoriKegiatan.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('LaporanKegiatan.index') }}">Laporan Kegiatan</a></li>
            <li class="breadcrumb-item active">Edit Laporan Kegiatan</li>
        </ol>
        {{-- @if(Auth::user()->role == 1 || Auth::user()->role == 2) --}}
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('LaporanKegiatan.update', $laporanKegiatan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $laporanKegiatan->nama }}" readonly required>
                    </div>

                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-select" id="kategori_id" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoriKegiatan as $kategori)
                                <option value="{{ $kategori->id }}" {{ $laporanKegiatan->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->kategori_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" name="gambar" class="form-control" id="gambar">
                        @if ($laporanKegiatan->gambar)
                            <img src="{{ Storage::url('images_laporan/' . $laporanKegiatan->gambar) }}" alt="Gambar" style="width: 100px; margin-top: 10px;">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" required>{{ $laporanKegiatan->keterangan }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="semester" class="form-label">Semester</label>
                        <input type="text" name="semester" class="form-control" id="semester" value="{{ $laporanKegiatan->semester }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
        {{-- @endif --}}
        {{-- @if(Auth::user()->role == 3)
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('LaporanKegiatan.update', $laporanKegiatan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $laporanKegiatan->nama }}" readonly required>
                    </div>

                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-select" id="kategori_id" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoriKegiatan as $kategori)
                                <option value="{{ $kategori->id }}" {{ $laporanKegiatan->kategori_id == $kategori->id ? 'selected' : '' }}>{{ $kategori->kategori_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" name="gambar" class="form-control" id="gambar">
                        @if ($laporanKegiatan->gambar)
                            <img src="{{ Storage::url('images_laporan/' . $laporanKegiatan->gambar) }}" alt="Gambar" style="width: 100px; margin-top: 10px;">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" required>{{ $laporanKegiatan->keterangan }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="semester" class="form-label">Semester</label>
                        <input type="text" name="semester" class="form-control" id="semester" value="{{ $laporanKegiatan->semester }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
        @endif --}}
    </div>
</main>
@endsection
