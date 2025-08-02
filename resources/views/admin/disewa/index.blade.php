@extends('layouts.admin')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-white">Data Sewa</h1>
        <a href="{{ route('admin.disewa.create') }}" class="inline-block px-4 py-2 text-sm font-bold text-black rounded-lg"
            style="background-color: var(--text-gold);">
            Tambah Data Sewa
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
                        <th scope="col" class="px-6 py-3">Nama Penyewa</th>
                        <th scope="col" class="px-6 py-3">Item Disewa</th>
                        <th scope="col" class="px-6 py-3">Jumlah</th>
                        <th scope="col" class="px-6 py-3">Tanggal Sewa</th>
                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rentals as $rental)
                        <tr class="border-b hover:opacity-80" style="border-color: var(--border-dark);">
                            <td class="px-6 py-4 font-medium whitespace-nowrap text-white">{{ $rental->nama_penyewa }}</td>
                            <td class="px-6 py-4">
                                {{-- Loop untuk menampilkan semua item --}}
                                <ul class="list-disc list-inside">
                                    @foreach ($rental->items as $item)
                                        <li>
                                            {{ $item->rentable->nama_koleksi ?? $item->rentable->nama_aksesoris }}
                                            <span class="text-xs opacity-70">({{ $item->varian }})</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-6 py-4">
                                {{-- Loop untuk menampilkan jumlah --}}
                                <ul class="list-none">
                                    @foreach ($rental->items as $item)
                                        <li>{{ $item->jumlah }} pcs</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($rental->tanggal_mulai)->format('d M Y') }} -
                                {{ \Carbon\Carbon::parse($rental->tanggal_selesai)->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.disewa.edit', $rental->id) }}"
                                    class="font-medium text-blue-400 hover:underline mr-3">Edit</a>
                                <form action="{{ route('admin.disewa.destroy', $rental->id) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Anda yakin ingin menghapus data sewa ini? Stok akan dikembalikan.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-400 hover:underline">Hapus</button>
                                </form>
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
    <div class="mt-8">
        {{ $rentals->links() }}
    </div>
@endsection
