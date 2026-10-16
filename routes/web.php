<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/umkm', [PageController::class, 'umkm'])->name('umkm');
Route::get('/data-penduduk', [PageController::class, 'penduduk'])->name('penduduk');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
Route::post('/kontak/kirim', [PageController::class, 'simpanPengaduan'])->name('pengaduan.kirim');

Route::get('/login', [PageController::class, 'halamanLogin'])->name('login');
Route::post('/login/proses', [PageController::class, 'prosesLogin'])->name('login.proses');
Route::post('/logout', [PageController::class, 'prosesLogout'])->name('logout');

Route::get('/berita', [PageController::class, 'semuaBerita'])->name('berita.semua');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::post('/berita/simpan', [AdminController::class, 'simpanBerita'])->name('berita.simpan');
    Route::post('/umkm/simpan', [AdminController::class, 'simpanUmkm'])->name('umkm.simpan');

    Route::post('/pengaduan/status/{id}', [AdminController::class, 'updateStatus'])->name('admin.pengaduan.status');
    Route::delete('/pengaduan/hapus/{id}', [AdminController::class, 'hapusPengaduan'])->name('admin.pengaduan.hapus');

    Route::get('/pengaduan/cetak-pdf', [AdminController::class, 'cetakPdf'])->name('admin.pengaduan.pdf');
});
