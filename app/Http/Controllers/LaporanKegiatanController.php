<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Tahun;
use App\Models\KategoriKegiatan;
use App\Models\LaporanKegiatan;

class LaporanKegiatanController extends Controller
{
    // public function index() {
    //     $laporanKegiatan = LaporanKegiatan::all();
    //     $kategoriKegiatan = KategoriKegiatan::all();
    //     $tahun = Tahun::all();
    //     return view('admin.laporan_kegiatan.index', compact('kategoriKegiatan', 'laporanKegiatan','tahun'));
    // }
    public function index(Request $request) {
        $query = LaporanKegiatan::query();

        // Filter berdasarkan bulan dan tahun jika ada input
        if ($request->filled('bulan')) {
            $query->whereMonth('created_at', $request->bulan);
        }

        if ($request->filled('tahun')) {
            $query->whereYear('created_at', $request->tahun);
        }

        $laporanKegiatan = $query->get();
        $kategoriKegiatan = KategoriKegiatan::all();
        $tahun = Tahun::all();

        return view('admin.laporan_kegiatan.index', compact('kategoriKegiatan', 'laporanKegiatan', 'tahun'));
    }


    public function create() {
        $kategoriKegiatan = KategoriKegiatan::all();
        return view('admin.laporan_kegiatan.create', compact('kategoriKegiatan'));
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'nama' => 'required|string',
            'kategori_id' => 'required|exists:kategori_kegiatan,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'required|string',
            'semester' => 'required|string',
        ]);

        // Simpan gambar ke storage
        $imageName = time() . '.' . $request->file('gambar')->extension();
        $path = $request->file('gambar')->storeAs('public/images_laporan', $imageName);

        // Simpan data ke database
        LaporanKegiatan::create([
            'nama' => $validateData['nama'],
            'kategori_id' => $validateData['kategori_id'],
            'gambar' => $imageName, // Simpan nama gambar di database
            'keterangan' => $validateData['keterangan'],
            'semester' => $validateData['semester'],
        ]);

        return redirect()->route('LaporanKegiatan.index')->with('success', 'Laporan Kegiatan added successfully.');
    }

    public function edit($id) {
        $laporanKegiatan = LaporanKegiatan::findOrFail($id);
        $kategoriKegiatan = KategoriKegiatan::all();
        return view('admin.laporan_kegiatan.edit', compact('laporanKegiatan', 'kategoriKegiatan'));
    }

    public function update(Request $request, $id) {
        $validateData = $request->validate([
            'nama' => 'required|string',
            'kategori_id' => 'required|exists:kategori_kegiatan,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'required|string',
            'semester' => 'required|string',
        ]);

        $laporanKegiatan = LaporanKegiatan::findOrFail($id);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if (Storage::exists('public/images_laporan/' . $laporanKegiatan->gambar)) {
                Storage::delete('public/images_laporan/' . $laporanKegiatan->gambar);
            }


            // Simpan gambar baru
            $imageName = time() . '.' . $request->file('gambar')->extension();
            $path = $request->file('gambar')->storeAs('public/images_laporan', $imageName);
            $laporanKegiatan->gambar = $imageName;
        }

        $laporanKegiatan->update([
            'nama' => $validateData['nama'],
            'kategori_id' => $validateData['kategori_id'],
            'keterangan' => $validateData['keterangan'],
            'semester' => $validateData['semester'],
        ]);

        return redirect()->route('LaporanKegiatan.index')->with('success', 'Laporan Kegiatan updated successfully.');
    }

    public function destroy($id) {
        $laporanKegiatan = LaporanKegiatan::findOrFail($id);

        // Hapus gambar jika ada
        if (Storage::exists('public/images_laporan/' . $laporanKegiatan->gambar)) {
            Storage::delete('public/images_laporan/' . $laporanKegiatan->gambar);
        }

        $laporanKegiatan->delete();
        return redirect()->route('LaporanKegiatan.index')->with('success', 'Laporan Kegiatan deleted successfully.');
    }

    public function monitoring_laporan_kegiatan() {
        $laporanKegiatan = LaporanKegiatan::all();
        return view('admin.monitoring_laporan_kegiatan', compact('laporanKegiatan'));
    }
}
