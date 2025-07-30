<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Amira Collection</title>

    @vite('resources/css/app.css')

    {{-- Google Fonts: Instrument Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Custom Styles untuk Tema --}}
    <style>
        :root {
            --bg-main: #373737;
            --text-main: #FFFFFF;
            --color-accent: #D4C15D;
            --bg-additional: #f8f7f3;
            --text-dark: #3d342a;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: var(--bg-main);
            color: var(--text-main);
        }

        .btn-primary {
            background-color: var(--color-accent);
            color: var(--bg-main);
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #cba948;
        }

        .btn-secondary {
            background-color: var(--color-accent);
            color: var(--bg-main);
            transition: opacity 0.3s ease;
        }

        .btn-secondary:hover {
            opacity: 0.9;
        }

        .text-dark-custom {
            color: var(--text-dark);
        }
    </style>
</head>

<body>

    {{-- ======================================================= --}}
    {{-- HEADER --}}
    {{-- ======================================================= --}}
    <header class="shadow-md sticky top-0 z-50" style="background-color: var(--bg-main);">
        <div class="container mx-auto flex justify-between items-center p-5 text-white">
            <a href="#" class="text-2xl font-bold" style="color: var(--text-main);">AMIRA COLLECTION</a>
            <nav class="hidden md:flex space-x-8 items-center font-medium">
                <a href="{{ route('home.index') }}" class="opacity-90 hover:opacity-100 transition">Home</a>
                <a href="{{ route('tentang.index') }}" class="opacity-90 hover:opacity-100 transition">Tentang</a>
                <a href="{{ route('kostum.pria') }}" class="opacity-90 hover:opacity-100 transition">Kostum Pria</a>
                <a href="{{ route('kostum.wanita') }}" class="opacity-90 hover:opacity-100 transition">Kostum
                    Wanita</a>
                <a href="{{ route('kostum.anak') }}" class="opacity-90 hover:opacity-100 transition">Kostum Anak</a>
                <a href="{{ route('aksesoris.index') }}" class="opacity-90 hover:opacity-100 transition">Aksesoris</a>
            </nav>
            <div class="flex items-center space-x-5">
                <a href="#" class="opacity-90 hover:opacity-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a>
                <a href="#" class="opacity-90 hover:opacity-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </a>
                <a href="#" class="opacity-90 hover:opacity-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </a>
                <a href="#" class="opacity-90 hover:opacity-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <main>
        {{-- Hero Section --}}
        <section class="relative bg-contain bg-center bg-no-repeat"
            style="background-image: url('{{ asset('assets/images/bgtentang.png') }}'); background-color: #000;">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            {{-- PERUBAHAN DI BAWAH INI --}}
            <div
                class="container mx-auto px-5 relative z-10 flex flex-col items-center justify-center text-center text-white min-h-[90vh]">
                <h1 class="text-5xl md:text-6xl font-bold">Amira Collection</h1>
                <p class="text-lg md:text-xl mt-4 max-w-2xl">Pusat penyewaan baju karnaval terbaik di Tulungagung.</p>
            </div>
        </section>

        {{-- Cerita Kami Section --}}
        <section class="py-12 md:py-24" style="background-color: #f8f7f3;">
            <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center px-5">
                <div>
                    <img src="{{ asset('assets/images/bgtentang.png') }}" alt="Cerita Kami"
                        class="rounded-lg shadow-xl w-full">
                </div>
                <div class="text-dark-custom">
                    <h2 class="text-4xl font-bold mb-4">Cerita Kami</h2>
                    <p class="mb-4 text-lg">
                        Warung Cafe Wande Kopi Serut (WKS) berdiri mulai 27 Maret 2018 di Desa Serut, Kabupaten
                        Tulungagung.
                        Sebelumnya, tempat tersebut merupakan sebuah toko kecil yang kemudian berkembang menjadi warung
                        cafe. Lokasinya berada di RT 01/RW 04 Desa Serut, Kecamatan Boyolangu.
                    </p>
                </div>
            </div>
        </section>

        {{-- Owner Section --}}
        <section class="py-12 md:py-24" style="background-color: #f8f7f3;">
            <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center px-5">
                <div class="text-dark-custom">
                    <h2 class="text-4xl font-bold mb-4">Kata Owner Kami</h2>
                    <p class="text-lg">
                        Memiliki kafe adalah lebih dari sekadar bisnis; ini adalah sebuah panggilan jiwa. Setiap cangkir
                        kopi yang kami sajikan adalah hasil dari dedikasi, semangat, dan cinta kami untuk seni menyeduh.
                        Kami percaya bahwa setiap pelanggan yang datang adalah bagian dari komunitas kami, dan setiap
                        senyuman yang tercipta adalah tujuan utama kami.
                    </p>
                </div>
                <div class="text-center">
                    <img src="{{ asset('assets/images/bgtentang.png') }}" alt="Owner Cafe WKS"
                        class="rounded-full w-64 h-64 mx-auto object-cover mb-4 shadow-xl">
                    <h3 class="text-xl font-semibold text-dark-custom">Owner Amira Collection</h3>
                </div>
            </div>
        </section>

        {{-- Lokasi Kami Section --}}
        <section class="py-12 md:py-24" style="background-color: #f8f7f3;">
            <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center px-5">
                <div>
                    <img src="{{ asset('assets/images/bgtentang.png') }}" alt="Lokasi Kami"
                        class="rounded-lg shadow-xl w-full">
                </div>
                <div class="text-dark-custom">
                    <h2 class="text-4xl font-bold mb-4">Lokasi Kami</h2>
                    <p class="mb-2 text-lg"><strong>Alamat:</strong> Jl. KH Sulaiman Al Karim, Kates, Serut, Kec.
                        Boyolangu, Kabupaten Tulungagung, Jawa Timur 66235</p>
                    <p class="mb-4 text-lg"><strong>Jam Buka:</strong> 08:00 - 24:00</p>
                    <a href="#" class="btn-primary font-bold py-3 px-8 rounded-lg text-lg">Open Map</a>
                </div>
            </div>
        </section>

    </main>

    {{-- ======================================================= --}}
    {{-- FOOTER --}}
    {{-- ======================================================= --}}
    <footer style="background-color: var(--bg-main);" class="text-white pt-16 pb-8">
        <div class="container mx-auto px-5">
            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-12 gap-x-12 text-center sm:text-left border-t border-b border-gray-700 py-12">
                {{-- Info Perusahaan --}}
                <div class="space-y-4">
                    <h3 class="text-xl font-bold" style="color: var(--text-main);">AMIRA COLLECTION</h3>
                    <p class="text-gray-400">Penyewaan kostum karnaval terlengkap dan terpercaya untuk segala acaramu.
                    </p>
                </div>
                {{-- Navigasi --}}
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold" style="color: var(--text-main);">Navigasi</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Produk</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Tentang</a></li>
                    </ul>
                </div>
                {{-- Hubungi Kami --}}
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold" style="color: var(--text-main);">Hubungi Kami</h3>
                    <div class="flex justify-center sm:justify-start space-x-6">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5">
                                </rect>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                {{-- Lokasi --}}
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold" style="color: var(--text-main);">Lokasi Kami</h3>
                    <div class="w-full aspect-video rounded-lg shadow-md overflow-hidden">
                        <iframe
                            src="https://maps.google.com/maps?q=Satpas%20Polres%20Tulungagung&t=&z=15&ie=UTF8&iwloc=&output=embed"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="text-center text-gray-500 mt-8">
                © {{ date('Y') }} Amira Collection. All Rights Reserved.
            </div>
        </div>
    </footer>

</body>

</html>
