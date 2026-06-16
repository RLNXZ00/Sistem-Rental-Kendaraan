<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pemesanan;
use App\Models\Kendaraan;
use App\Models\UmpanBalik;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        // Statistik High Level
        $totalPengguna = User::count();
        $totalPemesanan = Pemesanan::count();
        $jumlahUmpanBalik = UmpanBalik::count();

        // Armada Terbaru
        $armadaTerbaru = Kendaraan::orderBy('created_at', 'desc')->take(3)->get();

        // Umpan Balik Terbaru
        $umpanBalikTerbaru = UmpanBalik::with(['user'])->orderBy('created_at', 'desc')->take(3)->get();

        // Summary Pesanan
        $sedangDipesanCount = Pemesanan::where('status', 'Berjalan')->count();
        $menungguCount = Pemesanan::whereIn('status', ['Menunggu Pembayaran', 'Akan Datang'])->count();
        $belumDikembalikanCount = Pemesanan::where('status', 'Berjalan')
            ->whereDate('tanggal_selesai', '<', Carbon::today())
            ->count();

        // Daftar Pesanan Aktif (untuk ditabel dashboard)
        $queryPesanan = Pemesanan::with(['user', 'kendaraan'])
            ->whereIn('status', ['Menunggu Pembayaran', 'Akan Datang', 'Berjalan', 'Denda Terlambat']);

        if ($search) {
            $queryPesanan->where(function ($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($qu) use ($search) {
                      $qu->where('name', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
                  })
                  ->orWhereHas('kendaraan', function ($qk) use ($search) {
                      $qk->where('nama_kendaraan', 'like', "%{$search}%");
                  });
            });
        }

        $pesananAktif = $queryPesanan->orderBy('tanggal_mulai', 'asc')
            ->take(5)
            ->get();

        return view('admin.dashboard.index', compact(
            'totalPengguna',
            'totalPemesanan',
            'jumlahUmpanBalik',
            'armadaTerbaru',
            'umpanBalikTerbaru',
            'sedangDipesanCount',
            'menungguCount',
            'belumDikembalikanCount',
            'pesananAktif'
        ));
    }

    public function pesananAktif(Request $request)
    {
        $statusFilter = $request->get('filter', 'all'); // 'all', 'today', 'overdue', 'tomorrow'
        
        $query = Pemesanan::with(['user', 'kendaraan'])
            ->whereIn('status', ['Menunggu Pembayaran', 'Akan Datang', 'Berjalan', 'Denda Terlambat']);

        if ($statusFilter === 'overdue') {
            $query->whereDate('tanggal_selesai', '<', Carbon::today());
        } elseif ($statusFilter === 'today') {
            $query->whereDate('tanggal_selesai', Carbon::today());
        } elseif ($statusFilter === 'tomorrow') {
            $query->whereDate('tanggal_selesai', Carbon::tomorrow());
        }

        $pemesanans = $query->orderBy('tanggal_selesai', 'asc')->paginate(10);

        // Hitung aggregat untuk tab filter
        $counts = [
            'all' => Pemesanan::whereIn('status', ['Menunggu Pembayaran', 'Akan Datang', 'Berjalan', 'Denda Terlambat'])->count(),
            'today' => Pemesanan::whereIn('status', ['Menunggu Pembayaran', 'Akan Datang', 'Berjalan'])->whereDate('tanggal_selesai', Carbon::today())->count(),
            'overdue' => Pemesanan::whereIn('status', ['Berjalan', 'Denda Terlambat'])->whereDate('tanggal_selesai', '<', Carbon::today())->count(),
            'tomorrow' => Pemesanan::whereIn('status', ['Menunggu Pembayaran', 'Akan Datang', 'Berjalan'])->whereDate('tanggal_selesai', Carbon::tomorrow())->count(),
        ];

        return view('admin.dashboard.pesanan-aktif', compact('pemesanans', 'counts', 'statusFilter'));
    }

    public function tandaiDikembalikan(Request $request, $id)
    {
        $pesanan = Pemesanan::findOrFail($id);
        
        // Asumsi 'Selesai' berarti sudah dikembalikan
        $pesanan->status = 'Selesai';
        // Hitung denda jika ada logic denda (bisa dikembangkan nanti)
        $pesanan->save();

        return redirect()->back()->with('success', 'Pesanan #' . $id . ' telah ditandai sebagai dikembalikan.');
    }
}
