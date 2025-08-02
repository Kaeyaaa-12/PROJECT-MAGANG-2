@extends('layouts.admin')

@section('content')
    <header class="mb-8">
        <h1 class="text-3xl font-bold text-white">Tambah Koleksi Baru</h1>
        <p class="mt-1 text-sm" style="color: var(--text-muted);">Isi detail koleksi, stok, dan unggah gambar.</p>
    </header>

    @include('admin.koleksi._form', [
        'action' => route('admin.koleksi.store'),
        'method' => 'POST',
        'koleksi' => new \App\Models\Collection(), // <-- PERBAIKAN DI SINI
        'submitText' => 'Simpan Koleksi',
    ])
@endsection
