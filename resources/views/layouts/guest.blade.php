{{-- resources/views/layouts/guest.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles') {{-- Tambahkan ini untuk menerima custom CSS --}}
</head>

<body class="font-sans text-gray-900 antialiased">
    {{-- Kita akan sedikit modifikasi agar tidak ada box putih di tengah --}}
    @include('layouts.header')

    <main>
        {{-- === PERUBAHAN UTAMA DI SINI === --}}
        @yield('content')
        {{-- Sebelumnya: {{ $slot }} --}}
    </main>

    @include('layouts.footer')

    @stack('scripts') {{-- Tambahkan ini untuk menerima custom JS --}}
</body>

</html>
