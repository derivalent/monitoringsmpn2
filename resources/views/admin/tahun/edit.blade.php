@extends('admin.layout.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4"><b>DATA TAHUN - ADMIN </b></h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('KategoriKegiatan.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Form Edit Data Tahun</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <b>EDIT DATA TAHUN</b>
            </div>
            <div class="card-body">
                <form action="{{ route('Tahun.update', $tahun->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="data_tahun" class="form-label">Data Tahun :</label>
                        <input type="text" class="form-control" id="data_tahun" name="data_tahun" value="{{ $tahun->data_tahun }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('Tahun.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
