<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PublicControllerControllerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminController;

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
Route::get('/dashboard_admin', [AdminController::class,'dashboard_admin']);

Route::get('/berita_admin', [BeritaController::class,'berita_admin']);

Route::get('/monitoring_tanggungan_kinerja', [AdminController::class,'monitoring_tanggungan_kinerja']);

Route::get('/monitoring_laporan_kegiatan', [AdminController::class,'monitoring_laporan_kegiatan']);

Route::get('/tanggungan_kinerja', [AdminController::class,'tanggungan_kinerja']);

Route::get('/laporan_kegiatan', [AdminController::class,'laporan_kegiatan']);

Route::get('/kelola_pengguna', [AdminController::class,'kelola_pengguna']);
