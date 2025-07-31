<?php

namespace App\Http\Controllers;

class ProdukController extends Controller
{
    // Data produk sekarang memiliki array 'gambar'
    private $produks = [
        ['id' => 1, 'nama' => 'Kostum Venetian', 'gambar' => ['bgkostum.png', 'bgtentang.png', 'bgkostum.png'], 'stok' => 5, 'ukuran' => 'All Size', 'jenis_kelamin' => 'Unisex'],
        ['id' => 2, 'nama' => 'Kostum Ksatria', 'gambar' => ['bgkostum.png', 'bgtentang.png', 'bgkostum.png'], 'stok' => 3, 'ukuran' => 'L, XL', 'jenis_kelamin' => 'Pria'],
        ['id' => 3, 'nama' => 'Gaun Putri', 'gambar' => ['bgkostum.png', 'bgtentang.png', 'bgkostum.png'], 'stok' => 7, 'ukuran' => 'M, L', 'jenis_kelamin' => 'Wanita'],
        ['id' => 4, 'nama' => 'Kostum Bajak Laut', 'gambar' => ['bgkostum.png', 'bgtentang.png', 'bgkostum.png'], 'stok' => 4, 'ukuran' => 'All Size', 'jenis_kelamin' => 'Unisex'],
    ];

    public function index()
    {
        // Ambil gambar pertama untuk thumbnail di halaman produk
        $produksForView = array_map(function ($produk) {
            $produk['thumbnail'] = $produk['gambar'][0] ?? 'default.png';
            return $produk;
        }, $this->produks);

        return view('produk', ['produks' => $produksForView]);
    }

    public function show($id)
    {
        $produk = null;
        foreach ($this->produks as $p) {
            if ($p['id'] == $id) {
                $produk = $p;
                break;
            }
        }

        if (!$produk) {
            abort(404);
        }

        return view('detailproduk', ['produk' => $produk]);
    }
}
