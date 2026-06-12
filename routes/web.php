<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KendaraanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('/pemesanan/riwayat', [App\Http\Controllers\PemesananController::class, 'riwayat'])->name('pemesanan.riwayat');
    Route::post('/pemesanan', [App\Http\Controllers\PemesananController::class, 'store'])->name('pemesanan.store');
    Route::post('/pemesanan/{id}/bayar-denda', [App\Http\Controllers\PemesananController::class, 'bayarDenda'])->name('pemesanan.bayarDenda');
});

require __DIR__.'/auth.php';
