<x-layout :title="$data['title']">
    <div class="mx-4 mb-10 mt-20 grid gap-4 bg-white antialiased md:grid-cols-4 dark:bg-gray-900">
        <div class="rounded-md bg-gray-50">
            <h2 class="my-2 text-center text-lg font-bold text-gray-900 dark:text-white">Informasi Keberangkatan</h2>
            <ul class="mx-4 space-y-2" id="profile-tabs" role="tablist">
                <li>
                    <form method="GET" action="{{ route('my-trips') }}">
                        <input type="hidden" name="type" value="">
                        <button type="submit"
                            class="{{ request('type') == '' ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                            <i
                                class="fa-solid fa-list flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                            Semua
                        </button>
                    </form>
                </li>
                <li>
                    <form method="GET" action="{{ route('my-trips') }}">
                        <input type="hidden" name="type" value="Haji">
                        <button type="submit"
                            class="{{ request('type') == 'Haji' ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                            <i
                                class="fa-solid fa-list flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                            Haji
                        </button>
                    </form>
                </li>
                <li>
                    <form method="GET" action="{{ route('my-trips') }}">
                        <input type="hidden" name="type" value="Umroh">
                        <button type="submit"
                            class="{{ request('type') == 'Umroh' ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                            <i
                                class="fa-solid fa-list flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                            Umroh
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="rounded-md bg-gray-50 px-4 py-2 md:col-span-3">
            <h2 class="mb-4 text-center text-sm font-bold text-gray-900 md:text-left md:text-xl dark:text-white">Detail
                Perjalanan
                {{ $data['trip']->registration->registration_number }}</h2>

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
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama
                        Pemandu</label>
                    <div
                        class="rounded-lg border border-gray-300 bg-gray-50 p-2.5 dark:border-gray-600 dark:bg-gray-700">
                        {{ $data['trip']->guide_name }}</div>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Titik
                        Kumpul</label>
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

            <div class="mb-4 mt-6">
                <a href="{{ route('my-trips') }}"
                    class="mb-2 me-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:hover:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</x-layout>
