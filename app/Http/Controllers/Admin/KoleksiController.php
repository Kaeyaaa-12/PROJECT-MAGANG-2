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
        $koleksi = new Collection();
        return view('admin.koleksi.create', compact('koleksi'));
    }

    public function store(Request $request)
    {
        // --- AWAL PERUBAHAN VALIDASI ---
        $validated = $request->validate([
            'nama_koleksi' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'stok' => 'present|array',
            'gambar_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // --- AKHIR PERUBAHAN VALIDASI ---

        $stokVarian = [];
        if (isset($validated['stok'])) {
            foreach ($validated['stok'] as $stokItem) {
                if (!empty($stokItem['jenis']) && isset($stokItem['ukuran'])) {
                    $jenis = strtolower($stokItem['jenis']);
                    foreach ($stokItem['ukuran'] as $key => $ukuran) {
                        if (!empty($ukuran) && isset($stokItem['stok'][$key])) {
                            $stokVarian[$jenis][$ukuran] = (int)$stokItem['stok'][$key];
                        }
                    }
                }
            }
        }

        $data = [
            'nama_koleksi' => $validated['nama_koleksi'],
            'kategori' => $validated['kategori'],
            'stok_varian' => $stokVarian,
        ];

        // --- AWAL PERUBAHAN LOGIKA UPLOAD GAMBAR ---
        foreach (['gambar_1', 'gambar_2', 'gambar_3'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('koleksi', 'public');
            }
        }
        // --- AKHIR PERUBAHAN LOGIKA UPLOAD GAMBAR ---

        Collection::create($data);

        return redirect()->route('admin.koleksi.index')->with('success', 'Koleksi berhasil ditambahkan.');
    }


    public function edit(Collection $koleksi)
    {
        return view('admin.koleksi.edit', compact('koleksi'));
    }


    public function update(Request $request, Collection $koleksi)
    {
        $validated = $request->validate([
            'nama_koleksi' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'stok' => 'present|array',
            'gambar_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $stokVarian = [];
        if (isset($validated['stok'])) {
            foreach ($validated['stok'] as $stokItem) {
                if (!empty($stokItem['jenis']) && isset($stokItem['ukuran'])) {
                    $jenis = strtolower($stokItem['jenis']);
                    foreach ($stokItem['ukuran'] as $key => $ukuran) {
                        if (!empty($ukuran) && isset($stokItem['stok'][$key])) {
                            $stokVarian[$jenis][$ukuran] = (int)$stokItem['stok'][$key];
                        }
                    }
                }
            }
        }

        $data = [
            'nama_koleksi' => $validated['nama_koleksi'],
            'kategori' => $validated['kategori'],
            'stok_varian' => $stokVarian,
        ];

        // --- AWAL PERUBAHAN LOGIKA UPDATE GAMBAR ---
        foreach (['gambar_1', 'gambar_2', 'gambar_3'] as $field) {
            if ($request->hasFile($field)) {
                // Hapus gambar lama jika ada
                if ($koleksi->$field) {
                    Storage::disk('public')->delete($koleksi->$field);
                }
                // Simpan gambar baru
                $data[$field] = $request->file($field)->store('koleksi', 'public');
            }
        }
        // --- AKHIR PERUBAHAN LOGIKA UPDATE GAMBAR ---

        $koleksi->update($data);

        return redirect()->route('admin.koleksi.index')->with('success', 'Koleksi berhasil diperbarui.');
    }


    public function destroy(Collection $koleksi)
    {
        foreach(['gambar_1', 'gambar_2', 'gambar_3'] as $field) {
            if ($koleksi->$field) {
                Storage::disk('public')->delete($koleksi->$field);
            }
        }

        $koleksi->delete();

        return redirect()->route('admin.koleksi.index')->with('success', 'Koleksi berhasil dihapus.');
    }
}
