<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard_admin() {
        return view('admin/dashboard_admin');
   }

//    public function berita_admin() {
//     return view('admin/berita_admin');
// }

public function monitoring_tanggungan_kinerja() {
    return view('admin/monitoring_tanggungan_kinerja');
}

public function monitoring_laporan_kegiatan() {
    return view('admin/monitoring_laporan_kegiatan');
}

public function tanggungan_kinerja() {
    return view('admin/tanggungan_kinerja');
}

public function laporan_kegiatan() {
    return view('admin/laporan_kegiatan');
}

public function kelola_pengguna() {
    return view('admin/kelola_pengguna');
}

}
