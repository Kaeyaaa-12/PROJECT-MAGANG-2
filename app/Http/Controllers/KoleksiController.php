<?php

namespace App\Http\Controllers;

use App\Models\Collection; // Pastikan model Collection di-import

class KoleksiController extends Controller
{
    public function index()
    {
        $koleksis = Collection::all();

        $koleksisForView = $koleksis->map(function ($koleksi) {
            // Hitung total stok dari semua varian
            $totalStok = 0;
            if (is_array($koleksi->stok_varian)) {
                foreach ($koleksi->stok_varian as $jenis) {
                    if (is_array($jenis)) {
                        $totalStok += array_sum($jenis);
                    }
                }
            }

            return [
                'id' => $koleksi->id,
                'nama' => $koleksi->nama_koleksi,
                'thumbnail' => $koleksi->gambar_1 ?? 'default.png',
                'total_stok' => $totalStok, // Kirim total stok ke view
            ];
        });

        return view('koleksi', ['koleksis' => $koleksisForView]);
    }

    public function show($id)
    {
        $koleksi = Collection::findOrFail($id);

        $koleksiDetail = [
            'id' => $koleksi->id,
            'nama' => $koleksi->nama_koleksi,
            'kategori' => $koleksi->kategori,
            'stok_varian' => $koleksi->stok_varian,
            'gambar' => array_filter([$koleksi->gambar_1, $koleksi->gambar_2, $koleksi->gambar_3]),
        ];

        if (empty($koleksiDetail['gambar'])) {
            $koleksiDetail['gambar'][] = 'default.png';
        }

        return view('detailkoleksi', ['koleksi' => $koleksiDetail]);
    }
}
