<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KostumPriaController extends Controller
{
    public function index()
    {
        // Di sini Anda akan menambahkan logika untuk mengambil data kostum pria dari database
        // $kostumPria = Kostum::where('kategori', 'pria')->get();
        // return view('kostum_pria', ['kostums' => $kostumPria]);

        // Untuk sekarang, kita hanya tampilkan view-nya saja
        return view('kostum_pria');
    }
}