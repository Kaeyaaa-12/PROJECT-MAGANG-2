<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminContentController extends Controller
{
    public function galeri()
    {
        return view('admin.galeri');
    }

    public function produk()
    {
        return view('admin.produk');
    }

    public function aksesoris()
    {
        return view('admin.aksesoris');
    }

    public function disewa()
    {
        return view('admin.disewa');
    }
}