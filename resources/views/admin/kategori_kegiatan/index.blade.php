@extends('admin.layout.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4"><b>DASHBOARD</b></h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        @if ($message = Session::get('success'))
            <div class="alert alert-success" id="success-alert">
                <p>{{ $message }}</p>
            </div>
        @endif

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
        </div>
        @if(Auth::user()->role == 1 || Auth::user()->role == 2)
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Tabah Role
                    </div>
                    <div class="card-body">
                        <div class="outer-wrapper">
                            <div class="table-wrapper-mini">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr class="tampilantabel">
                                            <th>NO</th>
                                            <th>ROLE</th>
                                            {{-- <th>AKSI</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody class="tampilantabel">
                                        @foreach ($role as $r)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $r->role }}</td>
                                            {{-- <td>
                                                <form action="{{ route('Tahun.destroy', $r->id) }}" method="POST">
                                                    <a href="{{ route('Tahun.edit', $r->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fa-solid fa-calendar-days"></i>
                        Tahun
                        @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                        <a class="btn btn-success float-end" href="{{ route('Tahun.create') }}">
                            <i class="fa fa-plus"></i> &nbsp;Tambah
                        </a>
                        @endif
                    </div>
                    <div class="card-body">
                        {{-- @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif --}}
                        <div class="outer-wrapper">
                            {{-- @if(Auth::user()->role == 1 || Auth::user()->role == 2) --}}
                            <div class="table-wrapper-mini">
                                <table id="example" class="table table-striped table-bordered" style="width:100%; overflow-y: auto;">
                                    <thead>
                                        <tr class="tampilantabel">
                                            <th>TAHUN</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tampilantabel">
                                        @foreach ($tahun as $thn)
                                        <tr>
                                            <td>{{ $thn->data_tahun }}</td>

                                                {{-- <form action="{{ route('Tahun.destroy', $thn->id) }}" method="POST">
                                                    <a href="{{ route('Tahun.edit', $thn->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form> --}}

                                            <td style="white-space: nowrap;">
                                                <div
                                                    style="display: flex; justify-content: space-around; align-items: center; gap: 4px;">
                                                    <form action="{{ route('Tahun.destroy', $thn->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm"
                                                            style="background: none; border: none; color: red; padding: 0;"
                                                            onclick="return confirm('Yakin ingin menghapus?')">
                                                            <i class="fas fa-trash-alt" style="font-size: 15px;"></i>
                                                        </button>
                                                    </form>
                                                    <a class="btn btn-sm" href="{{ route('Tahun.edit', $thn->id) }}"
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
                            {{-- @endif --}}

                            {{-- @if(Auth::user()->role == 3)
                            <div class="table-wrapper-mini">
                                <table id="example" class="table table-striped table-bordered" style="width:100%; overflow-y: auto;">
                                    <thead>
                                        <tr class="tampilantabel">
                                            <th>TAHUN</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tampilantabel">
                                        @foreach ($tahun as $thn)
                                        <tr>
                                            <td>{{ $thn->data_tahun }}</td>
                                            <td>
                                                <form action="{{ route('Tahun.destroy', $thn->id) }}" method="POST">
                                                    <a href="{{ route('Tahun.edit', $thn->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="card mb-4">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-between flex-wrap" style="padding-bottom: 20px;">
                        <div class="d-flex align-items-center">
                            <i class="fa-regular fa-newspaper" style="color: #000000;"></i> &nbsp;
                            <b class="ms-2">DATA KATEGORI KEGIATAN </b>
                        </div><br>
                        <div class="d-flex align-items-center flex-wrap">
                            <div class="me-3 mb-2">
                                {{-- <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-search"></i>
                                </a> --}}
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fa-solid fa-print"></i>
                                </a>
                            </div>
                            @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                            <a class="btn btn-success btn-sm mb-2" href="{{ route('KategoriKegiatan.create') }}">
                                <i class="fa fa-plus"></i> &nbsp;Tambah
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                <table class="table table-striped table-bordered" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Kegiatan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kategori Kegiatan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($kategoriKegiatan as $kk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kk->kategori_kegiatan }}</td>
                            <td>{{ $kk->keterangan }}</td>
                            {{-- <td class="btn-group">
                                <a href="{{ route('KategoriKegiatan.edit', $kk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('KategoriKegiatan.destroy', $kk->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus?')">Delete</button>
                                </form>
                            </td> --}}
                            <td style="white-space: nowrap;">
                                <div
                                    style="display: flex; justify-content: space-around; align-items: center; gap: 4px;">
                                    <form action="{{ route('KategoriKegiatan.destroy', $kk->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm"
                                            style="background: none; border: none; color: red; padding: 0;"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash-alt" style="font-size: 15px;"></i>
                                        </button>
                                    </form>
                                    <a class="btn btn-sm" href="{{ route('KategoriKegiatan.edit', $kk->id) }}"
                                        style="background: none; border: none; color: orange; padding: 0;">
                                        <i class="fas fa-edit" style="font-size: 15px;"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

                @if(Auth::user()->role == 3)
                <table class="table table-striped table-bordered" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Kegiatan</th>
                            <th>Keterangan</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kategori Kegiatan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($kategoriKegiatan as $kk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kk->kategori_kegiatan }}</td>
                            <td>{{ $kk->keterangan }}</td>
                            {{-- <td class="btn-group">
                                <a href="{{ route('KategoriKegiatan.edit', $kk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('KategoriKegiatan.destroy', $kk->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus?')">Delete</button>
                                </form>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
