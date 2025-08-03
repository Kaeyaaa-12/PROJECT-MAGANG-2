@extends('layouts.admin')

@section('content')
    <header class="mb-8">
        <h1 class="text-3xl font-bold text-white">Hasil Pencarian</h1>
        <p class="mt-1 text-sm" style="color: var(--text-muted);">
            Menampilkan hasil untuk: "<span class="font-semibold text-white">{{ $query }}</span>"
        </p>
    </header>

    {{-- Notifikasi Sukses --}}
    @if (session('success'))
        <div class="p-4 mb-6 text-sm text-green-200 bg-green-800 border-l-4 border-green-400" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- HASIL KOLEKSI --}}
    @if ($koleksis->isNotEmpty())
        <div class="mb-12">
            <h2 class="text-2xl font-semibold text-white mb-4">Koleksi</h2>
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
                            @foreach ($koleksis as $koleksi)
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
                                    {{-- --- AWAL PERUBAHAN AKSI KOLEKSI --- --}}
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <a href="{{ route('admin.koleksi.edit', $koleksi->id) }}"
                                            class="font-medium text-blue-400 hover:underline mr-3">Edit</a>
                                        <form action="{{ route('admin.koleksi.destroy', $koleksi->id) }}" method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('Anda yakin ingin menghapus koleksi ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="font-medium text-red-400 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                    {{-- --- AKHIR PERUBAHAN AKSI KOLEKSI --- --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-4">
                {{ $koleksis->withQueryString()->links() }}
            </div>
        </div>
    @endif

    {{-- HASIL AKSESORIS --}}
    @if ($aksesoris->isNotEmpty())
        <div class="mb-12">
            <h2 class="text-2xl font-semibold text-white mb-4">Aksesoris</h2>
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
                            @foreach ($aksesoris as $item)
                                <tr class="border-b hover:opacity-80" style="border-color: var(--border-dark);">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                        {{ $item->nama_aksesoris }}</th>
                                    <td class="px-6 py-4">{{ $item->kategori }}</td>
                                    <td class="px-6 py-4">
                                        {{ is_array($item->stok_varian) ? array_sum($item->stok_varian) : 0 }}
                                    </td>
                                    {{-- --- AWAL PERUBAHAN AKSI AKSESORIS --- --}}
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <a href="{{ route('admin.aksesoris.edit', $item->id) }}"
                                            class="font-medium text-blue-400 hover:underline mr-3">Edit</a>
                                        <form action="{{ route('admin.aksesoris.destroy', $item->id) }}" method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('Anda yakin ingin menghapus aksesoris ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="font-medium text-red-400 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                    {{-- --- AKHIR PERUBAHAN AKSI AKSESORIS --- --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-4">
                {{ $aksesoris->withQueryString()->links() }}
            </div>
        </div>
    @endif

    {{-- HASIL DATA SEWA --}}
    @if ($rentals->isNotEmpty())
        <div class="mb-12">
            <h2 class="text-2xl font-semibold text-white mb-4">Data Sewa</h2>
            <div class="overflow-hidden rounded-lg shadow-lg" style="background-color: var(--bg-dark-secondary);">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left" style="color: var(--text-light);">
                        <thead class="text-xs uppercase" style="background-color: #2d2d2d; color: var(--text-muted);">
                            <tr>
                                <th scope="col" class="px-6 py-3">Nama Penyewa</th>
                                <th scope="col" class="px-6 py-3">Item Disewa</th>
                                <th scope="col" class="px-6 py-3">Jumlah</th>
                                <th scope="col" class="px-6 py-3">Tanggal Sewa</th>
                                <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentals as $sewa)
                                <tr class="border-b hover:opacity-80" style="border-color: var(--border-dark);">
                                    <td class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                        {{ $sewa->nama_penyewa }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <ul class="list-disc list-inside">
                                            @foreach ($sewa->items as $item)
                                                <li>
                                                    {{ $item->rentable->nama_koleksi ?? ($item->rentable->nama_aksesoris ?? 'Item Dihapus') }}
                                                    <span class="text-xs opacity-70">({{ $item->varian }})</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="px-6 py-4">
                                        <ul class="list-none">
                                            @foreach ($sewa->items as $item)
                                                <li>{{ $item->jumlah }} pcs</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($sewa->tanggal_mulai)->format('d M') }} -
                                        {{ \Carbon\Carbon::parse($sewa->tanggal_selesai)->format('d M Y') }}
                                    </td>
                                    {{-- --- AWAL PERUBAHAN AKSI DATA SEWA --- --}}
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        <a href="{{ route('admin.disewa.show', $sewa->id) }}"
                                            class="font-medium text-green-400 hover:underline mr-3">Detail</a>
                                        <a href="{{ route('admin.disewa.edit', $sewa->id) }}"
                                            class="font-medium text-blue-400 hover:underline mr-3">Edit</a>
                                        <form action="{{ route('admin.disewa.destroy', $sewa->id) }}" method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('Anda yakin ingin menghapus data sewa ini? Stok akan dikembalikan.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="font-medium text-red-400 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                    {{-- --- AKHIR PERUBAHAN AKSI DATA SEWA --- --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-4">
                {{ $rentals->withQueryString()->links() }}
            </div>
        </div>
    @endif

    {{-- JIKA TIDAK ADA HASIL --}}
    @if ($koleksis->isEmpty() && $aksesoris->isEmpty() && $rentals->isEmpty())
        <div class="text-center py-16">
            <p class="text-lg" style="color: var(--text-muted);">Tidak ada hasil yang ditemukan.</p>
        </div>
    @endif
@endsection
