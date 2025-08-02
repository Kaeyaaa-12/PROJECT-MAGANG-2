<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KoleksiController extends Controller
{
    public function index()
    {
        $koleksis = Collection::latest()->paginate(10);
        return view('admin.koleksi.index', compact('koleksis'));
    }

    public function create()
    {
        return view('admin.koleksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_koleksi' => 'required|string|max:255',
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
            'nama_koleksi' => $request->nama_koleksi,
            'kategori' => $request->kategori,
            'stok_varian' => $stokVarian,
        ];

        // Handle File Uploads
        if ($request->hasFile('gambar_1')) {
            $data['gambar_1'] = $request->file('gambar_1')->store('koleksi', 'public');
        }
        if ($request->hasFile('gambar_2')) {
            $data['gambar_2'] = $request->file('gambar_2')->store('koleksi', 'public');
        }
        if ($request->hasFile('gambar_3')) {
            $data['gambar_3'] = $request->file('gambar_3')->store('koleksi', 'public');
        }

        Collection::create($data);

        return redirect()->route('admin.koleksi.index')->with('success', 'Koleksi berhasil ditambahkan.');
    }

    public function edit(Collection $koleksi)
    {
        return view('admin.koleksi.edit', compact('koleksi'));
    }

    public function update(Request $request, Collection $koleksi)
    {
        $request->validate([
            'nama_koleksi' => 'required|string|max:255',
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
            'nama_koleksi' => $request->nama_koleksi,
            'kategori' => $request->kategori,
            'stok_varian' => $stokVarian,
        ];

        // Handle File Updates
        for ($i = 1; $i <= 3; $i++) {
            $field = 'gambar_' . $i;
            if ($request->hasFile($field)) {
                // Delete old image
                if ($koleksi->$field) {
                    Storage::disk('public')->delete($koleksi->$field);
                }
                // Store new image
                $data[$field] = $request->file($field)->store('koleksi', 'public');
            }
        }

        $koleksi->update($data);

        return redirect()->route('admin.koleksi.index')->with('success', 'Koleksi berhasil diperbarui.');
    }

    public function destroy(Collection $koleksi)
    {
        // Delete images
        if ($koleksi->gambar_1) Storage::disk('public')->delete($koleksi->gambar_1);
        if ($koleksi->gambar_2) Storage::disk('public')->delete($koleksi->gambar_2);
        if ($koleksi->gambar_3) Storage::disk('public')->delete($koleksi->gambar_3);

        $koleksi->delete();

        return redirect()->route('admin.koleksi.index')->with('success', 'Koleksi berhasil dihapus.');
    }
}
