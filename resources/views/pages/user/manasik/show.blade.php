<x-layout :title="$data['title']">
    <div class="mx-4 mb-10 mt-20 grid gap-4 bg-white antialiased md:grid-cols-5 dark:bg-gray-900">
        <x-main-menu-user />
        <div class="rounded-md bg-gray-50 md:col-span-4">
            <h2 class="px-4 py-2 text-lg font-bold text-gray-900 dark:text-white">Detail Jadwal Manasik
                {{ $data['manasik']->registration->registration_number }}</h2>
            @if (session()->has('success'))
                <div class="mx-4 mb-2 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mx-4 space-y-2 pb-4">
                <div class="rounded-md bg-gray-50">
                    <div class="grid gap-4 text-sm text-gray-900 sm:grid-cols-2 sm:gap-6 dark:text-white">
                        <div class="sm:col-span-2">
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama
                                Paket</label>
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
                </div>

                <div class="mt-6">
                    <a href="{{ route('my-manasik') }}"
                        class="mb-2 me-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:hover:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
