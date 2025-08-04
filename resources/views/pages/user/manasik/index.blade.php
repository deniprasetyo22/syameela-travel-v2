<x-layout :title="$data['title']">
    <div class="mx-4 mb-10 mt-20 grid gap-4 bg-white antialiased md:grid-cols-5 dark:bg-gray-900">
        <x-main-menu-user />
        <div class="relative overflow-x-auto rounded-md bg-gray-50 md:col-span-4">
            <h2 class="px-4 py-2 text-lg font-bold text-gray-900 dark:text-white">Jadwal Manasik</h2>
            @if (session()->has('success'))
                <div class="mb-2 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mx-4 space-y-2">
                <div class="w-full">
                    <form class="flex items-center gap-4" method="GET" action="{{ route('my-manasik') }}">
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
                                placeholder="Cari nama paket atau nomor registrasi">
                        </div>
                        <a href="{{ route('my-manasik') }}"
                            class="flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Reset
                        </a>
                    </form>
                </div>
                <div class="relative overflow-x-auto rounded-md bg-gray-50">
                    <div class="shadow-xs relative rounded-lg border border-gray-200 bg-white dark:bg-gray-700">
                        <table class="w-full min-w-[640px] text-left text-sm dark:text-gray-400">
                            <thead
                                class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">No</th>
                                    <th scope="col" class="px-4 py-3">Paket</th>
                                    <th scope="col" class="px-4 py-3">Tipe</th>
                                    <th scope="col" class="px-4 py-3">Nomor Registrasi</th>
                                    <th scope="col" class="px-4 py-3">Tanggal</th>
                                    <th scope="col" class="px-4 py-3">Lokasi</th>
                                    <th scope="col" class="px-4 py-3">Catatan</th>
                                    <th scope="col" class="px-4 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($data['manasiks']->isEmpty())
                                    <tr>
                                        <td colspan="6" class="px-4 py-3 text-center">Tidak ada data</td>
                                    </tr>
                                @else
                                    @foreach ($data['manasiks'] as $manasik)
                                        @php
                                            $dropdownId = 'dropdown-' . $manasik->id;
                                            $buttonId = 'dropdown-button-' . $manasik->id;
                                            $modalId = 'delete-modal-' . $manasik->id;
                                        @endphp
                                        <tr class="odd:bg-white even:bg-gray-50 dark:border-gray-700">
                                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                            <td class="px-4 py-3">{{ $manasik->registration->package->name }}</td>
                                            <td class="px-4 py-3">{{ $manasik->registration->package->type }}</td>
                                            <td class="px-4 py-3">{{ $manasik->registration->registration_number }}</td>
                                            <td class="px-4 py-3">
                                                {{ \Carbon\Carbon::parse($manasik->date)->translatedFormat('j F Y, H:i') }}
                                            </td>
                                            <td class="px-4 py-3">{{ $manasik->location }}</td>
                                            <td class="px-4 py-3">
                                                <div>
                                                    {!! $manasik->note !!}
                                                </div>
                                            </td>
                                            <td class="flex items-center justify-end px-4 py-3">
                                                <a href="{{ route('show-my-manasik', ['id' => $manasik->id]) }}"
                                                    class="inline-flex items-center text-sm text-blue-600 hover:underline">
                                                    Lihat
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="p-4">
                            {{ $data['manasiks']->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
