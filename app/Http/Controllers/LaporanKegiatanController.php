<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanKegiatanController extends Controller
{
    public function index() {
        return view('admin.laporan_kegiatan.index');
    }

    
}
