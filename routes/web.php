<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PublicControllerControllerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriKegiatanController;
use App\Http\Controllers\LaporanKegiatanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenugasanController;
// use App\Http\Controllers\TanggunganKinerjaController;

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
})->name('Beranda');

// Berita Public
// // Route::get('/berita_isi_public', [BeritaController::class,'berita_isi_public']);
// Route::get('/berita_public', [PublicController::class,'berita_public'])->name('BeritaPublic');
// Route::get('/berita_isi_public', [PublicController::class,'berita_isi_public'])->name('BeritaIsiPublic');
// // Route::get('/berita_isi_public/{id}', [PublicController::class,'berita_isi_public'])->name('BeritaIsiPublic');

Route::get('/berita_public', [PublicController::class, 'berita_public'])->name('BeritaPublic');
Route::get('/berita_isi_public/{id}', [PublicController::class, 'berita_isi_public'])->name('BeritaIsiPublic');

// Route::get('/information', function () {
//     return view('public.information');
// });

// Route::get('/berita_public', function () {
//     return view('public.berita_public');
// });

//login
Route::get('/login', [LoginController::class, 'index'])->name('Login');
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('LoginProses');
Route::post('/logout', [LoginController::class, 'logout'])->name('Logout');

// Route::group(['prefix' => 'admin','middlware' => ['auth'], 'as' => 'admin.'] , function() {

// });


//admin
//  Route::get('/dashboard_admin', [AdminController::class,'dashboard_admin']);
Route::get('/dashboard_admin', [KategoriKegiatanController::class, 'index'])->name('KategoriKegiatan.index');

// Route::get('/berita_admin', [BeritaController::class,'berita_admin']);

Route::get('/monitoring_tanggungan_kinerja', [AdminController::class, 'monitoring_tanggungan_kinerja']);

// Route::get('/monitoring_laporan_kegiatan', [AdminController::class,'monitoring_laporan_kegiatan']);

Route::get('/tanggungan_kinerja', [AdminController::class, 'tanggungan_kinerja']);

// Route::get('/laporan_kegiatan', [AdminController::class,'laporan_kegiatan']);

