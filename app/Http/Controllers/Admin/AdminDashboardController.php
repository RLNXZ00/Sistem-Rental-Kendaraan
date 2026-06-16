<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UmpanBalik;
// use App\Models\Kendaraan; // for later
// use App\Models\Pemesanan; // for later

class AdminDashboardController extends Controller
{
    public function index()
    {
        // For now, only Umpan Balik is requested, but we return the view
        $latestUmpanBalik = UmpanBalik::with(['user', 'kendaraan'])->latest()->take(3)->get();
        $totalUmpanBalik = UmpanBalik::count();
        return view('admin.dashboard.index', compact('latestUmpanBalik', 'totalUmpanBalik'));
    }

    public function umpanBalik()
    {
        $semuaUmpanBalik = UmpanBalik::with(['user', 'kendaraan'])->latest()->get();
        return view('admin.dashboard.umpan-balik', compact('semuaUmpanBalik'));
    }

    public function detailUlasan($id)
    {
        $semuaUmpanBalik = UmpanBalik::with(['user', 'kendaraan'])->latest()->get();
        $selectedUlasan = UmpanBalik::with(['user', 'kendaraan'])->findOrFail($id);
        
        return view('admin.dashboard.detail-ulasan', compact('semuaUmpanBalik', 'selectedUlasan'));
    }

    public function pesananAktif()
    {
        return view('admin.dashboard.pesanan-aktif');
    }
}
