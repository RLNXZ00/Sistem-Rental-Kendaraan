<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminArmadaController extends Controller
{
    /**
     * Tampilkan daftar kendaraan.
     */
    public function index()
    {
        $kendaraans = Kendaraan::latest()->get();
        return view('admin.armada.index', compact('kendaraans'));
    }

    /**
     * Simpan kendaraan baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kendaraan' => 'required|string|max:255',
            'tipe' => 'required|string|max:100',
            'kategori' => 'required|string|max:100',
            'harga_sewa' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar_utama' => 'nullable|image|max:2048',
            // fields for spesifikasi
            'kapasitas_penumpang' => 'nullable|string',
            'transmisi' => 'nullable|string',
            'bahan_bakar' => 'nullable|string',
            'kapasitas_bagasi' => 'nullable|string',
        ]);

        // Gabungkan spesifikasi
        $spesifikasi = [];
        if ($request->kapasitas_penumpang) $spesifikasi['kapasitas_penumpang'] = $request->kapasitas_penumpang;
        if ($request->transmisi) $spesifikasi['transmisi'] = $request->transmisi;
        if ($request->bahan_bakar) $spesifikasi['bahan_bakar'] = $request->bahan_bakar;
        if ($request->kapasitas_bagasi) $spesifikasi['kapasitas_bagasi'] = $request->kapasitas_bagasi;

        $gambarPath = null;
        if ($request->hasFile('gambar_utama')) {
            $path = $request->file('gambar_utama')->store('public/images/kendaraan');
            $gambarPath = str_replace('public/', 'storage/', $path);
        }

        Kendaraan::create([
            'nama_kendaraan' => $validated['nama_kendaraan'],
            'tipe' => $validated['tipe'],
            'kategori' => $validated['kategori'],
            'harga_sewa' => $validated['harga_sewa'],
            'stok' => $validated['stok'],
            'deskripsi' => $validated['deskripsi'],
            'gambar_utama' => $gambarPath,
            'spesifikasi' => $spesifikasi,
            'rating' => 0 // rating default
        ]);

        return redirect()->route('admin.armada.index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    /**
     * Update kendaraan.
     */
    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $validated = $request->validate([
            'nama_kendaraan' => 'required|string|max:255',
            'tipe' => 'required|string|max:100',
            'kategori' => 'required|string|max:100',
            'harga_sewa' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar_utama' => 'nullable|image|max:2048',
            // fields for spesifikasi
            'kapasitas_penumpang' => 'nullable|string',
            'transmisi' => 'nullable|string',
            'bahan_bakar' => 'nullable|string',
            'kapasitas_bagasi' => 'nullable|string',
        ]);

        $spesifikasi = $kendaraan->spesifikasi ?? [];
        if ($request->kapasitas_penumpang) $spesifikasi['kapasitas_penumpang'] = $request->kapasitas_penumpang;
        if ($request->transmisi) $spesifikasi['transmisi'] = $request->transmisi;
        if ($request->bahan_bakar) $spesifikasi['bahan_bakar'] = $request->bahan_bakar;
        if ($request->kapasitas_bagasi) $spesifikasi['kapasitas_bagasi'] = $request->kapasitas_bagasi;

        $gambarPath = $kendaraan->gambar_utama;
        if ($request->hasFile('gambar_utama')) {
            $path = $request->file('gambar_utama')->store('public/images/kendaraan');
            $gambarPath = str_replace('public/', 'storage/', $path);
        }

        $kendaraan->update([
            'nama_kendaraan' => $validated['nama_kendaraan'],
            'tipe' => $validated['tipe'],
            'kategori' => $validated['kategori'],
            'harga_sewa' => $validated['harga_sewa'],
            'stok' => $validated['stok'],
            'deskripsi' => $validated['deskripsi'],
            'gambar_utama' => $gambarPath,
            'spesifikasi' => $spesifikasi,
        ]);

        return redirect()->route('admin.armada.index')->with('success', 'Kendaraan berhasil diperbarui.');
    }

    /**
     * Hapus kendaraan.
     */
    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return redirect()->route('admin.armada.index')->with('success', 'Kendaraan berhasil dihapus.');
    }
}
