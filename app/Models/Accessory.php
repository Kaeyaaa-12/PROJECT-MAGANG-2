<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_aksesoris',
        'kategori',
        'stok_varian', // Mengganti 'ukuran' dan 'stok'
        'gambar_1',
        'gambar_2',
        'gambar_3',
    ];

    /**
     * Cast atribut stok_varian menjadi array.
     */
    protected $casts = [
        'stok_varian' => 'array',
    ];
}
