<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kendaraan');
            $table->enum('tipe', ['Mobil', 'Motor']);
            $table->string('kategori')->nullable();
            $table->decimal('harga_sewa', 12, 2);
            $table->integer('stok')->default(1);
            $table->decimal('rating', 3, 2)->default(0);
            $table->text('deskripsi')->nullable();
            $table->string('gambar_utama')->nullable();
            $table->json('gambar_galeri')->nullable();
            $table->json('spesifikasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
