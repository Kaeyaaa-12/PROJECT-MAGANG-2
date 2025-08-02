<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Product::latest()->paginate(10);
        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'gambar_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stok' => 'required|array',
        ]);

        $stokVarian = [];
        foreach ($request->stok as $jenis => $ukuran) {
            foreach ($ukuran as $size => $jumlah) {
                if (!is_null($jumlah)) {
                    $stokVarian[$jenis][$size] = (int)$jumlah;
                }
            }
        }

        $data = [
            'nama_produk' => $request->nama_produk,
            'kategori' => $request->kategori,
            'stok_varian' => $stokVarian,
        ];

        // Handle File Uploads
        if ($request->hasFile('gambar_1')) {
            $data['gambar_1'] = $request->file('gambar_1')->store('produk', 'public');
        }
        if ($request->hasFile('gambar_2')) {
            $data['gambar_2'] = $request->file('gambar_2')->store('produk', 'public');
        }
        if ($request->hasFile('gambar_3')) {
            $data['gambar_3'] = $request->file('gambar_3')->store('produk', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $produk)
    {
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, Product $produk)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'gambar_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stok' => 'required|array',
        ]);

        $stokVarian = [];
        foreach ($request->stok as $jenis => $ukuran) {
            foreach ($ukuran as $size => $jumlah) {
                if (!is_null($jumlah)) {
                    $stokVarian[$jenis][$size] = (int)$jumlah;
                }
            }
        }

        $data = [
            'nama_produk' => $request->nama_produk,
            'kategori' => $request->kategori,
            'stok_varian' => $stokVarian,
        ];

        // Handle File Updates
        for ($i = 1; $i <= 3; $i++) {
            $field = 'gambar_' . $i;
            if ($request->hasFile($field)) {
                // Delete old image
                if ($produk->$field) {
                    Storage::disk('public')->delete($produk->$field);
                }
                // Store new image
                $data[$field] = $request->file($field)->store('produk', 'public');
            }
        }

        $produk->update($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $produk)
    {
        // Delete images
        if ($produk->gambar_1) Storage::disk('public')->delete($produk->gambar_1);
        if ($produk->gambar_2) Storage::disk('public')->delete($produk->gambar_2);
        if ($produk->gambar_3) Storage::disk('public')->delete($produk->gambar_3);

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
