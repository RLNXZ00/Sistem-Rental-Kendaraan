<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    /**
     * Menampilkan riwayat pemesanan pengguna beserta logika pengecekan denda otomatis.
     */
    public function riwayat()
    {
        $user = Auth::user();
        
        // Ambil semua pemesanan user
        $pemesanans = Pemesanan::with('kendaraan')->where('user_id', $user->id)->get();

        foreach ($pemesanans as $pesanan) {
            // Logika Sanksi/Denda otomatis: 
            // Cek jika statusnya masih Berjalan, dan hari ini melebihi tanggal selesai
            if ($pesanan->status === 'Berjalan') {
                $tanggalSelesai = Carbon::parse($pesanan->tanggal_selesai);
                $hariIni = Carbon::now()->startOfDay();

                if ($hariIni->greaterThan($tanggalSelesai)) {
                    // Hitung keterlambatan (hari)
                    $terlambatHari = $tanggalSelesai->diffInDays($hariIni);
                    
                    if ($terlambatHari > 0) {
                        // Harga sewa per hari
                        $hargaSewa = $pesanan->kendaraan->harga_sewa;
                        // Denda: (Harga sewa harian + 10% harga sewa harian) * jumlah hari terlambat
                        $dendaPerHari = $hargaSewa + ($hargaSewa * 0.10);
                        $totalDenda = $dendaPerHari * $terlambatHari;

                        // Update status dan denda
                        $pesanan->status = 'Denda Terlambat';
                        $pesanan->denda = $totalDenda;
                        $pesanan->save();
                    }
                }
            }
        }

        // Pisahkan data untuk tampilan (Active vs History)
        $pemesananAktif = Pemesanan::with('kendaraan')
            ->where('user_id', $user->id)
            ->whereIn('status', ['Akan Datang', 'Berjalan'])
            ->orderBy('tanggal_mulai', 'asc')
            ->get();

        $riwayatPemesanan = Pemesanan::with('kendaraan')
            ->where('user_id', $user->id)
            ->whereIn('status', ['Selesai', 'Dibatalkan', 'Denda Terlambat'])
            ->orderBy('tanggal_mulai', 'desc')
            ->get();

        // Mengembalikan ke view dengan data yang sudah diolah
        return view('pemesanan.riwayat', compact('pemesananAktif', 'riwayatPemesanan'));
    }

    /**
     * Menampilkan form pemesanan kendaraan.
     */
    public function create($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('pemesanan.create', compact('kendaraan'));
    }

    /**
     * Menyimpan pemesanan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'durasi_hari' => 'required|integer|min:1',
            'nik' => 'nullable|string|max:20',
            'alamat' => 'nullable|string'
        ]);

        $user = Auth::user();
        
        // Simpan NIK dan Alamat ke profil user jika sebelumnya kosong
        if (empty($user->nik) || empty($user->alamat)) {
            $user->nik = $request->nik ?? $user->nik;
            $user->alamat = $request->alamat ?? $user->alamat;
            $user->save();
        }

        $kendaraan = Kendaraan::findOrFail($request->kendaraan_id);
        
        // Kalkulasi biaya otomatis: durasi * harga sewa
        $durasiHari = (int) $request->durasi_hari;
        $totalBiaya = $durasiHari * $kendaraan->harga_sewa;
        
        // Kalkulasi tanggal selesai
        $tanggalMulai = Carbon::parse($request->tanggal_mulai);
        $tanggalSelesai = $tanggalMulai->copy()->addDays($durasiHari);

        // Buat pemesanan
        $pesanan = Pemesanan::create([
            'user_id' => Auth::id(),
            'kendaraan_id' => $kendaraan->id,
            'tanggal_mulai' => $tanggalMulai,
            'tanggal_selesai' => $tanggalSelesai,
            'durasi_hari' => $durasiHari,
            'total_biaya' => $totalBiaya,
            'status' => 'Akan Datang',
            'denda' => 0
        ]);

        return redirect()->route('pemesanan.pembayaran', $pesanan->id)->with('success', 'Pemesanan berhasil dibuat. Silakan selesaikan pembayaran.');
    }

    /**
     * Menampilkan halaman pembayaran.
     */
    public function pembayaran($id)
    {
        $pesanan = Pemesanan::with('kendaraan')->where('user_id', Auth::id())->findOrFail($id);
        return view('pemesanan.pembayaran', compact('pesanan'));
    }

    /**
     * Proses pembayaran (Simulasi Uji Coba)
     */
    public function prosesPembayaran(Request $request, $id)
    {
        $pesanan = Pemesanan::where('user_id', Auth::id())->findOrFail($id);
        
        // Simulasi pembayaran selalu berhasil untuk uji coba
        $pesanan->status = 'Akan Datang';
        $pesanan->save();

        return redirect()->route('pemesanan.riwayat')->with('success', 'Pembayaran berhasil dikonfirmasi! Pesanan Anda telah aktif.');
    }

    /**
     * Simulasi pembayaran denda keterlambatan.
     */
    public function bayarDenda(Request $request, $id)
    {
        $pesanan = Pemesanan::where('user_id', Auth::id())->findOrFail($id);

        if ($pesanan->status === 'Denda Terlambat') {
            // Anggap denda dibayar
            $pesanan->status = 'Selesai';
            $pesanan->save();

            return redirect()->back()->with('success', 'Denda berhasil dibayarkan. Pemesanan telah Selesai.');
        }

        return redirect()->back()->with('error', 'Status pesanan tidak valid untuk pembayaran denda.');
    }
}
