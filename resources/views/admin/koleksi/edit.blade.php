@extends('layouts.admin')

@section('content')
    <header class="mb-8">
        <h1 class="text-3xl font-bold text-white">Edit Koleksi</h1>
        <p class="mt-1 text-sm" style="color: var(--text-muted);">Perbarui detail untuk koleksi: {{ $koleksi->nama_koleksi }}
        </p>
    </header>

    @if ($koleksi->gambar)
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-white mb-2">Gambar Saat Ini</h3>
            <div class="flex flex-wrap gap-4">
                @foreach ($koleksi->gambar as $g)
                    <img src="{{ asset('storage/' . $g) }}" class="h-24 w-auto object-cover rounded-md">
                @endforeach
            </div>
        </div>
    @endif

    @include('admin.koleksi._form', [
        'action' => route('admin.koleksi.update', $koleksi->id),
        'method' => 'PUT',
        'koleksi' => $koleksi,
        'submitText' => 'Update Koleksi',
    ])
@endsection
