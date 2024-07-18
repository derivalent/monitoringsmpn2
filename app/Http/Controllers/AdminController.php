<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
// use App\Models\KategoriKegiatan;

class AdminController extends Controller
{
    public function dashboard_admin() {
        $role = Role::All();
        // $kategoriKegiatans = KategoriKegiatan::all();
        return view('admin/dashboard_admin', ['role' => $role]);
        // return view('admin/dashboard_admin', ['role' => $role], ['kategori_kegiatan' => $kategoriKegiatans]);
   }

public function monitoring_tanggungan_kinerja() {
    return view('admin/monitoring_tanggungan_kinerja');
}

public function monitoring_laporan_kegiatan() {
    return view('admin/monitoring_laporan_kegiatan');
}

public function tanggungan_kinerja() {
    return view('admin/tanggungan_kinerja');
}

// public function laporan_kegiatan() {
//     return view('admin/laporan_kegiatan');
// }

// public function kelola_pengguna() {
//     return view('admin/kelola_pengguna');
// }

}
