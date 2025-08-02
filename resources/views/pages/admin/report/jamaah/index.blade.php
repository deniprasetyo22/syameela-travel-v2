<x-layout :title="$data['title']">
    <div class="mb-4 h-auto p-4 pt-20 md:ml-64">
        <div class="rounded-lg border border-gray-200 bg-white p-2 dark:bg-gray-900">
            <div class="p-2">
                <div class="flex flex-col items-center justify-between pb-2 md:flex-row md:space-x-4">
                    <div class="w-full md:w-1/2">
                        <h1 class="mb-2 text-lg font-bold text-gray-900 dark:text-white">Export Data Jamaah</h1>
                    </div>
                    <div
                        class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0">
                        <a href="{{ route('export-jamaah') }}" target="_blank"
                            class="flex items-center justify-center rounded-lg bg-green-500 px-4 py-2 text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            <i class="fa-solid fa-download mr-2"></i>
                            Export
                        </a>
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
