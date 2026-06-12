<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Aditya Pratama',
            'email' => 'aditya.pratama@email.com',
            'password' => Hash::make('password'),
            'nik' => '3275012345678901',
            'no_hp' => '0812-3456-7890',
            'alamat' => 'Jl. Boulevard Raya No. 45, Kebayoran Baru, Jakarta Selatan, 12160'
        ]);

        $this->call([
            KendaraanSeeder::class,
        ]);
    }
}
