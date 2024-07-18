<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Tahun;
use App\Models\Role;
use App\Models\KategoriKegiatan;

class TahunController extends Controller
{
    public function index()
    {
        $role = Role::All();
        $tahun = Tahun::all();
        $kategoriKegiatan = KategoriKegiatan::all();
        return view('admin.kategori_kegiatan.index', compact('kategoriKegiatan','role', 'tahun'));
    }

    public function create()
    {
        return view('admin.tahun.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'data_tahun' => 'required|string'
        // ]);
        $validateData = $request->validate([
            'data_tahun' => 'required|string'
        ]);

        // Tahun::create($request->all());
        Tahun::create([
            'data_tahun' => $validateData['data_tahun'],
        ]);

        return redirect()->route('Tahun.index')->with('success', 'Data tahun berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tahun = Tahun::findOrFail($id);
        return view('admin.tahun.edit', compact('tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'data_tahun' => 'required|string'
        ]);

        $tahun = Tahun::findOrFail($id);
        $tahun->update($request->all());
        return redirect()->route('Tahun.index')->with('success', 'Data tahun berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tahun = Tahun::findOrFail($id);
        $tahun->delete();
        return redirect()->route('Tahun.index')->with('success', 'Data tahun berhasil dihapus.');
    }
}

// namespace App\Http\Controllers;

// use App\Models\Tahun;
// use Illuminate\Http\Request;
// use App\Models\KategoriKegiatan;

// class TahunController extends Controller
// {
//     public function index()
//     {
//         $tahun = Tahun::all();
//         $kategoriKegiatan = KategoriKegiatan::all();
//         return view('admin.kategori_kegiatan.index', compact('tahun','kategoriKegiatan'));
//     }

//     public function create()
//     {
//         return view('admin.tahun.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'data_tahun' => 'required'
//         ]);

//         Tahun::create($request->all());
//         return redirect()->route('Tahun.index')->with('success', 'Data tahun berhasil ditambahkan.');
//     }

//     public function edit($id)
//     {
//         $tahun = Tahun::find($id);
//         return view('admin.tahun.edit', compact('tahun'));
//     }

//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             'data_tahun' => 'required'
//         ]);

//         $tahun = Tahun::find($id);
//         $tahun->update($request->all());
//         return redirect()->route('Tahun.index')->with('success', 'Data tahun berhasil diperbarui.');
//     }

//     public function destroy($id)
//     {
//         $tahun = Tahun::find($id);
//         $tahun->delete();
//         return redirect()->route('Tahun.index')->with('success', 'Data tahun berhasil dihapus.');
//     }
// }
