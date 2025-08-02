@extends('layouts.admin')

@section('content')
    <header class="mb-8">
        <h1 class="text-3xl font-bold text-white">Edit Aksesoris</h1>
        <p class="mt-1 text-sm" style="color: var(--text-muted);">Perbarui detail untuk aksesoris:
            {{ $aksesori->nama_aksesoris }}
        </p>
    </header>

    @include('admin.aksesoris._form', [
        'action' => route('admin.aksesoris.update', $aksesori->id),
        'method' => 'PUT',
        'aksesori' => $aksesori,
        'submitText' => 'Update Aksesoris',
    ])
@endsection
