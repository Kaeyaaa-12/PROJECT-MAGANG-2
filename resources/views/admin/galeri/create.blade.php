@extends('layouts.admin')

@section('content')
    <header class="mb-8">
        <h1 class="text-3xl font-bold text-white">Tambah Gambar Baru</h1>
        <p class="mt-1 text-sm" style="color: var(--text-muted);">Unggah gambar baru untuk ditampilkan di galeri.</p>
    </header>

    <div class="p-6 rounded-lg shadow-lg" style="background-color: var(--bg-dark-secondary);">
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium" style="color: var(--text-light);">Judul
                        Gambar</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full rounded-md shadow-sm text-white focus:ring-yellow-500 focus:border-yellow-500"
                        style="background-color: #2d2d2d; border-color: var(--border-dark);" value="{{ old('title') }}"
                        required>
                    @error('title')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium" style="color: var(--text-light);">File
                        Gambar</label>
                    <input type="file" name="image" id="image"
                        class="mt-1 block w-full text-sm rounded-md file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:font-semibold"
                        style="color: var(--text-muted); file:background-color: #333; file:color: var(--text-light);"
                        required>
                    @error('image')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('admin.galeri.index') }}"
                    class="px-4 py-2 text-sm font-bold text-white rounded-lg hover:opacity-80"
                    style="background-color: #444;">Batal</a>
                <button type="submit" class="px-4 py-2 text-sm font-bold text-black rounded-lg hover:opacity-90"
                    style="background-color: var(--text-gold);">Simpan Gambar</button>
            </div>
        </form>
    </div>
@endsection
