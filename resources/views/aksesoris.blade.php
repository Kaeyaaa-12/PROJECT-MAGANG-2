{{-- resources/views/aksesoris.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
    {{-- (Bagian head tetap sama) --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aksesoris - Amira Collection</title>
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
    @include('layouts.header')
    <main class="container mx-auto py-16 px-5">
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold playfair-display" style="color: var(--text-dark);">Aksesoris Pelengkap</h1>
            <p class="text-gray-500 mt-2 text-lg">Sempurnakan penampilanmu dengan detail yang menawan.</p>
        </div>
        <div x-data="{ visibleItems: 8 }">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($aksesoris as $index => $item)
                    <div x-show="currentIndex < visibleItems" x-init="currentIndex = {{ $index }}">
                        {{-- === PERBAIKAN DI BARIS INI === --}}
                        <a href="{{ route('aksesoris.show', $item->id) }}"
                            class="product-card block bg-white rounded-lg shadow-md overflow-hidden group">
                            <div class="product-image-container h-96">
                                <img src="{{ asset('storage/' . $item->gambar_1) }}" alt="{{ $item->nama_aksesoris }}"
                                    class="product-image w-full h-full object-cover">
                            </div>
                            <div class="p-5">
                                <h3
                                    class="font-bold text-xl text-gray-800 group-hover:text-accent transition-colors duration-300">
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
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-12" x-show="visibleItems < {{ count($aksesoris) }}">
                <button @click="visibleItems += 4"
                    class="bg-gray-800 text-white font-semibold py-3 px-8 rounded-lg hover:bg-gray-900 transition-all duration-300">Muat
                    Lebih Banyak</button>
            </div>
        </div>
    </main>
    @include('layouts.footer')
</body>

</html>
