<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amira Collection - Sewa Kostum Karnaval</title>

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

    @include('layouts.header')

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
                        Amira Collection adalah solusi terpadu untuk semua kebutuhan kostum Anda. Kami percaya bahwa
                        setiap
                        orang berhak untuk tampil maksimal dan mewujudkan imajinasinya dalam setiap acara spesial.
                    </p>
                    <a href="#"
                        class="btn-secondary inline-block font-bold py-3 px-8 rounded-full text-lg">Selengkapnya</a>
                </div>
                <div class="order-1 md:order-2 flex justify-center">
                    <img src="{{ asset('assets/images/rumah.png') }}"
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
                            </div>
                        </div>
                        <div class="rounded-lg overflow-hidden border border-transparent hover:border-gray-200 hover:shadow-lg transition"
                            style="background-color: var(--bg-additional);">
                            <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Kostum 2"
                                class="w-full h-80 object-cover">
                            <div class="p-5 text-left">
                                <h3 class="font-bold text-xl mb-1" style="color: var(--text-dark);">Kostum Ksatria
                                </h3>
                            </div>
                        </div>
                        <div class="rounded-lg overflow-hidden border border-transparent hover:border-gray-200 hover:shadow-lg transition"
                            style="background-color: var(--bg-additional);">
                            <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Kostum 3"
                                class="w-full h-80 object-cover">
                            <div class="p-5 text-left">
                                <h3 class="font-bold text-xl mb-1" style="color: var(--text-dark);">Gaun Putri</h3>
                            </div>
                        </div>
                        <div class="rounded-lg overflow-hidden border border-transparent hover:border-gray-200 hover:shadow-lg transition"
                            style="background-color: var(--bg-additional);">
                            <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Kostum 4"
                                class="w-full h-80 object-cover">
                            <div class="p-5 text-left">
                                <h3 class="font-bold text-xl mb-1" style="color: var(--text-dark);">Kostum Bajak Laut
                                </h3>
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
                            </div>
                        </div>
                        <div class="rounded-lg overflow-hidden border border-transparent hover:border-gray-200 hover:shadow-lg transition"
                            style="background-color: var(--bg-additional);">
                            <img src="{{ asset('assets/images/bgkostum.png') }}" alt="Kostum Populer 2"
                                class="w-full h-80 object-cover">
                            <div class="p-5 text-left">
                                <h3 class="font-bold text-xl mb-1" style="color: var(--text-dark);">Horror Klasik</h3>
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
