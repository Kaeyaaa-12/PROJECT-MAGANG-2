@extends('layouts.admin')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-white">Selamat Datang, Admin</h2>
        <p class="text-gray-400 mt-1">Ini adalah halaman dashboard Amira Collection Penyewaan Kostum.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="stat-card rounded-lg p-6">
            <div class="flex items-center">
                <div class="bg-blue-900/50 p-3 rounded-full">
                    <i class="ri-t-shirt-2-line text-2xl text-blue-400"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-400 text-sm">Total Koleksi</p>
                    <p class="text-2xl font-bold text-white">1,234</p>
                </div>
            </div>
        </div>

        <div class="stat-card rounded-lg p-6">
            <div class="flex items-center">
                <div class="bg-green-900/50 p-3 rounded-full">
                    <i class="ri-magic-line text-2xl text-green-400"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-400 text-sm">Total Aksesoris</p>
                    <p class="text-2xl font-bold text-white">987</p>
                </div>
            </div>
        </div>

        <div class="stat-card rounded-lg p-6">
            <div class="flex items-center">
                <div class="bg-yellow-900/50 p-3 rounded-full">
                    <i class="ri-eye-line text-2xl text-yellow-400"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-400 text-sm">Pengunjung Website</p>
                    <p class="text-2xl font-bold text-white">247</p>
                </div>
            </div>
        </div>

        <div class="stat-card rounded-lg p-6">
            <div class="flex items-center">
                <div class="bg-purple-900/50 p-3 rounded-full">
                    <i class="ri-user-follow-line text-2xl text-purple-400"></i>
                </div>
                <div class="ml-4">
                    <p class="text-gray-400 text-sm">Penyewa</p>
                    <p class="text-2xl font-bold text-white">56</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 p-6 rounded-lg stat-card">
        <h3 class="text-xl font-semibold text-white">Aktivitas Terbaru</h3>
        <p class="text-gray-400 mt-2">Area ini bisa diisi dengan grafik, tabel data penyewaan terbaru, atau
            informasi penting lainnya untuk melengkapi dashboard Anda.</p>
    </div>
@endsection
