@extends('admin.layout.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>Edit Tugas</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ route('KategoriKegiatan.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('Penugasan.index') }}">Monitoring Tanggungan Kinerja</a>
                </li>
                <li class="breadcrumb-item active">Edit Tugas</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <b>Form Edit Tugas</b>
                </div>
                <div class="card-body">
                    <form action="{{ route('Penugasan.update', $penugasan->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <div class="mb-3">
                            <label for="tertugas" class="form-label">Tertugas</label>
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
                        </div> --}}
                        <div class="mb-3">
                            <label for="tertugas" class="form-label">Tertugas</label>
                            <div class="checkbox-container">
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
                        </div>

                        {{-- <div class="mb-3">
                            <label for="file" class="form-label">File PDF</label>
                            @if($penugasan->file)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/files/' . $penugasan->file) }}" target="_blank"><i class="fas fa-file-pdf"
                                        style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i></a>
                                </div>
                            @endif
                            <input type="file" class="form-control" id="file" name="file">
                        </div> --}}
                        <div class="mb-3">
                            <label for="file" class="form-label">File PDF</label>
                            @if($penugasan->file)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/files/' . $penugasan->file) }}" target="_blank">
                                        <i class="fas fa-file-pdf" style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i>
                                        {{ $penugasan->file }}
                                    </a>
                                </div>
                            @endif
                            <input type="file" class="form-control" id="file" name="file" onchange="updateFileName()">
                            <small id="fileName" class="form-text text-muted">
                                @if($penugasan->file)
                                    File yang terpilih: {{ $penugasan->file }}
                                @else
                                    Tidak ada file yang terpilih
                                @endif
                            </small>
                        </div>

                        <script>
                            function updateFileName() {
                                const fileInput = document.getElementById('file');
                                const fileNameDisplay = document.getElementById('fileName');
                                const file = fileInput.files[0];

                                if (file) {
                                    fileNameDisplay.textContent = 'File yang terpilih: ' + file.name;
                                } else {
                                    fileNameDisplay.textContent = 'Tidak ada file yang terpilih';
                                }
                            }
                        </script>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required>{{ $penugasan->keterangan }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="Tugas Baru" {{ $penugasan->status == 'Tugas Baru' ? 'selected' : '' }}>Tugas
                                    Baru</option>
                                <option value="Terkirim" {{ $penugasan->status == 'Terkirim' ? 'selected' : '' }}>Terkirim
                                </option>
                                <option value="Diperbaiki" {{ $penugasan->status == 'Diperbaiki' ? 'selected' : '' }}>
                                    Diperbaiki</option>
                                <option value="Ditolak" {{ $penugasan->status == 'Ditolak' ? 'selected' : '' }}>Ditolak
                                </option>
                                <option value="Selesai" {{ $penugasan->status == 'Selesai' ? 'selected' : '' }}>Selesai
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="3">{{ $penugasan->catatan }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
