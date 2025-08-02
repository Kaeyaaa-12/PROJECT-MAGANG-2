@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-white">Kelola Galeri</h1>
        <a href="{{ route('admin.galeri.create') }}" class="inline-block px-4 py-2 text-sm font-bold text-black rounded-lg"
            style="background-color: var(--text-gold);">
            Tambah Gambar Baru
        </a>
    </div>

    @if (session('success'))
        <div class="p-4 mb-6 text-sm text-green-200 bg-green-800 border-l-4 border-green-400" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($galleries as $gallery)
            <div class="relative group overflow-hidden rounded-lg shadow-lg"
                style="background-color: var(--bg-dark-secondary);">
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                    class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="p-4">
                    <h3 class="font-semibold text-white truncate">{{ $gallery->title }}</h3>
                </div>
                <div
                    class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="{{ route('admin.galeri.edit', $gallery->id) }}"
                        class="text-white p-2 bg-blue-600 hover:bg-blue-500 rounded-full mx-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <form action="{{ route('admin.galeri.destroy', $gallery->id) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white p-2 bg-red-600 hover:bg-red-500 rounded-full mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 012 0v6a1 1 0 11-2 0V8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-10" style="color: var(--text-muted);">
                <p>Belum ada gambar di galeri.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $galleries->links() }}
    </div>
@endsection
