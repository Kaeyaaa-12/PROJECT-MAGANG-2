<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Collection; // Tambahkan ini
use App\Models\Accessory;  // Tambahkan ini
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data yang sudah ada
        $galleries = Gallery::latest()->take(8)->get();

        // Ambil 4 data koleksi terbaru
        $newCollections = Collection::latest()->take(4)->get();

        // Ambil 4 data aksesoris terbaru
        $newAccessories = Accessory::latest()->take(4)->get();

        // Kirim semua data ke view
        return view('landing', compact('galleries', 'newCollections', 'newAccessories'));
    }
}