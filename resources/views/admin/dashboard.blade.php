<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Amira Collection</title>

    {{-- Tailwind CSS & Remixicon --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

    {{-- Google Fonts: Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Custom Styles --}}
    <style>
        :root {
            /* Warna utama dari website Anda */
            --sidebar-bg: #2d3748;
            /* bg-gray-800 */
            --main-bg: #1a202c;
            /* bg-gray-900 */
            --card-bg: #2d3748;
            /* bg-gray-800 */
            --accent-color: #D4C15D;
            --accent-color-hover: #c5b556;
            --border-color: #4a5568;
            /* bg-gray-700 */
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--main-bg);
            color: #e2e8f0;
            /* text-gray-300 */
        }

        .sidebar {
            background-color: var(--sidebar-bg);
            color: #e0e0e0;
        }

        .sidebar-link {
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
            border-left: 3px solid transparent;
        }

        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.05);
            border-left-color: var(--accent-color-hover);
            color: #ffffff;
        }

        .sidebar-link.active {
            background-color: var(--accent-color);
            color: #1a202c;
            /* Warna gelap untuk teks aktif */
            font-weight: 600;
            border-left-color: var(--accent-color);
        }

        .sidebar-link.active i,
        .sidebar-link.active span {
            color: inherit;
        }

        .sidebar-link i {
            color: #a0aec0;
            /* text-gray-400 */
            transition: color 0.2s ease-in-out;
        }

        .sidebar-link:hover i,
        .sidebar-link.active:hover i {
            color: inherit;
        }

        .stat-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body>
    <div class="flex h-screen">
        <aside class="sidebar w-64 flex-shrink-0 flex flex-col justify-between">
            <div>
                <div class="px-6 py-5 border-b" style="border-color: var(--border-color);">
                    <h1 class="text-xl font-bold tracking-wider text-white">AMIRA COLLECTION</h1>
                    <p class="text-xs text-gray-400">Admin Panel</p>
                </div>
                <nav class="mt-6 flex-1">
                    <a href="#" class="sidebar-link active flex items-center px-6 py-3 text-sm">
                        <i class="ri-dashboard-line w-5 h-5 mr-4"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" class="sidebar-link flex items-center mt-2 px-6 py-3 text-sm text-gray-300">
                        <i class="ri-gallery-line w-5 h-5 mr-4"></i>
                        <span>Galeri</span>
                    </a>
                    <a href="#" class="sidebar-link flex items-center mt-2 px-6 py-3 text-sm text-gray-300">
                        <i class="ri-t-shirt-2-line w-5 h-5 mr-4"></i>
                        <span>Produk</span>
                    </a>
                    <a href="#" class="sidebar-link flex items-center mt-2 px-6 py-3 text-sm text-gray-300">
                        <i class="ri-magic-line w-5 h-5 mr-4"></i>
                        <span>Aksesoris</span>
                    </a>
                    <a href="#" class="sidebar-link flex items-center mt-2 px-6 py-3 text-sm text-gray-300">
                        <i class="ri-calendar-check-line w-5 h-5 mr-4"></i>
                        <span>Disewa</span>
                    </a>
                </nav>
            </div>
            <div class="px-4 py-4 border-t" style="border-color: var(--border-color);">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-gray-800"
                        style="background-color: var(--accent-color);">
                        A
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-semibold text-white">Admin</p>
                        <p class="text-xs text-gray-400">Administrator</p>
                    </div>
                    {{-- PERUBAHAN DI SINI: action form diubah untuk menunjuk ke route admin.logout --}}
                    <form method="POST" action="{{ route('admin.logout') }}" class="ml-auto">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-white" aria-label="Logout">
                            <i class="ri-logout-box-r-line text-xl"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            <main class="flex-1 overflow-x-hidden overflow-y-auto p-8" style="background-color: var(--main-bg);">
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
                                <p class="text-gray-400 text-sm">Total Produk</p>
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

            </main>
        </div>
    </div>
</body>

</html>
