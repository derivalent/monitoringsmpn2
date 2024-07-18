@extends('admin.layout.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4"><b>DASHBOARD</b></h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
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
            {{-- <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Danger Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Tabal Role
                        {{-- <button class="btn btn-success float-end" onclick="addRow()"><i class="fa fa-plus"></i> &nbsp;Tambah</button> --}}
                    </div>
                    <div class="card-body">
                        <div class="outer-wrapper">
                        <div class="table-wrapper-mini">
                        <table id="example" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                                <tr class="tampilantabel">
                                    <th>NO</th>
                                    <th>ROLE</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="tampilantabel">
                                @foreach ( $role as $r )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $r -> role }} </td>
                                    <td class="btn-group">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                                {{-- <tr>
                                    <td> </td>
                                    <td class="btn-group">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr> --}}
                        </table>
                        </div></div>
                    </div>
                    {{-- <div class="card-body">
                        <div class="outer-wrapper">
                        <div class="table-wrapper-mini">
                        <table id="example" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                                <tr class="tampilantabel">
                                    <th>KATEGORI KEGIATAN</th>
                                    <th>DESKRIPSI</th>
                                    <th>BUTTON</th>
                                </tr>
                            </thead>
                            <tbody class="tampilantabel">
                                <tr>
                                    <td>Jurnal Pembelajaran</td>
                                    <td>Panduan sebagai parameter dan konsep pembelajaran</td>
                                    <td class="btn-group">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Soal UAS</td>
                                    <td>Soal Ujian Akhir Semester</td>
                                    <td class="btn-group">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Soal UAS</td>
                                    <td>Soal Ujian Akhir Semester</td>
                                    <td class="btn-group">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Soal UAS</td>
                                    <td>Soal Ujian Akhir Semester</td>
                                    <td class="btn-group">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                        </table>
                        </div></div>
                    </div> --}}
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-calendar-days"></i>
                        Tahun
                        <a class="btn btn-success float-end" href="#"><i class="fa fa-plus"></i> &nbsp;Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="outer-wrapper">
                        <div class="table-wrapper-mini">
                        <table id="example" class="table table-striped table-bordered" style="width:100%; overflow-y: auto;" >
                            <thead>
                                <tr class="tampilantabel">
                                    <th>TAHUN</th>
                                    <th>BUTTON</th>
                                </tr>
                            </thead>
                            <tbody class="tampilantabel">
                                <tr>
                                    <td>2023</td>
                                    <td class="btn-group">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2024</td>
                                    <td class="btn-group">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2023</td>
                                    <td class="btn-group">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2024</td>
                                    <td class="btn-group">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2024</td>
                                    <td class="btn-group">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2024</td>
                                    <td class="btn-group">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </div></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card mb-4">
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
                            {{-- <div class="me-3 mb-2">
                                <select id="select-semester" class="form-select form-select-sm">
                                    <option value="">-Pilih Guru-</option>
                                    <option value="Guru A">Guru A</option>
                                    <option value="Guru B">Guru B</option>
                                </select>
                            </div> --}}
                            <div class="me-3 mb-2">
                                <select id="select-status" class="form-select form-select-sm">
                                    <option value="">-Status-</option>
                                    <option value="proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                    <option value="perbaikan">Perbaikan</option>
                                    <option value="ditolak">Ditolak</option>
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
                            <a class="btn btn-success btn-sm mb-2" href="{{ route('KategoriKegiatan.create') }}">
                                <i class="fa fa-plus"></i> &nbsp;Tambah
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Kegiatan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                            {{-- <th>Start date</th>
                            <th>Salary</th> --}}
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kategori Kegiatan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                            {{-- <th>Start date</th>
                            <th>Salary</th> --}}
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td class="btn-group">
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <form action="#" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td class="btn-group">
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <form action="#" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
