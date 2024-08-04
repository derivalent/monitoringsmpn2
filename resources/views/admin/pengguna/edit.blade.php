@extends('admin.layout.main')
@section('content')
<div class="container">
    <h1>Edit Pengguna</h1>

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

        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip', $user->nip) }}">
        </div>
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
        </div>
        {{-- <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin', $user->jenis_kelamin) }}">
        </div> --}}
        <div class="mb-3">
            <label class="form-label">Jenis Kelamin :</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_pria" value="pria" required {{ old('jenis_kelamin', $user->jenis_kelamin) == 'pria' ? 'checked' : '' }}>
                    <label class="form-check-label" for="jenis_kelamin_pria">
                        Pria
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_wanita" value="wanita" required {{ old('jenis_kelamin', $user->jenis_kelamin) == 'wanita' ? 'checked' : '' }}>
                    <label class="form-check-label" for="jenis_kelamin_wanita">
                        Wanita
                    </label>
                </div>
            </div>
        </div>
        {{-- <div class="mb-3">
            <label class="form-label">Jenis Kelamin :</label>
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_pria" value="pria" required {{ $jenis_kelamin == 'pria' ? 'checked' : '' }}>
                    <label class="form-check-label" for="jenis_kelamin_pria">
                        Pria
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin_wanita" value="wanita" required {{ $jenis_kelamin == 'wanita' ? 'checked' : '' }}>
                    <label class="form-check-label" for="jenis_kelamin_wanita">
                        Wanita
                    </label>
                </div>
            </div>
        </div> --}}
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
        </div>
        <div class="form-group">
            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
            <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir', $user->pendidikan_terakhir) }}">
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan', $user->jabatan) }}">
        </div>
        <div class="form-group">
            <label for="status_pekerjaan">Status Pekerjaan</label>
            <input type="text" class="form-control" id="status_pekerjaan" name="status_pekerjaan" value="{{ old('status_pekerjaan', $user->status_pekerjaan) }}">
        </div>
        <div class="form-group">
            <label for="bidang_studi">Bidang Studi</label>
            <input type="text" class="form-control" id="bidang_studi" name="bidang_studi" value="{{ old('bidang_studi', $user->bidang_studi) }}">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="">-Pilih role-</option>
                @foreach ($role as $data)
                    <option value="{{ $data->id_role }}" {{ $user->role == $data->id_role ? 'selected' : '' }}>
                        {{ $data->role }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat', $user->alamat) }}</textarea>
        </div>
        <div class="form-group">
            <label for="telepon">Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $user->telepon) }}">
        </div>
        <div class="form-group">
            <label for="password">Password (leave blank to keep current password)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <!-- More form fields -->

        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>

    {{-- <div class="container">
        <h1>Edit Pengguna</h1>

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

            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip', $user->nip) }}">
            </div>
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin', $user->jenis_kelamin) }}">
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
            </div>
            <div class="form-group">
                <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir', $user->pendidikan_terakhir) }}">
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan', $user->jabatan) }}">
            </div>
            <div class="form-group">
                <label for="status_pekerjaan">Status Pekerjaan</label>
                <input type="text" class="form-control" id="status_pekerjaan" name="status_pekerjaan" value="{{ old('status_pekerjaan', $user->status_pekerjaan) }}">
            </div>
            <div class="form-group">
                <label for="bidang_studi">Bidang Studi</label>
                <input type="text" class="form-control" id="bidang_studi" name="bidang_studi" value="{{ old('bidang_studi', $user->bidang_studi) }}">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="">-Pilih role-</option>
                   @foreach ($role as $data)
                   <option value="{{ $data->id_role }}">{{ $data->role }}</option>
                   @endforeach
               </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat', $user->alamat) }}</textarea>
            </div>
            <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $user->telepon) }}">
            </div>
            <div class="form-group">
                <label for="password">Password (leave blank to keep current password)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div> --}}
@endsection
