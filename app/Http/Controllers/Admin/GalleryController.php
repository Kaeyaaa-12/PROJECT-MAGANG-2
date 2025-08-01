<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // Tambahkan ini untuk logging

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('admin.galeri.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan file dan dapatkan path-nya.
        $path = $request->file('image')->store('gallery', 'public');

        // Buat record baru dengan path yang benar.
        Gallery::create([
            'title' => $validated['title'],
            'image' => $path, // Simpan path yang didapat dari ->store()
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.galeri.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Gunakan path yang sudah ada sebagai default
        $path = $gallery->image;

        if ($request->hasFile('image')) {
            // Hapus file lama jika ada
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            // Simpan file baru dan update path-nya
            $path = $request->file('image')->store('gallery', 'public');
        }

        $gallery->update([
            'title' => $validated['title'],
            'image' => $path, // Update dengan path yang baru atau yang lama
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Gambar berhasil dihapus.');
    }
}
