<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Amira Collection</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

        .text-dark-custom {
            color: var(--text-dark);
        }

        .social-icon {
            color: var(--text-dark);
            transition: color 0.3s ease;
        }

        .social-icon:hover {
            color: var(--color-accent);
        }
    </style>
</head>

<body>
    @include('layouts.header')
    <main>
        <section class="relative bg-contain bg-center bg-no-repeat"
            style="background-image: url('{{ asset('assets/images/bgtentang.png') }}'); background-color: #000;">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div
                class="container mx-auto px-5 relative z-10 flex flex-col items-center justify-center text-center text-white min-h-[90vh]">
                <h1 class="text-5xl md:text-6xl font-bold">Amira Collection</h1>
                <p class="text-lg md:text-xl mt-4 max-w-2xl">Pusat penyewaan baju karnaval terbaik di Tulungagung.</p>
            </div>
        </section>
        <section class="py-12 md:py-24" style="background-color: #f8f7f3;">
            <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center px-5">
                <div><img src="{{ asset('assets/images/rumah.png') }}" alt="Cerita Kami"
                        class="rounded-lg shadow-xl w-full"></div>
                <div class="text-dark-custom">
                    <h2 class="text-4xl font-bold mb-4">Cerita Kami</h2>
                    <p class="mb-4 text-lg">Amira Collection berdiri sejak tahun 2010 di Tulungagung, berawal dari
                        kecintaan kami terhadap seni dan budaya. Kami berkomitmen untuk menyediakan kostum karnaval
                        berkualitas tinggi untuk berbagai acara, mulai dari pawai budaya, festival, hingga acara sekolah
                        dan perusahaan.</p>
                </div>
            </div>
        </section>
        <section class="py-12 md:py-24" style="background-color: #f8f7f3;">
            <div class="container mx-auto grid md:grid-cols-2 gap-12 items-center px-5">
                <div class="relative"><iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.223727756184!2d112.7358336147798!3d-7.280838994732062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f00f0a0a0a0b%3A0x3c2a0d0e0a0a0a0a!2sAmira%20Collection!5e0!3m2!1sen!2sid!4v1627888888888!5m2!1sen!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        class="rounded-lg shadow-xl"></iframe></div>
                <div class="text-dark-custom">
                    <h2 class="text-4xl font-bold mb-4">Lokasi Kami</h2>
                    <p class="mb-2 text-lg"><strong>Alamat:</strong> Jl. Raya Demuk No.10, Demuk, Pucung, Kec. Kauman,
                        Kabupaten Tulungagung, Jawa Timur 66261</p>
                    <p class="mb-4 text-lg"><strong>Jam Buka:</strong> Setiap Hari, 08:00 - 21:00</p>
                    <h3 class="text-2xl font-bold mt-8 mb-4">Hubungi Kami</h3>
                    <div class="flex space-x-4">
                        <a href="https://wa.me/6281234567890" target="_blank" class="social-icon"><svg
                                xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 4.315 1.731 6.086l.001.004 1.443-4.148-4.226 1.159zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.371-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.5-.669-.51l-.57-.01c-.198 0-.521.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.289.173-1.414z" />
                            </svg></a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('layouts.footer')
</body>

</html>
