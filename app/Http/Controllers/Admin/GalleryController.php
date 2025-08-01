<?php
// File: app/Http/Controllers/Admin/GalleryController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('public/gallery');

        Gallery::create([
            'title' => $request->title,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galeri.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $gallery->image;
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::delete($gallery->image);
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('public/gallery');
        }

        $gallery->update([
            'title' => $request->title,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
    // HANYA HAPUS GAMBAR JIKA PATH-NYA ADA (TIDAK NULL/KOSONG)
        if ($gallery->image && Storage::exists($gallery->image)) {
        Storage::delete($gallery->image);
    }

    // Hapus record dari database
        $gallery->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Gambar berhasil dihapus.');
}
}