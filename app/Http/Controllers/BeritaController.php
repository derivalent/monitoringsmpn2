<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function berita_admin()
    {
        // Logic untuk mendapatkan data yang diperlukan
        return view('admin.berita.berita_admin');
    }

    // public function show_berita()
    // {
    //     // Logic untuk mendapatkan data yang diperlukan
    //     return view('public.berita_isi_public');
    // }
}
