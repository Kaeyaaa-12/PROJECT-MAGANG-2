{{-- resources/views/aksesoris.blade.php --}}
<!DOCTYPE html>
<html lang="id" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.scrollY > 50)">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aksesoris - Amira Collection</title>
    @vite('resources/css/app.css')
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Playfair+Display:wght@400;700&display=swap"
        rel="stylesheet">
    {{-- AOS Library for Scroll Animations --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- Custom Styles --}}
    <style>
        :root {
            --bg-dark: #1a1a1a;
            --text-gold: #D4AF37;
            --text-light: #f5f5f5;
            --bg-soft: #2d2d2d;
            --bg-darker: #242424;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: var(--bg-soft);
            color: var(--text-light);
        }

        .font-serif {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body>
    @include('layouts.header')
    <main class="container mx-auto py-16 px-5">
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-5xl font-bold font-serif" style="color: var(--text-light);">Aksesoris Pelengkap</h1>
            <p class="text-gray-400 mt-2 text-lg">Sempurnakan penampilanmu dengan detail yang menawan.</p>
        </div>
        <div x-data="{ visibleItems: 8 }">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($aksesoris as $index => $item)
                    <div x-show="currentIndex < visibleItems" x-init="currentIndex = {{ $index }}" data-aos="fade-up"
                        data-aos-delay="{{ ($index % 4) * 100 }}">
                        <a href="{{ route('aksesoris.show', $item->id) }}" class="block group">
                            <div class="rounded-lg overflow-hidden border border-gray-800 transform transition-all duration-300 hover:shadow-2xl hover:shadow-yellow-500/20 hover:-translate-y-2"
                                style="background-color: var(--bg-darker);">
                                <div class="h-96 overflow-hidden">
                                    <img src="{{ asset('storage/' . $item->gambar_1) }}"
                                        alt="{{ $item->nama_aksesoris }}"
                                        class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                                </div>
                                <div class="p-5 text-center">
                                    <h3
                                        class="font-bold text-xl mb-1 text-light group-hover:text-yellow-400 transition">
                                        {{ $item->nama_aksesoris }}</h3>
                                    <p class="text-gray-500 text-sm mt-1">Total Stok: <span class="font-semibold">
                                            @php
                                                $totalStok = 0;
                                                if (is_array($item->stok_varian)) {
                                                    $totalStok = array_sum($item->stok_varian);
                                                }
                                                echo $totalStok;
                                            @endphp
                                        </span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-12" x-show="visibleItems < {{ count($aksesoris) }}">
                <button @click="visibleItems += 4"
                    class="bg-yellow-500 text-black font-bold py-3 px-10 rounded-md text-lg hover:bg-yellow-600 transition-all duration-300">Muat
                    Lebih Banyak</button>
            </div>
        </div>
    </main>
    @include('layouts.footer')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
</body>

</html>
