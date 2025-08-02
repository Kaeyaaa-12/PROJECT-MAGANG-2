<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_id',
        'rentable_id',
        'rentable_type',
        'varian',
        'jumlah',
    ];

    public function rentable()
    {
        return $this->morphTo();
    }

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}