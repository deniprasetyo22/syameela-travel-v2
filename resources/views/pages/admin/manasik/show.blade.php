<x-layout :title="$data['title']">
    <div class="mb-4 h-auto p-4 pt-20 md:ml-64">
        <div class="rounded-lg border border-gray-200 bg-white p-2 dark:bg-gray-900">
            <div class="p-2">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Detail Jadwal Manasik</h2>

                <div class="grid gap-4 text-sm text-gray-900 sm:grid-cols-2 sm:gap-6 dark:text-white">
                    <div class="sm:col-span-2">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Paket</label>
                        <div
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                            {{ $data['manasik']->registration->package->name }}</div>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Registrasi</label>
                        <div
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                            {{ $data['manasik']->registration->registration_number }}</div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                        <div
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                            {{ \Carbon\Carbon::parse($data['manasik']->date)->translatedFormat('d F Y, H:i') }}
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Lokasi</label>
                        <div
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                            {{ $data['manasik']->location }}
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                        <div
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                            {!! $data['manasik']->note ?? 'Tidak ada catatan' !!}
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('manasik-dashboard') }}"
                        class="mb-2 me-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:hover:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                        Kembali
                    </a>
                    <a href="{{ route('edit-manasik', $data['manasik']->id) }}"
                        class="mb-2 me-2 rounded-lg bg-yellow-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-yellow-600 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        Ubah
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
