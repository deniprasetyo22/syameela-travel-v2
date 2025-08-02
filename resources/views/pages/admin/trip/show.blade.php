<x-layout :title="$data['title']">
    <div class="mb-4 h-auto p-4 pt-20 md:ml-64">
        <div class="rounded-lg border border-gray-200 bg-white p-2 dark:bg-gray-900">
            <div class="p-2">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Detail Perjalanan</h2>

                <div class="grid gap-4 text-sm text-gray-900 sm:grid-cols-2 sm:gap-6 dark:text-white">
                    <div class="sm:col-span-2">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Registrasi</label>
                        <div
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                            {{ $data['trip']->registration->registration_number }}</div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Keberangkatan</label>
                        <div
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                            {{ \Carbon\Carbon::parse($data['trip']->departure_date)->translatedFormat('d F Y, H:i') }}
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Kepulangan</label>
                        <div
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                            {{ \Carbon\Carbon::parse($data['trip']->return_date)->translatedFormat('d F Y, H:i') }}
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Pemandu</label>
                        <div
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                            {{ $data['trip']->guide_name }}</div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Titik Kumpul</label>
                        <div
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                            {{ $data['trip']->gathering_location }}</div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Maskapai</label>
                        <div
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                            {{ $data['trip']->airline }}</div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Penerbangan</label>
                        <div
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                            {{ $data['trip']->flight_number }}</div>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Visa</label>
                        <div
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                            <a href="{{ asset($data['trip']->visa) }}" target="_blank"
                                class="inline-flex items-center text-blue-600 hover:underline">
                                Lihat Visa
                            </a>
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tiket</label>
                        <div
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                            <a href="{{ asset($data['trip']->ticket) }}" target="_blank"
                                class="inline-flex items-center text-blue-600 hover:underline">
                                Lihat Tiket
                            </a>
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                            Informasi Hotel
                        </label>
                        <div
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                            {!! $data['trip']->hotel_info !!}
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Informasi
                            Perlengkapan</label>
                        <div
                            class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                            {!! $data['trip']->equipment_info !!}</div>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('trip-dashboard') }}"
                        class="mb-2 me-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:hover:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                        Kembali
                    </a>
                    <a href="{{ route('edit-trip', $data['trip']->id) }}"
                        class="mb-2 me-2 rounded-lg bg-yellow-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-yellow-600 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        Ubah
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
