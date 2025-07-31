<?php

namespace App\Models;

use App\Notifications\AdminResetPasswordNotification; // <-- TAMBAHKAN USE STATEMENT INI
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Kirim notifikasi reset password kustom untuk admin.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token) // <-- TAMBAHKAN FUNGSI INI
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
}