<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accessory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AksesorisController extends Controller
{
    public function index()
    {
        $aksesoris = Accessory::latest()->paginate(10);
        return view('admin.aksesoris.index', compact('aksesoris'));
    }

    public function create()
    {
        return view('admin.aksesoris.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_aksesoris' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'stok' => 'present|array', // Validasi untuk stok varian
            'gambar_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $stokVarian = [];
        if (isset($validated['stok'])) {
            foreach ($validated['stok']['ukuran'] as $key => $ukuran) {
                if (!empty($ukuran) && isset($validated['stok']['jumlah'][$key])) {
                    $stokVarian[$ukuran] = (int) $validated['stok']['jumlah'][$key];
                }
            }
        }

        $data = [
            'nama_aksesoris' => $validated['nama_aksesoris'],
            'kategori' => $validated['kategori'],
            'stok_varian' => $stokVarian,
        ];

        foreach (['gambar_1', 'gambar_2', 'gambar_3'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('aksesoris', 'public');
            }
        }

        Accessory::create($data);

        return redirect()->route('admin.aksesoris.index')->with('success', 'Aksesoris berhasil ditambahkan.');
    }

    public function edit(Accessory $aksesori)
    {
        return view('admin.aksesoris.edit', compact('aksesori'));
    }

    public function update(Request $request, Accessory $aksesori)
    {
        $validated = $request->validate([
            'nama_aksesoris' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'stok' => 'present|array', // Validasi untuk stok varian
            'gambar_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $stokVarian = [];
        if (isset($validated['stok'])) {
            foreach ($validated['stok']['ukuran'] as $key => $ukuran) {
                if (!empty($ukuran) && isset($validated['stok']['jumlah'][$key])) {
                    $stokVarian[$ukuran] = (int) $validated['stok']['jumlah'][$key];
                }
            }
        }

        $data = [
            'nama_aksesoris' => $validated['nama_aksesoris'],
            'kategori' => $validated['kategori'],
            'stok_varian' => $stokVarian,
        ];

        foreach (['gambar_1', 'gambar_2', 'gambar_3'] as $field) {
            if ($request->hasFile($field)) {
                if ($aksesori->$field) {
                    Storage::disk('public')->delete($aksesori->$field);
                }
                $data[$field] = $request->file($field)->store('aksesoris', 'public');
            }
        }

        $aksesori->update($data);

        return redirect()->route('admin.aksesoris.index')->with('success', 'Aksesoris berhasil diperbarui.');
    }

    public function destroy(Accessory $aksesori)
    {
        foreach (['gambar_1', 'gambar_2', 'gambar_3'] as $field) {
            if ($aksesori->$field) {
                Storage::disk('public')->delete($aksesori->$field);
            }
        }

        $aksesori->delete();

        return redirect()->route('admin.aksesoris.index')->with('success', 'Aksesoris berhasil dihapus.');
    }
}
