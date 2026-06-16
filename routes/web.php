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
    Route::post('/profile/photos', [ProfileController::class, 'updatePhotos'])->name('profile.photos.update');
    Route::delete('/profile/photos/{type}', [ProfileController::class, 'destroyPhoto'])->name('profile.photos.destroy');
    Route::get('/profile/notifikasi', [ProfileController::class, 'notifikasi'])->name('profile.notifikasi');
    Route::post('/profile/notifikasi/read', [ProfileController::class, 'markNotificationsAsRead'])->name('profile.notifikasi.read');
    Route::get('/profile/bahasa', [ProfileController::class, 'bahasa'])->name('profile.bahasa');
    Route::get('/profile/password', [ProfileController::class, 'password'])->name('profile.password');

    // Rute Pemesanan
    Route::get('/pemesanan/riwayat', [App\Http\Controllers\PemesananController::class, 'riwayat'])->name('pemesanan.riwayat');
    Route::get('/pemesanan/create/{id}', [App\Http\Controllers\PemesananController::class, 'create'])->name('pemesanan.create');
    Route::post('/pemesanan', [App\Http\Controllers\PemesananController::class, 'store'])->name('pemesanan.store');
    Route::get('/pemesanan/{id}/pembayaran', [App\Http\Controllers\PemesananController::class, 'pembayaran'])->name('pemesanan.pembayaran');
    Route::post('/pemesanan/{id}/pembayaran', [App\Http\Controllers\PemesananController::class, 'prosesPembayaran'])->name('pemesanan.prosesPembayaran');
    Route::get('/pemesanan/{id}/bayar-denda', [App\Http\Controllers\PemesananController::class, 'pembayaranDenda'])->name('pemesanan.pembayaranDenda');
    Route::post('/pemesanan/{id}/bayar-denda', [App\Http\Controllers\PemesananController::class, 'bayarDenda'])->name('pemesanan.bayarDenda');
    Route::post('/pemesanan/{id}/batal', [App\Http\Controllers\PemesananController::class, 'batalkan'])->name('pemesanan.batalkan');
});

// Rute Admin (Middleware 'admin' dinonaktifkan sementara untuk preview UI)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard.index');
    
    Route::get('/dashboard/pesanan-aktif', function () {
        return view('admin.dashboard.pesanan-aktif');
    })->name('dashboard.pesanan-aktif');
    
    Route::get('/dashboard/umpan-balik', function () {
        return view('admin.dashboard.umpan-balik');
    })->name('dashboard.umpan-balik');
    
    Route::get('/dashboard/detail-ulasan', function () {
        return view('admin.dashboard.detail-ulasan');
    })->name('dashboard.detail-ulasan');

    // Tentang
    Route::get('/tentang', function () {
        return view('admin.tentang');
    })->name('tentang');

    // Keamanan
    Route::get('/keamanan', [\App\Http\Controllers\Admin\AdminKeamananController::class, 'index'])->name('keamanan.index');

    // Slicing UI Admin Armada
    Route::get('/armada', function () {
        return view('admin.armada.index');
    })->name('armada.index');
});

require __DIR__ . '/auth.php';
