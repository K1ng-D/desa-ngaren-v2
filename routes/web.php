<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GeografisController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KeuanganDesaController;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\AparaturController;
use App\Http\Controllers\DiagramAparaturController;

// Halaman Profil Desa (umum)
Route::get('/', [ProfileController::class, 'index']);
Route::get('/', [ProfileController::class, 'index'])->name('profile.index');

// Route untuk Login, Logout, dan otentikasi admin
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route Admin Dashboard dan semua fitur yang terhubung
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Route CRUD untuk Sejarah
    Route::get('sejarah', [SejarahController::class, 'index'])->name('admin.sejarah.index');
    Route::get('sejarah/create', [SejarahController::class, 'create'])->name('admin.sejarah.create');
    Route::post('sejarah', [SejarahController::class, 'store'])->name('admin.sejarah.store');
    Route::get('sejarah/{id}/edit', [SejarahController::class, 'edit'])->name('admin.sejarah.edit');
    Route::put('sejarah/{id}', [SejarahController::class, 'update'])->name('admin.sejarah.update');
    Route::delete('sejarah/{id}', [SejarahController::class, 'destroy'])->name('admin.sejarah.destroy');

    // Route CRUD untuk Geografis
    Route::get('geografis', [GeografisController::class, 'index'])->name('admin.geografis.index');
    Route::get('geografis/create', [GeografisController::class, 'create'])->name('admin.geografis.create');
    Route::post('geografis', [GeografisController::class, 'store'])->name('admin.geografis.store');
    Route::get('geografis/{id}/edit', [GeografisController::class, 'edit'])->name('admin.geografis.edit');
    Route::put('geografis/{id}', [GeografisController::class, 'update'])->name('admin.geografis.update');
    Route::delete('geografis/{id}', [GeografisController::class, 'destroy'])->name('admin.geografis.destroy');

    // Route CRUD untuk Berita
    Route::get('berita', [BeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('berita', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('berita/{id}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('berita/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('/admin/berita/{berita}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

    // Route CRUD untuk Keuangan Desa
    Route::get('keuangan', [KeuanganDesaController::class, 'index'])->name('admin.keuangan.index');
    Route::get('keuangan/create', [KeuanganDesaController::class, 'create'])->name('admin.keuangan.create');
    Route::post('keuangan', [KeuanganDesaController::class, 'store'])->name('admin.keuangan.store');
    Route::get('keuangan/{keuangan}/edit', [KeuanganDesaController::class, 'edit'])->name('admin.keuangan.edit');
    Route::put('keuangan/{keuangan}', [KeuanganDesaController::class, 'update'])->name('admin.keuangan.update');
    Route::delete('/admin/keuangan/{keuangan}', [KeuanganDesaController::class, 'destroy'])->name('admin.keuangan.destroy');

    // Route CRUD untuk UMKM
    Route::get('umkm', [UMKMController::class, 'index'])->name('admin.umkm.index');
    Route::get('umkm/create', [UMKMController::class, 'create'])->name('admin.umkm.create');
    Route::post('umkm', [UMKMController::class, 'store'])->name('admin.umkm.store');
    Route::get('umkm/{id}/edit', [UMKMController::class, 'edit'])->name('admin.umkm.edit');
    Route::put('umkm/{id}', [UMKMController::class, 'update'])->name('admin.umkm.update');
    Route::delete('umkm/{umkm}', [UMKMController::class, 'destroy'])->name('admin.umkm.destroy');

    // Route CRUD untuk wisata
    Route::get('wisata/', [WisataController::class, 'index'])->name('admin.wisata.index');  // Menampilkan daftar wisata
    Route::get('wisata/create', [WisataController::class, 'create'])->name('admin.wisata.create'); // Menampilkan form create
    Route::post('wisata/', [WisataController::class, 'store'])->name('admin.wisata.store');  // Proses penyimpanan data baru
    Route::get('wisata/{wisata}/edit', [WisataController::class, 'edit'])->name('admin.wisata.edit'); // Menampilkan form edit
    Route::put('wisata/{wisata}', [WisataController::class, 'update'])->name('admin.wisata.update'); // Proses update data
    Route::delete('wisata/{wisata}', [WisataController::class, 'destroy'])->name('admin.wisata.destroy'); // Proses hapus data

    // Routes for Aparatur
    Route::get('aparatur/', [AparaturController::class, 'index'])->name('admin.aparatur.index');
    Route::get('aparatur/create', [AparaturController::class, 'create'])->name('admin.aparatur.create');
    Route::post('aparatur/', [AparaturController::class, 'store'])->name('admin.aparatur.store');
    Route::get('aparatur/{aparatur}/edit', [AparaturController::class, 'edit'])->name('admin.aparatur.edit');
    Route::put('aparatur/{aparatur}', [AparaturController::class, 'update'])->name('admin.aparatur.update');
    Route::delete('aparatur/{aparatur}', [AparaturController::class, 'destroy'])->name('admin.aparatur.destroy');

    // Routes for Diagram Aparatur
    Route::get('diagramaparatur/create', [DiagramAparaturController::class, 'create'])->name('diagramaparatur.create');
    Route::post('diagramaparatur', [DiagramAparaturController::class, 'store'])->name('diagramaparatur.store');
    // Route::get('diagramaparatur/{diagramAparatur}/edit', [DiagramAparaturController::class, 'edit'])->name('diagramaparatur.edit');
    // Route::get('/admin/diagramaparatur/{id}/edit', [DiagramAparaturController::class, 'edit'])->name('admin.diagramaparatur.edit');

    // Route::put('diagramaparatur/{diagramAparatur}', [DiagramAparaturController::class, 'update'])->name('diagramaparatur.update');
// Edit Diagram Aparatur
Route::get('/admin/diagramaparatur/{id}/edit', [DiagramAparaturController::class, 'edit'])->name('admin.diagramaparatur.edit');

// Update Diagram Aparatur
Route::put('/admin/diagramaparatur/{id}', [DiagramAparaturController::class, 'update'])->name('admin.diagramaparatur.update');


});

// // Route untuk Login, Logout, dan otentikasi admin
// Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login'])->name('login.process');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// // Route Admin Dashboard dan semua fitur yang terhubung
// Route::middleware(['auth'])->prefix('admin')->group(function () {
    
//     // Dashboard Admin
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');
    
//     // Route CRUD untuk Sejarah
//     Route::get('sejarah', [SejarahController::class, 'index'])->name('admin.sejarah.index');
//     Route::get('sejarah/create', [SejarahController::class, 'create'])->name('admin.sejarah.create');
//     Route::post('sejarah', [SejarahController::class, 'store'])->name('admin.sejarah.store');
//     Route::get('sejarah/{id}/edit', [SejarahController::class, 'edit'])->name('admin.sejarah.edit');
//     Route::put('sejarah/{id}', [SejarahController::class, 'update'])->name('admin.sejarah.update');
//     Route::delete('sejarah/{id}', [SejarahController::class, 'destroy'])->name('admin.sejarah.destroy');

//     // Route CRUD untuk Geografis
//     Route::get('geografis', [GeografisController::class, 'index'])->name('admin.geografis.index');
//     Route::get('geografis/create', [GeografisController::class, 'create'])->name('admin.geografis.create');
//     Route::post('geografis', [GeografisController::class, 'store'])->name('admin.geografis.store');
//     Route::get('geografis/{id}/edit', [GeografisController::class, 'edit'])->name('admin.geografis.edit');
//     Route::put('geografis/{id}', [GeografisController::class, 'update'])->name('admin.geografis.update');
//     Route::delete('geografis/{id}', [GeografisController::class, 'destroy'])->name('admin.geografis.destroy');

//     // Route CRUD untuk Berita
//     Route::get('berita', [BeritaController::class, 'index'])->name('admin.berita.index');
//     Route::get('berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
//     Route::post('berita', [BeritaController::class, 'store'])->name('admin.berita.store');
//     Route::get('berita/{id}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
//     Route::put('berita/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
//     Route::delete('berita/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

//     // Route CRUD untuk Keuangan Desa
//     Route::get('keuangan', [KeuanganDesaController::class, 'index'])->name('admin.keuangan.index');
//     Route::get('keuangan/create', [KeuanganDesaController::class, 'create'])->name('admin.keuangan.create');
//     Route::post('keuangan', [KeuanganDesaController::class, 'store'])->name('admin.keuangan.store');
//     Route::get('keuangan/{id}/edit', [KeuanganDesaController::class, 'edit'])->name('admin.keuangan.edit');
//     Route::put('keuangan/{id}', [KeuanganDesaController::class, 'update'])->name('admin.keuangan.update');
//     Route::delete('keuangan/{id}', [KeuanganDesaController::class, 'destroy'])->name('admin.keuangan.destroy');

//     // Route CRUD untuk UMKM
//     Route::get('umkm', [UMKMController::class, 'index'])->name('admin.umkm.index');
//     Route::get('umkm/create', [UMKMController::class, 'create'])->name('admin.umkm.create');
//     Route::post('umkm', [UMKMController::class, 'store'])->name('admin.umkm.store');
//     Route::get('umkm/{id}/edit', [UMKMController::class, 'edit'])->name('admin.umkm.edit');
//     Route::put('/admin/umkm/{id}', [UMKMController::class, 'update'])->name('admin.umkm.update');
//     // Route::delete('admin/umkm/{id}', [UMKMController::class, 'destroy'])->name('admin.umkm.destroy');
//     Route::delete('admin/umkm/{umkm}', [UMKMController::class, 'destroy'])->name('admin.umkm.destroy');

// });
