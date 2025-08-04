<x-layout :title="$data['title']">
    <div class="mx-auto my-20 max-w-screen-xl px-4">
        {{-- Breadcrumb --}}
        <div class="mb-6">
            <nav class="flex text-sm text-gray-500 dark:text-gray-400" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li>
                        <a href="#" class="inline-flex items-center hover:text-blue-600 dark:hover:text-white">
                            <svg class="me-2.5 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M19.707 9.293l-2-2-7-7a1 1 0 00-1.414 0l-7 7-2 2a1 1 0 001.414 1.414L2 10.414V18a2 2 0 002 2h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a2 2 0 002-2v-7.586l.293.293a1 1 0 001.414-1.414z" />
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" fill="none" viewBox="0 0 6 10"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M1 9l4-4-4-4" />
                            </svg>
                            <a href="{{ route('hajj') }}"
                                class="ms-1 hover:text-blue-600 md:ms-2 dark:hover:text-white">
                                Paket Haji
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" fill="none" viewBox="0 0 6 10"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M1 9l4-4-4-4" />
                            </svg>
                            <span class="ms-1 md:ms-2">Detail Paket</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        {{-- Card Detail --}}
        <div class="grid grid-cols-1 gap-10 md:grid-cols-2">
            <div class="flex justify-center">
                <img class="h-fit w-full rounded-lg shadow-md" src="{{ asset($data['package']->image) }}"
                    alt="Image Paket">
            </div>
            <div class="flex flex-col justify-between">
                <div>
                    <h1 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">
                        {{ $data['package']->name }}
                    </h1>
                    <p class="text-xl font-semibold text-blue-600 dark:text-blue-400">
                        {{ Number::currency($data['package']->price, 'Rp ', 'id', 0) }}
                    </p>
                    <p class="mt-2 text-gray-700 dark:text-gray-300">
                        Kuota: <span class="font-medium">{{ $data['package']->quota }}</span>
                    </p>

                    <div class="mt-3">
                        <h2 class="mb-1 font-semibold text-gray-700 dark:text-gray-300">Tanggal Keberangkatan</h2>
                        <div
                            class="text-sm text-gray-700 dark:text-gray-300 [&>ol]:list-decimal [&>ol]:space-y-1 [&>ol]:ps-7 [&>p]:mb-2 [&>table]:table-auto [&>table]:border [&>td]:border [&>th]:border [&>th]:bg-gray-100 [&>ul]:list-disc [&>ul]:space-y-1 [&>ul]:ps-7">
                            {{ \Carbon\Carbon::parse($data['package']->departure_date)->translatedFormat('d F Y') }}
                        </div>
                    </div>

                    <div class="mt-3">
                        <h2 class="mb-1 font-semibold text-gray-700 dark:text-gray-300">Tanggal Kepulangan</h2>
                        <div
                            class="text-sm text-gray-700 dark:text-gray-300 [&>ol]:list-decimal [&>ol]:space-y-1 [&>ol]:ps-7 [&>p]:mb-2 [&>table]:table-auto [&>table]:border [&>td]:border [&>th]:border [&>th]:bg-gray-100 [&>ul]:list-disc [&>ul]:space-y-1 [&>ul]:ps-7">
                            {{ \Carbon\Carbon::parse($data['package']->return_date)->translatedFormat('d F Y') }}
                        </div>
                    </div>

                    <div class="mt-3">
                        <h2 class="mb-1 font-semibold text-gray-700 dark:text-gray-300">Fasilitas</h2>
                        <div
                            class="text-sm text-gray-700 dark:text-gray-300 [&>ol]:list-decimal [&>ol]:space-y-1 [&>ol]:ps-7 [&>p]:mb-2 [&>table]:table-auto [&>table]:border [&>td]:border [&>th]:border [&>th]:bg-gray-100 [&>ul]:list-disc [&>ul]:space-y-1 [&>ul]:ps-7">
                            {!! $data['package']->facilities !!}
                        </div>
                    </div>

                    <div class="mt-4">
                        <h2 class="mb-1 font-semibold text-gray-700 dark:text-gray-300">Deskripsi</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            {{ strip_tags($data['package']->description) }}
                        </p>
                    </div>
                </div>

                <div class="mt-6">
                    <span class="mb-1 block text-xs text-gray-500">
                        Anda harus login terlebih dahulu <span class="text-red-500">*</span>
                    </span>
                    <a href="{{ route('login') }}"
                        class="inline-block w-full rounded-lg bg-blue-600 px-6 py-3 text-center text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-800">
                        Masuk
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
