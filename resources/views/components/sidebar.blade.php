<div>
    <aside
        class="fixed left-0 top-16 z-40 flex h-[calc(100vh-4rem)] w-64 -translate-x-full flex-col border-r border-gray-200 bg-white transition-transform md:translate-x-0 dark:border-gray-700 dark:bg-gray-800"
        aria-label="Sidenav" id="drawer-navigation">

        <!-- Konten scrollable -->
        <div class="flex-1 overflow-y-auto px-3 py-2">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('admin-dashboard') }}"
                        class="{{ request()->routeIs('admin-dashboard') ? 'bg-blue-100 dark:bg-gray-700 dark:text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex items-center rounded-lg p-2 text-base font-medium">
                        <svg class="h-6 w-6 text-gray-500 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users-dashboard') }}"
                        class="{{ request()->routeIs('users-dashboard', 'create-user', 'show-user', 'edit-user') ? 'bg-blue-100 dark:bg-gray-700 dark:text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex items-center rounded-lg p-2 text-base font-medium">
                        <i
                            class="fa-solid fa-users flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                        <span class="ml-3">Pengguna</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('hajj-dashboard') }}"
                        class="{{ request()->routeIs('hajj-dashboard', 'create-hajj', 'show-hajj', 'edit-hajj') ? 'bg-blue-100 dark:bg-gray-700 dark:text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex items-center rounded-lg p-2 text-base font-medium">
                        <i
                            class="fa-solid fa-list flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                        <span class="ml-3">Haji</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('umrah-dashboard') }}"
                        class="{{ request()->routeIs('umrah-dashboard', 'create-umrah', 'show-umrah', 'edit-umrah') ? 'bg-blue-100 dark:bg-gray-700 dark:text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex items-center rounded-lg p-2 text-base font-medium">
                        <i
                            class="fa-solid fa-list flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                        <span class="ml-3">Umroh</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('transaction-dashboard') }}"
                        class="{{ request()->routeIs('transaction-dashboard', 'show-transaction') ? 'bg-blue-100 dark:bg-gray-700 dark:text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex items-center rounded-lg p-2 text-base font-medium">
                        <i
                            class="fa-solid fa-dollar-sign flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                        <span class="ml-3">Pembayaran</span>
                    </a>
                </li>
                <a href="{{ route('manasik-dashboard') }}"
                    class="{{ request()->routeIs('manasik-dashboard', 'create-manasik', 'show-manasik', 'edit-manasik') ? 'bg-blue-100 dark:bg-gray-700 dark:text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex items-center rounded-lg p-2 text-base font-medium">
                    <i
                        class="fa-solid fa-calendar-days flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                    <span class="ml-3">Manasik</span>
                </a>
                </li>
                <li>
                    <a href="{{ route('trip-dashboard') }}"
                        class="{{ request()->routeIs('trip-dashboard', 'create-trip', 'show-trip', 'edit-trip') ? 'bg-blue-100 dark:bg-gray-700 dark:text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex items-center rounded-lg p-2 text-base font-medium">
                        <i
                            class="fa-solid fa-calendar-days flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                        <span class="ml-3">Perjalanan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('gallery-dashboard') }}"
                        class="{{ request()->routeIs('gallery-dashboard', 'create-gallery', 'show-gallery', 'edit-gallery') ? 'bg-blue-100 dark:bg-gray-700 dark:text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex items-center rounded-lg p-2 text-base font-medium">
                        <i
                            class="fa-solid fa-images flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                        <span class="ml-3">Galeri</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact-dashboard') }}"
                        class="{{ request()->routeIs('contact-dashboard', 'show-contact') ? 'bg-blue-100 dark:bg-gray-700 dark:text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex items-center rounded-lg p-2 text-base font-medium">
                        <i
                            class="fa-solid fa-envelope flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                        <span class="ml-3">Pesan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('testimonial-dashboard') }}"
                        class="{{ request()->routeIs('testimonial-dashboard', 'create-testimonial', 'show-testimonial', 'edit-testimonial') ? 'bg-blue-100 dark:bg-gray-700 dark:text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex items-center rounded-lg p-2 text-base font-medium">
                        <i
                            class="fa-solid fa-comments flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                        <span class="ml-3">Testimoni</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="group flex w-full cursor-pointer items-center rounded-lg px-1 py-2 text-base font-medium text-gray-900 transition duration-75 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-report" data-collapse-toggle="dropdown-report">
                        <i
                            class="fa-solid fa-clipboard-check flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                        <span class="ml-4 flex-1 whitespace-nowrap text-left">Laporan</span>
                        <i class="fa-solid fa-chevron-down ml-3"></i>
                    </button>
                    <ul id="dropdown-report" class="hidden space-y-2 py-2">
                        <li>
                            <a href="{{ route('report-jamaah') }}"
                                class="{{ request()->routeIs('report-jamaah') ? 'bg-blue-100 dark:bg-gray-700 dark:text-white' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }}group flex w-full items-center rounded-lg p-2 pl-11 text-base font-medium transition duration-75">
                                <i
                                    class="fa-solid fa-users flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                                <span class="ml-3">Jamaah</span>
                            </a>
                        </li>
                        <li>
                            <button type="button"
                                class="group flex w-full cursor-pointer items-center rounded-lg p-2 pl-11 text-base font-medium text-gray-900 transition duration-75 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                aria-controls="dropdown-haji" data-collapse-toggle="dropdown-haji">
                                <i
                                    class="fa-solid fa-list flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                                <span class="ml-3 flex-1 whitespace-nowrap text-left">Haji</span>
                                <i class="fa-solid fa-chevron-down ml-3"></i>
                            </button>
                            <ul id="dropdown-haji" class="hidden space-y-2 py-2">
                                <li>
                                    <a href="{{ route('report-hajj-documents') }}"
                                        class="flex w-full items-center rounded-lg p-2 pl-20 text-base font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        <i class="fa-solid fa-folder-open flex w-6 justify-center text-gray-500"></i>
                                        <span class="ml-3">Dokumen</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('report-hajj-payments') }}"
                                        class="flex w-full items-center rounded-lg p-2 pl-20 text-base font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        <i class="fa-solid fa-dollar-sign flex w-6 justify-center text-gray-500"></i>
                                        <span class="ml-3">Pembayaran</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <button type="button"
                                class="group flex w-full cursor-pointer items-center rounded-lg p-2 pl-11 text-base font-medium text-gray-900 transition duration-75 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                aria-controls="dropdown-umroh" data-collapse-toggle="dropdown-umroh">
                                <i
                                    class="fa-solid fa-list flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                                <span class="ml-3 flex-1 whitespace-nowrap text-left">Umroh</span>
                                <i class="fa-solid fa-chevron-down ml-3"></i>
                            </button>
                            <ul id="dropdown-umroh" class="hidden space-y-2 py-2">
                                <li>
                                    <a href="{{ route('report-umrah-documents') }}"
                                        class="flex w-full items-center rounded-lg p-2 pl-20 text-base font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        <i class="fa-solid fa-folder-open flex w-6 justify-center text-gray-500"></i>
                                        <span class="ml-3">Dokumen</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('report-umrah-payments') }}"
                                        class="flex w-full items-center rounded-lg p-2 pl-20 text-base font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        <i class="fa-solid fa-dollar-sign flex w-6 justify-center text-gray-500"></i>
                                        <span class="ml-3">Pembayaran</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Logout sticky di bawah -->
        <div class="border-t border-gray-200 px-3 py-2 dark:border-gray-700">
            <a href="{{ route('logout') }}"
                class="flex items-center justify-center rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                <span class="ml-2">
                    <i class="fa-solid fa-arrow-right-from-bracket w-5 text-white group-hover:text-white"></i>
                    Logout
                </span>
            </a>
        </div>
    </aside>
</div>
