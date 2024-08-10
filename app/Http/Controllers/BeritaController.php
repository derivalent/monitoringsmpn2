<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        // $berita = Berita::orderBy("judul", "gambar", "isi")->paginate(5);
        // $berita = Berita::orderBy('judul', 'asc')
        //             ->orderBy('gambar', 'asc')
        //             ->orderBy('isi', 'asc')
        //             ->paginate(5);
        return view('admin.berita.berita_admin', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'isi' => 'required|string',
        ]);
        // dd($validatedData);

        // Save Image
        $imageName = time() . '.' . $request->file('gambar')->extension();
        $request->file('gambar')->move(public_path('images_berita'), $imageName);
        // $imageName = time() . '.' . $request->file('gambar')->extension();
        // $request->file('gambar')->move(public_path('images_berita'), $imageName);
        // dd($validatedData);


        Berita::create([
            'judul' => $validatedData['judul'],
            'gambar' => $imageName,
            'isi' => $validatedData['isi'],
        ]);

        return redirect()->route('Berita.index')->with('success', 'Berita created successfully.');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'isi' => 'required|string',
        ]);

        $berita = Berita::findOrFail($id);

        if ($request->hasFile('gambar')) {
            // Delete old image
            if (file_exists(public_path('images_berita/' . $berita->gambar))) {
                unlink(public_path('images_berita/' . $berita->gambar));
            }

            // Save new image
            $imageName = time() . '.' . $request->file('gambar')->extension();
            $request->file('gambar')->move(public_path('images_berita'), $imageName);
            $berita->gambar = $imageName;
        }

        $berita->judul = $validatedData['judul'];
        $berita->isi = $validatedData['isi'];
        $berita->save();

        return redirect()->route('Berita.index')->with('success', 'Berita updated successfully.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        // Delete image
        if (file_exists(public_path('images_berita/' . $berita->gambar))) {
            unlink(public_path('images_berita/' . $berita->gambar));
        }

        $berita->delete();
        return redirect()->route('Berita.index')->with('success', 'Berita deleted successfully.');
    }
}
