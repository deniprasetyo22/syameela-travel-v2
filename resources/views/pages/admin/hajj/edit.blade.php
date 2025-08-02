<x-layout :title="'Edit Paket Haji'">
    <div class="mb-4 h-auto p-4 pt-20 md:ml-64">
        <div class="rounded-lg border border-gray-200 bg-white p-2 dark:bg-gray-900">
            <div class="p-2">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Paket Haji</h2>

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

                <form action="{{ route('update-hajj', $data['package']->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Nama Paket
                            </label>
                            <input type="text" name="name" id="name"
                                value="{{ old('name', $data['package']->name) }}"
                                class="@error('name') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                placeholder="Nama Paket" required>
                        </div>

                        <div class="w-full">
                            <label for="price" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Harga
                            </label>
                            <input type="number" name="price" id="price"
                                value="{{ old('price', $data['package']->price) }}"
                                class="@error('price') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                placeholder="Rp 1.000.000" required>
                        </div>

                        <div class="w-full">
                            <label for="quota" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Kuota
                            </label>
                            <input type="number" name="quota" id="quota"
                                value="{{ old('quota', $data['package']->quota) }}"
                                class="@error('quota') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                placeholder="Kuota" required>
                        </div>

                        <div class="w-full">
                            <label for="departure_date"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Tanggal Keberangkatan
                            </label>
                            <input type="datetime-local" name="departure_date" id="departure_date"
                                value="{{ old('departure_date', date('Y-m-d\TH:i', strtotime($data['package']->departure_date))) }}"
                                class="@error('departure_date') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                required>
                        </div>

                        <div class="w-full">
                            <label for="return_date"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Tanggal Kepulangan
                            </label>
                            <input type="datetime-local" name="return_date" id="return_date"
                                value="{{ old('return_date', date('Y-m-d\TH:i', strtotime($data['package']->return_date))) }}"
                                class="@error('return_date') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                required>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="image" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Gambar Baru (Opsional)
                            </label>
                            <input type="file" name="image" id="image"
                                class="@error('image') border-red-500 @else border-gray-300 @enderror block w-full cursor-pointer rounded-lg border bg-gray-50 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400"
                                accept="image/*">
                            <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengganti gambar.</p>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="description"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Deskripsi
                            </label>
                            <textarea rows="10" name="description" id="formTextArea"
                                class="@error('description') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                placeholder="Deskripsi">{{ old('description', $data['package']->description) }}</textarea>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="facilities"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Fasilitas
                            </label>
                            <textarea rows="10" name="facilities" id="formTextArea"
                                class="@error('facilities') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                placeholder="Fasilitas">{{ old('facilities', $data['package']->facilities) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('hajj-dashboard') }}"
                            class="mb-2 me-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                            Batal
                        </a>
                        <button type="submit"
                            class="mb-2 me-2 cursor-pointer rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
