<div>
    <nav class="fixed start-0 top-0 z-40 w-full border-b border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-900">
        <div class="mx-auto flex flex-wrap items-center justify-between px-4 py-3">

            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                <img src="{{ asset('img/logo.png') }}" class="h-10" alt="Syameela Logo">
                <span class="self-center whitespace-nowrap text-2xl font-semibold dark:text-white">Syameela Travel</span>
            </a>

            <!-- Tombol User dan Hamburger -->
            <div class="space-x-3 md:order-2 md:flex md:space-x-0">

                <!-- User Dropdown (Login) -->
                <div class="hidden md:block">
                    @if (Auth::check())
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
                                </div>
                                <ul class="py-2">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:text-red-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                            Keluar
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <!-- Tombol Login / Daftar Desktop -->
                        <div class="hidden space-x-2 md:flex">
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

                <!-- Hamburger Menu -->
                @if (Auth::check())
                    <!-- Toggle Sidebar -->
                    <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                        aria-controls="drawer-navigation" type="button"
                        class="inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.5A1.5 1.5 0 013.5 3h13a1.5 1.5 0 110 3h-13A1.5 1.5 0 012 4.5zM2 10a1.5 1.5 0 011.5-1.5h13a1.5 1.5 0 110 3h-13A1.5 1.5 0 012 10zm1.5 4.5a1.5 1.5 0 000 3h13a1.5 1.5 0 000-3h-13z">
                            </path>
                        </svg>
                    </button>
                @else
                    <!-- Toggle Navbar Mobile (unauthenticated) -->
                    <button data-collapse-toggle="navbar-sticky" type="button"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                @endif
            </div>

            <!-- Main Navigation Menu -->
            @if (!Auth::check())
                <div class="hidden w-full items-center justify-between md:order-1 md:flex md:w-auto" id="navbar-sticky">
                    <ul
                        class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-gray-50 p-4 font-medium md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-white md:p-0 rtl:space-x-reverse dark:border-gray-700 dark:bg-gray-800 md:dark:bg-gray-900">

                        <!-- Link Utama -->
                        <li>
                            <a href="{{ route('home') }}"
                                class="block rounded-sm bg-blue-700 px-3 py-2 text-white md:bg-transparent md:p-0 md:text-blue-700 md:dark:text-blue-500"
                                aria-current="page">
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}"
                                class="block rounded-sm px-3 py-2 text-gray-900 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent md:dark:hover:text-blue-500">
                                Tentang
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('hajj') }}"
                                class="block rounded-sm px-3 py-2 text-gray-900 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent md:dark:hover:text-blue-500">
                                Haji
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('umrah') }}"
                                class="block rounded-sm px-3 py-2 text-gray-900 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent md:dark:hover:text-blue-500">
                                Umroh
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('gallery') }}"
                                class="block rounded-sm px-3 py-2 text-gray-900 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent md:dark:hover:text-blue-500">
                                Galeri
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('testimonials') }}"
                                class="block rounded-sm px-3 py-2 text-gray-900 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent md:dark:hover:text-blue-500">
                                Testimoni
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}"
                                class="block rounded-sm px-3 py-2 text-gray-900 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent md:dark:hover:text-blue-500">
                                Kontak
                            </a>
                        </li>

                        <!-- Tombol Autentikasi untuk Mobile -->
                        <li class="mb-2 md:hidden">
                            <a href="{{ route('login') }}"
                                class="block rounded-lg border border-gray-300 bg-white px-3 py-2 text-center text-gray-900 hover:bg-gray-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:hover:text-blue-400">
                                Masuk
                            </a>
                        </li>
                        <li class="md:hidden">
                            <a href="{{ route('register') }}"
                                class="block rounded-lg bg-blue-700 px-3 py-2 text-center text-white hover:bg-blue-800 dark:bg-blue-600 dark:text-white dark:hover:bg-blue-700">
                                Daftar
                            </a>
                        </li>

                    </ul>
                </div>
            @endif

        </div>
    </nav>
</div>
