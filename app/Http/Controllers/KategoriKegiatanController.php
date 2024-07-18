<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriKegiatan;
use App\Models\Role;
use App\Models\Tahun;

class KategoriKegiatanController extends Controller
{
    // public function index()
    // {
    //     $kategoriKegiatan = KategoriKegiatan::all();
    //     return view('admin.dashboard_admin', compact('kategoriKegiatan'));
    //     // return view('kategori_kegiatan.index', compact('kategoriKegiatans'));
    // }
    public function index()
    {
        $role = Role::All();
        $tahun = Tahun::all();
        $kategoriKegiatan = KategoriKegiatan::all();
        return view('admin.kategori_kegiatan.index', compact('kategoriKegiatan','role', 'tahun'));
        // return view('kategori_kegiatan.index', compact('kategoriKegiatans'));
    }

    public function create()
    {
        return view('admin.kategori_kegiatan.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kategori_kegiatan' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        // KategoriKegiatan::create($request->all());
        // dd($validateData);
        KategoriKegiatan::create([
            'kategori_kegiatan' => $validateData['kategori_kegiatan'],
            'keterangan' => $validateData['keterangan'],
        ]);

        return redirect()->route('KategoriKegiatan.index')->with('success', 'Kategori Kegiatan created successfully.');
    }

    // public function show(KategoriKegiatan $kategoriKegiatan)
    // {
    //     return view('kategori_kegiatan.show', compact('kategoriKegiatan'));
    // }

    public function edit($id) {
        $kategoriKegiatan = KategoriKegiatan::findOrFail($id);
        $data['role'] = Role::all();
        return view('admin.kategori_kegiatan.edit', ['kategoriKegiatan' => $kategoriKegiatan] + $data);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'kategori_kegiatan' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);

        $kategoriKegiatan = KategoriKegiatan::findOrFail($id);
        $kategoriKegiatan->update([
            'kategori_kegiatan' => $validatedData['kategori_kegiatan'],
            'keterangan' => $validatedData['keterangan'],
        ]);

        return redirect()->route('KategoriKegiatan.index')->with('success', 'Kategori Kegiatan updated successfully.');
    }

    public function destroy($id)
    {
    $kategoriKegiatan = KategoriKegiatan::findOrFail($id);
    $kategoriKegiatan->delete();

    return redirect()->route('KategoriKegiatan.index')->with('success', 'Kategori Kegiatan deleted successfully.');
    }

    // public function edit(KategoriKegiatan $kategoriKegiatan)
    // {
    //     return view('admin.kategori_kegiatan.edit', compact('kategoriKegiatan'));
    // }

    // public function update(Request $request, KategoriKegiatan $kategoriKegiatan)
    // {
    //     $request->validate([
    //         'kategori_kegiatan' => 'required',
    //         'keterangan' => 'required',
    //     ]);

    //     $kategoriKegiatan->update($request->all());

    //     return redirect()->route('KategoriKegiatan.index')->with('success', 'Kategori Kegiatan updated successfully.');
    // }

    // public function destroy(KategoriKegiatan $kategoriKegiatan)
    // {
    //     $kategoriKegiatan->delete();

    //     return redirect()->route('KategoriKegiatan.index')->with('success', 'Kategori Kegiatan deleted successfully.');
    // }
}
