@extends('layouts.admin')

@section('content')
    <div>
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-white">Dashboard</h1>
            <p class="mt-1 text-sm" style="color: var(--text-muted);">Selamat datang kembali, Admin!</p>
        </header>

        {{-- KARTU STATISTIK (Tidak berubah) --}}
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
            {{-- Total Koleksi --}}
            <div class="overflow-hidden rounded-lg shadow-md"
                style="background-color: var(--bg-dark-secondary); border-left: 5px solid var(--text-gold);">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8" style="color: var(--text-gold);" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="truncate text-sm font-medium" style="color: var(--text-muted);">Total Koleksi
                                </dt>
                                <dd class="text-3xl font-bold text-white">{{ $totalKoleksi }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Aksesoris --}}
            <div class="overflow-hidden rounded-lg shadow-md"
                style="background-color: var(--bg-dark-secondary); border-left: 5px solid var(--text-gold);">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8" style="color: var(--text-gold);" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="truncate text-sm font-medium" style="color: var(--text-muted);">Total Aksesoris
                                </dt>
                                <dd class="text-3xl font-bold text-white">{{ $totalAksesoris }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sedang Disewa --}}
            <div class="overflow-hidden rounded-lg shadow-md"
                style="background-color: var(--bg-dark-secondary); border-left: 5px solid var(--text-gold);">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8" style="color: var(--text-gold);" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="truncate text-sm font-medium" style="color: var(--text-muted);">Sedang Disewa
                                </dt>
                                <dd class="text-3xl font-bold text-white">{{ $sedangDisewa }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Total Stok --}}
            <div class="overflow-hidden rounded-lg shadow-md"
                style="background-color: var(--bg-dark-secondary); border-left: 5px solid var(--text-gold);">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8" style="color: var(--text-gold);" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 6.75h8.25M8.25 12h5.25M8.25 17.25h8.25M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="truncate text-sm font-medium" style="color: var(--text-muted);">Total Stok</dt>
                                <dd class="text-3xl font-bold text-white">{{ $totalStok }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TABEL DATA SEWA TERBARU --}}
        <div class="mt-8 rounded-lg shadow-md" style="background-color: var(--bg-dark-secondary);">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-white">Data Sewa Terbaru</h2>
                <p class="mt-1 text-sm" style="color: var(--text-muted);">Menampilkan 5 data penyewaan terakhir.</p>
            </div>
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
                        @forelse($dataSewaTerbaru as $sewa)
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
                                <td class="px-6 py-4 text-center">
                                    {{-- --- AWAL PERUBAHAN --- --}}
                                    <a href="{{ route('admin.disewa.show', $sewa->id) }}"
                                        class="font-medium text-blue-400 hover:underline">Lihat Detail</a>
                                    {{-- --- AKHIR PERUBAHAN --- --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-10" style="color: var(--text-muted);">
                                    Belum ada data penyewaan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
