@extends('layouts.admin')

@section('content')
    <header class="mb-8">
        <h1 class="text-3xl font-bold text-white">Detail Data Sewa</h1>
        <p class="mt-1 text-sm" style="color: var(--text-muted);">
            Menampilkan rincian untuk penyewa: <span class="font-semibold text-white">{{ $sewa->nama_penyewa }}</span>
        </p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        {{-- KOLOM KIRI: INFO PENYEWA --}}
        <div class="md:col-span-1 space-y-6">
            <div class="p-6 rounded-lg shadow-lg" style="background-color: var(--bg-dark-secondary);">
                <h3 class="text-xl font-semibold text-white border-b border-gray-700 pb-3 mb-4">Informasi Penyewa</h3>
                <div class="space-y-3 text-sm">
                    <div>
                        <p class="font-bold" style="color: var(--text-light);">Nama:</p>
                        <p style="color: var(--text-muted);">{{ $sewa->nama_penyewa }}</p>
                    </div>
                    <div>
                        <p class="font-bold" style="color: var(--text-light);">Nomor WhatsApp:</p>
                        <p style="color: var(--text-muted);">{{ $sewa->nomor_whatsapp }}</p>
                    </div>
                    <div>
                        <p class="font-bold" style="color: var(--text-light);">Alamat:</p>
                        <p style="color: var(--text-muted);">{{ $sewa->alamat }}</p>
                    </div>
                    <div>
                        <p class="font-bold" style="color: var(--text-light);">Tanggal Sewa:</p>
                        <p style="color: var(--text-muted);">
                            {{ \Carbon\Carbon::parse($sewa->tanggal_mulai)->isoFormat('D MMMM Y') }}
                            -
                            {{ \Carbon\Carbon::parse($sewa->tanggal_selesai)->isoFormat('D MMMM Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- KOLOM KANAN: ITEM YANG DISEWA --}}
        <div class="md:col-span-2">
            <div class="p-6 rounded-lg shadow-lg" style="background-color: var(--bg-dark-secondary);">
                <h3 class="text-xl font-semibold text-white border-b border-gray-700 pb-3 mb-4">Item yang Disewa</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left" style="color: var(--text-light);">
                        <thead class="text-xs uppercase" style="background-color: #2d2d2d; color: var(--text-muted);">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nama Item</th>
                                <th scope="col" class="px-4 py-3">Tipe</th>
                                <th scope="col" class="px-4 py-3">Varian</th>
                                <th scope="col" class="px-4 py-3 text-center">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sewa->items as $item)
                                <tr class="border-b" style="border-color: var(--border-dark);">
                                    <td class="px-4 py-3 font-medium text-white">
                                        {{ $item->rentable->nama_koleksi ?? ($item->rentable->nama_aksesoris ?? 'Item Tidak Ditemukan') }}
                                    </td>
                                    <td class="px-4 py-3">
                                        {{ $item->rentable_type == \App\Models\Collection::class ? 'Koleksi' : 'Aksesoris' }}
                                    </td>
                                    <td class="px-4 py-3">{{ $item->varian }}</td>
                                    <td class="px-4 py-3 text-center">{{ $item->jumlah }} pcs</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5" style="color: var(--text-muted);">
                                        Tidak ada item yang terdata.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Tombol Aksi --}}
    <div class="mt-8 flex justify-end space-x-4">
        <a href="{{ url()->previous() }}" class="px-4 py-2 text-sm font-bold text-white rounded-lg hover:opacity-80"
            style="background-color: #444;">Kembali</a>
        <a href="{{ route('admin.disewa.edit', $sewa->id) }}"
            class="px-4 py-2 text-sm font-bold text-black rounded-lg hover:opacity-90"
            style="background-color: var(--text-gold);">Edit Data Ini</a>
    </div>
@endsection
