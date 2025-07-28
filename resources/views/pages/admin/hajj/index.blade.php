<x-layout :title="$data['title']">
    <div class="mb-4 h-auto p-4 pt-20 md:ml-64">
        <div class="rounded-lg border border-gray-200 bg-white p-2 dark:bg-gray-900">
            <div class="p-2">
                @if (session()->has('success'))
                    <div class="mb-2 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="flex flex-col items-center justify-between py-2 md:flex-row md:space-x-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center gap-4" method="GET" action="{{ route('hajj-dashboard') }}">
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
                            <a href="{{ route('hajj-dashboard') }}"
                                class="flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                Reset
                            </a>
                        </form>
                    </div>
                    <div
                        class="mt-2 flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0">
                        <a href="{{ route('create-hajj') }}"
                            class="bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 flex items-center justify-center rounded-lg px-4 py-2 text-sm font-medium text-white focus:outline-none focus:ring-4">
                            <i class="fa-solid fa-plus mr-2"></i>
                            Tambah Paket
                        </a>
                    </div>
                </div>
                <div class="relative w-full overflow-x-auto">
                    <table class="w-full min-w-[640px] text-left text-sm dark:text-gray-400">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No</th>
                                <th scope="col" class="px-4 py-3">Nama Paket</th>
                                <th scope="col" class="px-4 py-3">Harga</th>
                                <th scope="col" class="px-4 py-3">Kuota</th>
                                <th scope="col" class="px-4 py-3">Tanggal Berangkat</th>
                                <th scope="col" class="px-4 py-3">Tanggal Kembali</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data['packages']->isEmpty())
                                <tr>
                                    <td colspan="6" class="px-4 py-3 text-center">Tidak ada data</td>
                                </tr>
                            @else
                                @foreach ($data['packages'] as $package)
                                    @php
                                        $dropdownId = 'dropdown-' . $package->id;
                                        $buttonId = 'dropdown-button-' . $package->id;
                                        $modalId = 'delete-modal-' . $package->id;
                                    @endphp
                                    <tr class="odd:bg-white even:bg-gray-50 dark:border-gray-700">
                                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-3">{{ $package->name }}</td>
                                        <td class="px-4 py-3">Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                                        <td class="px-4 py-3">{{ $package->quota }}</td>
                                        <td class="px-4 py-3">
                                            {{ \Carbon\Carbon::parse($package->departure_date)->translatedFormat('j F Y, H:i') }}
                                            WIB
                                        </td>
                                        <td class="px-4 py-3">
                                            {{ \Carbon\Carbon::parse($package->return_date)->translatedFormat('j F Y, H:i') }}
                                            WIB
                                        </td>
                                        <td class="flex items-center justify-end px-4 py-3">
                                            <div class="relative inline-block text-left">
                                                <button id="{{ $buttonId }}"
                                                    data-dropdown-toggle="{{ $dropdownId }}"
                                                    class="inline-flex cursor-pointer items-center rounded-md bg-white px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">
                                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M6 10a2 2 0 114 0 2 2 0 01-4 0zm5 0a2 2 0 114 0 2 2 0 01-4 0zm5 0a2 2 0 114 0 2 2 0 01-4 0z" />
                                                    </svg>
                                                </button>
                                                <div id="{{ $dropdownId }}"
                                                    class="z-10 hidden w-32 divide-y divide-gray-100 rounded-lg bg-white shadow">
                                                    <ul class="py-2 text-sm text-gray-700"
                                                        aria-labelledby="{{ $buttonId }}">
                                                        <li>
                                                            <a href="{{ route('show-hajj', $package->id) }}"
                                                                class="block px-4 py-2 hover:bg-gray-100">Lihat</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('edit-hajj', $package->id) }}"
                                                                class="block px-4 py-2 hover:bg-gray-100">Ubah</a>
                                                        </li>
                                                        <li>
                                                            <button data-modal-target="{{ $modalId }}"
                                                                data-modal-toggle="{{ $modalId }}"
                                                                class="block w-full cursor-pointer px-4 py-2 text-left hover:bg-gray-100"
                                                                type="button">
                                                                Hapus
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div id="{{ $modalId }}" tabindex="-1"
                                        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                        <div class="relative max-h-full w-full max-w-md p-4">
                                            <div class="relative rounded-lg bg-white shadow-sm dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="{{ $modalId }}">
                                                    <svg class="h-3 w-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 text-center md:p-5">
                                                    <svg class="mx-auto mb-4 h-12 w-12 text-gray-400 dark:text-gray-200"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3
                                                        class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                        Yakin ingin menghapus <b>{{ $package->package_name }}</b>?
                                                    </h3>
                                                    <form action="{{ route('destroy-hajj', $package->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button data-modal-hide="{{ $modalId }}" type="submit"
                                                            class="inline-flex cursor-pointer items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                                            Ya, Hapus
                                                        </button>
                                                        <button data-modal-hide="{{ $modalId }}" type="button"
                                                            class="ms-3 cursor-pointer rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                                            Batal
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="p-4">
                        {{ $data['packages']->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
