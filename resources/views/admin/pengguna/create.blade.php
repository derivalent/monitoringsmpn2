@extends('admin.layout.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4"><b>KELOLA USER - ADMIN </b></h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ 'dashboard_admin' }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Kelola User</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <b>TAMBAH PENGGUNA</b>
            </div>
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP :</label>
                        <input type="text" class="form-control" id="nip" name="nip" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama :</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin :</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">-Pilih Jenis Kelamin-</option>
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir :</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir :</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir :</label>
                        <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" required>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan :</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                    </div>
                    <div class="mb-3">
                        <label for="status_pekerjaan" class="form-label">Status Pekerjaan :</label>
                        <select class="form-control" id="status_pekerjaan" name="status_pekerjaan" required>
                            <option value="">-Pilih Status-</option>
                            <option value="pns">PNS</option>
                            <option value="honorer">Honorer</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bidang_studi" class="form-label">Bidang Studi :</label>
                        <input type="text" class="form-control" id="bidang_studi" name="bidang_studi" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role :</label>
                        <select class="form-control" id="role" name="role" required>
                             <option value="">-Pilih role-</option>
                            @foreach ($role as $data)
                                <option value="{{ $data->id_role }}">{{ $data->role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat :</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon :</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
