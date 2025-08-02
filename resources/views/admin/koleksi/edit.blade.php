@extends('layouts.admin')

@section('content')
    <h2 class="text-3xl font-bold text-white mb-8">Edit Koleksi: {{ $koleksi->nama_koleksi }}</h2>

    <div class="stat-card p-6 sm:p-8 rounded-lg">
        @if ($errors->any())
            <div class="bg-red-800 border-l-4 border-red-500 text-red-100 p-4 mb-6">
                <strong>Error:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.koleksi.update', $koleksi->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.koleksi._form', ['tombol_text' => 'Update Koleksi'])
        </form>
    </div>
@endsection
