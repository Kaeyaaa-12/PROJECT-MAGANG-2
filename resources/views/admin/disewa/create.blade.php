@extends('layouts.admin')

@section('content')
    <header class="mb-8">
        <h1 class="text-3xl font-bold text-white">Tambah Data Sewa Baru</h1>
        <p class="mt-1 text-sm" style="color: var(--text-muted);">Isi detail penyewaan dan stok akan otomatis berkurang.</p>
    </header>

    @include('admin.disewa._form', [
        'action' => route('admin.disewa.store'),
        'method' => 'POST',
        'sewa' => $sewa,
        'itemsForJs' => $itemsForJs, // Kirim data yang sudah disiapkan
        'submitText' => 'Simpan Data',
    ])
@endsection
