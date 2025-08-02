<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $koleksi['nama'] }} - Amira Collection</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- MENAMBAHKAN LIBRARY KALENDER FLATPCIKR --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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

        /* Styling untuk kalender */
        .flatpickr-calendar {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border: none;
            width: 100% !important;
        }

        .flatpickr-day.selected,
        .flatpickr-day.startRange,
        .flatpickr-day.endRange {
            background: var(--bg-main);
            border-color: var(--bg-main);
            color: var(--text-main);
        }

        .flatpickr-day:hover {
            background: #e9e9e9;
        }
    </style>
</head>

<body>

    {{-- ======================================================= --}}
    {{-- HEADER --}}
    {{-- ======================================================= --}}
    <header class="shadow-md sticky top-0 z-50" style="background-color: var(--bg-main);">
        <div class="container mx-auto flex justify-between items-center p-5 text-white">
            <a href="{{ route('home.index') }}" class="text-2xl font-bold tracking-wider"
                style="color: var(--text-main);">AMIRA COLLECTION</a>
            <nav class="hidden md:flex space-x-8 items-center font-medium">
                <a href="{{ route('home.index') }}" class="opacity-90 hover:opacity-100 transition">Home</a>
                <a href="{{ route('tentang.index') }}" class="opacity-90 hover:opacity-100 transition">Tentang</a>
                <a href="{{ route('koleksi.index') }}" style="color: #D4C15D; font-weight: bold;">Koleksi</a>
                <a href="{{ route('aksesoris.index') }}" class="opacity-90 hover:opacity-100 transition">Aksesoris</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto py-12 px-5">
        {{-- TOMBOL KEMBALI --}}
        <div class="mb-8">
            <a href="{{ route('koleksi.index') }}"
                class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd" />
                </svg>
                Kembali ke Halaman Koleksi
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

            {{-- Galeri Gambar --}}
            <div x-data="{ mainImage: '{{ asset('storage/' . $koleksi['gambar'][0]) }}' }">
                <div class="mb-4 rounded-lg overflow-hidden bg-gray-200">
                    <img :src="mainImage" alt="Gambar utama" class="w-full h-[36rem] object-cover">
                </div>
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($koleksi['gambar'] as $g)
                        <div class="rounded-lg overflow-hidden cursor-pointer border-2"
                            :class="{ 'border-accent': mainImage === '{{ asset('storage/' . $g) }}' }"
                            @click="mainImage = '{{ asset('storage/' . $g) }}'">
                            <img src="{{ asset('storage/' . $g) }}" alt="Thumbnail" class="w-full h-32 object-cover">
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Detail Informasi --}}
            <div class="flex flex-col">
                <span class="text-gray-500 uppercase tracking-widest text-sm">{{ $koleksi['kategori'] }}</span>
                <h1 class="text-5xl font-bold playfair-display my-4">{{ $koleksi['nama'] }}</h1>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold mb-3">Ketersediaan Stok</h2>
                    <div class="space-y-4">
                        @forelse ($koleksi['stok_varian'] as $jenis => $ukuranStok)
                            @php
                                $hasStock = collect($ukuranStok)->filter(fn($stok) => $stok > 0)->isNotEmpty();
                            @endphp
                            @if ($hasStock)
                                <div class="bg-white p-4 rounded-lg shadow-sm border">
                                    <h3 class="font-bold text-lg capitalize">{{ $jenis }}</h3>
                                    <div class="flex flex-wrap gap-x-6 gap-y-2 mt-2">
                                        @foreach ($ukuranStok as $ukuran => $stok)
                                            @if ($stok > 0)
                                                <div>
                                                    <span class="font-medium uppercase">{{ $ukuran }}:</span>
                                                    <span class="text-gray-600">{{ $stok }} pcs</span>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @empty
                            <p class="text-gray-500">Stok tidak tersedia.</p>
                        @endforelse
                    </div>
                </div>

                {{-- KALENDER PENYEWAAN --}}
                <div class="mt-8">
                    <h3 class="text-2xl font-semibold mb-4" style="color: var(--text-dark);">Pilih Tanggal Sewa</h3>
                    <div class="bg-white rounded-lg border p-2">
                        <div id="kalender"></div>
                    </div>
                </div>

                {{-- TOMBOL WHATSAPP DENGAN LOGO --}}
                <div class="mt-10">
                    <a href="https://wa.me/6281234567890?text=Halo%2C%20saya%20tertarik%20untuk%20menyewa%20koleksi%20'{{ urlencode($koleksi['nama']) }}'"
                        target="_blank"
                        class="inline-flex items-center justify-center gap-3 w-full text-center text-lg font-bold py-4 px-8 rounded-lg transition-transform duration-300 transform hover:scale-105"
                        style="background-color: var(--color-accent); color: var(--bg-main);">
                        {{-- SVG Logo WhatsApp --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 4.315 1.731 6.086l.001.004 1.443-4.148-4.226 1.159zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.371-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.5-.669-.51l-.57-.01c-.198 0-.521.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.289.173-1.414z" />
                        </svg>
                        Hubungi untuk Menyewa
                    </a>
                </div>
            </div>
        </div>
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

    {{-- SCRIPT UNTUK INISIALISASI KALENDER --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#kalender", {
                mode: "range",
                dateFormat: "d-m-Y",
                inline: true,
                minDate: "today" // Mencegah pemilihan tanggal di masa lalu
            });
        });
    </script>
</body>

</html>
