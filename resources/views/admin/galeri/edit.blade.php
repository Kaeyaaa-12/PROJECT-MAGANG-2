{{-- File: resources/views/admin/galeri/edit.blade.php --}}
@extends('layouts.admin')

@section('content')
    <h2 class="text-3xl font-bold text-white mb-8">Edit Gambar</h2>

    <div class="stat-card p-6 sm:p-8 rounded-lg">
        <form action="{{ route('admin.galeri.update', $gallery) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-300">Judul Gambar</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm focus:ring-accent-color focus:border-accent-color"
                        value="{{ old('title', $gallery->title) }}" required>
                    @error('title')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-300">File Gambar (Opsional)</label>
                    <div class="mt-2">
                        <img src="{{ Storage::url($gallery->image) }}" alt="{{ $gallery->title }}"
                            class="h-32 w-32 object-cover rounded-md mb-4">
                    </div>
                    <input type="file" name="image" id="image"
                        class="mt-1 block w-full text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-600 file:text-gray-200 hover:file:bg-gray-500">
                    <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti gambar.</p>
                    @error('image')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('admin.galeri.index') }}"
                    class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-500 transition">Batal</a>
                <button type="submit" class="px-4 py-2 text-white font-bold rounded-lg transition"
                    style="background-color: var(--accent-color); color: var(--sidebar-bg);">Update</button>
            </div>
        </form>
    </div>
@endsection
