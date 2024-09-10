@extends('admin.layout.main')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>KELOLA USER - ADMIN </b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="{{ route('kelola_pengguna') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Kelola User</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <b>EDIT PENGGUNA</b>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP :</label>
                            <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip', $user->nip) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama :</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin :</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_pria" value="pria" required {{ old('jenis_kelamin', $user->jenis_kelamin) == 'pria' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jenis_kelamin_pria">Pria</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_wanita" value="wanita" required {{ old('jenis_kelamin', $user->jenis_kelamin) == 'wanita' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jenis_kelamin_wanita">Wanita</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir :</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $user->tempat_lahir) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir :</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir :</label>
                            <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir', $user->pendidikan_terakhir) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan :</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan', $user->jabatan) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="status_pekerjaan" class="form-label">Status Pekerjaan :</label>
                            <select class="form-control" id="status_pekerjaan" name="status_pekerjaan" required>
                                <option value="">-Pilih Status-</option>
                                <option value="pns" {{ old('status_pekerjaan', $user->status_pekerjaan) == 'pns' ? 'selected' : '' }}>PNS</option>
                                <option value="honorer" {{ old('status_pekerjaan', $user->status_pekerjaan) == 'honorer' ? 'selected' : '' }}>Honorer</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="bidang_studi" class="form-label">Bidang Studi :</label>
                            <input type="text" class="form-control" id="bidang_studi" name="bidang_studi" value="{{ old('bidang_studi', $user->bidang_studi) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role :</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="">-Pilih role-</option>
                                @foreach ($role as $data)
                                    <option value="{{ $data->id_role }}" {{ old('role', $user->role) == $data->id_role ? 'selected' : '' }}>
                                        {{ $data->role }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat :</label>
                            <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat', $user->alamat) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="telepon" class="form-label">Telepon :</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $user->telepon) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah):</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="d-flex justify-content-start mt-2">
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                            <a href="{{ route('kelola_pengguna') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

