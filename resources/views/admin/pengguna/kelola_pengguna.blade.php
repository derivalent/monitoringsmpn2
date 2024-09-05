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
                                {{-- <div class="me-3 mb-2">
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                </div> --}}
                                <a class="btn btn-success btn-sm mb-2" href="{{ route('kelola_pengguna.create') }}">
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
                                <th>Status_pekerjaan</th>
                                <th>Role</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        {{-- <tfoot class="tampilantabel">
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
                                <th>Status_pekerjaan</th>
                                <th>Role</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot> --}}
                        <tbody>
                            @foreach ($user as $u)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->nip }}</td>
                                <td>{{ $u->jabatan }}</td>
                                <td>{{ $u->jenis_kelamin }}</td>
                                <td>{{ $u->tempat_lahir }}</td>
                                <td>{{ $u->tanggal_lahir }}</td>
                                <td>{{ $u->pendidikan_terakhir }}</td>
                                <td>{{ $u->bidang_studi }}</td>
                                <td>{{ $u->status_pekerjaan }}</td>
                                <td>{{ $u->role}}</td>
                                <td>{{ $u->alamat }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->telepon }}</td>
                                {{-- <td class="btn-group">
                                    <a href="{{ route('user.edit', $u->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('user.destroy', $u->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td> --}}
                                <td style="white-space: nowrap;">
                                    <div
                                        style="display: flex; justify-content: space-around; align-items: center; gap: 4px;">
                                        <form action="{{ route('user.destroy', $u->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm"
                                                style="background: none; border: none; color: red; padding: 0;"
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fas fa-trash-alt" style="font-size: 15px;"></i>
                                            </button>
                                        </form>
                                        <a class="btn btn-sm" href="{{ route('user.edit', $u->id) }}"
                                            style="background: none; border: none; color: orange; padding: 0;">
                                            <i class="fas fa-edit" style="font-size: 15px;"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            {{-- <tr>
                                <td>1</td>
                                <td>Soraya</td>
                                <td>36363636</td>
                                <td>Guru</td>
                                <td>Laki-Laki</td>
                                <td>Banyuwangi</td>
                                <td>01-01-2001</td>
                                <td>S1 Kedokteran</td>
                                <td>Guru Biologi</td>
                                <td>Honorer</td>
                                <td>User</td>
                                <td>Banyuwangi, watu dodol rt: 3 rw: 4</td>
                                <td>Soraya1@gmail.com</td>
                                <td>08888567</td>
                                <td class="btn-group">
                                    <button class="btn btn-warning btn-sm" style="display: flex; justify-content: center; gap: 10px;" onclick="editItem(this)">Edit</button>
                                    <button class="btn btn-danger btn-sm" style="display: flex; justify-content: center; gap: 10px;" onclick="deleteItem(this)">Delete</button>
                                </td>
                            </tr> --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
