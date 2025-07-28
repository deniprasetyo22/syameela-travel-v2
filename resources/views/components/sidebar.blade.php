<div>
    <aside
        class="fixed left-0 top-16 z-40 h-[calc(100vh-4rem)] w-64 -translate-x-full border-r border-gray-200 bg-white transition-transform md:translate-x-0 dark:border-gray-700 dark:bg-gray-800"
        aria-label="Sidenav" id="drawer-navigation">
        <div class="flex h-full flex-col bg-white dark:bg-gray-800">
            <!-- Bagian menu scrollable -->
            <div class="flex-1 overflow-y-auto px-3 py-2">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin-dashboard') }}"
                            class="group flex items-center rounded-lg p-2 text-base font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <svg class="h-6 w-6 text-gray-500 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users') }}"
                            class="group flex items-center rounded-lg p-2 text-base font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i
                                class="fa-solid fa-users flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                            <span class="ml-3">Pengguna</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('hajj-dashboard') }}"
                            class="group flex items-center rounded-lg p-2 text-base font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i
                                class="fa-solid fa-list flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                            <span class="ml-3">Haji</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('umrah-dashboard') }}"
                            class="group flex items-center rounded-lg p-2 text-base font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i
                                class="fa-solid fa-list flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                            <span class="ml-3">Umroh</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group flex items-center rounded-lg p-2 text-base font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i
                                class="fa-solid fa-dollar-sign flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                            <span class="ml-3">Pembayaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group flex items-center rounded-lg p-2 text-base font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <i
                                class="fa-solid fa-calendar-days flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                            <span class="ml-3">Jadwal</span>
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
                                <a href="#"
                                    class="group flex w-full items-center rounded-lg p-2 pl-11 text-base font-medium text-gray-900 transition duration-75 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    <i
                                        class="fa-solid fa-users flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                                    <span class="ml-3">Pengguna</span>
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
                                        <a href="#"
                                            class="flex w-full items-center rounded-lg p-2 pl-20 text-base font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                            <i
                                                class="fa-solid fa-folder-open flex w-6 justify-center text-gray-500"></i>
                                            <span class="ml-3">Dokumen</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex w-full items-center rounded-lg p-2 pl-20 text-base font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                            <i
                                                class="fa-solid fa-dollar-sign flex w-6 justify-center text-gray-500"></i>
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
                                        <a href="#"
                                            class="flex w-full items-center rounded-lg p-2 pl-20 text-base font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                            <i
                                                class="fa-solid fa-folder-open flex w-6 justify-center text-gray-500"></i>
                                            <span class="ml-3">Dokumen</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex w-full items-center rounded-lg p-2 pl-20 text-base font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                            <i
                                                class="fa-solid fa-dollar-sign flex w-6 justify-center text-gray-500"></i>
                                            <span class="ml-3">Pembayaran</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Bagian bawah (Logout) -->
            <div class="border-t border-gray-200 px-3 py-2 md:hidden dark:border-gray-700">
                <a href="{{ route('logout') }}"
                    class="flex items-center justify-center rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    <span class="ml-2">
                        <i class="fa-solid fa-arrow-right-from-bracket w-5 text-white group-hover:text-white"></i>
                        Logout
                    </span>
                </a>
            </div>
        </div>
    </aside>
</div>
