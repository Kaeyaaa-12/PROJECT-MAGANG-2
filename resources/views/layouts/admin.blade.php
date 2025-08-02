<!DOCTYPE html>
<html lang="id" x-data="{ sidebarOpen: false }" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Amira Collection</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        :root {
            --bg-dark-primary: #121212;
            --bg-dark-secondary: #1E1E1E;
            --border-dark: #2d2d2d;
            --text-gold: #D4AF37;
            --text-light: #E0E0E0;
            --text-muted: #888888;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: var(--bg-dark-primary);
            color: var(--text-light);
        }

        /* Sidebar Link Styles */
        .sidebar-link-active {
            background-color: var(--text-gold) !important;
            color: var(--bg-dark-primary) !important;
            box-shadow: 0 4px 14px 0 rgba(212, 175, 55, 0.3);
        }

        .sidebar-link-active svg {
            color: var(--bg-dark-primary) !important;
        }

        .sidebar-link-inactive {
            color: var(--text-muted);
            transition: all 0.2s ease-in-out;
        }

        .sidebar-link-inactive:hover {
            background-color: var(--bg-dark-secondary);
            color: var(--text-gold);
        }

        .sidebar-link-inactive:hover svg {
            color: var(--text-gold);
        }
    </style>
</head>

<body class="h-full">
    <div>
        {{-- SIDEBAR UNTUK MOBILE --}}
        <div x-show="sidebarOpen" class="relative z-50 lg:hidden" role="dialog" aria-modal="true">
            <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/80"></div>
            <div class="fixed inset-0 flex">
                <div x-show="sidebarOpen" x-transition:enter="transition ease-in-out duration-300 transform"
                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in-out duration-300 transform"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                    class="relative mr-16 flex w-full max-w-xs flex-1">
                    <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                        <button type="button" class="-m-2.5 p-2.5" @click="sidebarOpen = false">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    {{-- Konten Sidebar dimasukkan di sini --}}
                    @include('layouts.partials.admin-sidebar-content')
                </div>
            </div>
        </div>

        {{-- SIDEBAR UNTUK DESKTOP --}}
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            {{-- Konten Sidebar dimasukkan di sini --}}
            @include('layouts.partials.admin-sidebar-content')
        </div>

        {{-- KONTEN UTAMA --}}
        <div class="lg:pl-72">
            <header
                class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8"
                style="background-color: var(--bg-dark-secondary); border-color: var(--border-dark);">
                <button type="button" class="-m-2.5 p-2.5 lg:hidden" @click="sidebarOpen = true"
                    style="color: var(--text-light);">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
                <div class="h-6 w-px lg:hidden" style="background-color: var(--border-dark);"></div>
                <div class="flex flex-1 justify-end"></div>
            </header>

            <main class="py-10">
                <div class="px-4 sm:px-6 lg:px-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>

</html>
