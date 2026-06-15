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
                'gambar_utama' => '/images/kendaraan/fortuner.png',
                'gambar_galeri' => [
                    '/images/kendaraan/fortuner.png',
                    '/images/kendaraan/galeri/fortuner_side.png',
                    '/images/kendaraan/galeri/fortuner_interior.png'
                ],
                'spesifikasi' => [
                    'seats' => 7,
                    'transmisi' => 'Otomatis',
                    'bahan_bakar' => 'Diesel',
                    'bagasi' => '4 Koper'
                ]
            ],
            [
                'nama_kendaraan' => 'Toyota Innova Zenix',
                'tipe' => 'Mobil',
                'kategori' => 'MPV',
                'harga_sewa' => 700000,
                'stok' => 5,
                'rating' => 4.9,
                'deskripsi' => 'MPV hybrid yang sangat nyaman untuk keluarga dengan efisiensi bahan bakar yang baik.',
                'gambar_utama' => '/images/kendaraan/zenix.png',
                'gambar_galeri' => [
                    '/images/kendaraan/zenix.png',
                    '/images/kendaraan/galeri/zenix_side.png',
                    '/images/kendaraan/galeri/zenix_interior.png'
                ],
                'spesifikasi' => [
                    'seats' => 7,
                    'transmisi' => 'Otomatis',
                    'bahan_bakar' => 'Bensin',
                    'bagasi' => '4 Koper'
                ]
            ],
            [
                'nama_kendaraan' => 'Mitsubishi Xpander Cross',
                'tipe' => 'Mobil',
                'kategori' => 'MPV',
                'harga_sewa' => 500000,
                'stok' => 4,
                'rating' => 4.7,
                'deskripsi' => 'Kombinasi MPV dan SUV, lega dan nyaman.',
                'gambar_utama' => '/images/kendaraan/xpander.png',
                'gambar_galeri' => [
                    '/images/kendaraan/xpander.png',
                    '/images/kendaraan/galeri/xpander_side.png',
                    '/images/kendaraan/galeri/xpander_interior.png'
                ],
                'spesifikasi' => [
                    'seats' => 7,
                    'transmisi' => 'Otomatis',
                    'bahan_bakar' => 'Bensin',
                    'bagasi' => '3 Koper'
                ]
            ],
            [
                'nama_kendaraan' => 'Honda Brio Satya',
                'tipe' => 'Mobil',
                'kategori' => 'City Car',
                'harga_sewa' => 250000,
                'stok' => 8,
                'rating' => 4.5,
                'deskripsi' => 'Mobil mungil lincah untuk mobilitas perkotaan.',
                'gambar_utama' => '/images/kendaraan/brio.png',
                'gambar_galeri' => [
                    '/images/kendaraan/brio.png',
                    '/images/kendaraan/galeri/brio_side.png',
                    '/images/kendaraan/galeri/brio_interior.png'
                ],
                'spesifikasi' => [
                    'seats' => 4,
                    'transmisi' => 'Manual',
                    'bahan_bakar' => 'Bensin',
                    'bagasi' => '2 Koper'
                ]
            ],
            [
                'nama_kendaraan' => 'Honda CR-V',
                'tipe' => 'Mobil',
                'kategori' => 'SUV',
                'harga_sewa' => 750000,
                'stok' => 2,
                'rating' => 4.8,
                'deskripsi' => 'SUV elegan dengan fitur keselamatan canggih Honda Sensing.',
                'gambar_utama' => '/images/kendaraan/crv.png',
                'gambar_galeri' => [
                    '/images/kendaraan/crv.png',
                    '/images/kendaraan/galeri/crv_side.png',
                    '/images/kendaraan/galeri/crv_interior.png'
                ],
                'spesifikasi' => [
                    'seats' => 6,
                    'transmisi' => 'Otomatis',
                    'bahan_bakar' => 'Bensin',
                    'bagasi' => '3 Koper'
                ]
            ],
            [
                'nama_kendaraan' => 'Toyota Avanza Veloz',
                'tipe' => 'Mobil',
                'kategori' => 'MPV',
                'harga_sewa' => 450000,
                'stok' => 6,
                'rating' => 4.6,
                'deskripsi' => 'Mobil sejuta umat dengan tampilan lebih sporty.',
                'gambar_utama' => '/images/kendaraan/veloz.png',
                'gambar_galeri' => [
                    '/images/kendaraan/veloz.png',
                    '/images/kendaraan/galeri/veloz_side.png',
                    '/images/kendaraan/galeri/veloz_interior.png'
                ],
                'spesifikasi' => [
                    'seats' => 7,
                    'transmisi' => 'Otomatis',
                    'bahan_bakar' => 'Bensin',
                    'bagasi' => '3 Koper'
                ]
            ],
            [
                'nama_kendaraan' => 'Yamaha NMAX 155',
                'tipe' => 'Motor',
                'kategori' => 'Maxi Scooter',
                'harga_sewa' => 150000,
                'stok' => 10,
                'rating' => 4.8,
                'deskripsi' => 'Skuter matik premium yang nyaman untuk jarak jauh dan dekat.',
                'gambar_utama' => '/images/kendaraan/nmax.png',
                'gambar_galeri' => [
                    '/images/kendaraan/nmax.png',
                    '/images/kendaraan/galeri/nmax_side.png',
                    '/images/kendaraan/galeri/nmax_dashboard.png'
                ],
                'spesifikasi' => [
                    'cc' => 150,
                    'transmisi' => 'Otomatis',
                    'bahan_bakar' => 'Bensin'
                ]
            ],
            [
                'nama_kendaraan' => 'Honda PCX 160',
                'tipe' => 'Motor',
                'kategori' => 'Maxi Scooter',
                'harga_sewa' => 150000,
                'stok' => 8,
                'rating' => 4.7,
                'deskripsi' => 'Skuter matik elegan dengan performa bertenaga.',
                'gambar_utama' => '/images/kendaraan/pcx.png',
                'gambar_galeri' => [
                    '/images/kendaraan/pcx.png',
                    '/images/kendaraan/galeri/pcx_side.png',
                    '/images/kendaraan/galeri/pcx_dashboard.png'
                ],
                'spesifikasi' => [
                    'cc' => 150,
                    'transmisi' => 'Otomatis',
                    'bahan_bakar' => 'Bensin'
                ]
            ],
            [
                'nama_kendaraan' => 'Honda Africa Twin',
                'tipe' => 'Motor',
                'kategori' => 'Adventure',
                'harga_sewa' => 550000,
                'stok' => 1,
                'rating' => 4.9,
                'deskripsi' => 'Motor petualang kelas berat untuk touring jarak jauh.',
                'gambar_utama' => '/images/kendaraan/africatwin.png',
                'gambar_galeri' => [
                    '/images/kendaraan/africatwin.png',
                    '/images/kendaraan/galeri/africatwin_side.png',
                    '/images/kendaraan/galeri/africatwin_dashboard.png'
                ],
                'spesifikasi' => [
                    'cc' => 250,
                    'transmisi' => 'Manual',
                    'bahan_bakar' => 'Bensin'
                ]
            ],
            [
                'nama_kendaraan' => 'Honda Vario 125',
                'tipe' => 'Motor',
                'kategori' => 'Scooter',
                'harga_sewa' => 100000,
                'stok' => 15,
                'rating' => 4.5,
                'deskripsi' => 'Skuter matik harian yang lincah dan irit bahan bakar.',
                'gambar_utama' => '/images/kendaraan/vario.png',
                'gambar_galeri' => [
                    '/images/kendaraan/vario.png',
                    '/images/kendaraan/galeri/vario_side.png',
                    '/images/kendaraan/galeri/vario_dashboard.png'
                ],
                'spesifikasi' => [
                    'cc' => 125,
                    'transmisi' => 'Otomatis',
                    'bahan_bakar' => 'Bensin'
                ]
            ]
        ];

        foreach ($kendaraans as $kendaraan) {
            Kendaraan::create($kendaraan);
        }
    }
}
