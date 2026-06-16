<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kendaraan;
use App\Models\UmpanBalik;

class DashboardController extends Controller
{
    public function index()
    {
        $armadaTerbaru = Kendaraan::latest()->take(3)->get();
        $latestUmpanBalik = UmpanBalik::with(['user', 'kendaraan'])->latest()->take(3)->get();
        $totalUmpanBalik = UmpanBalik::count();
        
        return view('admin.dashboard.index', compact('armadaTerbaru', 'latestUmpanBalik', 'totalUmpanBalik'));
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
}
