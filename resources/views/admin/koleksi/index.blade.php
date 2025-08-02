@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-white">Kelola Koleksi</h1>
        <a href="{{ route('admin.koleksi.create') }}" class="inline-block px-4 py-2 text-sm font-bold text-black rounded-lg"
            style="background-color: var(--text-gold);">
            Tambah Koleksi Baru
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
                        <th scope="col" class="px-6 py-3">Nama Koleksi</th>
                        <th scope="col" class="px-6 py-3">Kategori</th>
                        <th scope="col" class="px-6 py-3">Total Stok</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($koleksis as $koleksi)
                        <tr class="border-b hover:opacity-80" style="border-color: var(--border-dark);">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                {{ $koleksi->nama_koleksi }}</th>
                            <td class="px-6 py-4">{{ $koleksi->kategori }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $totalStok = 0;
                                    if (is_array($koleksi->stok_varian)) {
                                        foreach ($koleksi->stok_varian as $jenis) {
                                            if (is_array($jenis)) {
                                                $totalStok += array_sum($jenis);
                                            }
                                        }
                                    }
                                    echo $totalStok;
                                @endphp
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.koleksi.edit', $koleksi->id) }}"
                                    class="font-medium text-blue-400 hover:underline mr-3">Edit</a>
                                <form action="{{ route('admin.koleksi.destroy', $koleksi->id) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus koleksi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-400 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-10" style="color: var(--text-muted);">Belum ada
                                koleksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-8">
        {{ $koleksis->links() }}
    </div>
@endsection
