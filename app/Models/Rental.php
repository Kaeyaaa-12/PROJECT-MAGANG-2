<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penyewa',
        'nomor_whatsapp',
        'alamat',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    public function items()
    {
        return $this->hasMany(RentalItem::class);
    }
}