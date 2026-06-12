<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\UmpanBalik;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Menampilkan halaman beranda dengan kendaraan unggulan dan umpan balik.
     */
    public function index()
    {
        // Mengambil kendaraan unggulan berdasarkan rating tertinggi
        $kendaraanUnggulan = Kendaraan::orderBy('rating', 'desc')->take(4)->get();

        // Mengambil umpan balik terbaru dari pengguna beserta relasinya
        $umpanBalik = UmpanBalik::with(['user', 'kendaraan'])
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

        UmpanBalik::create([
            'user_id' => auth()->id(),
            'kendaraan_id' => $request->kendaraan_id,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas umpan balik Anda!');
    }
}
