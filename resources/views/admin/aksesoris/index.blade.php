@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-white">Kelola Aksesoris</h1>
        <a href="{{ route('admin.aksesoris.create') }}" class="inline-block px-4 py-2 text-sm font-bold text-black rounded-lg"
            style="background-color: var(--text-gold);">
            Tambah Aksesoris Baru
        </a>
    </div>

    @if (session('success'))
        <div class="p-4 mb-6 text-sm text-green-200 bg-green-800 border-l-4 border-green-400" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-lg shadow-lg" style="background-color: var(--bg-dark-secondary);">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left" style="color: var(--text-light);">
                <thead class="text-xs uppercase" style="background-color: #2d2d2d; color: var(--text-muted);">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nama Aksesoris</th>
                        <th scope="col" class="px-6 py-3">Kategori</th>
                        <th scope="col" class="px-6 py-3">Total Stok</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aksesoris as $item)
                        <tr class="border-b hover:opacity-80" style="border-color: var(--border-dark);">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                {{ $item->nama_aksesoris }}</th>
                            <td class="px-6 py-4">{{ $item->kategori }}</td>
                            <td class="px-6 py-4">
                                {{-- Menghitung total stok dari varian --}}
                                @php
                                    $totalStok = 0;
                                    if (is_array($item->stok_varian)) {
                                        $totalStok = array_sum($item->stok_varian);
                                    }
                                    echo $totalStok;
                                @endphp
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.aksesoris.edit', $item->id) }}"
                                    class="font-medium text-blue-400 hover:underline mr-3">Edit</a>
                                <form action="{{ route('admin.aksesoris.destroy', $item->id) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus aksesoris ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-400 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-10" style="color: var(--text-muted);">Belum ada
                                aksesoris.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-8">
        {{ $aksesoris->links() }}
    </div>
@endsection
