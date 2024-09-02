<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penugasan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PenugasanController extends Controller
{
    // Display the list of tasks
    public function index()
    {
        $penugasan = Penugasan::all(); // Retrieve all penugasan records
        $users = User::all();
        $currentUser = Auth::user(); // Get the currently authenticated user

        return view('admin.monitoring_tanggungan_kinerja.index', compact('penugasan', 'users', 'currentUser'));
    }

    // Show the form for creating a new task
    public function create()
    {
        $users = User::all();
        return view('admin.monitoring_tanggungan_kinerja.create', compact('users'));
    }

    // public function submit()
    // {
    //     $users = User::all();
    //     return view('admin.monitoring_tanggungan_kinerja.submit', compact('users'));
    // }
    // Store a newly created task in the database
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'tertugas' => 'required|array',
    //         'file' => 'required|mimes:pdf|max:2048',
    //         'keterangan' => 'required|string',
    //         'status' => 'required|string',
    //         'catatan' => 'nullable|string',
    //     ]);

    //     // Save the uploaded file to storage
    //     $fileName = time() . '.' . $request->file('file')->extension();
    //     $path = $request->file('file')->storeAs('public/files', $fileName);

    //     // Store the task data in the database
    //     Penugasan::create([
    //         'nama_penugas' => Auth::user()->name, // Automatically set the name of the user who assigned the task
    //         'tertugas' => implode(',', $validatedData['tertugas']), // Convert the array of assigned users to a string
    //         'file' => $fileName,
    //         'keterangan' => $validatedData['keterangan'],
    //         'status' => $validatedData['status'],
    //         'catatan' => $validatedData['catatan'],
    //     ]);

    //     return redirect()->route('Penugasan.index')->with('success', 'Tugas berhasil dibuat.');
    // }
    // Store method
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            // 'tertugas' => 'required|array',
            // 'file' => 'required|mimes:pdf',
            // 'keterangan' => 'required|string',
            // 'status' => 'required|string',
            // 'catatan' => 'nullable|string',
            'tertugas' => 'required|array',
            'file' => 'nullable|mimes:pdf',
            'keterangan' => 'required|string',
            'status' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        // // Upload file PDF
        // $filePath = $request->file('file')->store('files', 'public');

        // Inisialisasi filePath dengan null
        $filePath = null;

        // Upload file PDF jika ada
        // if ($request->hasFile('file')) {
        //     $filePath = $request->file('file')->store('files', 'public');
        // }
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('files', 'public');
        }


        // Loop through each tertugas and create a separate entry
        foreach ($request->tertugas as $tertugas) {
            Penugasan::create([
                'nama_penugas' => Auth::user()->name,
                'tertugas' => $tertugas,
                'file' => $filePath,
                'keterangan' => $request->keterangan,
                'status' => $request->status,
                'catatan' => $request->catatan,
            ]);
        }

        return redirect()->route('Penugasan.index')->with('success', 'Tugas berhasil ditambahkan');
    }


    // Show the form for editing an existing task
    public function edit($id)
    {
        $penugasan = Penugasan::findOrFail($id);
        $users = User::all();
        return view('admin.monitoring_tanggungan_kinerja.edit', compact('penugasan', 'users'));
    }

    // Update an existing task in the database
    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'tertugas' => 'required|array',
    //         'file' => 'nullable|mimes:pdf|max:2048',
    //         'keterangan' => 'required|string',
    //         'status' => 'required|string',
    //         'catatan' => 'nullable|string',
    //     ]);

    //     $penugasan = Penugasan::findOrFail($id);

    //     // Update the file if a new one is uploaded
    //     if ($request->hasFile('file')) {
    //         $fileName = time() . '.' . $request->file('file')->extension();
    //         $path = $request->file('file')->storeAs('public/files', $fileName);
    //         $penugasan->file = $fileName;
    //     }

    //     // Update the other fields
    //     $penugasan->tertugas = implode(',', $validatedData['tertugas']);
    //     $penugasan->keterangan = $validatedData['keterangan'];
    //     $penugasan->status = $validatedData['status'];
    //     $penugasan->catatan = $validatedData['catatan'];
    //     $penugasan->save();

    //     return redirect()->route('Penugasan.index')->with('success', 'Tugas berhasil diupdate.');
    // }
    // Update method
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'tertugas' => 'required|array',
            'file' => 'nullable|mimes:pdf',
            'keterangan' => 'required|string',
            'status' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        // Temukan tugas asli
        $penugasan = Penugasan::findOrFail($id);

        // Jika file baru diupload, ganti file lama
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('files', 'public');
        } else {
            $filePath = $penugasan->file;
        }

        // Hapus semua tugas sebelumnya untuk tertugas yang sama
        Penugasan::where('tertugas', $penugasan->tertugas)->delete();

        // Loop through each tertugas and create a new entry
        foreach ($request->tertugas as $tertugas) {
            Penugasan::create([
                'nama_penugas' => Auth::user()->name,
                'tertugas' => $tertugas,
                'file' => $filePath,
                'keterangan' => $request->keterangan,
                'status' => $request->status,
                'catatan' => $request->catatan,
            ]);
        }

        return redirect()->route('Penugasan.index')->with('success', 'Tugas berhasil diperbarui');
    }

        public function submit($id)
    {
        $penugasan = Penugasan::findOrFail($id);
        // return view('Penugasan.submit', compact('penugasan'));
        return view('admin.monitoring_tanggungan_kinerja.submit', compact('penugasan'));
    }

    public function submitUpdate(Request $request, $id)
    {
        $penugasan = Penugasan::findOrFail($id);
        $penugasan->catatan = $request->input('catatan');
        $penugasan->status = 'Terkirim'; // Mengubah status menjadi 'Terkirim'
        $penugasan->save();

        return redirect()->route('Penugasan.index')->with('success', 'Tugas berhasil disubmit.');
    }

    // Delete an existing task
    public function destroy($id)
    {
        $penugasan = Penugasan::findOrFail($id);
        $penugasan->delete();
        return redirect()->route('Penugasan.index')->with('success', 'Tugas berhasil dihapus.');
    }
    // public function destroy($id)
    // {
    //     $penugasan = Penugasan::findOrFail($id);
    //     $penugasan->delete();
    //     return redirect()->route('Penugasan.index')->with('success', 'Tugas berhasil dihapus.');
    // }

    // Update the status of a task
    public function updateStatus(Request $request, $id)
    {
        $penugasan = Penugasan::findOrFail($id);
        $penugasan->status = $request->status;
        $penugasan->save();

        return redirect()->route('Penugasan.index')->with('success', 'Status berhasil diubah.');
    }

}
