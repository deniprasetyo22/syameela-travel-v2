<x-layout :title="$data['title']">
    <div class="mx-4 mb-10 mt-20 grid gap-4 bg-white antialiased md:grid-cols-5 dark:bg-gray-900">
        <x-main-menu-user />
        <div class="rounded-md bg-gray-50 md:col-span-2">
            <h2 class="px-4 py-2 text-lg font-bold text-gray-900 dark:text-white">Paket Haji</h2>
            <div class="mx-4 space-y-2">
                <div class="w-full">
                    <form class="flex items-center gap-4" method="GET" action="{{ route('hajj') }}">
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
                        <a href="{{ route('hajj') }}"
                            class="flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                            Reset
                        </a>
                    </form>
                </div>
                <div class="w-full">
                    @forelse ($data['allPackages'] as $package)
                        <div class="mb-2">
                            <a href="{{ route('show-hajj-list', $package->id) }}"
                                class="shadow-xs flex flex-col items-center rounded-lg border border-gray-200 bg-white hover:bg-gray-100 md:max-w-xl md:flex-row dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <img class="h-96 w-full rounded-t-lg object-cover md:h-auto md:w-32 md:rounded-none md:rounded-s-lg"
                                    src="{{ asset($package->image) }}" alt="">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $package->name }}
                                    </h5>
                                    <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        {!! Str::limit($package->description, 50, '...') !!}
                                    </div>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        {{ Number::currency($package->price, 'Rp ', 'id', 0) }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="w-full">
                            <h5 class="text-center text-lg font-medium tracking-tight text-gray-700 dark:text-white">
                                Tidak ada data
                            </h5>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="rounded-md bg-gray-50 md:col-span-2">
            @if (session()->has('success'))
                <div class="mb-2 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="p-4">
                <form action="{{ route('submit-hajj-package', $data['package']->id) }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div
                            class="shadow-xs w-full rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
                            <div>
                                <img class="rounded-t-lg" src="{{ asset($data['package']->image) }}" alt="" />
                            </div>
                            <div class="p-5">
                                <div>
                                    <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $data['package']->name }}
                                    </h5>
                                </div>

                                <div class="mb-3 flex items-center justify-between text-gray-700 dark:text-gray-400">
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-users text-gray-500"></i>
                                        <span class="font-semibold">Kuota:</span>
                                    </div>
                                    <span>{{ $data['package']->quota }}</span>
                                </div>

                                <div class="mb-3 flex items-center justify-between text-gray-700 dark:text-gray-400">
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-money-bill-wave text-gray-500"></i>
                                        <span class="font-semibold">Harga:</span>
                                    </div>
                                    <span>{{ Number::currency($data['package']->price, 'Rp ', 'id', 0) }}</span>
                                </div>

                                <div class="mb-3 flex items-center justify-between text-gray-700 dark:text-gray-400">
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-calendar-days text-gray-500"></i>
                                        <span class="font-semibold">Tanggal Keberangkatan:</span>
                                    </div>
                                    <span>{{ \Carbon\Carbon::parse($data['package']->departure_date)->translatedFormat('d F Y') }}</span>
                                </div>

                                <div class="mb-3 flex items-center justify-between text-gray-700 dark:text-gray-400">
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-calendar-days text-gray-500"></i>
                                        <span class="font-semibold">Tanggal Kepulangan:</span>
                                    </div>
                                    <span>{{ \Carbon\Carbon::parse($data['package']->return_date)->translatedFormat('d F Y') }}</span>
                                </div>

                                <div class="mb-3 text-gray-700 dark:text-gray-400">
                                    <label for="description" class="font-semibold">Deskripsi:</label>
                                    <div>{!! $data['package']->description !!}</div>
                                </div>

                                <div class="mb-3 text-gray-700 dark:text-gray-400">
                                    <label for="facilities" class="font-semibold">Fasilitas:</label>
                                    <div>{!! $data['package']->facilities !!}</div>
                                </div>
                            </div>
                        </div>

                        {{-- Method Payment --}}
                        <div class="shadow-xs rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-700">
                            <h3 class="text-md mb-4 font-semibold text-gray-800 dark:text-white">Metode Pembayaran
                            </h3>
                            <div class="mb-4 flex flex-col gap-3">
                                {{-- Payment Method --}}
                                <div class="flex flex-wrap gap-4">
                                    <div class="flex items-center space-x-2">
                                        <input type="radio" id="full" name="payment_scheme" value="full_payment"
                                            class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700"
                                            onclick="toggleInstallment(false)">
                                        <label for="full" class="text-sm font-medium text-gray-700 dark:text-white">
                                            Pembayaran Penuh
                                        </label>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <input type="radio" id="installment" name="payment_scheme" value="installment"
                                            class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700"
                                            onclick="toggleInstallment(true)">
                                        <label for="installment"
                                            class="text-sm font-medium text-gray-700 dark:text-white">
                                            Cicilan
                                        </label>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <input type="radio" id="ccl" name="payment_scheme" value="ccl"
                                            class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700"
                                            onclick="toggleInstallment(false)">
                                        <label for="ccl"
                                            class="text-sm font-medium text-gray-700 dark:text-white">
                                            Tempo
                                        </label>
                                    </div>
                                </div>

                                {{-- Installment Options --}}
                                <div id="installmentOptions" class="mt-2 hidden">
                                    <label for="installment_duration"
                                        class="mb-1 block text-sm font-medium text-gray-700 dark:text-white">
                                        Pilih Jangka Waktu Cicilan
                                    </label>
                                    <select name="installment_duration" id="installment_duration"
                                        class="w-full rounded-lg border-gray-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                                        <option disabled selected>-- Pilih Durasi --</option>
                                        <option value="installment_3">3 Bulan</option>
                                        <option value="installment_6">6 Bulan</option>
                                        <option value="installment_9">9 Bulan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Button --}}
                        <div id="submit-button">
                            <div id="missing-message" class="mb-2 hidden">
                                <p class="text-xs text-red-500">Anda harus melengkapi semua data dan dokumen wajib
                                    terlebih
                                    dahulu
                                </p>
                            </div>
                            <button type="submit" id="submitBtn"
                                class="w-full cursor-pointer rounded-lg bg-blue-600 px-6 py-3 text-sm font-medium text-white hover:bg-blue-700">
                                Lanjutkan Pembayaran
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const requiredDocs = ['id_card', 'family_card', 'passport', 'photo'];
            const userDocuments = @json($data['user']->documents ?? []);
            const nationalId = "{{ $data['user']->profile->national_id }}";
            const familyCardNumber = "{{ $data['user']->profile->family_card_number }}";

            const submitBtn = document.getElementById('submitBtn');
            const message = document.getElementById('missing-message');

            const missingDocs = requiredDocs.some(field => !userDocuments[field]);
            const missingProfile = !nationalId || !familyCardNumber;

            if (missingDocs || missingProfile) {
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed', 'bg-gray-600');
                submitBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
                message.classList.remove('hidden');
            }
        });


        function toggleInstallment(show) {
            const section = document.getElementById('installmentOptions');
            if (show) {
                section.classList.remove('hidden');
            } else {
                section.classList.add('hidden');
            }
        }
    </script>
</x-layout>
