<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminPesananController extends Controller
{
    /**
     * Menampilkan daftar pesanan yang sedang aktif.
     */
    public function aktif()
    {
        // Update status secara otomatis jika ada yang terlambat (sama seperti di PemesananController)
        $semuaBerjalan = Pemesanan::with('kendaraan')->where('status', 'Berjalan')->get();
        foreach ($semuaBerjalan as $pesanan) {
            $tanggalSelesai = Carbon::parse($pesanan->tanggal_selesai);
            $hariIni = Carbon::now()->startOfDay();

            if ($hariIni->greaterThan($tanggalSelesai)) {
                $terlambatHari = $tanggalSelesai->diffInDays($hariIni);
                if ($terlambatHari > 0) {
                    $hargaSewa = $pesanan->kendaraan->harga_sewa;
                    $dendaPerHari = $hargaSewa + ($hargaSewa * 0.10);
                    $totalDenda = $dendaPerHari * $terlambatHari;

                    $pesanan->status = 'Denda Terlambat';
                    $pesanan->denda = $totalDenda;
                    $pesanan->save();
                }
            }
        }

        // Ambil pesanan yang aktif
        $pesanans = Pemesanan::with(['user', 'kendaraan'])
            ->whereIn('status', ['Akan Datang', 'Berjalan', 'Denda Terlambat'])
            ->orderBy('tanggal_mulai', 'asc')
            ->get();

        return view('admin.dashboard.pesanan-aktif', compact('pesanans'));
    }

    /**
     * Tandai kendaraan telah dikembalikan.
     */
    public function kembalikan(Request $request, $id)
    {
        $pesanan = Pemesanan::findOrFail($id);

        if (in_array($pesanan->status, ['Berjalan', 'Denda Terlambat'])) {
            $pesanan->status = 'Selesai';
            $pesanan->save();

            // Kembalikan stok kendaraan
            if ($pesanan->kendaraan) {
                $pesanan->kendaraan->increment('stok');
            }

            return redirect()->back()->with('success', 'Kendaraan berhasil ditandai sebagai dikembalikan.');
        }

        return redirect()->back()->with('error', 'Status pesanan ini tidak dapat dikembalikan.');
    }
}
