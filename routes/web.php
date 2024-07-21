<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PublicControllerControllerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriKegiatanController;
use App\Http\Controllers\LaporanKegiatanController;
use App\Http\Controllers\UserController;
use App\Models\KategoriKegiatan;
use App\Http\Controllers\TahunController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//public
Route::get('/', function () {
    // return view('welcome');
    return view('public/dashboard');
});

Route::get('/dashboard', function () {
    // return view('welcome');
    return view('public/dashboard');
});

// Route::get('/information', function () {
//     return view('public.information');
// });

Route::get('/berita_public', function () {
    return view('public.berita_public');
});

Route::get('/berita_isi_public', [PublicController::class,'berita_isi_public']);

// Route::get('/berita_isi_public', [BeritaController::class, 'show_berita'])->name('berita.isi');

// Route::get('/berita_isi_public', [BeritaController::class,'show_berita']);




//admin
//  Route::get('/dashboard_admin', [AdminController::class,'dashboard_admin']);
Route::get('/dashboard_admin', [KategoriKegiatanController::class,'index'])->name('KategoriKegiatan.index');

Route::get('/berita_admin', [BeritaController::class,'berita_admin']);

Route::get('/monitoring_tanggungan_kinerja', [AdminController::class,'monitoring_tanggungan_kinerja']);

// Route::get('/monitoring_laporan_kegiatan', [AdminController::class,'monitoring_laporan_kegiatan']);

Route::get('/tanggungan_kinerja', [AdminController::class,'tanggungan_kinerja']);

// Route::get('/laporan_kegiatan', [AdminController::class,'laporan_kegiatan']);


//kelola pengguna
// Route::get('/kelola_pengguna', [AdminController::class,'kelola_pengguna']);
Route::get('/kelola_pengguna', [UserController::class,'kelola_pengguna'])->name('kelola_pengguna');
Route::get('/kelola_pengguna/create', [UserController::class,'create'])->name('kelola_pengguna.create');
Route::post('/admin/pengguna/store', [UserController::class, 'store'])->name('user.store');
Route::get('/kelola_pengguna/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/kelola_pengguna/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/kelola_pengguna/{id}', [UserController::class, 'destroy'])->name('user.destroy');

//Laporan Kegiatan
// Route::get('/laporan_kegiatan', [LaporanKegiatanController::class,'index']);
Route::get('/laporan_kegiatan', [LaporanKegiatanController::class,'index'])->name('LaporanKegiatan.index');
Route::get('/laporan_kegiatan/create', [LaporanKegiatanController::class,'create'])->name('LaporanKegiatan.create');
Route::post('/laporan_kegiatan/store', [LaporanKegiatanController::class, 'store'])->name('LaporanKegiatan.store');
Route::get('/laporan_kegiatan/{id}/edit', [LaporanKegiatanController::class, 'edit'])->name('LaporanKegiatan.edit');
Route::put('/laporan_kegiatan/{id}', [LaporanKegiatanController::class, 'update'])->name('LaporanKegiatan.update');
Route::delete('/laporan_kegiatan/{id}', [LaporanKegiatanController::class, 'destroy'])->name('LaporanKegiatan.destroy');
//Monitoring Laporan Kegiatan
Route::get('/monitoring_laporan_kegiatan', [LaporanKegiatanController::class,'monitoring_laporan_kegiatan']);

//Kategori Kegiatan
Route::get('/kategori_kegiatan', [KategoriKegiatanController::class,'index'])->name('KategoriKegiatan.index');
Route::get('/kategori_kegiatan/create', [KategoriKegiatanController::class,'create'])->name('KategoriKegiatan.create');
Route::post('/kategori_kegiatan/store', [KategoriKegiatanController::class, 'store'])->name('KategoriKegiatan.store');
Route::get('/kategori_kegiatan/{id}/edit', [KategoriKegiatanController::class, 'edit'])->name('KategoriKegiatan.edit');
Route::put('/kategori_kegiatan/{id}', [KategoriKegiatanController::class, 'update'])->name('KategoriKegiatan.update');
Route::delete('/kategori_kegiatan/{id}', [KategoriKegiatanController::class, 'destroy'])->name('KategoriKegiatan.destroy');

//CRUD Tabel Tahun
Route::get('/tahun', [TahunController::class,'index'])->name('Tahun.index');
Route::get('/tahun/create', [TahunController::class,'create'])->name('Tahun.create');
Route::post('/tahun/store', [TahunController::class, 'store'])->name('Tahun.store');
Route::get('/tahun/{id}/edit', [TahunController::class, 'edit'])->name('Tahun.edit');
Route::put('/tahun/{id}', [TahunController::class, 'update'])->name('Tahun.update');
Route::delete('/tahun/{id}', [TahunController::class, 'destroy'])->name('Tahun.destroy');

//
