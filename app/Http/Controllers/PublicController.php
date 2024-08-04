<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class PublicController extends Controller
{
//    public function information() {
//         return view('public/information');
//    }

//    public function berita_public() {
//     return view('public/berita_public');
// }
public function berita_public() {
        $berita = Berita::all();
        return view('public/berita_public',compact('berita'));
    }

// public function berita_isi_public() {
//     $berita = Berita::all();
//     return view('public/berita_isi_public',compact('berita'));
// }

public function berita_isi_public($id) {
    $berita = Berita::find($id);
    if (!$berita) {
        abort(404, 'Berita tidak ditemukan.');
    }
    $recentPosts = Berita::orderBy('created_at', 'desc')->take(5)->get(); // Misal menampilkan 5 berita terbaru
    return view('public.berita_isi_public', compact('berita', 'recentPosts'));
}

}
