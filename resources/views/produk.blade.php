<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Amira Collection</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        :root {
            --bg-main: #373737;
            --text-main: #FFFFFF;
            --color-accent: #D4C15D;
            --bg-additional: #F5F5F5;
            --text-dark: #2d2d2d;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: var(--bg-additional);
            color: var(--text-dark);
        }

        .playfair-display {
            font-family: 'Playfair Display', serif;
        }

        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .product-card .product-image-container {
            overflow: hidden;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .product-image {
            transition: transform 0.3s ease;
        }
    </style>
</head>

<body>

    {{-- ======================================================= --}}
    {{-- HEADER (DISAMAKAN DENGAN LANDING.BLADE.PHP) --}}
    {{-- ======================================================= --}}
    <header class="shadow-md sticky top-0 z-50" style="background-color: var(--bg-main);">
        <div class="container mx-auto flex justify-between items-center p-5 text-white">
            <a href="{{ route('home.index') }}" class="text-2xl font-bold tracking-wider"
                style="color: var(--text-main);">AMIRA COLLECTION</a>
            <nav class="hidden md:flex space-x-8 items-center font-medium">
                <a href="{{ route('home.index') }}" class="opacity-90 hover:opacity-100 transition">Home</a>
                <a href="{{ route('tentang.index') }}" class="opacity-90 hover:opacity-100 transition">Tentang</a>
                <a href="{{ route('produk.index') }}" style="color: #D4C15D; font-weight: bold;">Produk</a>
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
            </div>
        </div>
    </header>

    <main class="container mx-auto py-16 px-5">
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold playfair-display" style="color: var(--text-dark);">Koleksi Kostum</h1>
            <p class="text-gray-500 mt-2 text-lg">Temukan kostum impianmu untuk momen tak terlupakan.</p>
        </div>

        <div x-data="{ visibleItems: 8 }">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($produks as $index => $produk)
                    <div x-show="currentIndex < visibleItems" x-init="currentIndex = {{ $index }}">
                        <a href="{{ route('produk.show', ['id' => $produk['id']]) }}"
                            class="product-card block bg-white rounded-lg shadow-md overflow-hidden group">
                            <div class="product-image-container h-96">
                                <img src="{{ asset('assets/images/' . $produk['thumbnail']) }}"
                                    alt="{{ $produk['nama'] }}" class="product-image w-full h-full object-cover">
                            </div>
                            <div class="p-5">
                                <h3
                                    class="font-bold text-xl text-gray-800 group-hover:text-accent transition-colors duration-300">
                                    {{ $produk['nama'] }}</h3>
                                <p class="text-gray-500 text-sm mt-1">Stok Tersedia</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12" x-show="visibleItems < {{ count($produks) }}">
                <button @click="visibleItems += 4"
                    class="bg-gray-800 text-white font-semibold py-3 px-8 rounded-lg hover:bg-gray-900 transition-all duration-300">
                    Muat Lebih Banyak
                </button>
            </div>
        </div>
    </main>

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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
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
                        {{-- Link diperbarui di sini --}}
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5323.074416730627!2d111.91251873603444!3d-8.058066352920283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78e3854c13f2a5%3A0x7175b2efdb3b16e2!2sAmira%20Collections!5e0!3m2!1sid!2sus!4v1753936167529!5m2!1sid!2sus"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
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
