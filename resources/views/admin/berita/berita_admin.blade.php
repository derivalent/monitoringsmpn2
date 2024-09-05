@extends('admin.layout.main')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>BERITA ADMIN</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ 'dashboard_admin' }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Berita Admin</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12 d-flex align-items-center justify-content-between" style="padding-bottom: 20px;">
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-newspaper" style="color: #000000;"></i>
                                <b class="ms-2">KONTEN BERITA</b>
                            </div>
                            <div class="d-flex align-items-center flex-wrap">
                                <form method="GET" action="{{ route('Berita.index') }}" class="d-flex align-items-center">
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


                                <!-- Tombol Tambah -->
                                <div class="mb-2">
                                    <a class="btn btn-success btn-sm" href="{{ route('Berita.create') }}">
                                        <i class="fa fa-plus"></i> &nbsp;Tambah
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="card-body">
                    {{-- <table id="datatablesSimple" class="table table-striped table-bordered"> --}}
                    <table id="datatablesSimple" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Gambar</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berita as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td><img src="{{ asset('storage/images_berita/' . $item->gambar) }}" alt="{{ $item->judul }}" width="100"></td>
                                    {{-- <td><img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" width="100"></td> --}}
                                    {{-- <td><img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                            width="100"></td> --}}


                                    {{-- <td>{{ $item->isi }}</td> --}}
                                    <td><a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#viewModal"
                                            data-gambar="{{ asset('storage/images_berita/' . $item->gambar) }}"
                                            data-judul="{{ $item->judul }}" data-isi="{{ $item->isi }}">
                                            <i class="fas fa-eye"></i> View
                                        </a></td>
                                    {{-- <td>
                                <a href="{{ route('Berita.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('Berita.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Hapus</button>
                                </form>
                            </td> --}}
                                    <td style="white-space: nowrap;">
                                        <div
                                            style="display: flex; justify-content: space-around; align-items: center; gap: 4px;">
                                            <form action="{{ route('Berita.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm"
                                                    style="background: none; border: none; color: red; padding: 0;"
                                                    onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash-alt" style="font-size: 15px;"></i>
                                                </button>
                                            </form>
                                            <a class="btn btn-sm" href="{{ route('Berita.edit', $item->id) }}"
                                                style="background: none; border: none; color: orange; padding: 0;">
                                                <i class="fas fa-edit" style="font-size: 15px;"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Detail Berita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card mb-4">
                        <img src="" id="modalGambar" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title" id="modalJudul"></h5>
                            <p class="card-text" id="modalIsi"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var viewModal = document.getElementById('viewModal');
            viewModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var gambar = button.getAttribute('data-gambar');
                var judul = button.getAttribute('data-judul');
                var isi = button.getAttribute('data-isi');

                var modalGambar = viewModal.querySelector('#modalGambar');
                var modalJudul = viewModal.querySelector('#modalJudul');
                var modalIsi = viewModal.querySelector('#modalIsi');

                modalGambar.src = gambar;
                modalJudul.textContent = judul;
                modalIsi.textContent = isi;
            });
        });
    </script>
@endsection
