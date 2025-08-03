<!DOCTYPE html>
<html lang="id" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.scrollY > 50)">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amira Collection - Sewa Kostum Karnaval</title>

    @vite('resources/css/app.css')

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Playfair+Display:wght@400;700&display=swap"
        rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- Custom Styles --}}
    <style>
        :root {
            --bg-dark: #1a1a1a;
            --text-gold: #D4AF37;
            --text-light: #f5f5f5;
            --bg-soft: #2d2d2d;
            --bg-darker: #242424;
            /* Warna lebih gelap untuk card */
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-light);
        }

        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        .btn-primary {
            background-color: var(--text-gold);
            color: var(--bg-dark);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .btn-primary:hover {
            background-color: transparent;
            color: var(--text-gold);
            border-color: var(--text-gold);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--text-gold);
            border: 2px solid var(--text-gold);
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: var(--text-gold);
            color: var(--bg-dark);
        }

        .tab-active {
            border-bottom: 2px solid var(--text-gold);
            color: var(--text-gold);
            font-weight: 600;
        }

        .tab-inactive {
            border-bottom: 2px solid transparent;
            color: #a1a1aa;
            /* zinc-400 */
        }

        /* Animasi Scroll */
        .scroll-animate {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        .scroll-animate.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body x-data="{}" x-init="const sections = document.querySelectorAll('.scroll-animate');
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, { threshold: 0.1 });
sections.forEach(section => {
    observer.observe(section);
});">

    @include('layouts.header')

    <main>
        {{-- Hero Section --}}
        <section class="relative h-[100vh] bg-cover bg-center"
            style="background-image: url('{{ asset('assets/images/bghome1.png') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
            <div class="relative z-10 container mx-auto flex flex-col justify-center h-full text-white px-5">
                <div class="max-w-xl">
                    <h1 class="text-5xl lg:text-7xl font-serif font-bold leading-tight mb-4">
                        Amira Collection
                    </h1>
                    {{-- Teks kecil ditambahkan di sini --}}
                    <p class="text-lg lg:text-xl text-gray-300 mb-6">Temukan beragam kostum unik dan eksklusif
                        di pusat sewa terbaik Tulungagung</p>
                    <a href="#koleksi" class="btn-primary font-bold py-3 px-10 rounded-md text-lg inline-block mt-4">
                        Mulai Menyewa
                    </a>
                </div>
            </div>
        </section>

        {{-- Tentang Kami --}}
        <section class="py-16 md:py-24 scroll-animate" style="background-color: var(--bg-soft);">
            <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center px-5">
                <div class="order-2 md:order-1 text-center md:text-left">
                    <h2 class="text-4xl font-bold mb-4 font-serif" style="color: var(--text-light);">Tentang Kami</h2>
                    <p class="text-lg text-gray-400 mb-6">
                        Amira Collection adalah solusi terpadu untuk semua kebutuhan kostum Anda. Kami percaya bahwa
                        setiap orang berhak untuk tampil maksimal dan mewujudkan imajinasinya dalam setiap acara
                        spesial.
                    </p>
                    <a href="{{ route('tentang.index') }}"
                        class="btn-secondary inline-block font-bold py-3 px-8 rounded-md text-lg">Selengkapnya</a>
                </div>
                <div class="order-1 md:order-2 flex justify-center">
                    <img src="{{ asset('assets/images/rumah.png') }}"
                        class="rounded-lg shadow-xl w-full max-w-md h-auto object-cover">
                </div>
            </div>
        </section>

        {{-- Koleksi Kami --}}
        <section id="koleksi" class="py-16 scroll-animate" x-data="{ tab: 'kostum' }"
            style="background-color: var(--bg-soft);">
            <div class="container mx-auto text-center px-5">
                <h2 class="text-4xl font-bold mb-12 font-serif" style="color: var(--text-light);">Koleksi Kami</h2>
                <div class="flex justify-center border-b border-gray-700 mb-10">
                    <button @click="tab = 'kostum'" :class="tab === 'kostum' ? 'tab-active' : 'tab-inactive'"
                        class="px-8 py-3 text-lg transition">
                        Koleksi Terbaru
                    </button>
                    <button @click="tab = 'aksesoris'" :class="tab === 'aksesoris' ? 'tab-active' : 'tab-inactive'"
                        class="px-8 py-3 text-lg transition">
                        Aksesoris Terbaru
                    </button>
                </div>
                <div>
                    {{-- Card Koleksi Baru --}}
                    <div x-show="tab === 'kostum'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        @forelse ($newCollections as $collection)
                            <a href="{{ route('koleksi.show', $collection->id) }}" class="block group">
                                <div class="rounded-lg overflow-hidden border border-gray-800 transform transition-all duration-300 hover:shadow-2xl hover:shadow-yellow-500/20 hover:-translate-y-2"
                                    style="background-color: var(--bg-darker);">
                                    <img src="{{ asset('storage/' . $collection->gambar_1) }}"
                                        alt="{{ $collection->nama_koleksi }}"
                                        class="w-full h-96 object-cover transform group-hover:scale-105 transition-transform duration-300">
                                    <div class="p-5 text-center">
                                        {{-- Nama koleksi ditengahkan --}}
                                        <h3
                                            class="font-bold text-xl mb-1 text-light group-hover:text-gold-400 transition">
                                            {{ $collection->nama_koleksi }}</h3>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="col-span-4 text-gray-400">Belum ada koleksi baru.</p>
                        @endforelse
                    </div>

                    {{-- Card Aksesoris Baru --}}
                    <div x-show="tab === 'aksesoris'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8"
                        style="display: none;">
                        @forelse ($newAccessories as $accessory)
                            <a href="{{ route('aksesoris.show', $accessory->id) }}" class="block group">
                                <div class="rounded-lg overflow-hidden border border-gray-800 transform transition-all duration-300 hover:shadow-2xl hover:shadow-yellow-500/20 hover:-translate-y-2"
                                    style="background-color: var(--bg-darker);">
                                    <img src="{{ asset('storage/' . $accessory->gambar_1) }}"
                                        alt="{{ $accessory->nama_aksesoris }}"
                                        class="w-full h-96 object-cover transform group-hover:scale-105 transition-transform duration-300">
                                    <div class="p-5 text-center">
                                        {{-- Nama aksesoris ditengahkan --}}
                                        <h3
                                            class="font-bold text-xl mb-1 text-light group-hover:text-gold-400 transition">
                                            {{ $accessory->nama_aksesoris }}</h3>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="col-span-4 text-gray-400">Belum ada aksesoris baru.</p>
                        @endforelse
                    </div>
                </div>
                <div class="mt-12">
                    <a href="{{ route('koleksi.index') }}"
                        class="btn-primary font-bold py-3 px-10 rounded-md text-lg inline-block">Lihat Semua
                        Koleksi</a>
                </div>
            </div>
        </section>

        {{-- Cara Mudah Menyewa --}}
        <section class="py-20 scroll-animate" style="background-color: var(--bg-soft);">
            <div class="container mx-auto text-center px-5">
                <h2 class="text-4xl font-bold mb-4 font-serif" style="color: var(--text-light);">Cara Mudah Menyewa
                </h2>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto mb-16">Hanya dengan 3 langkah sederhana, kostum
                    impian siap menjadi milikmu.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
                    <div class="hidden md:block absolute top-12 left-0 w-full h-px bg-gray-700"></div>
                    <div class="relative flex flex-col items-center">
                        <div class="text-black rounded-full w-24 h-24 flex items-center justify-center text-4xl font-bold mb-6 z-10 border-4 border-gray-700"
                            style="background-color: var(--text-gold);">1</div>
                        <h3 class="text-2xl font-semibold mb-2 text-white">Pilih Kostum</h3>
                        <p class="text-gray-400">Datang langsung dan memilih pada toko kami. Klik untuk lihat peta
                            lokasi kami atau buka website untuk melihat semua koleksi kami</p>
                    </div>
                    <div class="relative flex flex-col items-center">
                        <div class="text-black rounded-full w-24 h-24 flex items-center justify-center text-4xl font-bold mb-6 z-10 border-4 border-gray-700"
                            style="background-color: var(--text-gold);">2</div>
                        <h3 class="text-2xl font-semibold mb-2 text-white">Atur Jadwal & Bayar
                        </h3>
                        <p class="text-gray-400">Tentukan tanggal sewa, lakukan pembayaran aman atau bisa order lewat
                            whatsapp.</p>
                    </div>
                    <div class="relative flex flex-col items-center">
                        <div class="text-black rounded-full w-24 h-24 flex items-center justify-center text-4xl font-bold mb-6 z-10 border-4 border-gray-700"
                            style="background-color: var(--text-gold);">3</div>
                        <h3 class="text-2xl font-semibold mb-2 text-white">Ambil & Kembalikan
                        </h3>
                        <p class="text-gray-400">Kostum dapat diambil di lokasi dan dikembalikan langsung di toko kami
                            atau dapat dikirim dan dikembalikan via gojek atau JNE.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Aturan Penyewaan --}}
        <section class="py-20 scroll-animate" style="background-color: var(--bg-soft);">
            <div class="container mx-auto text-center px-5">
                <h2 class="text-4xl font-bold mb-4 font-serif" style="color: var(--text-light);">Aturan Penyewaan</h2>
                <p class="text-lg text-gray-400 max-w-3xl mx-auto mb-16">Harap perhatikan beberapa aturan berikut untuk
                    kenyamanan bersama saat menyewa di Amira Collection.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-left">
                    {{-- Background setiap aturan diubah menjadi lebih gelap --}}
                    <div class="p-8 rounded-lg border border-gray-800" style="background-color: var(--bg-darker);">
                        <h3 class="text-2xl font-semibold mb-4" style="color: var(--text-gold);">Pemesanan &
                            Pembayaran</h3>
                        <p class="text-gray-400">Pembayaran penuh di muka diperlukan untuk konfirmasi pesanan. Kami
                            menerima pembayaran tunai dan transfer bank.</p>
                    </div>
                    <div class="p-8 rounded-lg border border-gray-800" style="background-color: var(--bg-darker);">
                        <h3 class="text-2xl font-semibold mb-4" style="color: var(--text-gold);">Jaminan Sewa</h3>
                        <p class="text-gray-400">Setiap penyewaan wajib menyertakan jaminan berupa KTP/SIM asli yang
                            masih berlaku dan akan dikembalikan saat kostum kembali.</p>
                    </div>
                    <div class="p-8 rounded-lg border border-gray-800" style="background-color: var(--bg-darker);">
                        <h3 class="text-2xl font-semibold mb-4" style="color: var(--text-gold);">Pengambilan &
                            Pengembalian</h3>
                        <p class="text-gray-400">Kostum dapat diambil H-1 acara dan wajib dikembalikan maksimal H+1
                            setelah acara. Keterlambatan akan dikenakan denda.</p>
                    </div>
                    <div class="p-8 rounded-lg border border-gray-800" style="background-color: var(--bg-darker);">
                        <h3 class="text-2xl font-semibold mb-4" style="color: var(--text-gold);">Perawatan Kostum</h3>
                        <p class="text-gray-400">Penyewa wajib menjaga kebersihan dan keutuhan kostum. Dilarang keras
                            mengubah atau memodifikasi kostum tanpa izin.</p>
                    </div>
                    <div class="p-8 rounded-lg border border-gray-800" style="background-color: var(--bg-darker);">
                        <h3 class="text-2xl font-semibold mb-4" style="color: var(--text-gold);">Kerusakan &
                            Kehilangan
                        </h3>
                        <p class="text-gray-400">Kerusakan atau kehilangan akan dikenakan biaya perbaikan atau
                            penggantian penuh sesuai dengan nilai kostum yang bersangkutan.</p>
                    </div>
                    <div class="p-8 rounded-lg border border-gray-800" style="background-color: var(--bg-darker);">
                        <h3 class="text-2xl font-semibold mb-4" style="color: var(--text-gold);">Pembatalan</h3>
                        <p class="text-gray-400">Pembatalan sewa H-3 akan dikenakan potongan 50%. Pembatalan kurang
                            dari
                            H-3, biaya sewa tidak dapat dikembalikan.</p>
                    </div>
                </div>
            </div>
        </section>


        {{-- Galeri --}}
        <section class="py-16 scroll-animate" style="background-color: var(--bg-soft);">
            <div class="container mx-auto text-center px-5">
                <h2 class="text-4xl font-bold mb-12 font-serif" style="color: var(--text-light);">Galeri</h2>
                @if ($galleries->count() > 0)
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach ($galleries as $gallery)
                            <div class="aspect-w-1 aspect-h-1">
                                <img class="h-full w-full object-cover rounded-lg"
                                    src="{{ Storage::url($gallery->image) }}" alt="{{ $gallery->title }}">
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">Galeri akan segera hadir.</p>
                @endif
            </div>
        </section>
    </main>

    @include('layouts.footer')

</body>

</html>
