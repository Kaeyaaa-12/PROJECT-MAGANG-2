<?php
// File: app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Gallery; // Tambahkan ini
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 8 gambar terbaru dari galeri
        $galleries = Gallery::latest()->take(8)->get();

        // Kirim data ke view
        return view('landing', compact('galleries'));
    }
}