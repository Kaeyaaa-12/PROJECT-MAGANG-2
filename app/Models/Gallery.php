<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    /**
     * Atribut yang boleh diisi secara massal.
     * HARUS ADA!
     */
    protected $fillable = [
        'title',
        'image',
    ];
}
