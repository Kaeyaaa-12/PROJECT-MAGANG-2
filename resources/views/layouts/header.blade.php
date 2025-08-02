<header class="shadow-md sticky top-0 z-50" style="background-color: var(--bg-main);" x-data="{ searchOpen: false }">
    <div class="container mx-auto flex justify-between items-center p-5 text-white">
        <a href="{{ route('home.index') }}" class="flex items-center space-x-3">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Amira Collection Logo" class="h-10">
            <span class="text-2xl font-bold tracking-wider" style="color: var(--text-main);">AMIRA COLLECTION</span>
        </a>
        <nav class="hidden md:flex space-x-8 items-center font-medium">
            <a href="{{ route('home.index') }}"
                class="{{ request()->routeIs('home.index') ? 'text-[#D4C15D] font-bold' : 'opacity-90 hover:opacity-100 transition' }}">Home</a>
            <a href="{{ route('tentang.index') }}"
                class="{{ request()->routeIs('tentang.index') ? 'text-[#D4C15D] font-bold' : 'opacity-90 hover:opacity-100 transition' }}">Tentang</a>
            <a href="{{ route('koleksi.index') }}"
                class="{{ request()->routeIs('koleksi.index') || request()->routeIs('koleksi.show') ? 'text-[#D4C15D] font-bold' : 'opacity-90 hover:opacity-100 transition' }}">Koleksi</a>
            <a href="{{ route('aksesoris.index') }}"
                class="{{ request()->routeIs('aksesoris.index') || request()->routeIs('aksesoris.show') ? 'text-[#D4C15D] font-bold' : 'opacity-90 hover:opacity-100 transition' }}">Aksesoris</a>
        </nav>
        <div class="flex items-center space-x-5">
            <div class="relative">
                <input type="text" x-show="searchOpen" x-transition
                    class="bg-gray-700 text-white rounded-md px-3 py-1 text-sm focus:outline-none"
                    placeholder="Cari produk...">
                <button @click="searchOpen = !searchOpen" class="opacity-90 hover:opacity-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>
