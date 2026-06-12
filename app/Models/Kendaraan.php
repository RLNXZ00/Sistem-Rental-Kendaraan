<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $fillable = [
        'nama_kendaraan', 'tipe', 'kategori', 'harga_sewa', 'stok', 'rating', 'deskripsi', 'gambar_utama', 'gambar_galeri', 'spesifikasi'
    ];

    protected $casts = [
        'gambar_galeri' => 'array',
        'spesifikasi' => 'array',
    ];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function umpanBaliks()
    {
        return $this->hasMany(UmpanBalik::class);
    }
}
