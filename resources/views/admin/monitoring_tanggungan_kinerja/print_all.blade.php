{{-- <!DOCTYPE html>
<html>

<head>
    <title>Print Laporan Tanggungan Kinerja</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        th,
        .tampilantabel {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <h3>LAPORAN TANGGUNGAN KINERJA</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Tertugas</th>
                <th>Status</th>
                <th>Deadline</th>
                <th>Pengumpulan</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penugasan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kategoriKegiatan->kategori_kegiatan }}</td>
                    <td>{{ $item->tertugas }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->deadline }}</td>
                    <td>{{ $item->pengumpulan }}</td>
                    <td>{{ $item->catatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html> --}}

<!DOCTYPE html>
<html>

<head>
    <title>Print Laporan Tanggungan Kinerja</title>
    <style>
        /* Gaya CSS untuk PDF */
        /* body {
            text-align: center;
        } */

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
            text-align: center;
        }

        th,
        .tampilantabel {
            text-align: center;
            vertical-align: middle;
        }

        .header {
            display: flex;
            /* Untuk membuat logo dan teks sejajar */
            justify-content: center;
            /* Untuk menaruh elemen di tengah */
            align-items: center;
            /* Untuk menaruh elemen secara vertikal di tengah */
            text-align: center;
        }

        .logo {
            /* Gaya untuk logo Anda */
            /* Sesuaikan ukuran dan margin sesuai kebutuhan */
            width: 100px;
            /* Contoh ukuran logo */
            margin-right: 20px;
        }
    </style>
</head>

<body>
    {{-- <div class="header">
        <h1> <img src="ihttps://postimg.cc/RNyqhcSK" alt="Logo SMPN 2 Sempu" class="logo"> &nbsp; SMP NEGERI 2 SEMPU</h1>
        <p>Alamat Sekolah</p>
    </div> --}}
    <div class="header">
        {{-- <img src="images/logosmpn2sempu/nama_file_logo.jpg" alt="Logo SMPN 2 Sempu"> --}}
        <div><h3>SMP NEGERI 2 SEMPU</h3><div>Jln Sragi Gendoh, Kecamatan Sempu, Kabupaten Banyuwangi, Jawa Timur</div></div>
        {{-- <h5 class>Laporan Tanggungan Kinerja</h5> --}}
    </div>
    <hr class="my-4 mb-1">
    <div claa="body">
        <h5>Laporan Tanggungan Kinerja</h5>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Tertugas</th>
                    <th>Status</th>
                    <th>Deadline</th>
                    <th>Pengumpulan</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penugasan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kategoriKegiatan->kategori_kegiatan }}</td>
                        <td>{{ $item->tertugas }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->deadline }}</td>
                        <td>{{ $item->pengumpulan }}</td>
                        {{-- <td>{{ $item->deadline ? $item->deadline->format('d F Y') : '-' }}</td>
                    <td>{{ $item->pengumpulan ? $item->pengumpulan->format('d F Y') : '-' }}</td> --}}
                        <td>{{ $item->catatan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
