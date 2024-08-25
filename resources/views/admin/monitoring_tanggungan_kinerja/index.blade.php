@extends('admin.layout.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><b>MONITORING - TANGGUNGAN KINERJA</b></h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Monitoring Tanggungan Kinerja</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12 d-flex align-items-center justify-content-between flex-wrap">
                            <div class="d-flex align-items-center">
                                <i class="fa-regular fa-newspaper"></i> &nbsp;
                                <b class="ms-2">MONITORING TANGGUNGAN KINERJA | STATUS</b>
                            </div>
                            <div class="d-flex align-items-center flex-wrap">
                                <div class="me-3">
                                    <a class="btn btn-success btn-sm" href="{{ route('Penugasan.create') }}">
                                        <i class="fa fa-plus"></i> &nbsp;Tambah
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="datatablesSimple">
                        <thead>
                            <tr class="tampilantabel">
                                <th>No</th>
                                <th>Tertugas</th>
                                <th>File</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penugasan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->tertugas }}</td>
                                    <td class="tampilantabel">
                                        {{-- <a href="{{ Storage::url('files/' . $item->file) }}" target="_blank">
                                            <i class="fas fa-file-pdf" style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i>
                                        </a> --}}
                                        <a href="{{ Storage::url($item->file) }}" target="_blank">
                                            <i class="fas fa-file-pdf" style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i>
                                        </a>

                                    </td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>
                                        <div class="status-{{ strtolower($item->status) }}">{{ $item->status }}</div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal-{{ $item->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                    <td style="white-space: nowrap;">
                                        <form action="{{ route('Penugasan.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm" style="background: none; border: none; color: red; padding: 0; margin-right: 8px;" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash-alt" style="font-size: 15px;"></i>
                                        </button>
                                        </form>
                                        <a class="btn btn-sm" href="{{ route('Penugasan.edit', $item->id) }}" style="background: none; border: none; color: orange; padding: 0;">
                                            <i class="fas fa-edit" style="font-size: 15px;"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal Detail -->
                                <div class="modal fade" id="detailModal-{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel-{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailModalLabel-{{ $item->id }}"><b>DETAIL PENUGASAN</b></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="detail-item">
                                                    <span class="detail-label">Penugas</span>
                                                    <span class="detail-value">: &nbsp;{{ $item->nama_penugas }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label">Tertugas</span>
                                                    <span class="detail-value">: &nbsp;{{ $item->tertugas }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label">File</span>
                                                    <span class="detail-value">: &nbsp;<a href="{{ Storage::url($item->file) }}" target="_blank"><i class="fas fa-file-pdf" style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i></a></span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label">Keterangan</span>
                                                    <span class="detail-value">: &nbsp;{{ $item->keterangan }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label">Status</span>
                                                    <span class="detail-value">: &nbsp;{{ $item->status }}</span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Detail -->

                            @endforeach
                        </tbody>
                    </table>
                </div>



                {{-- <div class="card-body">
                    <table class="table table-striped table-bordered" id="datatablesSimple">
                        <thead>
                            <tr class="tampilantabel">
                                <th>No</th>
                                <th>Nama Penugas</th>
                                <th>Tertugas</th>
                                <th>File</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Catatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penugasan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama_penugas }}</td>
                                    <td>{{ $item->tertugas }}</td>
                                    <td class="tampilantabel">
                                        <a href="{{ Storage::url('files/' . $item->file) }}" target="_blank">
                                            <i class="fas fa-file-pdf"
                                                style="font-size: 24px; color: rgba(255, 187, 0, 0.862);"></i>
                                        </a>
                                    </td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>
                                        <div class="status-{{ strtolower($item->status) }}">{{ $item->status }}</div>
                                    </td>
                                    <td>{{ $item->catatan }}</td>
                                    <td>
                                        <form action="{{ route('Penugasan.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                        </form>
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('Penugasan.edit', $item->id) }}">Edit</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div> --}}
            </div>
        </div>
    </main>
@endsection
