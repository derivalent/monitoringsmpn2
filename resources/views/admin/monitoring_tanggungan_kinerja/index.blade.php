@extends('admin.layout.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>MONITORING - TANGGUNGAN KINERJA</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Monitoring Tanggungan Kinerja</li>
            </ol>
            @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-12 d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center">
                                    <i class="fa-regular fa-newspaper"></i> &nbsp;
                                    <b class="ms-2">MONITORING TANGGUNGAN KINERJA | STATUS</b>
                                </div>
                                <!-- Formulir Pencarian dan Tombol Aksi -->
                                <div class="d-flex align-items-center flex-wrap">
                                    <form method="GET" action="{{ route('Penugasan.index') }}"
                                        class="d-flex align-items-center">
                                        <!-- Dropdown Pilih Bulan -->
                                        <div class="me-3 mb-2">
                                            <select name="bulan" id="select-semester" class="form-select form-select-sm">
                                                <option value="">-Pilih Bulan-</option>
                                                @foreach (range(1, 12) as $month)
                                                    <option value="{{ $month }}">
                                                        {{ date('F', mktime(0, 0, 0, $month, 10)) }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Dropdown Pilih Tahun -->
                                        <div class="me-3 mb-2">
                                            <select name="tahun" id="select-year" class="form-select form-select-sm">
                                                <option value="">-Pilih Tahun-</option>
                                                @foreach ($tahun as $thn)
                                                    <option value="{{ $thn->data_tahun }}">{{ $thn->data_tahun }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Tombol Search -->
                                        <div class="me-3 mb-2">
                                            <button type="submit" class="btn btn-primary btn-sm me-2">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </form>

                                    <!-- Tombol Print -->
                                    <div class="me-3 mb-2 d-flex">
                                        {{-- <a class="btn btn-danger btn-sm" href="{{ route('Penugasan.print') }}">
                                            <i class="fa-solid fa-print"></i>
                                        </a> --}}
                                        <a class="btn btn-danger btn-sm" href="{{ route('penugasan.print.all') }}">
                                            <i class="fa-solid fa-print"></i> Cetak Semua
                                        </a>
                                        {{-- <a href="{{ route('cetak-laporan') }}" class="btn btn-danger btn-sm">Cetak Laporan</a> --}}
                                    </div>

                                    <!-- Tombol Tambah -->
                                    <div class="mb-2">
                                        <a class="btn btn-success btn-sm" href="{{ route('Penugasan.create') }}">
                                            <i class="fa fa-plus"></i> &nbsp;Tambah
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tertugas</th>
                                    <th>File</th>
                                    <th>Kegiatan</th>
                                    <th>Status</th>
                                    <th>Progress</th> <!-- New Progress Column -->
                                    <th>Detail</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penugasan as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->tertugas }}</td>
                                        {{-- <td class="tampilantabel">
                                            <a href="{{ Storage::url($item->file) }}" target="_blank">
                                                <i class="fas fa-file-pdf" style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i>
                                            </a>
                                        </td> --}}
                                        <td class="tampilantabel">
                                            <a href="{{ Storage::url($item->file) }}" target="_blank">
                                                <i class="fas fa-file-pdf"
                                                    style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i>
                                            </a>
                                        </td>
                                        {{-- <td class="tampilantabel">
                                            <a href="{{ asset('storage/' . $item->file) }}" target="_blank">
                                                <i class="fas fa-file-pdf"
                                                    style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i>
                                            </a>
                                        </td> --}}
                                        {{-- <td><img src="{{ asset('storage/images_berita/' . $item->gambar) }}" alt="{{ $item->judul }}" width="100"></td> --}}
                                        {{-- <td>{{ $item->kegiatan }}</td> --}}
                                        <td>{{ $item->kategoriKegiatan->kategori_kegiatan ?? 'N/A' }}</td>
                                        <td>
                                            <div class="status-{{ strtolower($item->status) }}">{{ $item->status }}</div>
                                        </td>

                                        <td>
                                            <form action="{{ route('Penugasan.changeStatus', $item->id) }}" method="POST"
                                                style="display: flex; justify-content: center; gap: 8px;">
                                                @csrf
                                                <button type="submit" name="status" value="Diperbaiki"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-wrench"></i>
                                                </button>
                                                <button type="submit" name="status" value="Ditolak"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <button type="submit" name="status" value="Selesai"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#detailModal-{{ $item->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                        <td style="white-space: nowrap;">
                                            <div
                                                style="display: flex; justify-content: space-around; align-items: center; gap: 8px;">
                                                <form action="{{ route('Penugasan.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm"
                                                        style="background: none; border: none; color: red; padding: 0;"
                                                        onclick="return confirm('Yakin ingin menghapus?')">
                                                        <i class="fas fa-trash-alt" style="font-size: 15px;"></i>
                                                    </button>
                                                </form>
                                                <a class="btn btn-sm" href="{{ route('Penugasan.edit', $item->id) }}"
                                                    style="background: none; border: none; color: orange; padding: 0;">
                                                    <i class="fas fa-edit" style="font-size: 15px;"></i>
                                                </a>
                                                <form action="{{ route('Penugasan.submit', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm"
                                                        style="background: none; border: none; color: rgb(6, 91, 229); padding: 0;">
                                                        <i class="fa-solid fa-file-import" style="font-size: 15px;"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="detailModal-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="detailModalLabel-{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModalLabel-{{ $item->id }}">
                                                        <b>DETAIL PENUGASAN</b>
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="detail-item">
                                                        <span class="detail-label">Penugas</span>
                                                        <span class="detail-value">:
                                                            &nbsp;{{ $item->nama_penugas }}</span>
                                                    </div>
                                                    <div class="detail-item">
                                                        <span class="detail-label">Tertugas</span>
                                                        <span class="detail-value">: &nbsp;{{ $item->tertugas }}</span>
                                                    </div>
                                                    <div class="detail-item">
                                                        <span class="detail-label">File</span>
                                                        <span class="detail-value">: &nbsp;<a
                                                                href="{{ Storage::url($item->file) }}" target="_blank"><i
                                                                    class="fas fa-file-pdf"
                                                                    style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i></a></span>
                                                    </div>
                                                    {{-- <div class="detail-item">
                                                        <span class="detail-label">Kegiatan</span>
                                                        <span class="detail-value">: &nbsp;{{ $item->kegiatan }}</span>
                                                    </div> --}}
                                                    <div class="detail-item">
                                                        <span class="detail-label">Kegiatan</span>
                                                        <span class="detail-value">:
                                                            &nbsp;{{ $item->kategoriKegiatan->kategori_kegiatan ?? 'N/A' }}</span>
                                                    </div>
                                                    <div class="detail-item">
                                                        <span class="detail-label">Status</span>
                                                        <span class="detail-value">: &nbsp;{{ $item->status }}</span>
                                                    </div>
                                                    <div class="detail-item">
                                                        <span class="detail-label">Deadline</span>
                                                        <span class="detail-value">: &nbsp;{{ $item->deadline }}</span>
                                                    </div>
                                                    <div class="detail-item">
                                                        <span class="detail-label">Catatan</span>
                                                        <span class="detail-value">: &nbsp;{{ $item->catatan }}</span>
                                                    </div>
                                                    <div class="detail-item">
                                                        <span class="detail-label">Tanggal Pengumpulan</span>
                                                        <span class="detail-value">:
                                                            &nbsp;{{ $item->pengumpulan ?? 'Belum Dikirim' }}</span>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            @endif


            @if (Auth::user()->role == 3)
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-12 d-flex align-items-center justify-content-between flex-wrap">
                                <div class="d-flex align-items-center">
                                    <i class="fa-regular fa-newspaper"></i> &nbsp;
                                    <b class="ms-2">MONITORING TANGGUNGAN KINERJA | STATUS</b>
                                </div>
                                <!-- Formulir Pencarian dan Tombol Aksi -->
                                <div class="d-flex align-items-center flex-wrap">
                                    <form method="GET" action="{{ route('Penugasan.index') }}"
                                        class="d-flex align-items-center">
                                        <!-- Dropdown Pilih Bulan -->
                                        <div class="me-3 mb-2">
                                            <select name="bulan" id="select-semester"
                                                class="form-select form-select-sm">
                                                <option value="">-Pilih Bulan-</option>
                                                @foreach (range(1, 12) as $month)
                                                    <option value="{{ $month }}">
                                                        {{ date('F', mktime(0, 0, 0, $month, 10)) }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Dropdown Pilih Tahun -->
                                        <div class="me-3 mb-2">
                                            <select name="tahun" id="select-year" class="form-select form-select-sm">
                                                <option value="">-Pilih Tahun-</option>
                                                @foreach ($tahun as $thn)
                                                    <option value="{{ $thn->data_tahun }}">{{ $thn->data_tahun }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Tombol Search -->
                                        <div class="me-3 mb-2">
                                            <button type="submit" class="btn btn-primary btn-sm me-2">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </form>

                                    <!-- Tombol Print -->
                                    <div class="me-3 mb-2 d-flex">
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fa-solid fa-print"></i>
                                        </a>
                                    </div>

                                    <!-- Tombol Tambah -->
                                    {{-- <div class="mb-2">
                                        <a class="btn btn-success btn-sm" href="{{ route('Penugasan.create') }}">
                                            <i class="fa fa-plus"></i> &nbsp;Tambah
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="datatablesSimple">
                            <thead>
                                <tr class="tampilantabel">
                                    <th>No</th>
                                    <th>Tertugas</th>
                                    <th>File</th>
                                    <th>Kegiatan</th>
                                    <th>Status</th>
                                    {{-- <th>Progress</th> <!-- New Progress Column --> --}}
                                    <th>Detail</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penugasan as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->tertugas }}</td>
                                        {{-- <td class="tampilantabel">
                                                <a href="{{ Storage::url($item->file) }}" target="_blank">
                                                    <i class="fas fa-file-pdf" style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i>
                                                </a>
                                            </td> --}}
                                        <td class="tampilantabel">
                                            <a href="{{ Storage::url($item->file) }}" target="_blank">
                                                <i class="fas fa-file-pdf"
                                                    style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i>
                                            </a>
                                        </td>
                                        {{-- <td>{{ $item->kegiatan }}</td> --}}
                                        <td>{{ $item->kategoriKegiatan->kategori_kegiatan ?? 'N/A' }}</td>
                                        <td>
                                            <div class="status-{{ strtolower($item->status) }}">{{ $item->status }}</div>
                                        </td>

                                        {{-- <td>
                                            <form action="{{ route('Penugasan.changeStatus', $item->id) }}"
                                                method="POST" style="display: flex; justify-content: center; gap: 8px;">
                                                @csrf
                                                <button type="submit" name="status" value="Diperbaiki"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-wrench"></i>
                                                </button>
                                                <button type="submit" name="status" value="Ditolak"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <button type="submit" name="status" value="Selesai"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                        </td> --}}

                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#detailModal-{{ $item->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </td>
                                        <td style="white-space: nowrap;">
                                            <div
                                                style="display: flex; justify-content: space-around; align-items: center; gap: 8px;">
                                                {{-- <form action="{{ route('Penugasan.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm"
                                                        style="background: none; border: none; color: red; padding: 0;"
                                                        onclick="return confirm('Yakin ingin menghapus?')">
                                                        <i class="fas fa-trash-alt" style="font-size: 15px;"></i>
                                                    </button>
                                                </form>
                                                <a class="btn btn-sm" href="{{ route('Penugasan.edit', $item->id) }}"
                                                    style="background: none; border: none; color: orange; padding: 0;">
                                                    <i class="fas fa-edit" style="font-size: 15px;"></i>
                                                </a> --}}
                                                <form action="{{ route('Penugasan.submit', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm"
                                                        style="background: none; border: none; color: rgb(6, 91, 229); padding: 0;">
                                                        <i class="fa-solid fa-file-import" style="font-size: 15px;"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal Detail -->
                                    <div class="modal fade" id="detailModal-{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="detailModalLabel-{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModalLabel-{{ $item->id }}">
                                                        <b>DETAIL PENUGASAN</b>
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="detail-item">
                                                        <span class="detail-label">Penugas</span>
                                                        <span class="detail-value">:
                                                            &nbsp;{{ $item->nama_penugas }}</span>
                                                    </div>
                                                    <div class="detail-item">
                                                        <span class="detail-label">Tertugas</span>
                                                        <span class="detail-value">: &nbsp;{{ $item->tertugas }}</span>
                                                    </div>
                                                    <div class="detail-item">
                                                        <span class="detail-label">File</span>
                                                        <span class="detail-value">: &nbsp;<a
                                                                href="{{ Storage::url($item->file) }}" target="_blank"><i
                                                                    class="fas fa-file-pdf"
                                                                    style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i></a></span>
                                                    </div>
                                                    {{-- <div class="detail-item">
                                                            <span class="detail-label">Kegiatan</span>
                                                            <span class="detail-value">: &nbsp;{{ $item->kegiatan }}</span>
                                                        </div> --}}
                                                    <div class="detail-item">
                                                        <span class="detail-label">Kegiatan</span>
                                                        <span class="detail-value">:
                                                            &nbsp;{{ $item->kategoriKegiatan->kategori_kegiatan ?? 'N/A' }}</span>
                                                    </div>
                                                    <div class="detail-item">
                                                        <span class="detail-label">Status</span>
                                                        <span class="detail-value">: &nbsp;{{ $item->status }}</span>
                                                    </div>
                                                    <div class="detail-item">
                                                        <span class="detail-label">Deadline</span>
                                                        <span class="detail-value">: &nbsp;{{ $item->deadline }}</span>
                                                    </div>
                                                    <div class="detail-item">
                                                        <span class="detail-label">Catatan</span>
                                                        <span class="detail-value">: &nbsp;{{ $item->catatan }}</span>
                                                    </div>
                                                    <div class="detail-item">
                                                        <span class="detail-label">Tanggal Pengumpulan</span>
                                                        <span class="detail-value">:
                                                            &nbsp;{{ $item->pengumpulan ?? 'Belum Dikirim' }}</span>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            @endif


        </div>



        {{-- <div class="card-body">
                    <table class="table table-striped table-bordered" id="datatablesSimple">
                        <thead>
                            <tr class="tampilantabel">
                                <th>No</th>
                                <th>Nama Penugas</th>
                                <th>Tertugas</th>
                                <th>File</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Catatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penugasan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama_penugas }}</td>
                                    <td>{{ $item->tertugas }}</td>
                                    <td class="tampilantabel">
                                        <a href="{{ Storage::url('files/' . $item->file) }}" target="_blank">
                                            <i class="fas fa-file-pdf"
                                                style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i>
                                        </a>
                                    </td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>
                                        <div class="status-{{ strtolower($item->status) }}">{{ $item->status }}</div>
                                    </td>
                                    <td>{{ $item->catatan }}</td>
                                    <td>
                                        <form action="{{ route('Penugasan.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                        </form>
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('Penugasan.edit', $item->id) }}">Edit</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div> --}}
        </div>
        </div>
    </main>
@endsection
