<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $aksesoris['nama'] }} - Amira Collection</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
    </style>
</head>

<body>
    @include('layouts.header')
    <main class="bg-white">
        <section class="container mx-auto py-12 px-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
                <div x-data="{ images: {{ json_encode($aksesoris['gambar']) }}, currentIndex: 0, get currentImage() { return this.images[this.currentIndex] }, next() { this.currentIndex = (this.currentIndex + 1) % this.images.length }, prev() { this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length } }">
                    <div class="relative">
                        <img :src="'{{ asset('assets/images/') }}/' + currentImage" alt="{{ $aksesoris['nama'] }}"
                            class="w-full h-auto max-h-[500px] object-contain rounded-lg shadow-lg">
                        <div class="absolute inset-0 flex items-center justify-between p-4">
                            <button @click="prev()"
                                class="bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 transition"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg></button>
                            <button @click="next()"
                                class="bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 transition"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg></button>
                        </div>
                    </div>
                </div>
                <div>
                    <h1 class="text-4xl font-bold mb-4" style="color: var(--text-dark);">{{ $aksesoris['nama'] }}</h1>
                    <div class="mb-4 text-gray-700">
                        <p class="text-lg"><strong>Stok:</strong> {{ $aksesoris['stok'] }}</p>
                    </div>
                    <div class="mt-8">
                        <h3 class="text-2xl font-semibold mb-4" style="color: var(--text-dark);">Pilih Tanggal Sewa</h3>
                        <div id="kalender"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        flatpickr("#kalender", {
            mode: "range",
            dateFormat: "d-m-Y",
            inline: true,
        });
    </script>
    @include('layouts.footer')
</body>

</html>
