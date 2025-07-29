<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AksesorisController extends Controller
{
    public function index()
    {
        // Menampilkan view untuk halaman "Aksesoris"
        return view('aksesoris');
    }
}