<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PemesananController extends Controller
{
    /**
     * Memproses transaksi penyewaan (Kalkulasi otomatis)
     */
    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        $kendaraan = Kendaraan::findOrFail($request->kendaraan_id);
        
        $tglMulai = Carbon::parse($request->tanggal_mulai);
        $tglSelesai = Carbon::parse($request->tanggal_selesai);
        $durasiHari = $tglMulai->diffInDays($tglSelesai) ?: 1; // Minimal 1 hari jika sewa di hari yang sama
        
        // Kalkulasi: durasi x harga_sewa
        $totalBiaya = $durasiHari * $kendaraan->harga_sewa;

        Pemesanan::create([
            'user_id' => auth()->id(),
            'kendaraan_id' => $kendaraan->id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'durasi_hari' => $durasiHari,
            'total_biaya' => $totalBiaya,
            'status' => 'Menunggu Pembayaran',
            'denda' => 0
        ]);

        return redirect()->route('pemesanan.riwayat')->with('success', 'Pesanan berhasil dibuat. Silakan selesaikan pembayaran Anda.');
    }

    /**
     * Menampilkan riwayat pemesanan beserta logika sanksi/denda
     */
    public function riwayat()
    {
        $pemesanans = Pemesanan::with('kendaraan')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        $hariIni = Carbon::now()->startOfDay();

        foreach ($pemesanans as $pesanan) {
            // Logika Denda: Jika pesanan Sedang Berjalan dan tanggal saat ini melewati tanggal selesai
            if ($pesanan->status === 'Berjalan') {
                $tglSelesai = Carbon::parse($pesanan->tanggal_selesai)->startOfDay();
                
                if ($hariIni->gt($tglSelesai)) {
                    $keterlambatanHari = $tglSelesai->diffInDays($hariIni);
                    if ($keterlambatanHari > 0) {
                        // Implementasi denda: 10% per hari dari harga sewa (asumsi per hari sesuai diskusi plan)
                        $dendaPerHari = $pesanan->kendaraan->harga_sewa * 0.10;
                        $totalDenda = $keterlambatanHari * $dendaPerHari;
                        
                        // Update denda otomatis di database
                        if ($pesanan->denda != $totalDenda) {
                            $pesanan->update(['denda' => $totalDenda]);
                        }
                    }
                }
            }
        }

        return view('pemesanan.riwayat', compact('pemesanans'));
    }

    /**
     * Memproses simulasi pelunasan denda
     */
    public function bayarDenda($id)
    {
        $pesanan = Pemesanan::where('user_id', auth()->id())->findOrFail($id);

        if ($pesanan->denda > 0) {
            // Reset denda jadi 0 dan ubah status jadi Selesai (mobil dianggap kembali dan lunas)
            $pesanan->update([
                'denda' => 0,
                'status' => 'Selesai'
            ]);
            return redirect()->back()->with('success', 'Pembayaran denda berhasil dilakukan. Status penyewaan selesai.');
        }

        return redirect()->back()->with('error', 'Tidak ada tagihan denda pada pesanan ini.');
    }
}
