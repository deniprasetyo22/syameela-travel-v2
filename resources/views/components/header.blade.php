<div>
    <nav class="fixed start-0 top-0 z-40 w-full border-b border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-900">
        <div class="mx-auto flex flex-wrap items-center justify-between px-4 py-3">

            {{-- Logo --}}
            <a href="{{ auth()->check() && auth()->user()->role?->name == 'Admin' ? '#' : route('home') }}"
                class="flex items-center space-x-3">
                <img src="{{ asset('img/logo.png') }}" class="h-10" alt="Syameela Logo">
                <span class="self-center whitespace-nowrap text-2xl font-semibold dark:text-white">Syameela Travel</span>
            </a>

            <!-- User Section & Hamburger -->
            <div class="space-x-3 lg:order-2 lg:flex lg:space-x-0">

                <!-- User Dropdown -->
                <div class="hidden lg:block">
                    @if (Auth::check() && Auth::user()->hasVerifiedEmail())
                        <div>
                            <button type="button"
                                class="flex cursor-pointer items-center gap-2 rounded-full bg-transparent px-3 py-1 text-sm text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-white dark:hover:bg-gray-700"
                                id="user-menu-button" data-dropdown-toggle="user-dropdown"
                                data-dropdown-placement="bottom">
                                <span class="text-sm font-medium">
                                    <i class="fa-solid fa-chevron-down text-xs"></i>
                                    {{ Auth::user()->full_name }}
                                </span>
                                <img src="{{ asset('img/default-profile-picture.png') }}" alt="User photo"
                                    class="h-8 w-8 rounded-full object-cover">
                            </button>

                            <!-- Dropdown Content -->
                            <div id="user-dropdown"
                                class="z-50 my-4 hidden list-none divide-y divide-gray-100 rounded-lg bg-white text-base shadow-sm dark:divide-gray-600 dark:bg-gray-700">
                                <div class="px-4 py-3">
                                    <span
                                        class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->full_name }}</span>
                                    <span
                                        class="block truncate text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</span>
                                    @if (Auth::user()->role->name == 'User')
                                        <a href="{{ route('profile') }}"
                                            class="{{ request()->routeIs('profile') ? 'text-white bg-blue-600 lg:text-blue-700 lg:bg-transparent' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-400' }} mt-2 block rounded-md px-4 py-2 text-sm font-medium text-gray-900 hover:bg-blue-200 dark:text-white dark:hover:bg-gray-600">
                                            Profil
                                        </a>
                                        <a href="{{ route('my-transactions') }}"
                                            class="{{ request()->routeIs('my-transactions', 'show-my-transaction') ? 'text-white bg-blue-600 lg:text-blue-700 lg:bg-transparent' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-400' }} block rounded-md px-4 py-2 text-sm font-medium text-gray-900 hover:bg-blue-200 dark:text-white dark:hover:bg-gray-600">
                                            Transaksi
                                        </a>
                                        <a href="{{ route('my-trips') }}"
                                            class="{{ request()->routeIs('my-trips', 'show-my-trip') ? 'text-white bg-blue-600 lg:text-blue-700 lg:bg-transparent' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-400' }} block rounded-md px-4 py-2 text-sm font-medium text-gray-900 hover:bg-blue-200 dark:text-white dark:hover:bg-gray-600">
                                            Informasi Keberangkatan
                                        </a>
                                    @endif
                                </div>
                                <ul class="py-2">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            class="mx-2 block rounded-md bg-red-600 px-4 py-2 text-center text-sm text-white hover:bg-red-700">
                                            Keluar
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <!-- Tombol Login / Register Desktop -->
                        <div class="hidden space-x-2 lg:flex">
                            <a href="{{ route('login') }}"
                                class="rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:hover:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                                Masuk
                            </a>
                            <a href="{{ route('register') }}"
                                class="rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Daftar
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Hamburger -->
                @if (Auth::check() && Auth::user()->role->name == 'Admin')
                    <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                        aria-controls="drawer-navigation" type="button"
                        class="inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 lg:hidden dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.5A1.5 1.5 0 013.5 3h13a1.5 1.5 0 110 3h-13A1.5 1.5 0 012 4.5zM2 10a1.5 1.5 0 011.5-1.5h13a1.5 1.5 0 110 3h-13A1.5 1.5 0 012 10zm1.5 4.5a1.5 1.5 0 000 3h13a1.5 1.5 0 000-3h-13z" />
                        </svg>
                    </button>
                @else
                    <button data-collapse-toggle="navbar-sticky" type="button"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 lg:hidden dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                @endif
            </div>

            <!-- Main Menu -->
            @if (!Auth::check() || !Auth::user()->hasVerifiedEmail() || Auth::user()->role->name != 'Admin')
                <div class="hidden w-full items-center justify-between lg:order-1 lg:flex lg:w-auto" id="navbar-sticky">
                    <ul
                        class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-gray-50 p-4 font-medium lg:mt-0 lg:flex-row lg:space-x-8 lg:border-0 lg:bg-white lg:p-0 rtl:space-x-reverse dark:border-gray-700 dark:bg-gray-800 lg:dark:bg-gray-900">

                        <!-- Link Utama -->
                        <li>
                            <a href="{{ route('home') }}"
                                class="{{ request()->routeIs('home') ? 'text-white bg-blue-600 lg:text-blue-700 lg:bg-transparent' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-400' }} block rounded-sm px-3 py-2 lg:p-0">
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('hajj') }}"
                                class="{{ request()->routeIs('hajj') ? 'text-white bg-blue-600 lg:text-blue-700 lg:bg-transparent' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-400' }} block rounded-sm px-3 py-2 lg:p-0">
                                Haji
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('umrah') }}"
                                class="{{ request()->routeIs('umrah') ? 'text-white bg-blue-600 lg:text-blue-700 lg:bg-transparent' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-400' }} block rounded-sm px-3 py-2 lg:p-0">
                                Umroh
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}"
                                class="{{ request()->routeIs('about') ? 'text-white bg-blue-600 lg:text-blue-700 lg:bg-transparent' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-400' }} block rounded-sm px-3 py-2 lg:p-0">
                                Tentang
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gallery') }}"
                                class="{{ request()->routeIs('gallery') ? 'text-white bg-blue-600 lg:text-blue-700 lg:bg-transparent' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-400' }} block rounded-sm px-3 py-2 lg:p-0">
                                Galeri
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('testimonials') }}"
                                class="{{ request()->routeIs('testimonials') ? 'text-white bg-blue-600 lg:text-blue-700 lg:bg-transparent' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-400' }} block rounded-sm px-3 py-2 lg:p-0">
                                Testimoni
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}"
                                class="{{ request()->routeIs('contact') ? 'text-white bg-blue-600 lg:text-blue-700 lg:bg-transparent' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-400' }} block rounded-sm px-3 py-2 lg:p-0">
                                Kontak
                            </a>
                        </li>

                        @if (Auth::check())
                            <li class="lg:hidden">
                                <a href="{{ route('profile') }}"
                                    class="{{ request()->routeIs('profile') ? 'text-white bg-blue-600 lg:text-blue-700 lg:bg-transparent' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-400' }} block rounded-sm px-3 py-2 lg:p-0">
                                    Profil
                                </a>
                            </li>
                            <li class="lg:hidden">
                                <a href="{{ route('my-transactions') }}"
                                    class="{{ request()->routeIs('my-transactions', 'show-my-transaction') ? 'text-white bg-blue-600 lg:text-blue-700 lg:bg-transparent' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-400' }} block rounded-sm px-3 py-2 lg:p-0">
                                    Transaksi
                                </a>
                            </li>
                            <li class="lg:hidden">
                                <a href="{{ route('my-trips') }}"
                                    class="{{ request()->routeIs('my-trips', 'show-my-trip') ? 'text-white bg-blue-600 lg:text-blue-700 lg:bg-transparent' : 'text-gray-900 hover:text-blue-700 dark:text-white dark:hover:text-blue-400' }} block rounded-sm px-3 py-2 lg:p-0">
                                    Informasi Keberangkatan
                                </a>
                            </li>
                            <li class="mt-4 lg:hidden">
                                <a href="{{ route('logout') }}"
                                    class="block rounded-lg bg-red-600 px-3 py-2 text-center text-white hover:bg-red-700">
                                    Keluar
                                </a>
                            </li>
                        @else
                            <!-- Tombol Autentikasi untuk Mobile -->
                            <li class="mb-2 lg:hidden">
                                <a href="{{ route('login') }}"
                                    class="block rounded-lg border border-gray-300 bg-white px-3 py-2 text-center text-gray-900 hover:bg-gray-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:hover:text-blue-400">
                                    Masuk
                                </a>
                            </li>
                            <li class="lg:hidden">
                                <a href="{{ route('register') }}"
                                    class="block rounded-lg bg-blue-700 px-3 py-2 text-center text-white hover:bg-blue-800 dark:bg-blue-600 dark:text-white dark:hover:bg-blue-700">
                                    Daftar
                                </a>
                            </li>
                        @endif

                    </ul>
                </div>
            @endif

        </div>
    </nav>
</div>
