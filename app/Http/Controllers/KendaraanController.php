<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Menampilkan katalog kendaraan dengan fitur filter.
     */
    public function index(Request $request)
    {
        $query = Kendaraan::query();

        // Filter berdasarkan tipe (Mobil / Motor)
        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }

        // Filter berdasarkan kategori (misal: SUV, Matic, Sport)
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Pagination untuk UI grid
        $kendaraans = $query->paginate(9);

        return view('kendaraan.index', compact('kendaraans'));
    }

    /**
     * Menampilkan daftar kendaraan berdasarkan rating tertinggi.
     */
    public function rating()
    {
        // Mengambil kendaraan diurutkan dari rating terbesar
        $kendaraans = Kendaraan::withCount('umpanBaliks')
            ->orderBy('rating', 'desc')
            ->paginate(10);

        return view('kendaraan.rating', compact('kendaraans'));
    }

    /**
     * Menampilkan detail spesifik kendaraan beserta umpan baliknya.
     */
    public function show($id)
    {
        $kendaraan = Kendaraan::with(['umpanBaliks.user' => function($q) {
            $q->latest();
        }])->findOrFail($id);

        return view('kendaraan.show', compact('kendaraan'));
    }
}
