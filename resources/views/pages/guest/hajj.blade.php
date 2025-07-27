<x-layout :title="$title">
    <div class="bg-gray-500 bg-cover bg-center bg-no-repeat bg-blend-multiply"
        style="background-image: url('{{ asset('img/hero-3.png') }}')">
        <div
            class="mx-auto flex min-h-[500px] max-w-screen-xl flex-col items-center justify-center px-4 pt-40 text-center md:pt-20">
            <h1
                class="mb-4 max-w-2xl text-2xl font-extrabold leading-none tracking-tight text-white md:text-5xl xl:text-6xl">
                Paket Haji
            </h1>
            <p class="mb-6 max-w-2xl font-light text-white md:text-lg lg:mb-8 lg:text-xl">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti voluptas, repellendus at
                aspernatur et sequi ab natus libero amet?
            </p>
        </div>
    </div>
    <div class="mx-auto mb-20 max-w-screen-xl px-4 pt-10">
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
        </div>
    </div>
</x-layout>
