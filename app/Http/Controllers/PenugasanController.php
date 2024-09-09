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
use Carbon\Carbon;



class PenugasanController extends Controller
{
    // Display dengan filter bulan dan tahun
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

    public function index_data(Request $request)
    {
        // Mendapatkan nama user yang sedang login
        $userName = Auth::user()->name;

        // Membuat query untuk mengambil data penugasan
        $query = Penugasan::with('kategoriKegiatan');

        // Menyaring data berdasarkan bulan jika ada
        if ($request->filled('bulan')) {
            $query->whereMonth('created_at', $request->bulan);
        }

        // Menyaring data berdasarkan tahun jika ada
        if ($request->filled('tahun')) {
            $query->whereYear('created_at', $request->tahun);
        }

        // Menyaring data penugasan yang tertugas sesuai dengan nama user yang login
        $query->whereJsonContains('tertugas', $userName);

        // Mengambil data penugasan yang telah difilter
        $penugasan = $query->get();

        // Mengambil data tambahan untuk view
        $users = User::all();
        $currentUser = Auth::user();
        $tahun = Tahun::all();
        $kategoriKegiatan = KategoriKegiatan::all();

        // Mengembalikan view dengan data penugasan yang sesuai
        return view('admin.monitoring_tanggungan_kinerja.index_data', compact('penugasan', 'users', 'currentUser', 'tahun', 'kategoriKegiatan'));
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

    // Show the form for submitting a task
    public function submit($id)
    {
        $penugasan = Penugasan::findOrFail($id);
        $kategoriKegiatan = KategoriKegiatan::all();
        return view('admin.monitoring_tanggungan_kinerja.submit', compact('penugasan', 'kategoriKegiatan'));
    }

    public function submit_data($id)
    {
        $penugasan = Penugasan::findOrFail($id);
        $kategoriKegiatan = KategoriKegiatan::all();
        return view('admin.monitoring_tanggungan_kinerja.submit_data', compact('penugasan', 'kategoriKegiatan'));
    }

    // Update a task's status to 'Terkirim', add a note, and set the submission date
    // public function submitUpdate(Request $request, $id)
    // {
    //     $penugasan = Penugasan::findOrFail($id);
    //     $penugasan->catatan = $request->input('catatan');
    //     $penugasan->status = 'Terkirim'; // Change status to 'Terkirim'
    //     $penugasan->pengumpulan = now(); // Set the current date and time as 'pengumpulan'
    //     $penugasan->save();

    //     return redirect()->route('Penugasan.index')->with('success', 'Tugas berhasil disubmit.');
    // }
    public function submitUpdate(Request $request, $id)
{
    // Temukan penugasan berdasarkan ID
    $penugasan = Penugasan::findOrFail($id);

    // Validasi data yang diterima dari form
    $request->validate([
        'file' => 'nullable|mimes:pdf|max:2048',
        'catatan' => 'nullable|string',
    ]);

    // Update catatan
    $penugasan->catatan = $request->input('catatan');
    $penugasan->status = 'Terkirim'; // Change status to 'Terkirim'
    $penugasan->pengumpulan = now(); // Set the current date and time as 'pengumpulan'

    // Tangani upload file jika ada
    if ($request->hasFile('file')) {
        // Hapus file lama jika ada
        if ($penugasan->file) {
            Storage::delete($penugasan->file);
        }

        // Upload file baru dan simpan path-nya
        $file = $request->file('file')->store('files', 'public');
        $penugasan->file = $file;
    }

    // Simpan perubahan ke database
    $penugasan->save();

    return redirect()->route('Penugasan.index')->with('success', 'Tugas berhasil disubmit.');
}

public function submitUpdate_data(Request $request, $id)
{
    // Temukan penugasan berdasarkan ID
    $penugasan = Penugasan::findOrFail($id);

    // Validasi data yang diterima dari form
    $request->validate([
        'file' => 'nullable|mimes:pdf|max:2048',
        'catatan' => 'nullable|string',
    ]);

    // Update catatan
    $penugasan->catatan = $request->input('catatan');
    $penugasan->status = 'Terkirim'; // Change status to 'Terkirim'
    $penugasan->pengumpulan = now(); // Set the current date and time as 'pengumpulan'

    // Tangani upload file jika ada
    if ($request->hasFile('file')) {
        // Hapus file lama jika ada
        if ($penugasan->file) {
            Storage::delete($penugasan->file);
        }

        // Upload file baru dan simpan path-nya
        $file = $request->file('file')->store('files', 'public');
        $penugasan->file = $file;
    }

    // Simpan perubahan ke database
    $penugasan->save();

    return redirect()->route('Penugasan.index_data')->with('success', 'Tugas berhasil disubmit.');
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


public function printForm()
{
    return view('admin.monitoring_tanggungan_kinerja.cetak_laporan');
}

//ini bisa
public function printAll(Request $request)
{
    Carbon::setLocale('id');

    // Ambil data penugasan berdasarkan filter
    $query = Penugasan::with('kategoriKegiatan');

    if ($request->has('start_date') && $request->has('end_date')) {
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);
        $query->whereBetween('deadline', [$startDate, $endDate]);
    }

    $penugasan = $query->get();
    // dd($penugasan);
    // Generate PDF untuk semua data
    $pdf = PDF::loadView('admin.monitoring_tanggungan_kinerja.print_all', compact('penugasan'));
    return $pdf->download('Laporan_Tannggungan_Kinerja.pdf');
}

}
