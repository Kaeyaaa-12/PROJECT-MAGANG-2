<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penyewa',
        'nomor_whatsapp',
        'alamat',
        'rentable_id',
        'rentable_type',
        'varian',
        'jumlah',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    /**
     * Mendapatkan model induk (Collection atau Accessory) yang bisa disewa.
     */
    public function rentable()
    {
        return $this->morphTo();
    }
}
