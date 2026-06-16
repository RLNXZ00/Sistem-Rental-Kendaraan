<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kendaraan;

class DashboardController extends Controller
{
    public function index()
    {
        $armadaTerbaru = Kendaraan::latest()->take(3)->get();
        
        return view('admin.dashboard.index', compact('armadaTerbaru'));
    }
}
