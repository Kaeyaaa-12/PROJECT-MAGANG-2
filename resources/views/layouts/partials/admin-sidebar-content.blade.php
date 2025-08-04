<div class="flex grow flex-col gap-y-5 overflow-y-auto px-6 pb-4" style="background-color: var(--bg-dark-secondary);">
    {{-- AWAL PERUBAHAN --}}
    <div class="flex h-20 shrink-0 items-center gap-x-4">
        <a href="{{ route('home.index') }}" class="flex items-center space-x-3">
            {{-- Tambahkan logo di sini --}}
            <img class="h-12 w-auto" src="{{ asset('assets/images/logoamira.png') }}" alt="Amira Collection Logo">
            {{-- Styling untuk teks --}}
            <span class="text-white text-xl font-bold tracking-wider uppercase">
                Amira Collection
            </span>
        </a>
    </div>
    {{-- AKHIR PERUBAHAN --}}

    <nav class="flex flex-1 flex-col">
        <ul role="list" class="flex flex-1 flex-col gap-y-7">
            <li>
                <ul role="list" class="-mx-2 space-y-2">
                    {{-- Dashboard --}}
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->routeIs('admin.dashboard') ? 'sidebar-link-active' : 'sidebar-link-inactive' }}">
                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h7.5" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    {{-- Galeri --}}
                    <li>
                        <a href="{{ route('admin.galeri.index') }}"
                            class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->routeIs('admin.galeri.*') ? 'sidebar-link-active' : 'sidebar-link-inactive' }}">
                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                            Galeri
                        </a>
                    </li>
                    {{-- Koleksi --}}
                    <li>
                        <a href="{{ route('admin.koleksi.index') }}"
                            class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->routeIs('admin.koleksi.*') ? 'sidebar-link-active' : 'sidebar-link-inactive' }}">
                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                            </svg>
                            Koleksi
                        </a>
                    </li>
                    {{-- Aksesoris --}}
                    <li>
                        <a href="{{ route('admin.aksesoris.index') }}"
                            class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->routeIs('admin.aksesoris.*') ? 'sidebar-link-active' : 'sidebar-link-inactive' }}">
                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            Aksesoris
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.disewa.index') }}"
                            class="group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold {{ request()->routeIs('admin.disewa.*') ? 'sidebar-link-active' : 'sidebar-link-inactive' }}">
                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0h18M12 12.75h.008v.008H12v-.008z" />
                            </svg>
                            Disewa
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-auto">
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="sidebar-link-inactive group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6">
                    <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l-3-3m0 0l-3 3m3-3V9" />
                    </svg>
                    Logout
                </a>
            </li>
        </ul>
    </nav>
</div>
