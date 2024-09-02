@extends('admin.layout.main')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4"><b>LAPORAN KEGIATAN HARIAN</b></h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{route('KategoriKegiatan.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Laporan Kegiatan Harian</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-12 d-flex align-items-center justify-content-between flex-wrap" style="padding-bottom: 20px;">
                        {{-- <div class="d-flex align-items-center">
                            <i class="fa-regular fa-newspaper" style="color: #000000;"></i> &nbsp;
                            <b class="ms-2">MONITORING TANGGUNGAN LAPORAN KEGIATAN</b>
                        </div> --}}
                        <div class="d-flex align-items-center">
                            <i class="fa-regular fa-newspaper" style="color: #000000;"></i> &nbsp;
                            <b class="ms-2">LAPORAN KEGIATAN HARIAN</b>
                        </div> <br>
                        <div class="d-flex align-items-center flex-wrap">
                            <div class="me-3 mb-2">
                                <select id="select-semester" class="form-select form-select-sm">
                                    <option value="">-Pilih Semester-</option>
                                    <option value="Semester Ganjil">Semester Ganjil</option>
                                    <option value="Semester Genap">Semester Genap</option>
                                </select>
                            </div>
                            {{-- <div class="me-3 mb-2">
                                <select id="select-semester" class="form-select form-select-sm">
                                    <option value="">-Pilih Guru-</option>
                                    <option value="Guru A">Guru A</option>
                                    <option value="Guru B">Guru B</option>
                                </select>
                            </div> --}}
                            {{-- <div class="me-3 mb-2">
                                <select id="select-semester" class="form-select form-select-sm">
                                    <option value="">-Status-</option>
                                    <option value="Guru A">Selesai</option>
                                    <option value="Guru B">Perbaikan</option>
                                    <option value="Guru B">Ditolak</option>
                                </select>
                            </div> --}}
                            <div class="me-3 mb-2">
                                <select id="select-year" class="form-select form-select-sm">
                                    <option value="">-Pilih Tahun-</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                </select>
                            </div>
                            <div class="me-3 mb-2">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-search"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fa-solid fa-print"></i>
                                </a>
                            </div>
                            <a class="btn btn-success btn-sm mb-2" href="{{ route('LaporanKegiatan.create') }}">
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
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot class="tampilantabel">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>File</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($laporanKegiatan as $lk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $lk->nama }}</td>
                            <td>{{ $lk->kategori->kategori_kegiatan }}</td>
                            <td>
                                <img src="{{Storage::url('images_laporan/' . $lk->gambar) }}" alt="Gambar" style="width: 100px; cursor: pointer;" onclick="openImageModal('path/to/image.jpg')">
                            </td>
                            <td class="isi-konten">{{ $lk->keterangan }}</td>
                            {{-- <td>
                                <a href="{{ route('LaporanKegiatan.edit', $lk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('LaporanKegiatan.destroy', $lk->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td> --}}
                            <td style="white-space: nowrap;">
                                <div style="display: flex; justify-content: space-around; align-items: center; gap: 8px;">
                                    <form action="{{ route('LaporanKegiatan.destroy', $lk->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm" style="background: none; border: none; color: red; padding: 0;" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash-alt" style="font-size: 15px;"></i>
                                        </button>
                                    </form>
                                    <a class="btn btn-sm" href="{{ route('LaporanKegiatan.edit', $lk->id) }}" style="background: none; border: none; color: orange; padding: 0;">
                                        <i class="fas fa-edit" style="font-size: 15px;"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        {{-- <tr>
                            <td>1</td>
                            <td>Laporan Mengajar hari 1,2,3</td>
                            <td>Kategori Contoh</td>
                            <td>
                                <img src="images/damkarbwi.jpg" alt="Gambar" style="width: 100px; cursor: pointer;" onclick="openImageModal('path/to/image.jpg')">
                            </td>
                            <td class="isi-konten">Isi contoh konten yang panjang...</td>
                            <td>
                            <button class="btn btn-warning btn-sm" onclick="editItem(this)">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteItem(this)">Delete</button>
                            </td>
                        </tr> --}}
                        {{-- <tr>
                            <td>2</td>
                            <td>Judul Contoh</td>
                            <td>Kategori Contoh</td>
                            <td>
                                <img src="path/to/image.jpg" alt="Gambar" style="width: 100px; cursor: pointer;" onclick="openImageModal('path/to/image.jpg')">
                            </td>
                            <td class="isi-konten">Isi contoh konten yang panjang...</td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="editItem(this)">Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteItem(this)">Delete</button>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
