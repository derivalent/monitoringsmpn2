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
                        {{-- <div class="mb-3">
                            <label for="tertugas" class="form-label">Tertugas</label>
                            @foreach ($users as $user)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="tertugas[]"
                                        value="{{ $user->name }}" id="user{{ $user->id }}">
                                    <label class="form-check-label" for="user{{ $user->id }}">
                                        {{ $user->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div> --}}
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

                        {{-- <div class="mb-3">
                            <label for="tertugas" class="form-label">Tertugas</label>
                            <div class="checkbox-grid">
                                @foreach ($users as $user)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tertugas[]"
                                            value="{{ $user->name }}" id="user{{ $user->id }}"
                                            {{ in_array($user->name, explode(',', $penugasan->tertugas)) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="user{{ $user->id }}">
                                            {{ $user->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div> --}}

                        <div class="mb-3">
                            <label for="file" class="form-label">File PDF</label>
                            <input type="file" class="form-control" id="file" name="file">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required></textarea>
                        </div>
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
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

    </main>
@endsection
