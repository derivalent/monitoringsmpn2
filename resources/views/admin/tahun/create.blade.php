@extends('admin.layout.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4"><b>DATA TAHUN - ADMIN </b></h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ 'dashboard_admin' }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Form Tambah Data Tahun</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <b>TAMBAH DATA TAHUN</b>
            </div>
            <div class="card-body">
                <form action="{{ route('Tahun.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="data_tahun" class="form-label">Data Tahun :</label>
                        <input type="text" class="form-control" id="data_tahun" name="data_tahun" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
