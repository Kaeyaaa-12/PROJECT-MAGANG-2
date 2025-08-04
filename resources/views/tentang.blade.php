<!DOCTYPE html>
<html lang="id" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.scrollY > 50)">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Amira Collection</title>

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
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-light);
        }

        .font-serif {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>

<body>

    @include('layouts.header')

    <main>
        {{-- Hero Section --}}
        <section class="relative h-[90vh] bg-cover bg-center"
            style="background-image: url('{{ asset('assets/images/bgtentang2.png') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
            <div
                class="relative z-10 container mx-auto flex flex-col justify-center items-center h-full text-white px-5 text-center">
                <div class="max-w-2xl" data-aos="fade-up">
                    <h1 class="text-5xl lg:text-7xl font-serif font-bold leading-tight mb-4">
                        Amira Collection
                    </h1>
                    <p class="text-lg lg:text-xl text-gray-300 mb-6">Pusat penyewaan baju karnaval terbaik di
                        Tulungagung.</p>
                </div>
            </div>
        </section>

        {{-- Cerita Kami --}}
        <section class="py-16 md:py-24" style="background-color: var(--bg-soft);">
            <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center px-5">
                <div class="order-2 md:order-1 text-center md:text-left" data-aos="fade-right">
                    <h2 class="text-4xl font-bold mb-4 font-serif" style="color: var(--text-light);">Cerita Kami</h2>
                    <p class="text-lg text-gray-400 mb-6">
                        Amira Collection berdiri sejak tahun 2010 di Tulungagung, berawal dari
                        kecintaan kami terhadap seni dan budaya. Kami berkomitmen untuk menyediakan kostum karnaval
                        berkualitas tinggi untuk berbagai acara, mulai dari pawai budaya, festival, hingga acara sekolah
                        dan perusahaan.
                    </p>
                </div>
                {{-- === PERUBAHAN DI BAGIAN INI === --}}
                <div class="order-1 md:order-2" data-aos="fade-left">
                    <img src="{{ asset('assets/images/rumah.png') }}"
                        class="rounded-lg shadow-xl w-full h-[450px] object-cover">
                </div>
                {{-- === AKHIR PERUBAHAN === --}}
            </div>
        </section>

        {{-- Lokasi --}}
        <section class="py-16 md:py-24" style="background-color: var(--bg-soft);">
            <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center px-5">
                <div class="order-1" data-aos="fade-right">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.4406964259874!2d111.912928475724!3d-8.056448991971084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78e3854c13f2a5%3A0x7175b2efdb3b16e2!2sAmira%20Collections!5e0!3m2!1sid!2sid!4v1754283856129!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="rounded-lg shadow-xl"></iframe>
                </div>
                <div class="order-2 text-center md:text-left" data-aos="fade-left">
                    <h2 class="text-4xl font-bold mb-4 font-serif" style="color: var(--text-light);">Lokasi Kami</h2>
                    <p class="mb-2 text-lg text-gray-400"><strong>Alamat:</strong> Kedungwaru Estate No.Kavling 9, Wadu
                        Jaya, Kedungwaru, Kec. Kedungwaru, Kabupaten Tulungagung, Jawa Timur</p>
                    <p class="mb-6 text-lg text-gray-400"><strong>Jam Buka:</strong> Setiap Hari, 09:00 - 21:00</p>

                    <h3 class="text-3xl font-bold mb-4 font-serif" style="color: var(--text-light);">Hubungi Kami</h3>
                    <div class="flex justify-center md:justify-start space-x-6">
                        <a href="https://wa.me/6281234567890" target="_blank"
                            class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center space-x-2">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.06 21.94L7.31 20.55C8.76 21.36 10.36 21.82 12.04 21.82C17.5 21.82 21.95 17.37 21.95 11.91C21.95 6.45 17.5 2 12.04 2M12.04 20.13C10.56 20.13 9.12 19.72 7.89 19L7.47 18.76L4.22 19.65L5.13 16.48L4.87 16.05C4.09 14.73 3.65 13.25 3.65 11.91C3.65 7.33 7.42 3.56 12.04 3.56C16.66 3.56 20.43 7.33 20.43 11.91C20.43 16.5 16.66 20.13 12.04 20.13M17.48 14.49C17.26 14.49 16.27 14 16.06 13.92C15.84 13.84 15.7 13.79 15.55 14C15.4 14.22 14.92 14.75 14.73 14.96C14.54 15.18 14.35 15.21 14.11 15.1C13.87 14.98 13.02 14.69 12.01 13.78C11.21 13.08 10.65 12.24 10.51 12C10.36 11.77 10.49 11.64 10.63 11.5L10.79 11.29C10.9 11.16 10.95 11.02 11.04 10.88C11.13 10.74 11.08 10.6 11.01 10.49C10.94 10.38 10.51 9.3 10.32 8.84C10.13 8.38 9.95 8.43 9.82 8.42H9.37C9.21 8.42 8.95 8.49 8.73 8.71C8.5 8.94 7.97 9.42 7.97 10.54C7.97 11.67 8.76 12.75 8.88 12.9C9 13.05 10.51 15.42 12.82 16.42C14.01 16.92 14.85 17.15 15.49 17.11C16.23 17.06 17.17 16.51 17.38 15.91C17.59 15.31 17.59 14.82 17.48 14.68V14.49Z">
                                </path>
                            </svg>
                            <span class="text-lg">WhatsApp</span>
                        </a>
                        <a href="https://www.instagram.com/amiracollection2023?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                            target="_blank"
                            class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center space-x-2">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"
                                    clip-rule="evenodd"></path>
                                <path
                                    d="M12 7.375c-2.548 0-4.625 2.077-4.625 4.625S9.452 16.625 12 16.625s4.625-2.077 4.625-4.625S14.548 7.375 12 7.375zm0 7.25c-1.449 0-2.625-1.176-2.625-2.625S10.551 9.375 12 9.375s2.625 1.176 2.625 2.625-1.176 2.625-2.625 2.625z">
                                </path>
                                <path d="M16.5 6.375a1.125 1.125 0 110 2.25 1.125 1.125 0 010-2.25z"></path>
                            </svg>
                            <span class="text-lg">Instagram</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.footer')

    {{-- AOS Library Script --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
</body>

</html>
