<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KostumWanitaController extends Controller
{
    public function index()
    {
        // Menampilkan view untuk halaman "Kostum Wanita"
        return view('kostum_wanita');
    }
}