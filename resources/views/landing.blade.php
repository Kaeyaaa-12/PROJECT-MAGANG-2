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

    {{-- Custom Styles untuk Tema --}}
    <style>
        :root {
            --bg-main: #373737;
            --text-main: #FFFFFF;
            --color-accent: #D4C15D;
            --bg-additional: #F5F5F5;
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

        .tab-active-border {
            border-bottom: 2px solid var(--color-accent);
            color: var(--color-accent);
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
    </style>
</head>

<body>

    {{-- ======================================================= --}}
    {{-- HEADER --}}
    {{-- ======================================================= --}}
    <header class="shadow-md sticky top-0 z-50" style="background-color: var(--bg-main);">
        <div class="container mx-auto flex justify-between items-center p-5 text-white">
            <a href="#" class="text-2xl font-bold" style="color: var(--text-main);">COSTUMIFY</a>
            <nav class="hidden md:flex space-x-8 items-center font-medium">
                <a href="{{ route('home.index') }}" class="opacity-90 hover:opacity-100 transition">Home</a>
                <a href="{{ route('tentang.index') }}" class="opacity-90 hover:opacity-100 transition">Tentang</a>
                <a href="{{ route('kostum.pria') }}" class="opacity-90 hover:opacity-100 transition">Kostum Pria</a>
                <a href="{{ route('kostum.wanita') }}" class="opacity-90 hover:opacity-100 transition">Kostum Wanita</a>
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

        {{-- ======================================================= --}}
        {{-- HERO SECTION --}}
        {{-- ======================================================= --}}
        <section style="background-color: var(--bg-main);">
            <div class="container mx-auto grid md:grid-cols-2 items-center gap-8 py-12 px-5 md:py-23 overflow-hidden">
                <div class="text-center md:text-left text-white z-10">
                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-4" style="color: var(--text-main);">
                        Wujudkan Imajinasimu, Kenakan Kostummu
                    </h1>
                    <p class="text-lg mb-8 opacity-90">Sewa kostum karnaval terbaik untuk setiap acaramu. Tampil beda
                        dan tak terlupakan.</p>
                    <a href="#"
                        class="btn-primary font-bold py-3 px-8 rounded-full text-lg inline-block">Explore</a>
                </div>
                <div class="hero-image-container">
                    <div class="hero-image-bg"></div>
                    <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Model Kostum Karnaval"
                        class="hero-image drop-shadow-2xl rounded-lg">
                </div>
            </div>
        </section>

        {{-- ======================================================= --}}
        {{-- TENTANG KAMI --}}
        {{-- ======================================================= --}}
        <section class="py-12 md:py-24" style="background-color: #f8f7f3;">
            <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center px-5">
                <div class="order-2 md:order-1 text-center md:text-left">
                    <h2 class="text-4xl font-bold mb-4" style="color: var(--text-dark);">Tentang Kami</h2>
                    <p class="text-lg text-gray-600 mb-4">
                        Costumify adalah solusi terpadu untuk semua kebutuhan kostum Anda. Kami percaya bahwa setiap
                        orang berhak untuk tampil maksimal dan mewujudkan imajinasinya dalam setiap acara spesial.
                    </p>
                    <a href="#"
                        class="btn-secondary inline-block font-bold py-3 px-8 rounded-full text-lg">Selengkapnya</a>
                </div>
                <div class="order-1 md:order-2 flex justify-center">
                    <img src="{{ asset('assets/images/bgkostum.png') }}"
                        class="rounded-lg shadow-xl w-2/3 h-auto object-cover">
                </div>
            </div>
        </section>

        {{-- ======================================================= --}}
        {{-- Produk Kami --}}
        {{-- ======================================================= --}}
        <section id="produk" class="py-16" x-data="{ tab: 'terbaru' }" style="background-color: #f8f7f3;">
            <div class="container mx-auto text-center px-5">
                <h2 class="text-4xl font-bold mb-12" style="color: var(--text-dark);">Produk Kami</h2>
                <div class="flex justify-center border-b mb-10">
                    <button @click="tab = 'terbaru'"
                        :class="tab === 'terbaru' ? 'tab-active-border' : 'tab-inactive-border'"
                        class="px-8 py-3 text-lg transition">
                        Terbaru
                    </button>
                    <button @click="tab = 'populer'"
                        :class="tab === 'populer' ? 'tab-active-border' : 'tab-inactive-border'"
                        class="px-8 py-3 text-lg transition">
                        Populer
                    </button>
                </div>
                <div>
                    <div x-show="tab === 'terbaru'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <div class="rounded-lg overflow-hidden border border-transparent hover:border-gray-200 hover:shadow-lg transition"
                            style="background-color: var(--bg-additional);">
                            <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Kostum 1"
                                class="w-full h-80 object-cover">
                            <div class="p-5 text-left">
                                <h3 class="font-bold text-xl mb-1" style="color: var(--text-dark);">Kostum Venetian
                                </h3>
                                <p style="color: var(--color-accent);" class="font-semibold">Rp 180.000 / hari</p>
                            </div>
                        </div>
                        <div class="rounded-lg overflow-hidden border border-transparent hover:border-gray-200 hover:shadow-lg transition"
                            style="background-color: var(--bg-additional);">
                            <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Kostum 2"
                                class="w-full h-80 object-cover">
                            <div class="p-5 text-left">
                                <h3 class="font-bold text-xl mb-1" style="color: var(--text-dark);">Kostum Ksatria
                                </h3>
                                <p style="color: var(--color-accent);" class="font-semibold">Rp 250.000 / hari</p>
                            </div>
                        </div>
                        <div class="rounded-lg overflow-hidden border border-transparent hover:border-gray-200 hover:shadow-lg transition"
                            style="background-color: var(--bg-additional);">
                            <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Kostum 3"
                                class="w-full h-80 object-cover">
                            <div class="p-5 text-left">
                                <h3 class="font-bold text-xl mb-1" style="color: var(--text-dark);">Gaun Putri</h3>
                                <p style="color: var(--color-accent);" class="font-semibold">Rp 220.000 / hari</p>
                            </div>
                        </div>
                        <div class="rounded-lg overflow-hidden border border-transparent hover:border-gray-200 hover:shadow-lg transition"
                            style="background-color: var(--bg-additional);">
                            <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Kostum 4"
                                class="w-full h-80 object-cover">
                            <div class="p-5 text-left">
                                <h3 class="font-bold text-xl mb-1" style="color: var(--text-dark);">Kostum Bajak Laut
                                </h3>
                                <p style="color: var(--color-accent);" class="font-semibold">Rp 175.000 / hari</p>
                            </div>
                        </div>
                    </div>
                    <div x-show="tab === 'populer'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8"
                        style="display: none;">
                        <div class="rounded-lg overflow-hidden border border-transparent hover:border-gray-200 hover:shadow-lg transition"
                            style="background-color: var(--bg-additional);">
                            <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Kostum Populer 1"
                                class="w-full h-80 object-cover">
                            <div class="p-5 text-left">
                                <h3 class="font-bold text-xl mb-1" style="color: var(--text-dark);">Superhero Populer
                                </h3>
                                <p style="color: var(--color-accent);" class="font-semibold">Rp 200.000 / hari</p>
                            </div>
                        </div>
                        <div class="rounded-lg overflow-hidden border border-transparent hover:border-gray-200 hover:shadow-lg transition"
                            style="background-color: var(--bg-additional);">
                            <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Kostum Populer 2"
                                class="w-full h-80 object-cover">
                            <div class="p-5 text-left">
                                <h3 class="font-bold text-xl mb-1" style="color: var(--text-dark);">Horror Klasik</h3>
                                <p style="color: var(--color-accent);" class="font-semibold">Rp 185.000 / hari</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16" style="background-color: #f8f7f3;">
            <div class="container mx-auto text-center px-5">
                <h2 class="text-4xl font-bold mb-12" style="color: var(--text-dark);">Kategori</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <a href="#" class="relative rounded-lg overflow-hidden group h-96"><img
                            src="{{ asset('assets/images/bgkostum.png') }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                            <h3 class="text-white text-3xl font-bold">PAKAIAN ADAT</h3>
                        </div>
                    </a>
                    <a href="#" class="relative rounded-lg overflow-hidden group h-96"><img
                            src="{{ asset('assets/images/bgkostum.png') }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                            <h3 class="text-white text-3xl font-bold">PROFESI</h3>
                        </div>
                    </a>
                    <a href="#" class="relative rounded-lg overflow-hidden group h-96"><img
                            src="{{ asset('assets/images/bgkostum.png') }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                            <h3 class="text-white text-3xl font-bold">FANTASI</h3>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white">
            <div class="container mx-auto text-center px-5">
                <h2 class="text-4xl font-bold mb-4" style="color: var(--text-dark);">Cara Mudah Menyewa</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-16">Hanya dengan 3 langkah sederhana, kostum
                    impian siap menjadi milikmu.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
                    <div class="hidden md:block absolute top-1/2 left-0 w-full h-px bg-gray-300"
                        style="transform: translateY(-50px);"></div>
                    <div class="relative flex flex-col items-center">
                        <div class="text-white rounded-full w-20 h-20 flex items-center justify-center text-3xl font-bold mb-6 z-10 border-4 border-light-beige"
                            style="background-color: var(--bg-main);">1</div>
                        <h3 class="text-2xl font-semibold mb-2" style="color: var(--text-dark);">Pilih Kostum</h3>
                        <p class="text-gray-500">Datang langsung dan memilih pada toko kami. Klik untuk lihat peta
                            lokasi kami atau buka website www.costumfy.com untuk melihat semua koleksi kami</p>
                    </div>
                    <div class="relative flex flex-col items-center">
                        <div class="text-white rounded-full w-20 h-20 flex items-center justify-center text-3xl font-bold mb-6 z-10 border-4 border-light-beige"
                            style="background-color: var(--bg-main);">2</div>
                        <h3 class="text-2xl font-semibold mb-2" style="color: var(--text-dark);">Atur Jadwal & Bayar
                        </h3>
                        <p class="text-gray-500">Tentukan tanggal sewa, lakukan pembayaran aman atau bisa order lewat
                            whatsapp.</p>
                    </div>
                    <div class="relative flex flex-col items-center">
                        <div class="text-white rounded-full w-20 h-20 flex items-center justify-center text-3xl font-bold mb-6 z-10 border-4 border-light-beige"
                            style="background-color: var(--bg-main);">3</div>
                        <h3 class="text-2xl font-semibold mb-2" style="color: var(--text-dark);">Ambil & Kembalikan
                        </h3>
                        <p class="text-gray-500">Kostum dapat diambil di lokasi dan dikembalikan langsung di toko kami
                            atau dapat dikirim dan dikembalikan via gojek atau JNE, Harga sewa belum termasuk ongkos
                            kirim, Keterlambatan pengiriman oleh pihak ketiga ( Gojek , JNE , dll ) diluar tanggung
                            jawab kami.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white">
            <div class="container mx-auto text-center px-5">
                <h2 class="text-4xl font-bold mb-4" style="color: var(--text-dark);">Aturan Penyewaan Kostum</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-16">Beberapa hal yang perlu Anda perhatikan saat
                    menyewa kostum di Costumify.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-lg shadow-lg text-left">
                        <h3 class="text-2xl font-semibold mb-4" style="color: var(--text-dark);">Pemesanan &
                            Pembayaran</h3>
                        <p class="text-gray-500">Pemesanan dapat dilakukan secara online maupun offline. Pembayaran
                            penuh di muka diperlukan untuk mengonfirmasi pesanan Anda.</p>
                    </div>
                    <div class="bg-white p-8 rounded-lg shadow-lg text-left">
                        <h3 class="text-2xl font-semibold mb-4" style="color: var(--text-dark);">Jaminan Sewa</h3>
                        <p class="text-gray-500">Setiap penyewaan memerlukan jaminan (deposit) yang akan dikembalikan
                            sepenuhnya setelah kostum dikembalikan dalam kondisi baik.</p>
                    </div>
                    <div class="bg-white p-8 rounded-lg shadow-lg text-left">
                        <h3 class="text-2xl font-semibold mb-4" style="color: var(--text-dark);">Pengambilan &
                            Pengembalian</h3>
                        <p class="text-gray-500">Kostum dapat diambil H-1 acara dan harus dikembalikan H+1 acara.
                            Keterlambatan akan dikenakan denda harian.</p>
                    </div>
                    <div class="bg-white p-8 rounded-lg shadow-lg text-left">
                        <h3 class="text-2xl font-semibold mb-4" style="color: var(--text-dark);">Perawatan Kostum</h3>
                        <p class="text-gray-500">Harap menjaga kebersihan dan keutuhan kostum. Dilarang mengubah atau
                            memodifikasi kostum tanpa izin.</p>
                    </div>
                    <div class="bg-white p-8 rounded-lg shadow-lg text-left">
                        <h3 class="text-2xl font-semibold mb-4" style="color: var(--text-dark);">Kerusakan &
                            Kehilangan</h3>
                        <p class="text-gray-500">Kerusakan atau kehilangan kostum akan dikenakan biaya perbaikan atau
                            penggantian sesuai dengan nilai kostum.</p>
                    </div>
                    <div class="bg-white p-8 rounded-lg shadow-lg text-left">
                        <h3 class="text-2xl font-semibold mb-4" style="color: var(--text-dark);">Pembatalan</h3>
                        <p class="text-gray-500">Pembatalan 3 hari sebelum tanggal pengambilan akan dikenakan potongan
                            50% dari biaya sewa. Kurang dari 3 hari, biaya sewa tidak dapat dikembalikan.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16" style="background-color: #f8f7f3;">
            <div class="container mx-auto text-center px-5">
                <h2 class="text-4xl font-bold mb-12" style="color: var(--text-dark);">Galeri</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/images/bgkostum.png') }}"
                        alt="gallery image">
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/images/bgkostum.png') }}"
                        alt="gallery image">
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/images/bgkostum.png') }}"
                        alt="gallery image">
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/images/bgkostum.png') }}"
                        alt="gallery image">
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/images/bgkostum.png') }}"
                        alt="gallery image">
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/images/bgkostum.png') }}"
                        alt="gallery image">
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/images/bgkostum.png') }}"
                        alt="gallery image">
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset('assets/images/bgkostum.png') }}"
                        alt="gallery image">
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
                    <h3 class="text-xl font-bold" style="color: var(--text-main);">COSTUMIFY</h3>
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
                © {{ date('Y') }} Costumify. All Rights Reserved.
            </div>
        </div>
    </footer>


</body>

</html>
