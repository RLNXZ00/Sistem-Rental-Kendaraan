<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Kendaraan;
use Carbon\Carbon;

class PemesananSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $kendaraans = Kendaraan::all();

        if ($users->isEmpty() || $kendaraans->isEmpty()) {
            return;
        }

        // Aktif - hari ini selesai
        Pemesanan::create([
            'user_id' => $users->random()->id,
            'kendaraan_id' => $kendaraans->random()->id,
            'tanggal_mulai' => Carbon::yesterday(),
            'tanggal_selesai' => Carbon::today()->addHours(14),
            'durasi_hari' => 2,
            'total_biaya' => 900000,
            'status' => 'Berjalan',
        ]);

        // Aktif - terlambat
        Pemesanan::create([
            'user_id' => $users->random()->id,
            'kendaraan_id' => $kendaraans->random()->id,
            'tanggal_mulai' => Carbon::now()->subDays(3),
            'tanggal_selesai' => Carbon::yesterday()->addHours(12),
            'durasi_hari' => 2,
            'total_biaya' => 1200000,
            'status' => 'Denda Terlambat',
        ]);

        // Menunggu
        Pemesanan::create([
            'user_id' => $users->random()->id,
            'kendaraan_id' => $kendaraans->random()->id,
            'tanggal_mulai' => Carbon::tomorrow(),
            'tanggal_selesai' => Carbon::tomorrow()->addDays(2)->addHours(10),
            'durasi_hari' => 2,
            'total_biaya' => 600000,
            'status' => 'Akan Datang',
        ]);

        // Selesai
        Pemesanan::create([
            'user_id' => $users->random()->id,
            'kendaraan_id' => $kendaraans->random()->id,
            'tanggal_mulai' => Carbon::now()->subDays(5),
            'tanggal_selesai' => Carbon::now()->subDays(4),
            'durasi_hari' => 1,
            'total_biaya' => 300000,
            'status' => 'Selesai',
        ]);
        
        // Aktif - upcoming return
        Pemesanan::create([
            'user_id' => $users->random()->id,
            'kendaraan_id' => $kendaraans->random()->id,
            'tanggal_mulai' => Carbon::today(),
            'tanggal_selesai' => Carbon::tomorrow()->addHours(18),
            'durasi_hari' => 1,
            'total_biaya' => 450000,
            'status' => 'Berjalan',
        ]);
    }
}
