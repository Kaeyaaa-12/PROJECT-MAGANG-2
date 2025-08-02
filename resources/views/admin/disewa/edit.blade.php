@extends('layouts.admin')

@section('content')
    <header class="mb-8">
        <h1 class="text-3xl font-bold text-white">Edit Data Sewa</h1>
        <p class="mt-1 text-sm" style="color: var(--text-muted);">Perbarui detail untuk penyewa:
            <span class="font-semibold">{{ $sewa->nama_penyewa }}</span>
        </p>
    </header>

    @include('admin.disewa._form', [
        'action' => '#', // Arahkan ke route update jika sudah dibuat
        'method' => 'PUT',
        'sewa' => $sewa,
        'itemsForJs' => $itemsForJs, // Kirim data yang sudah disiapkan
        'submitText' => 'Update Data',
    ])
@endsection
