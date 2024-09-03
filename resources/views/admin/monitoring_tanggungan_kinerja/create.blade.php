@extends('admin.layout.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>Tambah Tugas Baru</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ route('KategoriKegiatan.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('Penugasan.index') }}">Monitoring Tanggungan Kinerja</a>
                </li>
                <li class="breadcrumb-item active">Tambah Tugas Baru</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <b>Form Tambah Tugas</b>
                </div>
                <div class="card-body">
                    <form action="{{ route('Penugasan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama Penugas (Auto-filled) -->
                        <div class="mb-3">
                            <label for="nama_penugas" class="form-label">Nama Penugas</label>
                            <input type="text" class="form-control" id="nama_penugas" name="nama_penugas"
                                value="{{ auth()->user()->name }}" readonly>
                        </div>

                        <!-- Tertugas -->
                        <div class="mb-3">
                            <label for="tertugas" class="form-label">Tertugas</label>
                            <div class="checkbox-container">
                                @foreach ($users as $user)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tertugas[]"
                                            value="{{ $user->name }}" id="user{{ $user->id }}">
                                        <label class="form-check-label" for="user{{ $user->id }}">
                                            {{ $user->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- File PDF -->
                        <div class="mb-3">
                            <label for="file" class="form-label">File PDF</label>
                            <input type="file" class="form-control" id="file" name="file">
                        </div>

                        <!-- Kegiatan -->
                        <div class="mb-3">
                            <label for="kegiatan" class="form-label">Kegiatan</label>
                            <select class="form-select" id="kegiatan" name="kegiatan" required>
                                @foreach ($kategoriKegiatan as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->kategori_kegiatan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="Tugas-Baru">Tugas Baru</option>
                                <option value="Terkirim">Terkirim</option>
                                <option value="Diperbaiki">Diperbaiki</option>
                                <option value="Ditolak">Ditolak</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>

                        <!-- Catatan -->
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                        </div>

                        <!-- Deadline -->
                        <div class="mb-3">
                            <label for="deadline" class="form-label">Deadline</label>
                            <input type="date" class="form-control" id="deadline" name="deadline">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('Penugasan.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
