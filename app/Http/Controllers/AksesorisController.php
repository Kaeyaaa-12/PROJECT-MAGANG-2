<?php

namespace App\Http\Controllers;

class AksesorisController extends Controller
{
    // Data aksesoris sekarang memiliki array 'gambar'
    private $aksesoris = [
        ['id' => 1, 'nama' => 'Topeng Venetian', 'gambar' => ['bgkostum.png', 'bgtentang.png', 'bgkostum.png'], 'stok' => 10],
        ['id' => 2, 'nama' => 'Pedang Ksatria', 'gambar' => ['bgkostum.png', 'bgtentang.png', 'bgkostum.png'], 'stok' => 8],
        ['id' => 3, 'nama' => 'Mahkota Putri', 'gambar' => ['bgkostum.png', 'bgtentang.png', 'bgkostum.png'], 'stok' => 12],
        ['id' => 4, 'nama' => 'Topi Bajak Laut', 'gambar' => ['bgkostum.png', 'bgtentang.png', 'bgkostum.png'], 'stok' => 6],
    ];

    public function index()
    {
        // Ambil gambar pertama untuk thumbnail
        $aksesorisForView = array_map(function ($item) {
            $item['thumbnail'] = $item['gambar'][0] ?? 'default.png';
            return $item;
        }, $this->aksesoris);

        return view('aksesoris', ['aksesoris' => $aksesorisForView]);
    }

    public function show($id)
    {
        $item = null;
        foreach ($this->aksesoris as $a) {
            if ($a['id'] == $id) {
                $item = $a;
                break;
            }
        }

        if (!$item) {
            abort(404);
        }

        return view('detailaksesoris', ['aksesoris' => $item]);
    }
}
