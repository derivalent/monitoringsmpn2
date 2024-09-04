<!DOCTYPE html>
<html>
<head>
    <title>Monitoring Penugasan - {{ $item->kategoriKegiatan->kategori_kegiatan }}</title>
    <style>
        /* Gaya CSS untuk PDF */
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Laporan Penugasan</h1>
    <p><strong>Kegiatan:</strong> {{ $item->kategoriKegiatan->kategori_kegiatan }}</p>
    <p><strong>Ditugaskan kepada:</strong> {{ $item->tertugas }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Deadline</th>
            </tr>
        </thead>
        <tbody>
            @foreach(explode(',', $item->tertugas) as $index => $tugas)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $tugas }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->deadline }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
