<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\UmpanBalik;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Menampilkan halaman beranda dengan kendaraan unggulan dan umpan balik.
     */
    public function index()
    {
        // Mengambil kendaraan unggulan berdasarkan rating tertinggi
        // Disempurnakan: Hanya yang stoknya tersedia (>0) dan menghitung jumlah ulasan (withCount)
        $kendaraanUnggulan = Kendaraan::withCount('umpanBaliks')
            ->where('stok', '>', 0)
            ->orderByDesc('rating')
            ->take(4)
            ->get();

        // Mengambil umpan balik terbaru dari pengguna beserta relasinya
        // Disempurnakan: Hanya menampilkan rating 4 atau 5 sebagai testimonial unggulan
        $umpanBalik = UmpanBalik::with(['user', 'kendaraan'])
            ->where('rating', '>=', 4)
            ->latest()
            ->take(5)
            ->get();

        return view('beranda', compact('kendaraanUnggulan', 'umpanBalik'));
    }

    /**
     * Menyimpan umpan balik dari pengguna.
     */
    public function storeFeedback(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:500',
        ]);

        $userId = auth()->id();
        $kendaraanId = $request->kendaraan_id;

        // Pencegahan Spam: Pastikan user belum pernah memberikan feedback untuk kendaraan ini
        $sudahFeedback = UmpanBalik::where('user_id', $userId)
            ->where('kendaraan_id', $kendaraanId)
            ->exists();

        if ($sudahFeedback) {
            return redirect()->back()->with('error', 'Gagal: Anda sudah pernah memberikan umpan balik untuk kendaraan ini sebelumnya.');
        }

        // Validasi Logika Ekstra: Pastikan user benar-benar pernah menyewa dan menyelesaikan pesanan kendaraan ini
        $pernahSewa = Pemesanan::where('user_id', $userId)
            ->where('kendaraan_id', $kendaraanId)
            ->whereIn('status', ['Selesai'])
            ->exists();

        if (!$pernahSewa) {
            return redirect()->back()->with('error', 'Gagal: Anda hanya dapat memberikan ulasan pada kendaraan yang telah selesai Anda sewa.');
        }

        UmpanBalik::create([
            'user_id' => $userId,
            'kendaraan_id' => $kendaraanId,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas umpan balik Anda!');
    }
}
