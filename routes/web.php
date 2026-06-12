<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PemesananController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
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

    // Rute Pemesanan
    Route::get('/pemesanan/riwayat', [PemesananController::class, 'riwayat'])->name('pemesanan.riwayat');
    Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');
    Route::post('/pemesanan/{id}/bayar-denda', [PemesananController::class, 'bayarDenda'])->name('pemesanan.bayarDenda');
});

require __DIR__.'/auth.php';
