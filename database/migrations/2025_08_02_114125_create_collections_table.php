<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->id(); // Membuat kolom 'id' sebagai Primary Key Auto-Increment
            $table->string('nama_koleksi'); // Kolom untuk nama koleksi (tipe data VARCHAR)
            $table->string('kategori'); // Kolom untuk kategori koleksi (tipe data VARCHAR)
            $table->json('stok_varian'); // Kolom untuk menyimpan data stok dalam format JSON
            $table->string('gambar_1')->nullable(); // Kolom untuk path gambar 1, bisa kosong
            $table->string('gambar_2')->nullable(); // Kolom untuk path gambar 2, bisa kosong
            $table->string('gambar_3')->nullable(); // Kolom untuk path gambar 3, bisa kosong
            $table->timestamps(); // Membuat kolom 'created_at' dan 'updated_at' secara otomatis
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('collections'); // Perintah untuk menghapus tabel 'collections' jika migrasi di-rollback
    }
};