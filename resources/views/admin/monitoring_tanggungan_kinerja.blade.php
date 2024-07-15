@extends('admin.layout.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4"><b>MONITORING - TANGGUNGAN KINERJA</b></h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ 'dashboard_admin' }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Monitoring Tanggungan Kinerja</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-between flex-wrap" style="padding-bottom: 20px;">
                        <div class="d-flex align-items-center">
                            <i class="fa-regular fa-newspaper" style="color: #000000;"></i> &nbsp;
                            <b class="ms-2">MONITORING TANGGUNGAN <br> KINERJA  | STATUS</b>
                        </div>
                        <div class="d-flex align-items-center flex-wrap">
                            <div class="me-3 mb-2">
                                <select id="select-semester" class="form-select form-select-sm">
                                    <option value="">-Pilih Semester-</option>
                                    <option value="Semester Ganjil">Semester Ganjil</option>
                                    <option value="Semester Genap">Semester Genap</option>
                                </select>
                            </div>
                            {{-- <div class="me-3 mb-2">
                                <select id="select-semester" class="form-select form-select-sm">
                                    <option value="">-Pilih Guru-</option>
                                    <option value="Guru A">Guru A</option>
                                    <option value="Guru B">Guru B</option>
                                </select>
                            </div> --}}
                            <div class="me-3 mb-2">
                                <select id="select-semester" class="form-select form-select-sm">
                                    <option value="">-Status-</option>
                                    <option value="Guru A">Selesai</option>
                                    <option value="Guru B">Perbaikan</option>
                                    <option value="Guru B">Ditolak</option>
                                </select>
                            </div>
                            <div class="me-3 mb-2">
                                <select id="select-year" class="form-select form-select-sm">
                                    <option value="">-Pilih Tahun-</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                </select>
                            </div>
                            <div class="me-3 mb-2">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-search"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fa-solid fa-print"></i>
                                </a>
                            </div>
                            <a class="btn btn-success btn-sm mb-2" href="#">
                                <i class="fa fa-plus"></i> &nbsp;Tambah
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="datatablesSimple">
                    <thead>
                        <tr class="tampilantabel">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>File</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="tampilantabel">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>File</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        {{-- <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edi</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>$320,800</td>
                        </tr> --}}
                        <tr>
                            <td>1</td>
                            <td>Judul Contoh</td>
                            <td>Kategori Contoh</td>
                            <td class="tampilantabel">
                                <a href="path/to/document.pdf" target="_blank" onclick="openPdf(event, 'path/to/document.pdf')">
                                    <i class="fas fa-file-pdf" style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i>
                                </a>
                            </td>
                            <td class="isi-konten">Isi contoh konten yang panjang...</td>
                            <td>
                                <div class="status-selesai">Selesai</div>
                            </td>
                            <td>Catatan Contoh</td>
                            <td>
                                {{-- <button class="btn btn-warning btn-sm" onclick="editItem(this)"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button class="btn btn-danger btn-sm" onclick="deleteItem(this)"><i class="fa-solid fa-trash-can"></i></button> --}}
                                <button class="btn btn-warning btn-sm" onclick="editItem(this)">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteItem(this)">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Judul Contoh</td>
                            <td>Kategori Contoh</td>
                            <td class="tampilantabel">
                                <a href="path/to/document.pdf" target="_blank" onclick="openPdf(event, 'path/to/document.pdf')">
                                    <i class="fas fa-file-pdf" style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i>
                                </a>
                            </td>
                            <td class="isi-konten">Isi contoh konten yang panjang...</td>
                            <td>
                                <div class="status-selesai">Selesai</div>
                            </td>
                            <td>Catatan Contoh</td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="editItem(this)">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteItem(this)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- <div class="card mb-4">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-between flex-wrap" style="padding-bottom: 20px;">
                        <div class="d-flex align-items-center">
                            <i class="fa-regular fa-newspaper" style="color: #000000;"></i> &nbsp;
                            <b class="ms-2">MONITORING TANGGUNGAN <br> KINERJA  | GURU</b>
                        </div>
                        <div class="d-flex align-items-center flex-wrap">
                            <div class="me-3 mb-2">
                                <select id="select-semester" class="form-select form-select-sm">
                                    <option value="">-Pilih Semester-</option>
                                    <option value="Semester Ganjil">Semester Ganjil</option>
                                    <option value="Semester Genap">Semester Genap</option>
                                </select>
                            </div>
                            <div class="me-3 mb-2">
                                <select id="select-semester" class="form-select form-select-sm">
                                    <option value="">-Pilih Guru-</option>
                                    <option value="Guru A">Guru A</option>
                                    <option value="Guru B">Guru B</option>
                                </select>
                            </div>

                            <div class="me-3 mb-2">
                                <select id="select-year" class="form-select form-select-sm">
                                    <option value="">-Pilih Tahun-</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                </select>
                            </div>
                            <div class="me-3 mb-2">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-search"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fa-solid fa-print"></i>
                                </a>
                            </div>
                            <a class="btn btn-success btn-sm mb-2" href="#">
                                <i class="fa fa-plus"></i> &nbsp;Tambah
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="tampilantabel">
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>File</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Catatan</th>
                            <th>Button</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Judul Contoh</td>
                            <td>Kategori Contoh</td>
                            <td class="tampilantabel">
                                <a href="path/to/document.pdf" target="_blank" onclick="openPdf(event, 'path/to/document.pdf')">
                                    <i class="fas fa-file-pdf" style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i>
                                </a>
                            </td>
                            <td class="isi-konten">Isi contoh konten yang panjang...</td>
                            <td>
                                <div class="status-selesai">Selesai</div>
                            </td>
                            <td>Catatan Contoh</td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="editItem(this)">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteItem(this)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> --}}

    </div>
</main>
@endsection
