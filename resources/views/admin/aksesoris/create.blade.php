@extends('layouts.admin')

@section('content')
    <header class="mb-8">
        <h1 class="text-3xl font-bold text-white">Tambah Aksesoris Baru</h1>
        <p class="mt-1 text-sm" style="color: var(--text-muted);">Isi detail aksesoris, stok, dan unggah gambar.</p>
    </header>

    @include('admin.aksesoris._form', [
        'action' => route('admin.aksesoris.store'),
        'method' => 'POST',
        'aksesori' => new \App\Models\Accessory(),
        'submitText' => 'Simpan Aksesoris',
    ])
@endsection
