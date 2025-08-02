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
     * Satu Aksesoris bisa ada di banyak item sewa (rental_items).
     */
    public function rentalItems()
    {
        return $this->morphMany(RentalItem::class, 'rentable');
    }
}