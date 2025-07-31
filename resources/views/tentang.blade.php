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

        .social-icon {
            color: var(--text-dark);
            /* Warna ikon sesuai warna teks */
            transition: color 0.3s ease;
        }

        .social-icon:hover {
            color: var(--color-accent);
            /* Warna saat hover */
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
                <a href="{{ route('produk.index') }}" class="opacity-90 hover:opacity-100 transition">Produk</a>
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

    <main>
        {{-- Hero Section --}}
        <section class="relative bg-contain bg-center bg-no-repeat"
            style="background-image: url('{{ asset('assets/images/bgtentang.png') }}'); background-color: #000;">
            <div class="absolute inset-0 bg-black opacity-50"></div>
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
                        Amira Collection berdiri sejak tahun 2010 di Tulungagung, berawal dari kecintaan kami terhadap
                        seni dan budaya. Kami berkomitmen untuk menyediakan kostum karnaval berkualitas tinggi untuk
                        berbagai acara, mulai dari pawai budaya, festival, hingga acara sekolah dan perusahaan.
                    </p>
                </div>
            </div>
        </section>

        {{-- Lokasi Kami Section --}}
        <section class="py-12 md:py-24" style="background-color: #f8f7f3;">
            <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center px-5">
                <div class="relative">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.8352111191375!2d111.9137513748931!3d-8.026835292023023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78e2a0e7f75b2b%3A0x2efb3a2efd15e29d!2sAmira%20Collections!5e0!3m2!1sid!2sid!4v1717558094611!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="rounded-lg shadow-xl"></iframe>
                </div>
                <div class="text-dark-custom">
                    <h2 class="text-4xl font-bold mb-4">Lokasi Kami</h2>
                    <p class="mb-2 text-lg"><strong>Alamat:</strong> Jl. Raya Demuk No.10, Demuk, Pucung, Kec. Kauman,
                        Kabupaten Tulungagung, Jawa Timur 66261</p>
                    <p class="mb-4 text-lg"><strong>Jam Buka:</strong> Setiap Hari, 08:00 - 21:00</p>

                    <h3 class="text-2xl font-bold mt-8 mb-4">Hubungi Kami</h3>
                    <div class="flex space-x-4">
                        <a href="https://wa.me/6281234567890" target="_blank" class="social-icon">
                            {{-- SVG WhatsApp --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 4.315 1.731 6.086l.001.004 1.443-4.148-4.226 1.159zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.371-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.5-.669-.51l-.57-.01c-.198 0-.521.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.289.173-1.414z" />
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/your-facebook-page" target="_blank" class="social-icon">
                            {{-- SVG Facebook --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/your-instagram-profile" target="_blank" class="social-icon">
                            {{-- SVG Instagram --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.85s-.011 3.584-.069 4.85c-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.584-.012-4.85-.07c-3.252-.148-4.771-1.691-4.919-4.919-.058-1.265-.07-1.645-.07-4.85s.012-3.584.07-4.85c.149-3.225 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.85-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.359 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.947s-.014-3.667-.072-4.947c-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.689-.073-4.948-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4s1.791-4 4-4 4 1.79 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44 1.441-.645 1.441-1.44-.645-1.44-1.441-1.44z" />
                            </svg>
                        </a>
                    </div>
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
