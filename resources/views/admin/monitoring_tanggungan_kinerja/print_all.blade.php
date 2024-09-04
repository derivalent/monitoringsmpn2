<!DOCTYPE html>
<html>

<head>
    <title>Laporan Semua Penugasan</title>
    <style>
        /* Gaya CSS untuk PDF */
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>

<body>
    <h1>Laporan Semua Penugasan</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                {{-- <th>Judul</th> --}}
                <th>Kategori</th>
                <th>Tertugas</th>
                <th>Status</th>
                {{-- <th>Deadline</th> --}}
                <th>Pengumpulan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penugasan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- <td>{{ $item->judul }}</td> --}}
                    <td>{{ $item->kategoriKegiatan->kategori_kegiatan }}</td>
                    <td>{{ $item->tertugas }}</td>
                    <td>{{ $item->status }}</td>
                    {{-- <td>{{ $item->deadline }}</td> --}}
                    <td>{{ $item->pengumpulan}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
