<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KostumAnakController extends Controller
{
    public function index()
    {
        // Menampilkan view untuk halaman "Kostum Anak"
        return view('kostum_anak');
    }
}