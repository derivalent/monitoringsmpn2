@extends('admin.layout.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>MONITORING - TANGGUNGAN KINERJA</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Monitoring Tanggungan Kinerja</li>
            </ol>
            {{-- @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                <form method="POST" action="{{ route('cetak.laporan') }}">
                    @csrf
                    <label for="tanggal_awal">Tanggal Awal:</label>
                    <input type="date" name="tanggal_awal" id="tanggal_awal" required>

                    <label for="tanggal_akhir">Tanggal Akhir:</label>
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" required>

                    <button type="submit">Cetak</button>
                </form>
            @endif --}}
            <form method="POST" action="{{ route('cetak.laporan') }}">
                @csrf
                <label for="tanggal_awal">Tanggal Awal:</label>
                <input type="date" name="start_date" id="start_date" required>

                <label for="tanggal_akhir">Tanggal Akhir:</label>
                <input type="date" name="end_date" id="end_date" required>

                <button type="submit">Cetak</button>
            </form>
        </div>
    </main>
@endsection


