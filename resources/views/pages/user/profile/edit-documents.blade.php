<x-layout :title="$data['title']">
    <div class="mx-4 mb-10 mt-20 grid gap-4 bg-white antialiased md:grid-cols-5 dark:bg-gray-900">
        <x-main-menu-user />
        <div class="rounded-md bg-gray-50">
            <h2 class="my-2 text-center text-lg font-bold text-gray-900 dark:text-white">Profil Saya</h2>
            <ul class="mx-4 space-y-2" id="profile-tabs" role="tablist">
                <li>
                    <a href="{{ route('profile') }}"
                        class="{{ request()->routeIs(['profile', 'edit-personal-informations']) ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                        <i
                            class="fa-solid fa-user flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                        Informasi Pribadi
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile-documents') }}"
                        class="{{ request()->routeIs(['profile-documents', 'edit-profile-documents']) ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                        <i
                            class="fa-solid fa-folder-open flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                        Dokumen
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile-security') }}"
                        class="{{ request()->routeIs(['profile-security', 'edit-security']) ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                        <i
                            class="fa-solid fa-lock flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                        Keamanan
                    </a>
                </li>
            </ul>
        </div>

        <div class="rounded-md bg-gray-50 p-4 md:col-span-3 dark:bg-gray-800">
            <div class="mb-6">
                <h2 class="text-lg font-bold text-gray-900 dark:text-white">Edit Dokumen</h2>
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

            <form action="{{ route('update-profile-documents') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6 w-full">
                    <label for="id_card" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                        KTP <span class="text-red-500">*</span><span class="text-xs text-gray-400">(*Max 3MB)</span>
                    </label>
                    <input type="file" name="id_card" id="id_card"
                        class="@error('id_card') border-red-500 @else border-gray-300 @enderror block w-full cursor-pointer rounded-lg border bg-gray-50 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400"
                        accept="image/*">
                    <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengganti gambar.</p>
                    @if (!empty($data['user']->documents->id_card))
                        <img src="{{ $data['user']->documents->id_card }}" alt="KTP"
                            class="mt-2 h-auto w-48 rounded-lg">
                    @endif
                </div>

                <div class="mb-6 w-full">
                    <label for="family_card" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                        KK <span class="text-red-500">*</span><span class="text-xs text-gray-400">(*Max 3MB)</span>
                    </label>
                    <input type="file" name="family_card" id="family_card"
                        class="@error('family_card') border-red-500 @else border-gray-300 @enderror block w-full cursor-pointer rounded-lg border bg-gray-50 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400"
                        accept="image/*">
                    <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengganti gambar.</p>
                    @if (!empty($data['user']->documents->family_card))
                        <img src="{{ $data['user']->documents->family_card }}" alt="KK"
                            class="mt-2 h-auto w-48 rounded-lg">
                    @endif
                </div>

                <div class="mb-6 w-full">
                    <label for="passport" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                        Paspor <span class="text-red-500">*</span> <span class="text-xs text-gray-400">(*Max 3MB)</span>
                    </label>
                    <input type="file" name="passport" id="passport"
                        class="@error('passport') border-red-500 @else border-gray-300 @enderror block w-full cursor-pointer rounded-lg border bg-gray-50 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400"
                        accept="image/*">
                    <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengganti gambar.</p>
                    @if (!empty($data['user']->documents->passport))
                        <img src="{{ $data['user']->documents->passport }}" alt="Paspor"
                            class="mt-2 h-auto w-48 rounded-lg">
                    @endif
                </div>

                <div class="mb-6 w-full">
                    <label for="photo" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                        Foto <span class="text-red-500">*</span><span class="text-xs text-gray-400">(*Max 3MB)</span>
                    </label>
                    <input type="file" name="photo" id="photo"
                        class="@error('photo') border-red-500 @else border-gray-300 @enderror block w-full cursor-pointer rounded-lg border bg-gray-50 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400"
                        accept="image/*">
                    <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengganti gambar.</p>
                    @if (!empty($data['user']->documents->photo))
                        <img src="{{ $data['user']->documents->photo }}" alt="Foto"
                            class="mt-2 h-auto w-48 rounded-lg">
                    @endif
                </div>

                <div class="mb-6 w-full">
                    <label for="marriage_book" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                        Buku Nikah <span class="text-xs text-gray-400">(*Max 3MB)</span>
                    </label>
                    <input type="file" name="marriage_book" id="marriage_book"
                        class="@error('marriage_book') border-red-500 @else border-gray-300 @enderror block w-full cursor-pointer rounded-lg border bg-gray-50 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400"
                        accept="image/*">
                    <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengganti gambar.</p>
                    @if (!empty($data['user']->documents->marriage_book))
                        <img src="{{ $data['user']->documents->marriage_book }}" alt="Buku Nikah"
                            class="mt-2 h-auto w-48 rounded-lg">
                    @endif
                </div>

                <div class="mb-6 w-full">
                    <label for="vaccine_certificate"
                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                        Surat Vaksin <span class="text-xs text-gray-400">(*Max 3MB)</span>
                    </label>
                    <input type="file" name="vaccine_certificate" id="vaccine_certificate"
                        class="@error('vaccine_certificate') border-red-500 @else border-gray-300 @enderror block w-full cursor-pointer rounded-lg border bg-gray-50 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400"
                        accept="image/*">
                    <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengganti gambar.</p>
                    @if (!empty($data['user']->documents->vaccine_certificate))
                        <img src="{{ $data['user']->documents->vaccine_certificate }}" alt="KTP"
                            class="mt-2 h-auto w-48 rounded-lg">
                    @endif
                </div>

                <div class="mt-6">
                    <a href="{{ route('profile-documents') }}"
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
</x-layout>
