<x-layout :title="$data['title']">
    <div class="mx-4 mb-10 mt-20 grid gap-4 bg-white antialiased md:grid-cols-5 dark:bg-gray-900">
        <x-main-menu-user />
        <div class="rounded-md bg-gray-50 md:col-span-2">
            <h2 class="px-4 py-2 text-lg font-bold text-gray-900 dark:text-white">Paket Haji</h2>
            <div class="mx-4 space-y-2">
                <div class="w-full">
                    <form class="flex items-center gap-4" method="GET" action="{{ route('hajj') }}">
                        <label for="simple-search" class="sr-only">Pencarian</label>
                        <div class="relative w-full">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg aria-hidden="true" class="h-5 w-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" name="search" value="{{ request('search') }}"
                                class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Cari nama paket">
                        </div>
                        <a href="{{ route('hajj') }}"
                            class="flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Reset
                        </a>
                    </form>
                </div>
                <div class="w-full">
                    @forelse ($data['packages'] as $package)
                        <div class="mb-2">
                            <a href="{{ route('show-hajj-list', $package->id) }}"
                                class="shadow-xs flex flex-col items-center rounded-lg border border-gray-200 bg-white hover:bg-gray-100 md:max-w-xl md:flex-row dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <img class="h-96 w-full rounded-t-lg object-cover md:h-auto md:w-32 md:rounded-none md:rounded-s-lg"
                                    src="{{ asset($package->image) }}" alt="">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $package->name }}
                                    </h5>
                                    <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        {!! Str::limit($package->description, 50, '...') !!}
                                    </div>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        {{ Number::currency($package->price, 'Rp ', 'id', 0) }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="w-full">
                            <h5 class="text-center text-lg font-medium tracking-tight text-gray-700 dark:text-white">
                                Tidak ada data
                            </h5>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="rounded-md bg-gray-50 md:col-span-2">
            @if (session()->has('success'))
                <div class="mb-2 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="flex items-center justify-center py-24">
                <h2 class="text-lg font-bold text-gray-900 dark:text-white">
                    Pilih Paket Terlebih Dahulu
                </h2>
            </div>
        </div>
    </div>
</x-layout>