// // Berita Public
// // Route::get('/berita_isi_public', [BeritaController::class,'berita_isi_public']);
// Route::get('/berita_public', [PublicController::class,'berita_public'])->name('BeritaPublic');
// Route::get('/berita_isi_public', [PublicController::class,'berita_isi_public'])->name('BeritaIsiPublic');


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    //kelola pengguna
    Route::middleware(['role:1'])->group(function () {
        Route::get('/kelola_pengguna', [UserController::class, 'kelola_pengguna'])->name('kelola_pengguna');
        Route::get('/kelola_pengguna/create', [UserController::class, 'create'])->name('kelola_pengguna.create');
        Route::post('/admin/pengguna/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/kelola_pengguna/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/kelola_pengguna/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/kelola_pengguna/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    //Laporan Kegiatan
    Route::get('/laporan_kegiatan', [LaporanKegiatanController::class, 'index'])->name('LaporanKegiatan.index');
    Route::get('/laporan_kegiatan/create', [LaporanKegiatanController::class, 'create'])->name('LaporanKegiatan.create');
    Route::post('/laporan_kegiatan/store', [LaporanKegiatanController::class, 'store'])->name('LaporanKegiatan.store');
    Route::get('/laporan_kegiatan/{id}/edit', [LaporanKegiatanController::class, 'edit'])->name('LaporanKegiatan.edit');
    Route::put('/laporan_kegiatan/{id}', [LaporanKegiatanController::class, 'update'])->name('LaporanKegiatan.update');
    Route::delete('/laporan_kegiatan/{id}', [LaporanKegiatanController::class, 'destroy'])->name('LaporanKegiatan.destroy');
    //Monitoring Laporan Kegiatan
    Route::get('/monitoring_laporan_kegiatan', [LaporanKegiatanController::class, 'monitoring_laporan_kegiatan']);

    //Kategori Kegiatan
    Route::get('/kategori_kegiatan', [KategoriKegiatanController::class, 'index'])->name('KategoriKegiatan.index');
    Route::get('/kategori_kegiatan/create', [KategoriKegiatanController::class, 'create'])->name('KategoriKegiatan.create');
    Route::post('/kategori_kegiatan/store', [KategoriKegiatanController::class, 'store'])->name('KategoriKegiatan.store');
    Route::get('/kategori_kegiatan/{id}/edit', [KategoriKegiatanController::class, 'edit'])->name('KategoriKegiatan.edit');
    Route::put('/kategori_kegiatan/{id}', [KategoriKegiatanController::class, 'update'])->name('KategoriKegiatan.update');
    Route::delete('/kategori_kegiatan/{id}', [KategoriKegiatanController::class, 'destroy'])->name('KategoriKegiatan.destroy');

    //CRUD Tabel Tahun
    Route::get('/tahun', [TahunController::class, 'index'])->name('Tahun.index');
    Route::get('/tahun/create', [TahunController::class, 'create'])->name('Tahun.create');
    Route::post('/tahun/store', [TahunController::class, 'store'])->name('Tahun.store');
    Route::get('/tahun/{id}/edit', [TahunController::class, 'edit'])->name('Tahun.edit');
    Route::put('/tahun/{id}', [TahunController::class, 'update'])->name('Tahun.update');
    Route::delete('/tahun/{id}', [TahunController::class, 'destroy'])->name('Tahun.destroy');

    //CRUD Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('Berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('Berita.create');
    Route::post('/berita/store', [BeritaController::class, 'store'])->name('Berita.store');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('Berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('Berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('Berita.destroy');

    // Rute CRUD untuk bidangan Monitoring_Tanggungan_Kinerja
    // Route::middleware(['role:1,2'])->group(function () {
    //     // Route::resource('penugasan', PenugasanController::class);
    //     Route::get('penugasan', [PenugasanController::class, 'index'])->name('Penugasan.index');
    //     Route::post('penugasan/change-status/{penugasan}', [PenugasanController::class, 'changeStatus'])->name('Penugasan.changeStatus');
    //     Route::get('penugasan/cretae', [PenugasanController::class, 'create'])->name('Penugasan.create');
    //     Route::get('penugasan/{penugasan}/edit', [PenugasanController::class, 'edit'])->name('Penugasan.edit');
    //     Route::post('penugasan/{penugasan}', [PenugasanController::class, 'update'])->name('Penugasan.update');
    //     Route::post('penugasan/{penugasan}', [PenugasanController::class, 'update'])->name('Penugasan.destroy');
    // });

    // Route::middleware(['role:3'])->group(function () {
    //     Route::get('penugasan', [PenugasanController::class, 'index'])->name('Penugasan.index');
    //     // Route::get('penugasan/{penugasan}/edit', [PenugasanController::class, 'edit'])->name('Penugasan.edit');
    //     // Route::post('penugasan/{penugasan}', [PenugasanController::class, 'update'])->name('Penugasan.update');
    // });

    //ini udah kena kok, kalau diatasnya gak kena
    // Route::get('penugasan', [PenugasanController::class, 'index'])->name('Penugasan.index');
    // // Route::post('penugasan/change-status/{penugasan}', [PenugasanController::class, 'changeStatus'])->name('Penugasan.changeStatus');
    // Route::post('penugasan/change-status/{penugasan}', [PenugasanController::class, 'updateStatus'])->name('Penugasan.changeStatus');
    // Route::get('penugasan/create', [PenugasanController::class, 'create'])->name('Penugasan.create');
    // Route::post('penugasan/store', [PenugasanController::class, 'store'])->name('Penugasan.store');
    // Route::get('penugasan/{penugasan}/edit', [PenugasanController::class, 'edit'])->name('Penugasan.edit');
    // // Route::post('penugasan/{penugasan}', [PenugasanController::class, 'update'])->name('Penugasan.update');
    // Route::put('{penugasan}', [PenugasanController::class, 'update'])->name('Penugasan.update');
    // // Route::post('penugasan/{penugasan/{id}', [PenugasanController::class, 'destroy'])->name('Penugasan.destroy');
    // Route::delete('/penugasan/{id}', [PenugasanController::class, 'destroy'])->name('Penugasan.destroy');
    // Route::post('/penugasan/{id}/submit', [PenugasanController::class, 'submit'])->name('Penugasan.submit');
    // Route::put('/penugasan/{id}/submitUpdate', [PenugasanController::class, 'submitUpdate'])->name('Penugasan.submitUpdate');

    Route::prefix('penugasan')->group(function () {
        Route::get('/', [PenugasanController::class, 'index'])->name('Penugasan.index');
        Route::post('/change-status/{penugasan}', [PenugasanController::class, 'updateStatus'])->name('Penugasan.changeStatus');
        Route::get('/create', [PenugasanController::class, 'create'])->name('Penugasan.create');
        Route::post('/store', [PenugasanController::class, 'store'])->name('Penugasan.store');
        Route::get('/{penugasan}/edit', [PenugasanController::class, 'edit'])->name('Penugasan.edit');
        Route::put('/{penugasan}', [PenugasanController::class, 'update'])->name('Penugasan.update');
        Route::delete('/{penugasan}', [PenugasanController::class, 'destroy'])->name('Penugasan.destroy');
        Route::post('/{penugasan}/submit', [PenugasanController::class, 'submit'])->name('Penugasan.submit');
        Route::put('/{penugasan}/submitUpdate', [PenugasanController::class, 'submitUpdate'])->name('Penugasan.submitUpdate');
        // Route::get('/penugasan/print', [PenugasanController::class, 'print'])->name('Penugasan.print');
        Route::get('/penugasan/print-all', [PenugasanController::class, 'printAll'])->name('penugasan.print.all');

        Route::get('/cetak-laporan', [PenugasanController::class, 'printForm'])->name('cetak-laporan');
        // Route::post('/cetak-laporan', [PenugasanController::class, 'printData'])->name('cetak.laporan');
        Route::post('/cetak-laporan', [PenugasanController::class, 'printAll'])->name('cetak.laporan');
    });
});



//kelola pengguna
// Route::get('/kelola_pengguna', [UserController::class,'kelola_pengguna'])->name('kelola_pengguna');
// Route::get('/kelola_pengguna/create', [UserController::class,'create'])->name('kelola_pengguna.create');
// Route::post('/admin/pengguna/store', [UserController::class, 'store'])->name('user.store');
// Route::get('/kelola_pengguna/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
// Route::put('/kelola_pengguna/{id}', [UserController::class, 'update'])->name('user.update');
// Route::delete('/kelola_pengguna/{id}', [UserController::class, 'destroy'])->name('user.destroy');

// //Laporan Kegiatan
// Route::get('/laporan_kegiatan', [LaporanKegiatanController::class,'index'])->name('LaporanKegiatan.index');
// Route::get('/laporan_kegiatan/create', [LaporanKegiatanController::class,'create'])->name('LaporanKegiatan.create');
// Route::post('/laporan_kegiatan/store', [LaporanKegiatanController::class, 'store'])->name('LaporanKegiatan.store');
// Route::get('/laporan_kegiatan/{id}/edit', [LaporanKegiatanController::class, 'edit'])->name('LaporanKegiatan.edit');
// Route::put('/laporan_kegiatan/{id}', [LaporanKegiatanController::class, 'update'])->name('LaporanKegiatan.update');
// Route::delete('/laporan_kegiatan/{id}', [LaporanKegiatanController::class, 'destroy'])->name('LaporanKegiatan.destroy');
// //Monitoring Laporan Kegiatan
// Route::get('/monitoring_laporan_kegiatan', [LaporanKegiatanController::class,'monitoring_laporan_kegiatan']);

// //Kategori Kegiatan
// Route::get('/kategori_kegiatan', [KategoriKegiatanController::class,'index'])->name('KategoriKegiatan.index');
// Route::get('/kategori_kegiatan/create', [KategoriKegiatanController::class,'create'])->name('KategoriKegiatan.create');
// Route::post('/kategori_kegiatan/store', [KategoriKegiatanController::class, 'store'])->name('KategoriKegiatan.store');
// Route::get('/kategori_kegiatan/{id}/edit', [KategoriKegiatanController::class, 'edit'])->name('KategoriKegiatan.edit');
// Route::put('/kategori_kegiatan/{id}', [KategoriKegiatanController::class, 'update'])->name('KategoriKegiatan.update');
// Route::delete('/kategori_kegiatan/{id}', [KategoriKegiatanController::class, 'destroy'])->name('KategoriKegiatan.destroy');

// //CRUD Tabel Tahun
// Route::get('/tahun', [TahunController::class,'index'])->name('Tahun.index');
// Route::get('/tahun/create', [TahunController::class,'create'])->name('Tahun.create');
// Route::post('/tahun/store', [TahunController::class, 'store'])->name('Tahun.store');
// Route::get('/tahun/{id}/edit', [TahunController::class, 'edit'])->name('Tahun.edit');
// Route::put('/tahun/{id}', [TahunController::class, 'update'])->name('Tahun.update');
// Route::delete('/tahun/{id}', [TahunController::class, 'destroy'])->name('Tahun.destroy');

// //CRUD Berita
// Route::get('/berita', [BeritaController::class,'index'])->name('Berita.index');
// Route::get('/berita/create', [BeritaController::class,'create'])->name('Berita.create');
// Route::post('/berita/store', [BeritaController::class, 'store'])->name('Berita.store');
// Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('Berita.edit');
// Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('Berita.update');
// Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('Berita.destroy');

//CRUD Tanggungan Kinerja
// Route::get('/tanggungan_kinerja', [TanggunganKinerjaController::class,'index'])->name('TanggunganKinerja.index');
// Route::get('/tanggungan_kinerja/create', [TanggunganKinerjaController::class,'create'])->name('TanggunganKinerja.create');
// Route::post('/tanggungan_kinerja/store', [TanggunganKinerjaController::class, 'store'])->name('TanggunganKinerja.store');
// Route::get('/tanggungan_kinerja/{id}/edit', [TanggunganKinerjaController::class, 'edit'])->name('TanggunganKinerja.edit');
// Route::put('/tanggungan_kinerja/{id}', [TanggunganKinerjaController::class, 'update'])->name('TanggunganKinerja.update');
// Route::delete('/tanggungan_kinerja/{id}', [TanggunganKinerjaController::class, 'destroy'])->name('TanggunganKinerja.destroy');
