<x-layout :title="$data['title']">
    <div class="mb-4 h-auto p-4 pt-20 md:ml-64">
        <div class="rounded-lg border border-gray-200 bg-white p-2 dark:bg-gray-900">
            <div class="p-2">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Perjalanan Baru</h2>

                @if ($errors->any())
                    <div class="mb-4 flex items-center rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <ul class="list-inside list-disc pl-4">
                            @foreach ($errors->all() as $error)
                                <li class="font-medium">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('store-trip') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="registration_id"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nomor
                                Registrasi</label>
                            <select id="registration_id" name="registration_id" class="">
                                <option value="" disabled selected>Pilih Nomor Registrasi</option>
                                @foreach ($data['transactions'] as $transaction)
                                    <option value="{{ $transaction->id }}"
                                        data-departure="{{ $transaction->package->departure_date }}"
                                        data-return="{{ $transaction->package->return_date }}"
                                        data-visa="{{ $transaction->user->documents->visa ?? '' }}">
                                        {{ $transaction->registration_number }}
                                    </option>
                                @endforeach

                            </select>
                            @error('registration_id')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="departure_date"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Tanggal Keberangkatan
                            </label>
                            <input type="datetime-local" name="departure_date" id="departure_date"
                                value="{{ old('departure_date') }}"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('departure_date') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-white p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                required="">
                            @error('departure_date')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="return_date"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Tanggal Kepulangan
                            </label>
                            <input type="datetime-local" name="return_date" id="return_date"
                                value="{{ old('return_date') }}"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('return_date') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-white p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                required="">
                            @error('return_date')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="guide_name"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Nama Pemandu
                            </label>
                            <input type="text" name="guide_name" id="guide_name" value="{{ old('guide_name') }}"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('guide_name') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-white p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Nama Pemandu" required="">
                            @error('guide_name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="gathering_location"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Titik Kumpul
                            </label>
                            <input type="text" name="gathering_location" id="gathering_location"
                                value="{{ old('gathering_location') }}"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('gathering_location') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-white p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Titik Kumpul" required="">
                            @error('gathering_location')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="airline" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Maskapai Penerbangan
                            </label>
                            <select name="airline" id="airline"
                                class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('airline') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-white p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                required>
                                <option value="" disabled selected>Pilih Maskapai Penegerbangan</option>
                                <option value="Garuda Indonesia" @selected(old('airline') == 'Garuda Indonesia')>Garuda Indonesia</option>
                                <option value="Lion Air" @selected(old('airline') == 'Lion Air')>Lion Air</option>
                                <option value="Sriwijaya Air" @selected(old('airline') == 'Sriwijaya Air')>Sriwijaya Air</option>
                                <option value="Citilink" @selected(old('airline') == 'Citilink')>Citilink</option>
                                <option value="Batik Air" @selected(old('airline') == 'Batik Air')>Batik Air</option>
                                <option value="AirAsia" @selected(old('airline') == 'AirAsia')>AirAsia
                                </option>
                                <option value="Susi Air" @selected(old('airline') == 'Susi Air')>Susi Air</option>
                                <option value="Wings Air" @selected(old('airline') == 'Wings Air')>Wings Air</option>
                                <option value="Super Air Jet" @selected(old('airline') == 'Super Air Jet')>Super Air Jet</option>
                            </select>
                            @error('airline')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="flight_number"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Nomor Penerbangan
                            </label>
                            <input type="text" name="flight_number" id="flight_number"
                                value="{{ old('flight_number') }}"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('flight_number') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-white p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Nomor Penerbangan" required="">
                            @error('flight_number')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Visa <span class="text-xs text-gray-400">*PDF (Max. 5MB)</span>
                            </label>

                            {{-- Preview visa jika sudah ada --}}
                            <div id="visa-preview" class="mb-2 hidden rounded-lg border border-gray-300 p-2">
                                <a id="visa-link" href="#" target="_blank"
                                    class="inline-flex items-center text-sm text-blue-600 hover:underline dark:text-blue-400">
                                    Lihat Visa
                                </a>
                            </div>

                            {{-- Input file visa (muncul hanya kalau belum ada visa) --}}
                            <input type="file" name="visa" id="visa-file"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('visa') border-red-500 @else border-gray-300 @enderror block w-full cursor-pointer rounded-lg border bg-white text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                                accept="application/pdf">

                            @error('visa')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="ticket"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Tiket <span class="text-xs text-gray-400">*PDF (Max. 5MB)</span>
                            </label>
                            <input type="file" name="ticket" id="ticket"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('ticket') border-red-500 @else border-gray-300 @enderror block w-full cursor-pointer rounded-lg border bg-white text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                                required="" accept="application/pdf">
                            @error('ticket')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="hotel_info"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Informasi Hotel
                            </label>
                            <textarea rows="10" name="hotel_info" id="formTextArea"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('hotel_info') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-white p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Informasi Hotel">{{ old('hotel_info') }}</textarea>
                            @error('hotel_info')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="equipment_info"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Informasi Perlengkapan
                            </label>
                            <textarea rows="10" name="equipment_info" id="formTextArea"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('equipment_info') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-white p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Informasi Perlengkapan">{{ old('equipment_info') }}</textarea>
                            @error('equipment_info')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('trip-dashboard') }}"
                            class="mb-2 me-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:hover:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                            Batal
                        </a>
                        <button type="submit"
                            class="mb-2 me-2 cursor-pointer rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const registrationSelect = document.getElementById('registration_id');
            const departureInput = document.getElementById('departure_date');
            const returnInput = document.getElementById('return_date');

            const visaPreview = document.getElementById('visa-preview');
            const visaLink = document.getElementById('visa-link');
            const visaFileInput = document.getElementById('visa-file');

            // base URL untuk storage
            const STORAGE_BASE = "{{ asset('storage') }}";

            function toLocalDatetimeString(dateString) {
                if (!dateString) return '';
                const d = new Date(dateString);
                const y = d.getFullYear();
                const m = String(d.getMonth() + 1).padStart(2, '0');
                const day = String(d.getDate()).padStart(2, '0');
                const h = String(d.getHours()).padStart(2, '0');
                const min = String(d.getMinutes()).padStart(2, '0');
                return `${y}-${m}-${day}T${h}:${min}`;
            }

            function showVisaPreview(visaPath) {
                // Bersihkan sisa input file
                visaFileInput.value = '';
                visaFileInput.required = false;
                visaFileInput.classList.add('hidden');

                // Tampilkan preview dan buat link
                const cleanedPath = visaPath.replace(/^\/?storage\//, '');
                visaLink.href = `${STORAGE_BASE}/${cleanedPath}`;
                visaPreview.classList.remove('hidden');
            }

            function showVisaUploaderRequired() {
                visaPreview.classList.add('hidden');
                visaLink.href = '#';

                visaFileInput.classList.remove('hidden');
                visaFileInput.required = true;
                visaFileInput.value = '';
            }

            registrationSelect.addEventListener('change', function() {
                const opt = registrationSelect.options[registrationSelect.selectedIndex];
                const dep = opt.getAttribute('data-departure');
                const ret = opt.getAttribute('data-return');
                const visa = opt.getAttribute('data-visa');

                if (dep) departureInput.value = toLocalDatetimeString(dep);
                if (ret) returnInput.value = toLocalDatetimeString(ret);

                // Jika ada visa, tampilkan link; jika kosong, tampilkan input file
                if (visa && visa.trim() !== '') {
                    showVisaPreview(visa);
                } else {
                    showVisaUploaderRequired();
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            new TomSelect("#registration_id", {
                create: false,
                placeholder: "Pilih Nomor Registrasi",
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });
        });
    </script>

</x-layout>
