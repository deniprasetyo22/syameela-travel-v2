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
                    <li>
                        <div class="flex items-center">
                            <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" fill="none" viewBox="0 0 6 10"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M1 9l4-4-4-4" />
                            </svg>
                            <a href="{{ route('show-hajj-package', $data['package']->id) }}"
                                class="ms-1 hover:text-blue-600 md:ms-2 dark:hover:text-white">
                                Detail Paket
                            </a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" fill="none" viewBox="0 0 6 10"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M1 9l4-4-4-4" />
                            </svg>
                            <span class="ms-1 md:ms-2">Pemesanan</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        @if ($errors->any())
            <div class="mb-4 rounded bg-red-100 p-4 text-sm text-red-700 dark:bg-red-700 dark:text-white">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Title --}}
        <h1 class="mb-6 text-2xl font-bold text-gray-900 dark:text-white">
            Periksa Pemesanan Paket Anda
        </h1>

        {{-- Main Grid --}}
        <form action="{{ route('submit-hajj-package', $data['package']->id) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                {{-- Left Column --}}
                <div class="space-y-4">
                    {{-- Package Info --}}
                    <div
                        class="shadow-xs flex items-center space-x-4 rounded-lg border border-gray-200 p-4 dark:border-gray-700">
                        <img src="{{ asset($data['package']->image) }}" class="h-24 w-24 rounded object-cover"
                            alt="Package Image">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $data['package']->name }}
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $data['package']->hotel }}</p>
                            <p class="font-bold text-blue-600">
                                {{ Number::currency($data['package']->price, 'Rp ', 'id', 0) }}</p>
                        </div>
                    </div>

                    {{-- Personal Information --}}
                    <div class="shadow-xs rounded-lg border border-gray-200 p-4 dark:border-gray-700">
                        <h3 class="text-md mb-4 font-semibold text-gray-800 dark:text-white">Informasi Pribadi</h3>
                        <div class="space-y-4">
                            <div class="w-full">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                    Nama Lengkap
                                </label>
                                <p
                                    class="rounded-lg border border-gray-200 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                                    {{ $data['user']->full_name }}
                                </p>
                            </div>
                            <div class="w-full">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                    Alamat Email
                                </label>
                                <p
                                    class="rounded-lg border border-gray-200 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                                    {{ $data['user']->email }}
                                </p>
                            </div>
                            <div class="w-full">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                    NIK
                                </label>
                                <p
                                    class="rounded-lg border border-gray-200 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                                    {{ $data['user']->profile->national_id ?? '-' }}
                                </p>
                            </div>
                            <div class="w-full">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                    KK
                                </label>
                                <p
                                    class="rounded-lg border border-gray-200 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                                    {{ $data['user']->profile->family_card_number ?? '-' }}
                                </p>
                            </div>
                            <div class="w-full">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                    Jenis Kelamin
                                </label>
                                <p
                                    class="rounded-lg border border-gray-200 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                                    {{ $data['user']->profile->gender }}
                                </p>
                            </div>
                            <div class="w-full">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                    Nomor Telepon
                                </label>
                                <p
                                    class="rounded-lg border border-gray-200 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                                    {{ $data['user']->profile->phone }}
                                </p>
                            </div>
                            <div class="w-full">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                    Alamat
                                </label>
                                <p
                                    class="rounded-lg border border-gray-200 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                                    {{ $data['user']->profile->address }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Document Upload --}}
                    <div class="shadow-xs rounded-lg border border-gray-200 p-4 dark:border-gray-700">
                        <h3 class="text-md mb-4 font-semibold text-gray-800 dark:text-white">Dokumen</h3>
                        @php
                            $documents = [
                                'id_card' => 'KTP',
                                'family_card' => 'KK',
                                'passport' => 'Paspor',
                                'photo' => 'Foto',
                                'marriage_book' => 'Buku Nikah',
                                'vaccine_certificate' => 'Surat Vaksin'
                            ];
                        @endphp

                        @foreach ($documents as $field => $label)
                            <div class="mb-6">
                                <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $label }}
                                    @if (in_array($field, ['id_card', 'family_card', 'passport', 'photo']))
                                        <span class="text-red-500">*</span>
                                    @endif
                                </label>
                                @if ($data['user']->documents?->$field)
                                    <div class="flex items-center justify-between gap-2">
                                        <a href="{{ asset($data['user']->documents->$field) }}" target="_blank"
                                            class="inline-block w-full rounded-lg border border-gray-200 bg-white p-2.5 text-sm text-blue-600 hover:underline dark:bg-gray-700 dark:text-blue-400">
                                            Lihat {{ $label }}
                                        </a>
                                    </div>
                                @else
                                    <p
                                        class="rounded-lg border border-gray-200 bg-white p-2.5 text-sm text-gray-500 dark:bg-gray-700 dark:text-white">
                                        Anda belum mengunggah {{ $label }}
                                    </p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Right Column --}}
                <div class="space-y-4">
                    {{-- Booking Summary --}}
                    <div class="shadow-xs rounded-lg border border-gray-200 p-4 dark:border-gray-700">
                        <h3 class="text-md mb-2 font-semibold text-gray-800 dark:text-white">Detail Pesanan</h3>
                        <p>Paket: <strong>{{ $data['package']->name }}</strong></p>
                        <p>Tanggal Keberangkatan:
                            <strong>{{ \Carbon\Carbon::parse($data['package']->departure_date)->translatedFormat('d F Y') }}</strong>
                        </p>
                        <p>Tanggal Kepulangan:
                            <strong>{{ \Carbon\Carbon::parse($data['package']->return_date)->translatedFormat('d F Y') }}</strong>
                        </p>
                    </div>

                    {{-- Price Summary --}}
                    <div class="shadow-xs rounded-lg border border-gray-200 p-4 dark:border-gray-700">
                        <h3 class="text-md mb-2 font-semibold text-gray-800 dark:text-white">Rincian Harga</h3>
                        <div class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                            <div class="flex justify-between">
                                <span>Total</span><span>{{ Number::currency($data['package']->price, 'Rp ', 'id', 0) }}</span>
                            </div>
                            <div class="flex justify-between border-t pt-2 font-bold text-black dark:text-white">
                                <span>Total</span><span>{{ Number::currency($data['package']->price, 'Rp ', 'id', 0) }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Method Payment --}}
                    <div class="shadow-xs rounded-lg border border-gray-200 p-4 dark:border-gray-700">
                        <h3 class="text-md mb-4 font-semibold text-gray-800 dark:text-white">Metode Pembayaran</h3>
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
                                    <label for="ccl" class="text-sm font-medium text-gray-700 dark:text-white">
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
                            <p class="text-xs text-red-500">Anda harus melengkapi semua data dan dokumen wajib terlebih
                                dahulu
                            </p>
                        </div>
                        <button type="submit" id="submitBtn"
                            class="w-full cursor-pointer rounded-lg bg-blue-600 px-6 py-3 text-sm font-medium text-white hover:bg-blue-700">
                            Lanjutkan Pembayaran
                        </button>
                    </div>
                </div>
            </div>
        </form>
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
    </script>


</x-layout>
