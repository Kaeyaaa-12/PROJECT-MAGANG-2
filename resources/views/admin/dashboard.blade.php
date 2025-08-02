@extends('layouts.admin')

@section('content')
    {{-- Mengimpor library Chart.js untuk grafik --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div>
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-white">Dashboard</h1>
            <p class="mt-1 text-sm" style="color: var(--text-muted);">Selamat datang kembali, Admin!</p>
        </header>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <div class="overflow-hidden rounded-lg shadow-md"
                style="background-color: var(--bg-dark-secondary); border-left: 5px solid var(--text-gold);">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8" style="color: var(--text-gold);" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="truncate text-sm font-medium" style="color: var(--text-muted);">Total Koleksi
                                </dt>
                                <dd class="text-3xl font-bold text-white">{{-- Contoh Data: 86 --}}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden rounded-lg shadow-md"
                style="background-color: var(--bg-dark-secondary); border-left: 5px solid var(--text-gold);">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8" style="color: var(--text-gold);" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="truncate text-sm font-medium" style="color: var(--text-muted);">Total Aksesoris
                                </dt>
                                <dd class="text-3xl font-bold text-white">{{-- Contoh Data: 32 --}}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden rounded-lg shadow-md"
                style="background-color: var(--bg-dark-secondary); border-left: 5px solid var(--text-gold);">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8" style="color: var(--text-gold);" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="truncate text-sm font-medium" style="color: var(--text-muted);">Sedang Disewa
                                </dt>
                                <dd class="text-3xl font-bold text-white">{{-- Contoh Data: 12 --}}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden rounded-lg shadow-md"
                style="background-color: var(--bg-dark-secondary); border-left: 5px solid var(--text-gold);">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8" style="color: var(--text-gold);" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 6.75h8.25M8.25 12h5.25M8.25 17.25h8.25M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="truncate text-sm font-medium" style="color: var(--text-muted);">Total Stok</dt>
                                <dd class="text-3xl font-bold text-white">{{-- Contoh Data: 450 --}}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8 rounded-lg p-6 shadow-md" style="background-color: var(--bg-dark-secondary);">
            <h2 class="text-xl font-semibold text-white">Grafik Penyewaan</h2>
            <p class="mt-1 text-sm" style="color: var(--text-muted);">Data penyewaan 7 hari terakhir.</p>
            <div class="mt-6">
                <canvas id="penyewaanChart"></canvas>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('penyewaanChart').getContext('2d');

            // Membuat gradasi warna untuk chart
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(212, 175, 55, 0.6)');
            gradient.addColorStop(1, 'rgba(212, 175, 55, 0)');

            const penyewaanChart = new Chart(ctx, {
                type: 'line',
                data: {
                    // Contoh data: label untuk 7 hari terakhir
                    labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
                    datasets: [{
                        label: 'Jumlah Penyewaan',
                        // Contoh data: jumlah penyewaan per hari
                        data: [5, 8, 6, 10, 7, 12, 9],
                        backgroundColor: gradient, // Warna area di bawah garis
                        borderColor: '#D4AF37', // Warna garis
                        borderWidth: 3,
                        pointBackgroundColor: '#FFFFFF',
                        pointBorderColor: '#D4AF37',
                        pointHoverBackgroundColor: '#D4AF37',
                        pointHoverBorderColor: '#FFFFFF',
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        fill: true,
                        tension: 0.4 // Membuat garis lebih melengkung
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(224, 224, 224, 0.1)' // Warna garis grid sumbu Y
                            },
                            ticks: {
                                color: '#E0E0E0' // Warna teks label sumbu Y
                            }
                        },
                        x: {
                            grid: {
                                display: false // Menghilangkan garis grid sumbu X
                            },
                            ticks: {
                                color: '#E0E0E0' // Warna teks label sumbu X
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false // Menyembunyikan legenda
                        }
                    }
                }
            });
        });
    </script>
@endsection
