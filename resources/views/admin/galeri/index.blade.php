@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-white">Galeri</h2>
        <a href="{{ route('admin.galeri.create') }}"
            class="btn-primary text-white font-bold py-2 px-4 rounded-lg transition duration-300"
            style="background-color: var(--accent-color); color: var(--sidebar-bg);">
            <i class="ri-add-line align-middle mr-1"></i> Tambah Gambar
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-800 border-l-4 border-green-500 text-green-100 p-4 mb-6" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($galleries as $gallery)
            {{--
                ================================================================
                LANGKAH DEBUG JIKA GAMBAR MASIH TIDAK MUNCUL
                ================================================================
                Jika setelah semua langkah ini gambar tetap tidak muncul,
                hapus tanda komentar di bawah ini (hapus tanda ),
                lalu refresh halaman. Anda akan melihat layar putih dengan teks.
                Copy-paste semua teks tersebut dan kirimkan ke saya.
                Setelah itu, kembalikan lagi tanda komentarnya.
            --}}

            <div class="stat-card rounded-lg overflow-hidden relative group">
                {{-- KODE FINAL UNTUK MENAMPILKAN GAMBAR --}}
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                    class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-white truncate">{{ $gallery->title }}</h3>
                </div>
                <div
                    class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <a href="{{ route('admin.galeri.edit', $gallery->id) }}"
                        class="text-white mx-2 p-2 bg-blue-600 hover:bg-blue-700 rounded-full">
                        <i class="ri-pencil-line"></i>
                    </a>
                    <form action="{{ route('admin.galeri.destroy', $gallery->id) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white mx-2 p-2 bg-red-600 hover:bg-red-700 rounded-full">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-400 py-10">
                <p>Belum ada gambar di galeri.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $galleries->links() }}
    </div>
@endsection
