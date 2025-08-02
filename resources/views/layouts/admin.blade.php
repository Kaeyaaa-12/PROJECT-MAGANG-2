<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Amira Collection</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    {{-- CSS Styles --}}
    <style>
        :root {
            --sidebar-bg: #2d3748;
            --main-bg: #1a202c;
            --card-bg: #2d3748;
            --accent-color: #D4C15D;
            --accent-color-hover: #c5b556;
            --border-color: #4a5568;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--main-bg);
            color: #e2e8f0;
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
            font-weight: 600;
            border-left-color: var(--accent-color);
        }

        .sidebar-link.active i,
        .sidebar-link.active span {
            color: inherit;
        }

        .sidebar-link i {
            color: #a0aec0;
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
                    {{-- --- PERBAIKAN SEMUA ROUTE DI SINI --- --}}
                    <a href="{{ route('admin.dashboard') }}"
                        class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} flex items-center px-6 py-3 text-sm">
                        <i class="ri-dashboard-line w-5 h-5 mr-4"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.galeri.index') }}"
                        class="sidebar-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }} flex items-center mt-2 px-6 py-3 text-sm">
                        <i class="ri-gallery-line w-5 h-5 mr-4"></i>
                        <span>Galeri</span>
                    </a>
                    <a class="flex items-center mt-4 py-2 px-6 transition-colors duration-200 {{ request()->routeIs('admin.koleksi.*') ? 'bg-gray-700 bg-opacity-50 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}"
                        href="{{ route('admin.koleksi.index') }}">
                        <i class="ri-t-shirt-2-line"></i>
                        <span class="mx-3">Koleksi</span>
                    </a>
                    <a href="{{ route('admin.aksesoris') }}"
                        class="sidebar-link {{ request()->routeIs('admin.aksesoris') ? 'active' : '' }} flex items-center mt-2 px-6 py-3 text-sm">
                        <i class="ri-magic-line w-5 h-5 mr-4"></i>
                        <span>Aksesoris</span>
                    </a>
                    <a href="{{ route('admin.disewa') }}"
                        class="sidebar-link {{ request()->routeIs('admin.disewa') ? 'active' : '' }} flex items-center mt-2 px-6 py-3 text-sm">
                        <i class="ri-calendar-check-line w-5 h-5 mr-4"></i>
                        <span>Disewa</span>
                    </a>
                </nav>
            </div>
            <div class="px-4 py-4 border-t" style="border-color: var(--border-color);">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-gray-800"
                        style="background-color: var(--accent-color);">A</div>
                    <div class="ml-3">
                        <p class="text-sm font-semibold text-white">Admin</p>
                        <p class="text-xs text-gray-400">Administrator</p>
                    </div>
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
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
