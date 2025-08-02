@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-white">Kelola Produk</h2>
        <a href="{{ route('admin.produk.create') }}"
            class="btn-primary text-white font-bold py-2 px-4 rounded-lg transition duration-300"
            style="background-color: var(--accent-color); color: var(--sidebar-bg);">
            <i class="ri-add-line align-middle mr-1"></i> Tambah Produk
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-800 border-l-4 border-green-500 text-green-100 p-4 mb-6" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="stat-card rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-300">
                <thead class="text-xs text-white uppercase bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">Nama Produk</th>
                        <th scope="col" class="px-6 py-3">Kategori</th>
                        <th scope="col" class="px-6 py-3">Total Stok</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produks as $produk)
                        <tr class="border-b border-gray-700 hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                {{ $produk->nama_produk }}</th>
                            <td class="px-6 py-4">{{ $produk->kategori }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $totalStok = 0;
                                    foreach ($produk->stok_varian as $jenis) {
                                        $totalStok += array_sum($jenis);
                                    }
                                    echo $totalStok;
                                @endphp
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.produk.edit', $produk->id) }}"
                                    class="font-medium text-blue-400 hover:underline mr-3">Edit</a>
                                <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-400 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-10 text-gray-400">
                                Belum ada produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-8">
        {{ $produks->links() }}
    </div>
@endsection
