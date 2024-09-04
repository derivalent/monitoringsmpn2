<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penugasan;
use App\Models\User;
use App\Models\Tahun;
use App\Models\KategoriKegiatan;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Storage;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class PenugasanController extends Controller
{
    // Display the list of tasks with optional filtering by month and year
    public function index(Request $request)
    {
        $query = Penugasan::with('kategoriKegiatan');
        $query = Penugasan::query();

        if ($request->filled('bulan')) {
            $query->whereMonth('created_at', $request->bulan);
        }

        if ($request->filled('tahun')) {
            $query->whereYear('created_at', $request->tahun);
        }

        $penugasan = $query->get();
        $users = User::all();
        $currentUser = Auth::user();
        $tahun = Tahun::all();
        $kategoriKegiatan = KategoriKegiatan::all();

        return view('admin.monitoring_tanggungan_kinerja.index', compact('penugasan', 'users', 'currentUser', 'tahun', 'kategoriKegiatan'));
    }

    // Show the form for creating a new task
    public function create()
    {
        $users = User::all();
        $kategoriKegiatan = KategoriKegiatan::all();
        return view('admin.monitoring_tanggungan_kinerja.create', compact('users', 'kategoriKegiatan'));
    }

    // Store a newly created task in the database
    public function store(Request $request)
    {
        $request->validate([
            'tertugas' => 'required|array',
            'file' => 'nullable|mimes:pdf',
            'kegiatan' => 'required|string',
            'status' => 'required|string',
            'catatan' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        // Upload file PDF if present
        // $filePath = $request->hasFile('file') ? $request->file('file')->store('files', 'public') : null;

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('files', 'public');
        }

        // Loop through each 'tertugas' and create a separate entry
        foreach ($request->tertugas as $tertugas) {
            Penugasan::create([
                'nama_penugas' => Auth::user()->name,
                'tertugas' => $tertugas,
                'file' => $filePath,
                'kegiatan' => $request->kegiatan,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'deadline' => $request->deadline,
                'pengumpulan' => null, // Set to null initially
            ]);
        }

        return redirect()->route('Penugasan.index')->with('success', 'Tugas berhasil ditambahkan');
    }

    // Show the form for editing an existing task
    public function edit($id)
    {
        $penugasan = Penugasan::findOrFail($id);
        $users = User::all();
        $kategoriKegiatan = KategoriKegiatan::all();
        return view('admin.monitoring_tanggungan_kinerja.edit', compact('penugasan', 'users', 'kategoriKegiatan'));
    }

    // Update an existing task in the database
    // public function update(Request $request, $id)
    // {
    //     // dd($request->all());
    // //     return redirect()->route('Penugasan.index')->with('success', 'Tugas berhasil diperbarui');
    // $penugasan = Penugasan::findOrFail($id);
    // $penugasan->kegiatan = $request->kegiatan;
    // $penugasan->catatan = $request->input('catatan');
    // $penugasan->status = 'Terkirim'; // Change status to 'Terkirim'
    // $penugasan->pengumpulan = now(); // Set the current date and time as 'pengumpulan'
    // $penugasan->save();

    // return redirect()->route('Penugasan.index')->with('success', 'Tugas berhasil disubmit.');

    // }

    public function update(Request $request, $id)
{
    // Temukan penugasan berdasarkan ID
    $penugasan = Penugasan::findOrFail($id);

    // Validasi data yang diterima dari form
    $request->validate([
        'kategori_kegiatan' => 'required|integer|exists:kategori_kegiatan,id',
        'tertugas' => 'required|array',
        'file' => 'nullable|mimes:pdf|max:2048',
        'catatan' => 'nullable|string',
        'status' => 'required|string',
        'deadline' => 'required|date',
    ]);

    // Perbarui record penugasan
    $penugasan->update([
        'kegiatan' => $request->input('kategori_kegiatan'),
        'tertugas' => implode(',', $request->input('tertugas')), // Simpan sebagai string terpisah
        'catatan' => $request->input('catatan'),
        'status' => $request->input('status'),
        'deadline' => $request->input('deadline'),
        'pengumpulan' => $request->input('status') == 'Terkirim' ? now() : $penugasan->pengumpulan,
    ]);

    // Tangani upload file jika ada
    if ($request->hasFile('file')) {
        // Hapus file lama jika ada
        if ($penugasan->file) {
            Storage::delete($penugasan->file);
        }

        $file = $request->file('file')->store('files', 'public');
        $penugasan->file = $file;
    }

    $penugasan->save();

    return redirect()->route('Penugasan.index')->with('success', 'Tugas berhasil diperbarui.');
}




    //gak kena ini
    // public function update(Request $request, Penugasan $penugasan)
    // {
    //     // Validate incoming request data
    //     $validatedData = $request->validate([
    //         'tertugas' => 'required|array',
    //         'file' => 'nullable|mimes:pdf|max:2048',
    //         'kegiatan' => 'required|string',
    //         'status' => 'required|in:Tugas-Baru,Terkirim,Diperbaiki,Ditolak,Selesai',
    //         'catatan' => 'nullable|string',
    //         'deadline' => 'required|date',
    //     ]);

    //     // Handle file upload
    //     if ($request->hasFile('file')) {
    //         // Delete old file
    //         if ($penugasan->file) {
    //             Storage::delete($penugasan->file);
    //         }

    //         $fileName = time() . '.' . $request->file('file')->extension();
    //         $path = $request->file('file')->storeAs('files', $fileName, 'public');
    //     } else {
    //         $path = $penugasan->file; // Keep existing file if no new file is uploaded
    //     }

    //     // Update the penugasan record
    //     $penugasan->update([
    //         'tertugas' => json_encode($validatedData['tertugas']), // Store as JSON
    //         'file' => $path,
    //         'kegiatan' => $validatedData['kegiatan'],
    //         'status' => $validatedData['status'],
    //         'catatan' => $validatedData['catatan'],
    //         'deadline' => $validatedData['deadline'],
    //     ]);

    //     return redirect()->route('Penugasan.index')->with('success', 'Tugas berhasil diperbarui.');
    // }

//hampir kena
    // public function update(Request $request, $id)
    // {
    //     // dd($request->all());
    //     $request->validate([
    //         'tertugas' => 'required|array',
    //         'file' => 'nullable|mimes:pdf',
    //         'kegiatan' => 'required|string',
    //         'status' => 'required|string',
    //         'catatan' => 'nullable|string',
    //         'deadline' => 'nullable|date',
    //     ]);

    //     $penugasan = Penugasan::findOrFail($id);

    //     // Handle file upload if present
    //     $filePath = $request->hasFile('file') ? $request->file('file')->store('files', 'public') : $penugasan->file;

    //     // Update the existing penugasan or create a new one if needed
    //     $penugasan->update([
    //         'nama_penugas' => Auth::user()->name,
    //         'tertugas' => implode(',', $request->tertugas),
    //         'file' => $filePath,
    //         'kegiatan' => $request->kegiatan,
    //         'status' => $request->status,
    //         'catatan' => $request->catatan,
    //         'deadline' => $request->deadline,
    //         'pengumpulan' => $penugasan->pengumpulan, // Retain existing value
    //     ]);
    //     dd($request->all());

    //     return redirect()->route('Penugasan.index')->with('success', 'Tugas berhasil diperbarui');
    // }



    // Show the form for submitting a task
    public function submit($id)
    {
        $penugasan = Penugasan::findOrFail($id);
        $kategoriKegiatan = KategoriKegiatan::all();
        return view('admin.monitoring_tanggungan_kinerja.submit', compact('penugasan', 'kategoriKegiatan'));
    }

    // Update a task's status to 'Terkirim', add a note, and set the submission date
    public function submitUpdate(Request $request, $id)
    {
        $penugasan = Penugasan::findOrFail($id);
        $penugasan->catatan = $request->input('catatan');
        $penugasan->status = 'Terkirim'; // Change status to 'Terkirim'
        $penugasan->pengumpulan = now(); // Set the current date and time as 'pengumpulan'
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

    // Update the status of a task
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:Tugas Baru,Terkirim,Diperbaiki,Ditolak,Selesai',
        ]);

        $penugasan = Penugasan::findOrFail($id);
        $penugasan->status = $request->status;
        $penugasan->save();

        return redirect()->route('Penugasan.index')->with('success', 'Status berhasil diubah.');
    }

    // public function print(Request $request)
    // {
    //     // Ambil data penugasan berdasarkan filter (jika ada)
    //     $query = Penugasan::with('kategoriKegiatan');
    //     $query = Penugasan::query();

    //     if ($request->filled('bulan')) {
    //         $query->whereMonth('created_at', $request->bulan);
    //     }

    //     if ($request->filled('tahun')) {
    //         $query->whereYear('created_at', $request->tahun);
    //     }

    //     $penugasan = $query->get();

    //     // Load view dan generate PDF
    //     $pdf = PDF::loadView('admin.monitoring_tanggungan_kinerja.print', compact('penugasan'));
    //     foreach ($penugasan as $item) {
    //         $item->kegiatan; // Now you can access 'kegiatan'
    //     }

    //     $penugasan = $query->get();
    //     $users = User::all();
    //     $currentUser = Auth::user();
    //     $tahun = Tahun::all();
    //     $kategoriKegiatan = KategoriKegiatan::all();

    //     // Download PDF
    //     return $pdf->download('laporan_penugasan.pdf', compact('penugasan', 'users', 'currentUser', 'tahun', 'kategoriKegiatan'));
    // }

//     public function print(Request $request)
// {
//     // Ambil data penugasan berdasarkan filter (jika ada)
//     $query = Penugasan::with('kategoriKegiatan');
//     if ($request->filled('bulan')) {
//         $query->whereMonth('created_at', $request->bulan);
//     }
//     if ($request->filled('tahun')) {
//         $query->whereYear('created_at', $request->tahun);
//     }
//     $penugasan = $query->get();

//     // Generate PDF untuk setiap penugasan
//     foreach ($penugasan as $item) {
//         $pdf = PDF::loadView('admin.monitoring_tanggungan_kinerja.print', compact('item'));
//         return $pdf->download('laporan_penugasan_' . $item->id . '.pdf');
//     }
// }

public function printAll(Request $request)
{
    // Ambil data penugasan berdasarkan filter
    $query = Penugasan::with('kategoriKegiatan');
    // ... (kondisi filter)

    $penugasan = $query->get();

    // Generate PDF untuk semua data
    $pdf = PDF::loadView('admin.monitoring_tanggungan_kinerja.print_all', compact('penugasan'));
    return $pdf->download('laporan_penugasan_semua.pdf');
}
}
