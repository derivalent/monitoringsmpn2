<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
//    public function information() {
//         return view('public/information');
//    }

   public function berita_public() {
    return view('public/berita_public');
}

public function berita_isi_public() {
    return view('public/berita_isi_public');
}

}
