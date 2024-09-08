@extends('admin.layout.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>Submit Tugas</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ route('KategoriKegiatan.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('Penugasan.index') }}">Monitoring Tanggungan Kinerja</a></li>
                <li class="breadcrumb-item active">Submit Tugas</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <b>FORM PENGUMPULAN TUGAS</b>
                </div>
                <div class="card-body">
                    <form action="{{ route('Penugasan.submitUpdate', $penugasan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="kategori_kegiatan" class="form-label">Kegiatan</label>
                            <select name="kategori_kegiatan" id="kategori_kegiatan" class="form-control" disabled>
                                @foreach ($kategoriKegiatan as $kategori)
                                    <option value="{{ $kategori->id }}" {{ $kategori->id == $penugasan->kategori_kegiatan_id ? 'selected' : '' }}>
                                        {{ $kategori->kategori_kegiatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tertugas" class="form-label">Tertugas</label>
                            <input type="text" class="form-control" id="tertugas" name="tertugas" value="{{ auth()->user()->name }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">File PDF</label>
                            @if($penugasan->file)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $penugasan->file) }}" target="_blank">
                                        <i class="fas fa-file-pdf" style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i>
                                        {{ basename($penugasan->file) }}
                                    </a>
                                </div>
                                <p>Anda sudah mengupload file. Jika ingin mengubahnya, silakan unggah file baru di bawah ini.</p>
                            @else
                                <p>Anda belum mengupload file. Silakan unggah file di bawah ini.</p>
                            @endif
                            <input type="file" class="form-control" id="file" name="file">
                        </div>

                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="3">{{ old('catatan', $penugasan->catatan) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Tugas</button>
                        <a href="{{ route('Penugasan.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
