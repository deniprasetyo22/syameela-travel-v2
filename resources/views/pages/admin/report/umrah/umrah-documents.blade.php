<x-layout :title="$data['title']">
    <div class="mb-4 h-auto p-4 pt-20 md:ml-64">
        <div class="rounded-lg border border-gray-200 bg-white p-2 dark:bg-gray-900">
            <div class="p-2">
                <div class="flex flex-col items-center justify-between pb-2 md:flex-row md:space-x-4">
                    <div class="w-full md:w-1/2">
                        <h1 class="mb-2 text-lg font-bold text-gray-900 dark:text-white">Export Dokumen Jamaah Umroh</h1>
                    </div>
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center gap-4" method="GET"
                            action="{{ route('report-umrah-documents') }}">
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
                                    placeholder="Cari nama, nama pengguna, nomor registrasi">
                            </div>
                            <a href="{{ route('report-umrah-documents') }}"
                                class="flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                Reset
                            </a>
                        </form>
                    </div>
                </div>
                <div class="relative w-full overflow-x-auto">
                    <table class="w-full min-w-[640px] text-left text-sm dark:text-gray-400">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No</th>
                                <th scope="col" class="px-4 py-3">Nama</th>
                                <th scope="col" class="px-4 py-3">Nama Pengguna</th>
                                <th scope="col" class="px-4 py-3">Alamat Email</th>
                                <th scope="col" class="px-4 py-3">Paket</th>
                                <th scope="col" class="px-4 py-3">Nomor Registrasi</th>
                                <th scope="col" class="px-4 py-3">Dokumen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data['jamaah']->isEmpty())
                                <tr>
                                    <td colspan="6" class="px-4 py-3 text-center">Tidak ada data</td>
                                </tr>
                            @else
                                @foreach ($data['jamaah'] as $jamaah)
                                    <tr class="odd:bg-white even:bg-gray-50 dark:border-gray-700">
                                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-3">{{ $jamaah->user->full_name }}</td>
                                        <td class="px-4 py-3">{{ $jamaah->user->username }}</td>
                                        <td class="px-4 py-3">{{ $jamaah->user->email }}</td>
                                        <td class="px-4 py-3">{{ $jamaah->package->name }}</td>
                                        <td class="px-4 py-3">{{ $jamaah->registration_number }}</td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('export-umrah-documents', $jamaah->id) }}" target="_blank"
                                                class="flex items-center justify-center rounded-lg bg-green-500 px-4 py-2 text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                <i class="fa-solid fa-download mr-2"></i>
                                                Export
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="p-4">
                        {{ $data['jamaah']->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
