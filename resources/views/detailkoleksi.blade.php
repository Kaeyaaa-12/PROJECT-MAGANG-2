{{-- resources/views/detailkoleksi.blade.php --}}

@extends('layouts.guest')

@section('content')
    <main class="py-12" style="background-color: #2d2d2d;">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            {{-- TOMBOL KEMBALI (WARNA PUTIH & DIPERBESAR) --}}
            <div class="mb-8">
                <a href="{{ route('koleksi.index') }}"
                    class="inline-flex items-center text-lg font-semibold transition-colors duration-300"
                    style="color: #FFFFFF;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                    Kembali ke Koleksi
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                {{-- GAMBAR (UKURAN DIPERBESAR) --}}
                <div x-data="{ mainImage: '{{ asset('storage/' . $koleksi->gambar_1) }}' }" data-aos="fade-right">
                    <div class="mb-4 rounded-lg overflow-hidden shadow-lg border border-gray-700">
                        <img :src="mainImage" alt="{{ $koleksi->nama_koleksi }}"
                            class="w-full h-[700px] object-cover transition-all duration-300">
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ([$koleksi->gambar_1, $koleksi->gambar_2, $koleksi->gambar_3] as $gambar)
                            @if ($gambar)
                                <div>
                                    <img src="{{ asset('storage/' . $gambar) }}" alt="Thumbnail {{ $loop->iteration }}"
                                        @click="mainImage = '{{ asset('storage/' . $gambar) }}'"
                                        class="w-full h-32 object-cover rounded-md cursor-pointer border-2 transition-all duration-300"
                                        :class="{
                                            'border-yellow-500 shadow-md scale-105': mainImage ===
                                                '{{ asset('storage/' . $gambar) }}',
                                            'border-transparent hover:border-gray-600': mainImage !==
                                                '{{ asset('storage/' . $gambar) }}'
                                        }">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                {{-- DETAIL --}}
                <div class="p-8 rounded-lg shadow-lg" style="background-color: #1a1a1a;" data-aos="fade-left">
                    <span class="text-sm font-semibold uppercase tracking-wider"
                        style="color: #a1a1aa;">{{ $koleksi->kategori }}</span>
                    <h1 class="text-4xl font-bold font-serif my-2" style="color: #f5f5f5;">{{ $koleksi->nama_koleksi }}
                    </h1>

                    <div class="mt-6">
                        <h3 class="text-lg font-semibold border-b pb-3 mb-4" style="color: #e5e5e5; border-color: #404040;">
                            Varian & Stok Tersedia</h3>
                        <div class="space-y-3">
                            @forelse (is_array($koleksi->stok_varian) ? $koleksi->stok_varian : [] as $jenis => $ukuranStok)
                                @foreach ($ukuranStok as $ukuran => $stok)
                                    <div class="flex justify-between items-center p-3 rounded-md"
                                        style="background-color: #2d2d2d;">
                                        <span class="font-medium capitalize" style="color: #d4d4d4;">{{ $jenis }} -
                                            {{ $ukuran }}</span>
                                        <span class="font-bold text-green-400">{{ $stok }} pcs</span>
                                    </div>
                                @endforeach
                            @empty
                                <p style="color: #a1a1aa;">Stok tidak tersedia untuk koleksi ini.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-lg font-semibold border-b pb-3 mb-4" style="color: #e5e5e5; border-color: #404040;">
                            Kalender Ketersediaan</h3>
                        {{-- BACKGROUND KALENDER (REVISI FINAL) --}}
                        <div id="availability-calendar" class="border rounded-lg p-2"
                            style="background-color: #2d2d2d; border-color: #404040;"></div>
                        <div class="flex items-center justify-center space-x-6 mt-3 text-sm" style="color: #d4d4d4;">
                            <div class="flex items-center space-x-2">
                                <span class="w-4 h-4 rounded-full bg-green-500"></span>
                                <span>Tersedia</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="w-4 h-4 rounded-full bg-red-600"></span>
                                <span>Disewa</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <a href="https://wa.me/6281234567890" target="_blank"
                            class="w-full text-center bg-yellow-500 text-black font-bold py-4 px-6 rounded-lg hover:bg-yellow-600 transition-all duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 4.315 1.731 6.086l.001.004 1.443-4.148-4.226 1.159zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.371-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.5-.669-.51l-.57-.01c-.198 0-.521.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.626.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.289.173-1.414z" />
                            </svg>
                            Hubungi untuk Sewa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
    <style>
        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        /* Override Flatpickr dark theme background */
        .flatpickr-calendar.dark {
            background-color: transparent !important;
        }

        .flatpickr-calendar {
            width: 100% !important;
            box-shadow: none;
        }

        .flatpickr-day.flatpickr-disabled,
        .flatpickr-day.flatpickr-disabled:hover {
            background-color: #dc2626;
            /* red-600 */
            color: #f9fafb;
            /* gray-50 */
            cursor: not-allowed;
            border-color: #b91c1c;
            /* red-700 */
        }

        .dayContainer .flatpickr-day:not(.flatpickr-disabled) {
            background-color: #22c55e;
            /* green-500 */
            border-color: #16a34a;
            /* green-600 */
            color: #ffffff;
        }

        .flatpickr-day.today:not(.flatpickr-disabled) {
            border-color: #f59e0b;
            /* amber-500 */
        }
    </style>
@endpush

@push('scripts')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const collectionId = {{ $koleksi->id }};
            const calendarEl = document.getElementById('availability-calendar');

            fetch(`/koleksi/${collectionId}/booked-dates`)
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(bookedDates => {
                    flatpickr(calendarEl, {
                        inline: true,
                        mode: "multiple",
                        dateFormat: "Y-m-d",
                        minDate: "today",
                        disable: bookedDates,
                        locale: {
                            firstDayOfWeek: 1
                        },
                        "theme": "dark" // Pastikan tema gelap aktif
                    });
                })
                .catch(error => {
                    console.error('Error fetching booked dates:', error);
                    calendarEl.innerHTML =
                        '<p class="text-center text-red-500">Gagal memuat kalender ketersediaan.</p>';
                });
        });
    </script>
@endpush
