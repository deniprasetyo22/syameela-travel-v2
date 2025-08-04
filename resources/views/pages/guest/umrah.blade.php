<x-layout :title="$data['title']">
    <div class="bg-gray-500 bg-cover bg-center bg-no-repeat bg-blend-multiply"
        style="background-image: url('{{ asset('img/hero-3.png') }}')">
        <div
            class="mx-auto flex min-h-[500px] max-w-screen-xl flex-col items-center justify-center px-4 pt-40 text-center md:pt-20">
            <h1
                class="mb-4 max-w-2xl text-2xl font-extrabold leading-none tracking-tight text-white md:text-5xl xl:text-6xl">
                Paket Umroh
            </h1>
            <p class="mb-6 max-w-2xl font-light text-white md:text-lg lg:mb-8 lg:text-xl">
                Nikmati perjalanan ibadah Umroh yang nyaman dan berkesan bersama kami. Didampingi pembimbing
                berpengalaman dan fasilitas terbaik untuk kenyamanan Anda.
            </p>
        </div>
    </div>
    <div class="mx-auto mb-12 mt-10 max-w-screen-xl space-y-4 px-4">
        <div class="w-full">
            <form class="flex items-center gap-4" method="GET" action="{{ route('umrah') }}">
                <label for="simple-search" class="sr-only">Pencarian</label>
                <div class="relative w-full">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg aria-hidden="true" class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" id="simple-search" name="search" value="{{ request('search') }}"
                        class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                        placeholder="Cari nama paket">
                </div>
                <a href="{{ route('umrah') }}"
                    class="flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Reset
                </a>
            </form>
        </div>
        <div class="grid grid-cols-1 place-items-center gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($data['packages'] as $umrah)
                <div
                    class="max-w-sm rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <img class="rounded-t-lg" src="{{ asset($umrah->image) }}" alt="{{ $umrah->name }}" />
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $umrah->name }}
                            </h5>
                        </a>
                        <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {!! Str::limit($umrah->description, 100, '...') !!}
                        </div>
                        <a href="{{ route('show-umrah-package', $umrah->id) }}"
                            class="inline-flex items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lihat Detail <i class="fa-solid fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full flex min-h-[200px] w-full items-center justify-center">
                    <h5 class="text-center text-lg font-medium tracking-tight text-gray-700 dark:text-white">
                        Tidak ada data
                    </h5>
                </div>
            @endforelse
        </div>
        <div>
            {{ $data['packages']->links() }}
        </div>
    </div>
</x-layout>
