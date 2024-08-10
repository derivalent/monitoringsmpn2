@extends('admin.layout.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4"><b>LAPORAN KEGIATAN - ADMIN </b></h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ 'dashboard_admin' }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Form Tambah Laporan Kegiatan</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <b>TAMBAH LAPORAN KEGIATAN</b>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('LaporanKegiatan.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-2">
                        <label for="nama">Nama:</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>

                    {{-- <div class="form-group mb-3">
                        <label for="kategori">Kategori:</label>
                        <input type="text" name="kategori" id="kategori" class="form-control" required>
                    </div> --}}
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori :</label>
                        <select class="form-control" id="kategori_id" name="kategori_id" required>
                             <option value="">-Pilih Kategori Kegiatan-</option>
                            @foreach ($kategoriKegiatan as $kk)
                                <option value="{{ $kk->id }}">{{ $kk->kategori_kegiatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label for="gambar">Gambar:</label>
                        <input type="file" name="gambar" id="gambar" class="form-control-file" required>
                    </div>

                    <div class="form-group mb-2">
                        <label for="keterangan">Keterangan:</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="semester" class="form-label">Semester:</label>
                        <select class="form-control" id="status_pekerjaan" name="semester" required>
                            <option value="">-Pilih Semester-</option>
                            <option value="ganjil">Semester Ganjil</option>
                            <option value="genap">Semester Genap</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('LaporanKegiatan.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
