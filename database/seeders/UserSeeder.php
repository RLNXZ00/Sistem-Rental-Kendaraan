<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Akun Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@autoride.com',
            'password' => Hash::make('password'),
            'nik' => '1111222233334444',
            'no_hp' => '080000000001',
            'alamat' => 'Kantor Pusat AutoRide',
            'is_admin' => true,
        ]);

        // Akun Pengguna Biasa
        User::create([
            'name' => 'Aditya Pratama',
            'email' => 'aditya.pratama@email.com',
            'password' => Hash::make('password'),
            'nik' => '3275012345678901',
            'no_hp' => '0812-3456-7890',
            'alamat' => 'Jl. Boulevard Raya No. 45, Kebayoran Baru, Jakarta Selatan, 12160',
            'is_admin' => false,
        ]);
    }
}
