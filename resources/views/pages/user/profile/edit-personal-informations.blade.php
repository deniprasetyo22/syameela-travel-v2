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
                        class="{{ request()->routeIs('profile-documents') ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
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
        <div class="rounded-md bg-gray-50 md:col-span-3">
            {{-- Informasi Pribadi --}}
            <div class="mx-4 my-2">
                <div class="mb-6">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white">Edit Informasi Pribadi</h2>
                </div>

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

                <form action="{{ route('update-personal-informations') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                        <input type="text" name="full_name" value="{{ old('full_name', $data['user']->full_name) }}"
                            class="@error('full_name') border-red-500 @else border-gray-300 @enderror w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                            required>
                        @error('full_name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama
                            Pengguna</label>
                        <input type="text" name="username" value="{{ old('username', $data['user']->username) }}"
                            class="@error('username') border-red-500 @else border-gray-300 @enderror w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                            required>
                        @error('username')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat Email</label>
                        <input type="email" name="email" value="{{ old('email', $data['user']->email) }}"
                            class="@error('email') border-red-500 @else border-gray-300 @enderror w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                            required>
                        @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Kelamin</label>
                        <select name="gender"
                            class="@error('gender') border-red-500 @else border-gray-300 @enderror w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                            <option value="Laki-laki"
                                {{ $data['user']->profile->gender == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan"
                                {{ $data['user']->profile->gender == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                        @error('gender')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                        <input type="text" name="national_id" maxlength="16" inputmode="numeric"
                            value="{{ old('national_id', $data['user']->profile->national_id) }}"
                            class="@error('national_id') border-red-500 @else border-gray-300 @enderror w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        @error('national_id')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">KK</label>
                        <input type="text" name="family_card_number" maxlength="16" inputmode="numeric"
                            value="{{ old('family_card_number', $data['user']->profile->family_card_number) }}"
                            class="@error('family_card_number') border-red-500 @else border-gray-300 @enderror w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        @error('family_card_number')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Telepon</label>
                        <input type="text" name="phone" value="{{ old('phone', $data['user']->profile->phone) }}"
                            class="@error('phone') border-red-500 @else border-gray-300 @enderror w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        @error('phone')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea name="address" rows="3"
                            class="@error('address') border-red-500 @else border-gray-300 @enderror w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white">{{ old('address', $data['user']->profile->address) }}</textarea>
                        @error('address')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                            Foto
                        </label>
                        <input type="file" name="profile_picture" id="profile_picture"
                            class="@error('profile_picture') border-red-500 @else border-gray-300 @enderror block w-full cursor-pointer rounded-lg border bg-gray-50 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400"
                            accept="image/*">
                        <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengganti gambar.</p>
                        <img src="{{ $data['user']->profile->profile_picture ?? asset('img/default-profile-picture.png') }}"
                            alt="Profile Picture" class="mt-2 h-auto w-48 rounded-lg">
                        @error('profile_picture')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('profile') }}"
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
