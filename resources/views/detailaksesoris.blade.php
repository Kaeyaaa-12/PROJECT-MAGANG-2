@extends('layouts.guest')

@section('content')
    <div class="container mx-auto px-4 md:px-12 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <div>
                <img src="{{ asset('storage/' . $aksesoris->gambar_1) }}" alt="{{ $aksesoris->nama_aksesoris }}"
                    class="w-full h-auto object-cover rounded-lg shadow-lg">
            </div>

            <div class="text-gray-800">
                <p class="text-lg mb-1 text-gray-500">{{ $aksesoris->kategori }}</p>
                <h1 class="text-4xl font-bold mb-4" style="color: var(--text-dark);">{{ $aksesoris->nama_aksesoris }}</h1>

                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-2" style="color: var(--text-dark);">Stok Tersedia</h3>
                    <div class="grid grid-cols-2 gap-2 text-sm">
                        @forelse (is_array($aksesoris->stok_varian) ? $aksesoris->stok_varian : [] as $ukuran => $stok)
                            <div class="p-2 rounded bg-gray-100">
                                <span class="font-bold">{{ $ukuran }}:</span>
                                <span class="text-green-600">{{ $stok }} pcs</span>
                            </div>
                        @empty
                            <p class="text-gray-500">Stok tidak tersedia.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        {{-- Kalender Ketersediaan --}}
        <div class="mt-12">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Kalender Ketersediaan</h3>
            <div class="p-4 rounded-lg bg-white border">
                <div id="availability-calendar"></div>
            </div>
            <div class="flex items-center space-x-4 mt-4 text-sm text-gray-600">
                <div class="flex items-center space-x-2">
                    <span class="w-4 h-4 rounded-full bg-green-500"></span>
                    <span>Tersedia</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="w-4 h-4 rounded-full bg-red-700"></span>
                    <span>Disewa</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .flatpickr-calendar {
            width: 100% !important;
            box-shadow: none;
        }

        .flatpickr-day.flatpickr-disabled,
        .flatpickr-day.flatpickr-disabled:hover {
            background-color: #b91c1c;
            /* red-700 */
            color: #f3f4f6;
            /* gray-100 */
            cursor: not-allowed;
            border-color: #991b1b;
            /* red-800 */
        }

        .dayContainer .flatpickr-day:not(.flatpickr-disabled) {
            background-color: #00FF22FF;
            border: 1px solid #10d0234d;
            color: #FFFFFFFF;
        }

        .flatpickr-day.today:not(.flatpickr-disabled) {
            border-color: var(--color-accent);
            color: var(--color-accent);
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Pastikan kita menggunakan variabel $aksesoris dari controller
            const accessoryId = {{ $aksesoris->id }};
            const calendarEl = document.getElementById('availability-calendar');

            // Panggil endpoint yang benar untuk aksesoris
            fetch(`/aksesoris/${accessoryId}/booked-dates`)
                .then(response => response.json())
                .then(bookedDates => {
                    flatpickr(calendarEl, {
                        inline: true,
                        mode: "multiple",
                        dateFormat: "Y-m-d",
                        minDate: "today",
                        disable: bookedDates,
                        locale: {
                            firstDayOfWeek: 1 // Mulai dari hari Senin
                        }
                    });
                })
                .catch(error => {
                    console.error('Error fetching booked dates:', error);
                    calendarEl.innerHTML = '<p class="text-red-500">Gagal memuat kalender ketersediaan.</p>';
                });
        });
    </script>
@endpush
