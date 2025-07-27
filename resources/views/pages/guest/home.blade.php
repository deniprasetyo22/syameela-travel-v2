<x-layout :title="$title">
    <section id="hero" class="md:pt-30 bg-gray-500 bg-cover bg-center bg-no-repeat pt-20 bg-blend-multiply"
        style="background-image: url('{{ asset('img/hero.png') }}')">
        <div class="mx-auto grid max-w-screen-xl px-4 md:pt-20 lg:grid-cols-12 lg:gap-8 xl:gap-0">
            <div class="my-10 mr-auto md:my-0 lg:col-span-7">
                <h1
                    class="md:mt-25 mb-4 max-w-2xl text-center text-2xl font-extrabold leading-none tracking-tight text-white md:text-center md:text-5xl lg:text-left xl:text-6xl">
                    Agen Travel Haji dan Umroh Terbaik
                </h1>
                <p
                    class="mb-6 max-w-xl text-center font-light text-white md:block md:text-left md:text-lg lg:mb-8 lg:text-xl dark:text-gray-400">
                    Menjadi sahabat para calon tamu Allah untuk memudahkan menuju tanah suci dengan mudah dan amanah
                </p>
            </div>
            <div class="hidden lg:col-span-5 lg:mt-0 lg:flex">
                <img src="{{ asset('img/hero-2.png') }}" alt="mockup">
            </div>
        </div>
    </section>
    <section id="about" class="bg-white px-4 py-6 antialiased dark:bg-gray-900">
        <div class="mx-auto grid rounded-lg p-4 md:p-8 lg:grid-cols-12 lg:gap-8 lg:p-16 xl:gap-16 dark:bg-gray-800">
            <div class="me-auto place-self-center lg:col-span-7">
                <h1
                    class="mb-5 text-center text-xl font-bold leading-tight tracking-tight text-blue-500 md:text-left md:text-2xl dark:text-white">
                    Tentang Kami
                </h1>
                <h1
                    class="mb-3 text-2xl font-bold leading-tight tracking-tight text-gray-900 md:text-4xl dark:text-white">
                    Kenapa Memilih Kami?
                </h1>
                <p class="mb-5 text-justify text-gray-500 md:text-left dark:text-gray-400">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum eius distinctio ipsum voluptatum
                    unde velit libero, aliquam, nam eligendi assumenda consequatur est, totam earum ipsam beatae
                    obcaecati sint voluptate perspiciatis reiciendis voluptatem dicta dolorum. Quisquam asperiores porro
                    labore dolorum veritatis molestias velit ex ipsa beatae! Beatae sunt architecto possimus a.
                </p>
                <a href="#"
                    class="bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:focus:ring-primary-900 md:text-md inline-flex items-center justify-center rounded-lg px-4 py-2.5 text-center text-xs font-medium text-white focus:ring-4 md:px-4 md:py-2.5">
                    Lihat Detail <i class="fa-solid fa-arrow-right ml-2"></i> </a>
            </div>
            <div class="mt-5 flex justify-center lg:col-span-5 lg:mt-0">
                <a href="#">
                    <img class="mb-4 h-72 w-72 sm:h-96 sm:w-96 md:h-full md:w-full dark:hidden"
                        src="{{ asset('img/about.png') }}" alt="about" />
                </a>
            </div>
        </div>
    </section>
    <section id="best-packages" class="bg-gray-100 dark:bg-gray-900">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-10">
            <div class="mx-auto mb-8 max-w-screen-md text-center lg:mb-12">
                <h3 class="mb-4 text-xl font-semibold text-blue-500 dark:text-white">
                    SPESIAL UNTUK KAMU
                </h3>
                <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                    Paket Terbaik Kami
                </h2>
            </div>
            <div class="space-y-8 sm:gap-6 lg:grid lg:grid-cols-3 lg:space-y-0 xl:gap-10">
                <!-- Pricing Card -->
                <div
                    class="mx-auto flex max-w-lg flex-col rounded-lg border border-gray-100 bg-white p-6 text-center text-gray-900 shadow xl:p-8 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Hajj Furoda</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Best option for personal use & for
                        your next project.</p>
                    <div class="my-8 flex items-baseline justify-center">
                        <span class="mr-2 text-5xl font-extrabold">$29</span>
                    </div>
                    <!-- List -->
                    <ul role="list" class="mb-8 space-y-4 text-left">
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Individual configuration</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>No setup, or hidden fees</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Team size: <span class="font-semibold">1 developer</span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Premium support: <span class="font-semibold">6 months</span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Free updates: <span class="font-semibold">6 months</span></span>
                        </li>
                    </ul>
                    <a href="#"
                        class="bg-primary-600 hover:bg-primary-700 focus:ring-primary-200 dark:focus:ring-primary-900 rounded-lg px-5 py-2.5 text-center text-sm font-medium text-white focus:ring-4 dark:text-white">
                        Lihat Detail <i class="fa-solid fa-arrow-right ml-2"></i></a>
                </div>
                <!-- Pricing Card -->
                <div
                    class="mx-auto flex max-w-lg flex-col rounded-lg border border-gray-100 bg-white p-6 text-center text-gray-900 shadow xl:p-8 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Ramadhan Umrah</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Relevant for multiple users,
                        extended & premium support.</p>
                    <div class="my-8 flex items-baseline justify-center">
                        <span class="mr-2 text-5xl font-extrabold">$99</span>
                    </div>
                    <!-- List -->
                    <ul role="list" class="mb-8 space-y-4 text-left">
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Individual configuration</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>No setup, or hidden fees</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Team size: <span class="font-semibold">10 developers</span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Premium support: <span class="font-semibold">24 months</span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Free updates: <span class="font-semibold">24 months</span></span>
                        </li>
                    </ul>
                    <a href="#"
                        class="bg-primary-600 hover:bg-primary-700 focus:ring-primary-200 dark:focus:ring-primary-900 rounded-lg px-5 py-2.5 text-center text-sm font-medium text-white focus:ring-4 dark:text-white">
                        Lihat Detail <i class="fa-solid fa-arrow-right ml-2"></i></a>
                </div>
                <!-- Pricing Card -->
                <div
                    class="mx-auto flex max-w-lg flex-col rounded-lg border border-gray-100 bg-white p-6 text-center text-gray-900 shadow xl:p-8 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Family Umrah</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Best for large scale uses and
                        extended redistribution rights.</p>
                    <div class="my-8 flex items-baseline justify-center">
                        <span class="mr-2 text-5xl font-extrabold">$499</span>
                    </div>
                    <!-- List -->
                    <ul role="list" class="mb-8 space-y-4 text-left">
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Individual configuration</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>No setup, or hidden fees</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Team size: <span class="font-semibold">100+ developers</span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Premium support: <span class="font-semibold">36 months</span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500 dark:text-green-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Free updates: <span class="font-semibold">36 months</span></span>
                        </li>
                    </ul>
                    <a href="#"
                        class="bg-primary-600 hover:bg-primary-700 focus:ring-primary-200 dark:focus:ring-primary-900 rounded-lg px-5 py-2.5 text-center text-sm font-medium text-white focus:ring-4 dark:text-white">
                        Lihat Detail <i class="fa-solid fa-arrow-right ml-2"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section id="packages" class="my-10 bg-white dark:bg-gray-900">
        <div class="mx-auto mb-20 max-w-screen-xl px-4">
            <div class="mb-6">
                <div class="flex justify-center md:items-center md:justify-between">
                    <h2
                        class="mb-4 text-center text-3xl font-extrabold tracking-tight text-gray-900 md:text-left lg:text-4xl dark:text-white">
                        Paket Haji
                    </h2>
                    <a href="{{ route('hajj') }}"
                        class="hidden items-center text-sm font-medium text-blue-600 hover:underline md:inline-flex">
                        Lihat Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                </div>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">We use an agile approach to test
                    assumptions and connect with the needs of your audience early and often.</p>
            </div>
            <div class="grid grid-cols-1 place-items-center gap-8 md:grid-cols-2 lg:grid-cols-3">
                <div
                    class="max-w-sm rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <a href="#">
                        <img class="rounded-t-lg" src="{{ asset('img/package.png') }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Hajj
                                Package A</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        <a href="#"
                            class="inline-flex items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lihat Detail <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                <div
                    class="max-w-sm rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <a href="#">
                        <img class="rounded-t-lg" src="{{ asset('img/package.png') }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Hajj
                                Package B</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        <a href="#"
                            class="inline-flex items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lihat Detail <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                <div
                    class="max-w-sm rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <a href="#">
                        <img class="rounded-t-lg" src="{{ asset('img/package.png') }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Hajj
                                Package C</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        <a href="#"
                            class="inline-flex items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lihat Detail <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <a href="#"
                        class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline md:hidden">
                        See more
                        <svg class="ms-2 h-3.5 w-3.5 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="mx-auto max-w-screen-xl px-4 lg:px-6">
            <div class="mb-6">
                <div class="flex justify-center md:items-center md:justify-between">
                    <h2
                        class="mb-4 text-center text-3xl font-extrabold tracking-tight text-gray-900 md:text-left lg:text-4xl dark:text-white">
                        Paket Umroh
                    </h2>
                    <a href="{{ route('umrah') }}"
                        class="hidden items-center text-sm font-medium text-blue-600 hover:underline md:inline-flex">
                        Lihat Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                </div>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">We use an agile approach to test
                    assumptions and connect with the needs of your audience early and often.</p>
            </div>
            <div class="grid grid-cols-1 place-items-center gap-8 md:grid-cols-2 lg:grid-cols-3">
                <div
                    class="max-w-sm rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <a href="#">
                        <img class="rounded-t-lg" src="{{ asset('img/package.png') }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Umrah
                                Package A</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        <a href="#"
                            class="inline-flex items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lihat Detail <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                <div
                    class="max-w-sm rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <a href="#">
                        <img class="rounded-t-lg" src="{{ asset('img/package.png') }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Umrah
                                Package B</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        <a href="#"
                            class="inline-flex items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lihat Detail <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                <div
                    class="max-w-sm rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <a href="#">
                        <img class="rounded-t-lg" src="{{ asset('img/package.png') }}" alt="" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Umrah
                                Package C</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                            technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        <a href="#"
                            class="inline-flex items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lihat Detail <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <a href="#"
                        class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline md:hidden">
                        See more
                        <svg class="ms-2 h-3.5 w-3.5 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="testimonials" class="bg-gray-100 dark:bg-gray-900">
        <div class="mx-auto max-w-screen-xl px-4 py-8 text-center lg:px-6 lg:py-10">
            <div class="mx-auto max-w-screen-lg">
                <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">Testimoni</h2>
                <p class="mb-8 font-light text-gray-500 sm:text-xl lg:mb-16 dark:text-gray-400">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores, eaque.
                </p>
            </div>
            <div class="mb-8 grid lg:mb-12 lg:grid-cols-2">
                <figure
                    class="flex flex-col items-center justify-center rounded-lg border-b border-gray-200 bg-white p-8 text-center shadow-sm md:p-12 lg:border-r dark:border-gray-700 dark:bg-gray-800">
                    <blockquote class="mx-auto mb-8 max-w-2xl text-gray-500 dark:text-gray-400">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Speechless with how easy this
                            was
                            to integrate</h3>
                        <p class="my-4">"I recently got my hands on Flowbite Pro, and holy crap, I'm speechless with
                            how easy this was to integrate within my application. Most templates are a pain, code is
                            scattered, and near impossible to theme.</p>
                        <p class="my-4">Flowbite has code in one place and I'm not joking when I say it took me a
                            matter of minutes to copy the code, customise it and integrate within a Laravel + Vue
                            application.</p>
                        <p class="my-4">If you care for your time, I hands down would go with this."</p>
                    </blockquote>
                    <figcaption class="flex items-center justify-center space-x-3">
                        <img class="h-9 w-9 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/karen-nelson.png"
                            alt="profile picture">
                        <div class="space-y-0.5 text-left font-medium dark:text-white">
                            <div>Bonnie Green</div>
                            <div class="text-sm font-light text-gray-500 dark:text-gray-400">Developer at Open AI</div>
                        </div>
                    </figcaption>
                </figure>
                <figure
                    class="flex flex-col items-center justify-center rounded-lg border-b border-gray-200 bg-white p-8 text-center shadow-sm md:p-12 dark:border-gray-700 dark:bg-gray-800">
                    <blockquote class="mx-auto mb-8 max-w-2xl text-gray-500 dark:text-gray-400">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Solid foundation for any
                            project
                        </h3>
                        <p class="my-4">"FlowBite provides a robust set of design tokens and components based on the
                            popular Tailwind CSS framework. From the most used UI components like forms and navigation
                            bars to the whole app screens designed both for desktop and mobile, this UI kit provides a
                            solid foundation for any project.</p>
                        <p class="my-4">Designing with Figma components that can be easily translated to the utility
                            classes of Tailwind CSS is a huge timesaver!"</p>
                    </blockquote>
                    <figcaption class="flex items-center justify-center space-x-3">
                        <img class="h-9 w-9 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/roberta-casas.png"
                            alt="profile picture">
                        <div class="space-y-0.5 text-left font-medium dark:text-white">
                            <div>Roberta Casas</div>
                            <div class="text-sm font-light text-gray-500 dark:text-gray-400">Lead designer at Dropbox
                            </div>
                        </div>
                    </figcaption>
                </figure>
            </div>
            <div class="text-center">
                <a href="{{ route('testimonials') }}"
                    class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline">
                    Lihat Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>
    </section>
    <section id="gallery" class="mx-auto my-10 max-w-screen-xl bg-white px-4 dark:bg-gray-900">
        <div class="mx-auto max-w-screen-lg">
            <h2 class="mb-4 text-center text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                Galeri
            </h2>
        </div>
        <div class="mb-4 flex flex-wrap items-center justify-center">
            <button type="button"
                class="mb-3 me-3 cursor-pointer rounded-full border border-blue-600 bg-white px-5 py-2.5 text-center text-base font-medium text-blue-700 hover:bg-blue-700 hover:text-white focus:outline-none focus:ring-4 focus:ring-blue-300 dark:border-blue-500 dark:bg-gray-900 dark:text-blue-500 dark:hover:bg-blue-500 dark:hover:text-white dark:focus:ring-blue-800">
                Semua Kategori
            </button>
            <button type="button"
                class="mb-3 me-3 cursor-pointer rounded-full border border-white bg-white px-5 py-2.5 text-center text-base font-medium text-gray-900 hover:border-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:border-gray-900 dark:bg-gray-900 dark:text-white dark:hover:border-gray-700 dark:focus:ring-gray-800">
                Haji
            </button>
            <button type="button"
                class="mb-3 me-3 cursor-pointer rounded-full border border-white bg-white px-5 py-2.5 text-center text-base font-medium text-gray-900 hover:border-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:border-gray-900 dark:bg-gray-900 dark:text-white dark:hover:border-gray-700 dark:focus:ring-gray-800">
                Umroh
            </button>
        </div>
        <div class="grid grid-cols-2 gap-4 md:grid-cols-3">
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-6.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-7.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-8.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-9.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-10.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-11.jpg" alt="">
            </div>
        </div>
        <div class="mt-8 text-center">
            <a href="#" class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline">
                Lihat Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>
</x-layout>
