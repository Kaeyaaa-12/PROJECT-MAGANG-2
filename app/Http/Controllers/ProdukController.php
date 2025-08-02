<?php

namespace App\Http\Controllers;

use App\Models\Product; // Pastikan model Product di-import

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Product::all();

        $produksForView = $produks->map(function ($produk) {
            // Hitung total stok dari semua varian
            $totalStok = 0;
            if (is_array($produk->stok_varian)) {
                foreach ($produk->stok_varian as $jenis) {
                    if (is_array($jenis)) {
                        $totalStok += array_sum($jenis);
                    }
                }
            }

            return [
                'id' => $produk->id,
                'nama' => $produk->nama_produk,
                'thumbnail' => $produk->gambar_1 ?? 'default.png',
                'total_stok' => $totalStok, // Kirim total stok ke view
            ];
        });

        return view('produk', ['produks' => $produksForView]);
    }

    public function show($id)
    {
        $produk = Product::findOrFail($id);

        $produkDetail = [
            'id' => $produk->id,
            'nama' => $produk->nama_produk,
            'kategori' => $produk->kategori,
            'stok_varian' => $produk->stok_varian,
            'gambar' => array_filter([$produk->gambar_1, $produk->gambar_2, $produk->gambar_3]),
        ];

        if (empty($produkDetail['gambar'])) {
            $produkDetail['gambar'][] = 'default.png';
        }

        return view('detailproduk', ['produk' => $produkDetail]);
    }
}