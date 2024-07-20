<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tahun;
use App\Models\KategoriKegiatan;
use App\Models\LaporanKegiatan;

class LaporanKegiatanController extends Controller
{

    public function index() {

        $laporanKegiatan = LaporanKegiatan::all();
        $kategoriKegiatan = KategoriKegiatan::all();
        return view('admin.laporan_kegiatan.index',compact('kategoriKegiatan','laporanKegiatan'));
    }

    public function create() {
        $laporanKegiatan = LaporanKegiatan::all();
        $kategoriKegiatan = KategoriKegiatan::all();
        return view('admin.laporan_kegiatan.create',compact('kategoriKegiatan'));
    }

    public function store(Request $request) {

        $validateData = $request->validate([
            'nama' => 'required|string',
            'kategori_id' => 'required|exists:kategori_kegiatan,id', // Ubah 'kategori' menjadi 'kategori_id'
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'required|string',
        ]);

        // dd($validateData); // Cek apakah data sudah tervalidasi

        // Simpan gambar
        $imageName = time() . '.' . $request->file('gambar')->extension();
        $request->file('gambar')->move(public_path('images'), $imageName);

        // Simpan data ke database
        LaporanKegiatan::create([
            'nama' => $validateData['nama'],
            'kategori_id' => $validateData['kategori_id'], // Sesuaikan dengan nama field di database
            'gambar' => $imageName,
            'keterangan' => $validateData['keterangan'],
        ]);

        return redirect()->route('LaporanKegiatan.index')->with('success', 'Laporan Kegiatan added successfully.');
    }

    // public function store(Request $request) {
    //     // $laporan = LaporanKegiatan::find($id);

    //     $validateData = $request->validate([
    //         'nama' => 'required|string',
    //         'kategori' => 'required|exists:kategori_kegiatans,id',
    //         'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'keterangan' => 'required|string',
    //     ]);
    //     dd($validateData);
    //     $imageName = time() . '.' . $request->gambar->extension();
    //     $request->$validateData->gambar->move(public_path('images'), $imageName);

    //     LaporanKegiatan::create([
    //         'nama' => $validateData['nama'],
    //         'kategori_id' => $validateData['kategori_id'], // Sesuaikan dengan nama field di database
    //         'gambar' => $imageName,
    //         'keterangan' => $validateData['keterangan'],
    //         // 'nama' => $request->nama,
    //         // 'kategori_id' => $request->kategori, // Sesuaikan dengan nama field di database
    //         // 'gambar' => $imageName,
    //         // 'keterangan' => $request->keterangan,
    //     ]);

    //     return redirect()->route('laporan-kegiatan.index')->with('success', 'Laporan Kegiatan added successfully.');

    // }
}
