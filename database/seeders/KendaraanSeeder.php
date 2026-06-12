<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kendaraans = [
            [
                'nama_kendaraan' => 'Toyota Fortuner GR Sport',
                'tipe' => 'Mobil',
                'kategori' => 'SUV',
                'harga_sewa' => 800000,
                'stok' => 3,
                'rating' => 4.8,
                'deskripsi' => 'Mobil SUV premium dengan performa tangguh untuk perjalanan dalam dan luar kota.',
                'gambar_utama' => 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'nama_kendaraan' => 'Toyota Innova Zenix',
                'tipe' => 'Mobil',
                'kategori' => 'MPV',
                'harga_sewa' => 700000,
                'stok' => 5,
                'rating' => 4.9,
                'deskripsi' => 'MPV hybrid yang sangat nyaman untuk keluarga dengan efisiensi bahan bakar yang baik.',
                'gambar_utama' => 'https://images.unsplash.com/photo-1549317661-bd32c8ce0be2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'nama_kendaraan' => 'Mitsubishi Xpander Cross',
                'tipe' => 'Mobil',
                'kategori' => 'MPV',
                'harga_sewa' => 500000,
                'stok' => 4,
                'rating' => 4.7,
                'deskripsi' => 'Kombinasi MPV dan SUV, lega dan nyaman.',
                'gambar_utama' => 'https://images.unsplash.com/photo-1621007947382-bb3c3994e3fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'nama_kendaraan' => 'Honda Brio Satya',
                'tipe' => 'Mobil',
                'kategori' => 'City Car',
                'harga_sewa' => 250000,
                'stok' => 8,
                'rating' => 4.5,
                'deskripsi' => 'Mobil mungil lincah untuk mobilitas perkotaan.',
                'gambar_utama' => 'https://images.unsplash.com/photo-1590362891991-f766f5f76b5c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'nama_kendaraan' => 'Honda CR-V',
                'tipe' => 'Mobil',
                'kategori' => 'SUV',
                'harga_sewa' => 750000,
                'stok' => 2,
                'rating' => 4.8,
                'deskripsi' => 'SUV elegan dengan fitur keselamatan canggih Honda Sensing.',
                'gambar_utama' => 'https://images.unsplash.com/photo-1506057213367-028a17ec52e5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'nama_kendaraan' => 'Toyota Avanza Veloz',
                'tipe' => 'Mobil',
                'kategori' => 'MPV',
                'harga_sewa' => 450000,
                'stok' => 6,
                'rating' => 4.6,
                'deskripsi' => 'Mobil sejuta umat dengan tampilan lebih sporty.',
                'gambar_utama' => 'https://images.unsplash.com/photo-1609521263047-f8f205293f24?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'nama_kendaraan' => 'Yamaha NMAX 155',
                'tipe' => 'Motor',
                'kategori' => 'Maxi Scooter',
                'harga_sewa' => 150000,
                'stok' => 10,
                'rating' => 4.8,
                'deskripsi' => 'Skuter matik premium yang nyaman untuk jarak jauh dan dekat.',
                'gambar_utama' => 'https://images.unsplash.com/photo-1558981403-c5f9899a28bc?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'nama_kendaraan' => 'Honda PCX 160',
                'tipe' => 'Motor',
                'kategori' => 'Maxi Scooter',
                'harga_sewa' => 150000,
                'stok' => 8,
                'rating' => 4.7,
                'deskripsi' => 'Skuter matik elegan dengan performa bertenaga.',
                'gambar_utama' => 'https://images.unsplash.com/photo-1568772585407-9361f9bf3a87?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'nama_kendaraan' => 'Honda Africa Twin',
                'tipe' => 'Motor',
                'kategori' => 'Adventure',
                'harga_sewa' => 550000,
                'stok' => 1,
                'rating' => 4.9,
                'deskripsi' => 'Motor petualang kelas berat untuk touring jarak jauh.',
                'gambar_utama' => 'https://images.unsplash.com/photo-1558980394-0a06c4631733?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'nama_kendaraan' => 'Honda Vario 125',
                'tipe' => 'Motor',
                'kategori' => 'Scooter',
                'harga_sewa' => 100000,
                'stok' => 15,
                'rating' => 4.5,
                'deskripsi' => 'Skuter matik harian yang lincah dan irit bahan bakar.',
                'gambar_utama' => 'https://images.unsplash.com/photo-1625068221840-08d1f2b1d310?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ]
        ];

        foreach ($kendaraans as $kendaraan) {
            Kendaraan::create($kendaraan);
        }
    }
}
