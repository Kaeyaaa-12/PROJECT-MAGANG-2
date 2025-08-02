<?php

namespace App\Http\Controllers;

use App\Models\Accessory;

class AksesorisController extends Controller
{
    public function index()
    {
        $aksesoris = Accessory::all()->map(function ($item) {
            // Hitung total stok dari semua varian
            $totalStok = 0;
            if (is_array($item->stok_varian)) {
                $totalStok = array_sum($item->stok_varian);
            }

            return [
                'id' => $item->id,
                'nama' => $item->nama_aksesoris,
                'thumbnail' => $item->gambar_1 ?? 'default.png',
                'total_stok' => $totalStok,
            ];
        });

        return view('aksesoris', ['aksesoris' => $aksesoris]);
    }

    public function show($id)
    {
        $aksesori = Accessory::findOrFail($id);

        $gambar = array_filter([$aksesori->gambar_1, $aksesori->gambar_2, $aksesori->gambar_3]);
        if (empty($gambar)) {
            $gambar[] = 'default.png';
        }

        $detail = [
            'id' => $aksesori->id,
            'nama' => $aksesori->nama_aksesoris,
            'kategori' => $aksesori->kategori,
            'stok_varian' => $aksesori->stok_varian ?? [], // Kirim data stok
            'gambar' => $gambar
        ];

        return view('detailaksesoris', ['aksesoris' => $detail]);
    }
}
