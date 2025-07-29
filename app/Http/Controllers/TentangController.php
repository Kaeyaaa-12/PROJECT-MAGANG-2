<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        // Menampilkan view untuk halaman "Tentang Kami"
        return view('tentang');
    }
}