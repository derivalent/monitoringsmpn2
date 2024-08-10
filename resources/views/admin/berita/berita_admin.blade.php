@extends('admin.layout.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4"><b>BERITA ADMIN</b></h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ 'dashboard_admin' }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Berita Admin</li>
        </ol>
        {{-- <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><b>BERITA</b></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Lihat</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body"><b>PENUGASAN</b></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Lihat</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body"><b>MONITORING</b></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Lihat</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Kategori Kegiatan
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Tahun
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
        </div> --}}
        <div class="card mb-4">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-between" style="padding-bottom: 20px;">
                        <div class="d-flex align-items-center">
                            <i class="fa-regular fa-newspaper" style="color: #000000;"></i>
                            <b class="ms-2">KONTEN BERITA</b>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="me-3 ">
                                <select id="select-state" placeholder="Pick a state..." data-mdb-filter="true" class="form-select form-select-sm" style="width: 150px;">
                                    <option value="">-Pilih Bulan-</option>
                                    <option value="JA">Januari</option>
                                    <option value="FE">Februari</option>
                                    <option value="MA">Maret</option>
                                    <option value="AP">April</option>
                                    <option value="ME">Mei</option>
                                    <option value="JU">Juni</option>
                                    <option value="JL">Juli</option>
                                    <option value="AG">Agustus</option>
                                    <option value="SE">September</option>
                                    <option value="OK">Oktober</option>
                                    <option value="NO">November</option>
                                    <option value="DE">Desember</option>
                                </select>
                            </div>
                            <div class="me-3">
                                <select id="select-year" class="form-select form-select-sm" style="width: 120px;">
                                    <option value="">-Pilih Tahun-</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                </select>
                            </div>
                            <div class="me-3">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-search"></i>
                                </a>
                            </div>
                            <a class="btn btn-success btn-sm" href="{{ route ('Berita.create') }}">
                                <i class="fa fa-plus"></i> &nbsp;Tambah
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="card-body">
                <table class="table table-striped table-bordered" id="datatablesSimple">
                    <thead>
                        <tr class="tampilantabel">
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th>Isi</th>
                            <th>Button</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh baris data -->
                        <tr>
                            <td>Judul Contoh</td>
                            <td><img src="path/to/image.jpg" alt="Gambar" style="width: 100px;"></td>
                            <td class="isi-konten">Isi contoh sdjkbfgsjkgbkontennnnnnnnnnkjksjhdfsjakfbnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn.</td>
                            <td class="tampilantabel">
                                <button class="btn btn-primary btn-sm" onclick="editItem(this)">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteItem(this)">Delete</button>
                            </td>
                        </tr>
                        <!-- Tambahkan baris data lainnya di sini -->
                    </tbody>
                </table>
            </div> --}}
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
                        @foreach($berita as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->judul }}</td>
                            <td><img src="{{ asset('storage/images_berita/' . $item->gambar) }}" alt="{{ $item->judul }}" width="100"></td>
                            {{-- <td>{{ $item->isi }}</td> --}}
                            <td><a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal" data-gambar="{{ asset('storage/images_berita/' . $item->gambar) }}" data-judul="{{ $item->judul }}" data-isi="{{ $item->isi }}">
                                <i class="fas fa-eye"></i> View
                            </a></td>
                            <td>
                                <a href="{{ route('Berita.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('Berita.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Hapus</button>
                                </form>
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
document.addEventListener('DOMContentLoaded', function () {
    var viewModal = document.getElementById('viewModal');
    viewModal.addEventListener('show.bs.modal', function (event) {
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
