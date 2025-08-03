{{-- resources/views/layouts/footer.blade.php --}}
<footer style="background-color: #121212;" class="text-white pt-16 pb-8">
    <div class="container mx-auto px-5">
        <div
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-12 gap-x-12 text-center sm:text-left border-t border-b border-gray-800 py-12">
            {{-- Info Perusahaan --}}
            <div class="space-y-4">
                <h3 class="text-xl font-bold text-white">AMIRA COLLECTION</h3>
                <p class="text-gray-400">Penyewaan kostum karnaval terlengkap dan terpercaya untuk segala acaramu.</p>
            </div>
            {{-- Navigasi --}}
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-white">Navigasi</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home.index') }}" class="text-gray-400 hover:text-white">Home</a></li>
                    <li><a href="{{ route('koleksi.index') }}" class="text-gray-400 hover:text-white">Koleksi</a></li>
                    <li><a href="{{ route('aksesoris.index') }}" class="text-gray-400 hover:text-white">Aksesoris</a>
                    </li>
                    <li><a href="{{ route('tentang.index') }}" class="text-gray-400 hover:text-white">Tentang</a></li>
                </ul>
            </div>
            {{-- Hubungi Kami --}}
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-white">Hubungi Kami</h3>
                <div class="flex justify-center sm:justify-start space-x-6">
                    {{-- WhatsApp Icon --}}
                    <a href="https://wa.me/6281234567890" target="_blank" rel="noopener noreferrer"
                        class="text-gray-400 hover:text-white" aria-label="WhatsApp">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 4.315 1.731 6.086l.001.004 1.443-4.148-4.226 1.159zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.371-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.5-.669-.51l-.57-.01c-.198 0-.521.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.289.173-1.414z" />
                        </svg>
                    </a>
                    {{-- Facebook Icon --}}
                    <a href="https://facebook.com/your-page" target="_blank" rel="noopener noreferrer"
                        class="text-gray-400 hover:text-white" aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v2.385z" />
                        </svg>
                    </a>
                    {{-- Instagram Icon --}}
                    <a href="https://instagram.com/your-account" target="_blank" rel="noopener noreferrer"
                        class="text-gray-400 hover:text-white" aria-label="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.948-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4s1.791-4 4-4 4 1.79 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44 1.441-.645 1.441-1.44-.645-1.44-1.441-1.44z" />
                        </svg>
                    </a>
                </div>
            </div>
            {{-- Lokasi --}}
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-white">Lokasi Kami</h3>
                <div class="w-full aspect-video rounded-lg shadow-md overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1602.0617633168329!2d111.91552777583675!3d-8.056603900817851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78e3854c13f2a5%3A0x7175b2efdb3b16e2!2sAmira%20Collections!5e0!3m2!1sid!2sid!4v1754145188855!5m2!1sid!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
        <div class="text-center text-gray-500 mt-8">
            © {{ date('Y') }} Amira Collection. All Rights Reserved.
        </div>
    </div>
</footer>
