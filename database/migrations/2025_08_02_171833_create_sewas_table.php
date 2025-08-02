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
        Schema::create('sewas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penyewa');
            $table->string('nomor_whatsapp');
            $table->text('alamat');
            $table->morphs('rentable'); // Ini akan membuat rentable_id dan rentable_type
            $table->string('varian'); // Menyimpan varian/ukuran yang disewa
            $table->integer('jumlah');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewas');
    }
};
