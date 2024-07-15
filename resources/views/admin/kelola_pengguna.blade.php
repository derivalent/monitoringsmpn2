@extends('admin.layout.main')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>KELOLA PENGGUNA</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ 'dashboard_admin' }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Kelola Pengguna</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12 d-flex align-items-center justify-content-between flex-wrap"
                            style="padding-bottom: 20px;">
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-newspaper" style="color: #000000;"></i> &nbsp;
                                <b class="ms-2">KELOLA PENGGUNA</b>
                            </div> <br>
                            <div class="d-flex align-items-center flex-wrap">
                                <div class="me-3 mb-2">
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
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Bidang Studi</th>
                                <th>Role</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot class="tampilantabel">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Pendidikan Terakhir</th>
                                <th>Bidang Studi</th>
                                <th>Role</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Soraya</td>
                                <td>36363636</td>
                                <td>Guru</td>
                                <td>Laki-Laki</td>
                                <td>Banyuwangi</td>
                                <td>01-01-2001</td>
                                <td>S3 Kedokteran</td>
                                <td>Guru Biologi</td>
                                <td>User</td>
                                <td>Banyuwangi, watu dodol rt: 3 rw: 4</td>
                                <td>Soraya1@gmail.com</td>
                                <td>08888567</td>
                                <td class="btn-group">
                                    <button class="btn btn-warning btn-sm" style="display: flex; justify-content: center; gap: 10px;" onclick="editItem(this)">Edit</button>
                                    <button class="btn btn-danger btn-sm" style="display: flex; justify-content: center; gap: 10px;" onclick="deleteItem(this)">Delete</button>
                                </td>
                            </tr>
                            {{-- <tr>
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
                        </tr> --}}
                        </tbody>
                    </table>
                </div>
                {{-- <div class="card-body">
                <table class="table table-striped table-bordered" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                        </tr>
                        <tr>
                            <td>Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012/03/29</td>
                            <td>$433,060</td>
                        </tr>
                        <tr>
                            <td>Airi Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2008/11/28</td>
                            <td>$162,700</td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
            </div>
        </div>
    </main>
@endsection
