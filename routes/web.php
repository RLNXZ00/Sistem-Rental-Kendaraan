<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/tentang-kami', function () {
    return view('tentang-kami');
})->name('tentang-kami');
Route::post('/umpan-balik', [BerandaController::class, 'storeFeedback'])->name('umpan-balik.store')->middleware('auth');

Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan.index');
Route::get('/kendaraan/rating', [KendaraanController::class, 'rating'])->name('kendaraan.rating');
Route::get('/kendaraan/{id}', [KendaraanController::class, 'show'])->name('kendaraan.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/notifikasi', [ProfileController::class, 'notifikasi'])->name('profile.notifikasi');
    Route::get('/profile/bahasa', [ProfileController::class, 'bahasa'])->name('profile.bahasa');

    // Rute Pemesanan
    Route::get('/pemesanan/riwayat', [App\Http\Controllers\PemesananController::class, 'riwayat'])->name('pemesanan.riwayat');
    Route::get('/pemesanan/create/{id}', [App\Http\Controllers\PemesananController::class, 'create'])->name('pemesanan.create');
    Route::post('/pemesanan', [App\Http\Controllers\PemesananController::class, 'store'])->name('pemesanan.store');
    Route::get('/pemesanan/{id}/pembayaran', [App\Http\Controllers\PemesananController::class, 'pembayaran'])->name('pemesanan.pembayaran');
    Route::post('/pemesanan/{id}/pembayaran', [App\Http\Controllers\PemesananController::class, 'prosesPembayaran'])->name('pemesanan.prosesPembayaran');
    Route::get('/pemesanan/{id}/bayar-denda', [App\Http\Controllers\PemesananController::class, 'pembayaranDenda'])->name('pemesanan.pembayaranDenda');
    Route::post('/pemesanan/{id}/bayar-denda', [App\Http\Controllers\PemesananController::class, 'bayarDenda'])->name('pemesanan.bayarDenda');
});

// Rute Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return "Ini adalah halaman Dashboard Admin (Akses Terlindungi)";
    })->name('dashboard');
});

require __DIR__ . '/auth.php';
