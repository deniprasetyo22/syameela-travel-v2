<x-layout :title="$data['title']">
    <div class="mb-4 h-auto p-4 pt-20 md:ml-64">
        <div class="rounded-lg border border-gray-200 bg-white p-2 dark:bg-gray-900">
            <div class="p-2">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Ubah Jadwal Manasik</h2>

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

                <form action="{{ route('update-manasik', $data['manasik']->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="registration_id"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nomor
                                Registrasi</label>
                            <select name="registration_id" id="registration_id" required>
                                <option disabled
                                    {{ old('registration_id', $data['manasik']->registration_id) ? '' : 'selected' }}>
                                    Pilih Nomor Registrasi
                                </option>
                                @foreach ($data['registrations'] as $registration)
                                    <option value="{{ $registration->id }}"
                                        {{ old('registration_id', $data['manasik']->registration_id) == $registration->id ? 'selected' : '' }}>
                                        {{ $registration->registration_number }}
                                    </option>
                                @endforeach
                            </select>
                            @error('registration_id')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="date" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Tanggal
                            </label>
                            <input type="datetime-local" name="date" id="date"
                                value="{{ old('date', $data['manasik']->date) }}"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('date') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-white p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                required="">
                            @error('date')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="location" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Lokasi
                            </label>
                            <input type="text" name="location" id="location"
                                value="{{ old('location', $data['manasik']->location) }}"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('location') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-white p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Nama Pemandu" required="">
                            @error('location')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="note" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Informasi Perlengkapan
                            </label>
                            <textarea rows="10" name="note" id="formTextArea"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('note') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-white p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Informasi Perlengkapan">{{ old('note', $data['manasik']->note) }}</textarea>
                            @error('note')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('manasik-dashboard') }}"
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
