<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the vehicles with optional filters.
     */
    public function index(Request $request)
    {
        // Input validation to secure against SQL injection and invalid parameters
        $validated = $request->validate([
            'tipe' => 'sometimes|string|in:Mobil,Motor',
            'seats' => 'sometimes|array',
            'seats.*' => 'integer|in:2,4,6,7',
            'cc' => 'sometimes|array',
            'cc.*' => 'integer|in:125,150,250',
        ]);

        $tipe = $request->input('tipe', 'Mobil');
        $query = Kendaraan::query()->where('tipe', $tipe);

        // Apply dynamic sub-type filters based on JSON specifications column
        if ($tipe === 'Mobil' && $request->has('seats')) {
            $seats = array_map('intval', (array) $request->input('seats'));
            $query->whereIn('spesifikasi->seats', $seats);
        } elseif ($tipe === 'Motor' && $request->has('cc')) {
            $cc = array_map('intval', (array) $request->input('cc'));
            $query->whereIn('spesifikasi->cc', $cc);
        }

        $kendaraans = $query->get();

        // Get top 3 highest-rated vehicles for the sidebar
        $topRated = Kendaraan::query()
            ->orderByDesc('rating')
            ->limit(3)
            ->get();

        return view('kendaraan.index', compact('kendaraans', 'topRated', 'tipe'));
    }

    /**
     * Display the specified vehicle.
     */
    public function show($id)
    {
        // Retrieve vehicle or fail with 404
        $kendaraan = Kendaraan::findOrFail($id);

        return view('kendaraan.detail', compact('kendaraan'));
    }

    /**
     * Display top rated vehicles with custom sorting.
     */
    public function rating(Request $request)
    {
        $validated = $request->validate([
            'sort' => 'sometimes|string|in:Rating Tertinggi,Ulasan Terbaru,Paling Banyak Diulas',
        ]);

        $sort = $request->input('sort', 'Rating Tertinggi');

        $query = Kendaraan::query();

        if ($sort === 'Rating Tertinggi') {
            $query->orderByDesc('rating');
        } elseif ($sort === 'Ulasan Terbaru') {
            // Sort by the latest umpan_balik created date using strict-mode safe withMax
            $query->withMax('umpanBaliks', 'created_at')
                ->orderByDesc('umpan_baliks_max_created_at');
        } elseif ($sort === 'Paling Banyak Diulas') {
            // Sort by the count of reviews/testimonials
            $query->withCount('umpanBaliks')
                ->orderByDesc('umpan_baliks_count');
        }

        $vehicles = $query->get();

        return view('kendaraan.rating', compact('vehicles', 'sort'));
    }
}
