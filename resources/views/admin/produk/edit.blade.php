@extends('layouts.admin')

@section('content')
    <h2 class="text-3xl font-bold text-white mb-8">Edit Produk: {{ $produk->nama_produk }}</h2>

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

        <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('admin.produk._form', ['tombol_text' => 'Update Produk'])
        </form>
    </div>
@endsection
