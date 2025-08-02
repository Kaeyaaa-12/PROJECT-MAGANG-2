<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_koleksi',
        'kategori',
        'stok_varian',
        'gambar_1',
        'gambar_2',
        'gambar_3',
    ];

    protected $casts = [
        'stok_varian' => 'array',
    ];

    /**
     * [PERBAIKAN] Mengubah relasi dari sewa() ke rentalItems().
     * Satu Koleksi bisa ada di banyak item sewa (rental_items).
     */
    public function rentalItems()
    {
        return $this->morphMany(RentalItem::class, 'rentable');
    }
}