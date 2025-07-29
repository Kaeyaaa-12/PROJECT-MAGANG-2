<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Costumify - Sewa Kostum Karnaval</title>

    @vite('resources/css/app.css')

    {{-- Google Fonts: Instrument Sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    {{-- Custom Styles untuk Tema --}}
    <style>
        :root {
            --bg-light: #f8f7f3;
            --bg-theme-color: #0C3623;
            --text-dark: #3d342a;
            --text-light: #ffffff;
            --border-color: #e5e0d4;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }

        .btn-primary {
            background-color: #ffffff;
            color: var(--bg-theme-color);
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #f0f0f0;
        }

        .btn-secondary {
            background-color: var(--bg-theme-color);
            color: var(--text-light);
            transition: opacity 0.3s ease;
        }

        .btn-secondary:hover {
            opacity: 0.9;
        }

        .tab-active-border {
            border-bottom: 2px solid var(--bg-theme-color);
            color: var(--bg-theme-color);
            font-weight: 600;
        }

        .tab-inactive-border {
            border-bottom: 2px solid transparent;
            color: #6b7280;
            /* text-gray-500 */
        }

        /* Efek untuk gambar Hero */
        .hero-image-container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-image-bg {
            position: absolute;
            width: 85%;
            padding-bottom: 85%;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            z-index: 1;
            filter: blur(20px);
        }

        .hero-image {
            position: relative;
            z-index: 2;
            max-width: 450px;
            width: 100%;
        }

        /* Styling untuk Swiper Pagination */
        .swiper-pagination-bullet {
            background-color: #d1d5db;
            /* gray-300 */
            opacity: 1;
        }

        .swiper-pagination-bullet-active {
            background-color: var(--bg-theme-color);
        }
    </style>
</head>

<body>

    {{-- ======================================================= --}}
    {{-- HEADER --}}
    {{-- ======================================================= --}}
    <header class="shadow-md sticky top-0 z-50" style="background-color: var(--bg-theme-color);">
        <div class="container mx-auto flex justify-between items-center p-5 text-white">
            <a href="#" class="text-2xl font-bold">COSTUMIFY</a>
            <nav class="hidden md:flex space-x-8 items-center font-medium">
                <a href="#" class="opacity-90 hover:opacity-100 transition">Home</a>
                <a href="#" class="opacity-90 hover:opacity-100 transition">Kostum</a>
                <a href="#" class="opacity-90 hover:opacity-100 transition">Aksesoris</a>
                <a href="#" class="opacity-90 hover:opacity-100 transition">Tentang</a>
                <a href="#" class="opacity-90 hover:opacity-100 transition">Kontak</a>
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
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <main>

        {{-- ======================================================= --}}
        {{-- HERO SECTION (Desain Baru) --}}
        {{-- ======================================================= --}}
        <section style="background-color: var(--bg-theme-color);">
            <div class="container mx-auto grid md:grid-cols-2 items-center gap-8 py-12 px-5 md:py-24 overflow-hidden">
                <div class="text-center md:text-left text-white z-10">
                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-4">Wujudkan Imajinasimu, Kenakan Kostummu
                    </h1>
                    <p class="text-lg mb-8 opacity-90">Sewa kostum karnaval terbaik untuk setiap acaramu. Tampil beda
                        dan tak terlupakan.</p>
                    <a href="#" class="btn-primary font-bold py-3 px-8 rounded-full text-lg inline-block">Sewa
                        Sekarang</a>
                </div>
                <div class="hero-image-container">
                    <div class="hero-image-bg"></div>
                    <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Model Kostum Karnaval"
                        class="hero-image drop-shadow-2xl">
                </div>
            </div>
        </section>

        {{-- ======================================================= --}}
        {{-- Iklan Produk Geser (Desain Baru - 3 Iklan) --}}
        {{-- ======================================================= --}}
        <section class="py-20 bg-white">
            <div class="container mx-auto px-5">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold">Penawaran Spesial</h2>
                    <p class="text-lg text-gray-600 mt-2">Jangan lewatkan promo terbaik dari kami!</p>
                </div>
                <div class="swiper-container iklan-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide !h-auto">
                            <div
                                class="bg-light rounded-lg shadow-lg overflow-hidden flex flex-col md:flex-row items-center h-full">
                                <div class="w-full md:w-1/2 p-8 text-center md:text-left">
                                    <span class="text-sm font-bold uppercase tracking-wider"
                                        style="color: var(--bg-theme-color);">KOLEKSI BARU</span>
                                    <h3 class="text-3xl font-bold my-2 text-dark">Fantasi & Superhero</h3>
                                    <p class="text-gray-600 mb-4">Jadilah yang pertama untuk mengenakan kostum terbaru
                                        kami yang menakjubkan!</p>
                                    <a href="#" class="font-bold hover:underline"
                                        style="color: var(--bg-theme-color);">Lihat Koleksi →</a>
                                </div>
                                <div class="w-full md:w-1/2 h-64 md:h-full">
                                    <img src="{{ asset('assets/images/bgkostum.png') }}"
                                        class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide !h-auto">
                            <div
                                class="bg-light rounded-lg shadow-lg overflow-hidden flex flex-col md:flex-row items-center h-full">
                                <div class="w-full md:w-1/2 p-8 text-center md:text-left">
                                    <span class="text-sm font-bold uppercase tracking-wider"
                                        style="color: var(--bg-theme-color);">DISKON AKHIR PEKAN</span>
                                    <h3 class="text-3xl font-bold my-2 text-dark">Diskon 20% Dewasa</h3>
                                    <p class="text-gray-600 mb-4">Nikmati potongan harga spesial untuk semua kostum
                                        kategori dewasa setiap Jumat-Minggu.</p>
                                    <a href="#" class="font-bold hover:underline"
                                        style="color: var(--bg-theme-color);">Klaim Diskon →</a>
                                </div>
                                <div class="w-full md:w-1/2 h-64 md:h-full">
                                    <img src="{{ asset('assets/images/bgkostum.png') }}"
                                        class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide !h-auto">
                            <div
                                class="bg-light rounded-lg shadow-lg overflow-hidden flex flex-col md:flex-row items-center h-full">
                                <div class="w-full md:w-1/2 p-8 text-center md:text-left">
                                    <span class="text-sm font-bold uppercase tracking-wider"
                                        style="color: var(--bg-theme-color);">LENGKAPI TAMPILANMU</span>
                                    <h3 class="text-3xl font-bold my-2 text-dark">Sewa Aksesoris</h3>
                                    <p class="text-gray-600 mb-4">Dari topeng hingga properti unik, temukan aksesoris
                                        pelengkap kostum Anda di sini.</p>
                                    <a href="#" class="font-bold hover:underline"
                                        style="color: var(--bg-theme-color);">Cari Aksesoris →</a>
                                </div>
                                <div class="w-full md:w-1/2 h-64 md:h-full">
                                    <img src="{{ asset('assets/images/bgkostum.png') }}"
                                        class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination !relative !bottom-0 pt-8"></div>
                </div>
            </div>
        </section>

        {{-- ======================================================= --}}
        {{-- Produk Kami --}}
        {{-- ======================================================= --}}
        <section id="produk" class="py-16" x-data="{ tab: 'baru' }">
            <div class="container mx-auto text-center px-5">
                <h2 class="text-4xl font-bold mb-12">Produk Kami</h2>
                <div class="flex justify-center border-b mb-10">
                    <button @click="tab = 'baru'"
                        :class="tab === 'baru' ? 'tab-active-border' : 'tab-inactive-border'"
                        class="px-8 py-3 text-lg transition">
                        Kostum Baru
                    </button>
                    <button @click="tab = 'laris'"
                        :class="tab === 'laris' ? 'tab-active-border' : 'tab-inactive-border'"
                        class="px-8 py-3 text-lg transition">
                        Paling Laris
                    </button>
                </div>

                <div>
                    <div x-show="tab === 'baru'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <div
                            class="bg-white rounded-lg overflow-hidden border border-transparent hover:border-gray-200 hover:shadow-lg transition">
                            <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Kostum 1"
                                class="w-full h-80 object-cover">
                            <div class="p-5 text-left">
                                <h3 class="font-bold text-xl mb-1">Kostum Venetian</h3>
                                <p style="color: var(--bg-theme-color);" class="font-semibold">Rp 180.000 / hari</p>
                            </div>
                        </div>
                        <div
                            class="bg-white rounded-lg overflow-hidden border border-transparent hover:border-gray-200 hover:shadow-lg transition">
                            <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Kostum 2"
                                class="w-full h-80 object-cover">
                            <div class="p-5 text-left">
                                <h3 class="font-bold text-xl mb-1">Kostum Ksatria</h3>
                                <p style="color: var(--bg-theme-color);" class="font-semibold">Rp 250.000 / hari</p>
                            </div>
                        </div>
                        <div
                            class="bg-white rounded-lg overflow-hidden border border-transparent hover:border-gray-200 hover:shadow-lg transition">
                            <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Kostum 3"
                                class="w-full h-80 object-cover">
                            <div class="p-5 text-left">
                                <h3 class="font-bold text-xl mb-1">Gaun Putri</h3>
                                <p style="color: var(--bg-theme-color);" class="font-semibold">Rp 220.000 / hari</p>
                            </div>
                        </div>
                        <div
                            class="bg-white rounded-lg overflow-hidden border border-transparent hover:border-gray-200 hover:shadow-lg transition">
                            <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Kostum 4"
                                class="w-full h-80 object-cover">
                            <div class="p-5 text-left">
                                <h3 class="font-bold text-xl mb-1">Kostum Bajak Laut</h3>
                                <p style="color: var(--bg-theme-color);" class="font-semibold">Rp 175.000 / hari</p>
                            </div>
                        </div>
                    </div>
                    <div x-show="tab === 'laris'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8"
                        style="display: none;">
                        <div
                            class="bg-white rounded-lg overflow-hidden border border-transparent hover:border-gray-200 hover:shadow-lg transition">
                            <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Kostum Populer 1"
                                class="w-full h-80 object-cover">
                            <div class="p-5 text-left">
                                <h3 class="font-bold text-xl mb-1">Superhero Populer</h3>
                                <p style="color: var(--bg-theme-color);" class="font-semibold">Rp 200.000 / hari</p>
                            </div>
                        </div>
                        <div
                            class="bg-white rounded-lg overflow-hidden border border-transparent hover:border-gray-200 hover:shadow-lg transition">
                            <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Kostum Populer 2"
                                class="w-full h-80 object-cover">
                            <div class="p-5 text-left">
                                <h3 class="font-bold text-xl mb-1">Horror Klasik</h3>
                                <p style="color: var(--bg-theme-color);" class="font-semibold">Rp 185.000 / hari</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16">
            <div class="container mx-auto text-center px-5">
                <h2 class="text-4xl font-bold mb-12">Jelajahi Kategori</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <a href="#" class="relative rounded-lg overflow-hidden group h-96"><img
                            src="{{ asset('assets/images/bgkostum.png') }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                            <h3 class="text-white text-3xl font-bold">Kostum Anak</h3>
                        </div>
                    </a>
                    <a href="#" class="relative rounded-lg overflow-hidden group h-96"><img
                            src="{{ asset('assets/images/bgkostum.png') }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                            <h3 class="text-white text-3xl font-bold">Kostum Dewasa</h3>
                        </div>
                    </a>
                    <a href="#" class="relative rounded-lg overflow-hidden group h-96"><img
                            src="{{ asset('assets/images/bgkostum.png') }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                            <h3 class="text-white text-3xl font-bold">Aksesoris</h3>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white">
            <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center px-5">
                <div><img src="{{ asset('assets/images/bgkostum.png') }}" class="rounded-lg shadow-lg"></div>
                <div class="text-center md:text-left">
                    <h2 class="text-4xl font-bold mb-4">Tumbuhkan Jiwa Pestamu</h2>
                    <p class="text-lg text-gray-600 mb-6">Setiap kostum memiliki cerita. Kami bantu Anda menciptakan
                        momen tak terlupakan dengan koleksi pilihan yang unik dan berkualitas tinggi.</p>
                    <a href="#"
                        class="btn-secondary inline-block font-bold py-3 px-8 rounded-full text-lg">Tentang Kami</a>
                </div>
            </div>
        </section>

        <section class="py-20">
            <div class="container mx-auto text-center px-5">
                <h2 class="text-4xl font-bold mb-4">Cara Mudah Menyewa</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-16">Hanya dengan 3 langkah sederhana, kostum
                    impian siap menjadi milikmu.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
                    <div class="hidden md:block absolute top-1/2 left-0 w-full h-px bg-gray-300"
                        style="transform: translateY(-50px);"></div>
                    <div class="relative flex flex-col items-center">
                        <div class="text-white rounded-full w-20 h-20 flex items-center justify-center text-3xl font-bold mb-6 z-10 border-4 border-light-beige"
                            style="background-color: var(--bg-theme-color);">1</div>
                        <h3 class="text-2xl font-semibold mb-2 text-dark-brown">Pilih Kostum</h3>
                        <p class="text-gray-500">Jelajahi koleksi kami dan temukan kostum yang paling sesuai.</p>
                    </div>
                    <div class="relative flex flex-col items-center">
                        <div class="text-white rounded-full w-20 h-20 flex items-center justify-center text-3xl font-bold mb-6 z-10 border-4 border-light-beige"
                            style="background-color: var(--bg-theme-color);">2</div>
                        <h3 class="text-2xl font-semibold mb-2 text-dark-brown">Atur Jadwal & Bayar</h3>
                        <p class="text-gray-500">Tentukan tanggal sewa, lakukan pembayaran aman.</p>
                    </div>
                    <div class="relative flex flex-col items-center">
                        <div class="text-white rounded-full w-20 h-20 flex items-center justify-center text-3xl font-bold mb-6 z-10 border-4 border-light-beige"
                            style="background-color: var(--bg-theme-color);">3</div>
                        <h3 class="text-2xl font-semibold mb-2 text-dark-brown">Ambil & Kembalikan</h3>
                        <p class="text-gray-500">Ambil kostum di lokasi dan kembalikan tepat waktu.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-white">
            <div class="container mx-auto text-center px-5">
                <h2 class="text-4xl font-bold mb-12">Galeri</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/images/bgkostum.png') }}"
                        alt="gallery image">
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/images/bgkostum.png') }}"
                        alt="gallery image">
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/images/bgkostum.png') }}"
                        alt="gallery image">
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/images/bgkostum.png') }}"
                        alt="gallery image">
                </div>
                <a href="#"
                    class="btn-secondary mt-8 inline-block font-bold py-3 px-8 rounded-full text-lg">@costumify.id</a>
            </div>
        </section>
    </main>

    {{-- ======================================================= --}}
    {{-- FOOTER --}}
    {{-- ======================================================= --}}
    <footer style="background-color: var(--bg-theme-color);" class="text-white pt-16 pb-8">
        <div class="container mx-auto px-5">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold mb-2">Tetap Terhubung</h3>
                <p class="opacity-80">Dapatkan info promo, koleksi baru, dan tips & trik seputar kostum.</p>
            </div>
            <div
                class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center md:text-left border-t border-b border-gray-700 py-8">
                <div>
                    <h3 class="text-xl font-bold mb-4 text-white">COSTUMIFY</h3>
                    <p class="text-gray-400">Penyewaan kostum karnaval terlengkap dan terpercaya untuk segala acaramu.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Navigasi</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="#produk" class="text-gray-400 hover:text-white">Produk</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Tentang</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Bantuan</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Kontak Kami</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Ikuti Kami</h3>
                    <div class="flex justify-center md:justify-start space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">Facebook</a>
                        <a href="#" class="text-gray-400 hover:text-white">Instagram</a>
                        <a href="#" class="text-gray-400 hover:text-white">Twitter</a>
                    </div>
                </div>
            </div>
            <div class="text-center text-gray-500 mt-8">
                &copy; {{ date('Y') }} Costumify. All Rights Reserved.
            </div>
        </div>
    </footer>

    <script>
        var swiper = new Swiper('.iklan-slider', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
</body>

</html>
