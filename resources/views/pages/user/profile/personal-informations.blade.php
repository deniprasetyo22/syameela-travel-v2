<x-layout :title="$data['title']">
    <div class="mx-4 mb-10 mt-20 grid gap-4 bg-white antialiased md:grid-cols-5 dark:bg-gray-900">
        <x-main-menu-user />
        <div class="rounded-md bg-gray-50">
            <h2 class="my-2 text-center text-lg font-bold text-gray-900 dark:text-white">Profil Saya</h2>
            <ul class="mx-4 space-y-2" id="profile-tabs" role="tablist">
                <li>
                    <a href="{{ route('profile') }}"
                        class="{{ request()->routeIs('profile') ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
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
                        class="{{ request()->routeIs('profile-security') ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                        <i
                            class="fa-solid fa-lock flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                        Keamanan
                    </a>
                </li>
            </ul>
        </div>
        <div class="rounded-md bg-gray-50 md:col-span-3">
            @if (session()->has('success'))
                <div class="mb-2 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mx-4 my-2">
                <div class="flex justify-between">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white">Informasi Pribadi</h2>
                    <a href="{{ route('edit-personal-informations') }}"
                        class="mb-2 me-2 rounded-lg bg-yellow-400 px-5 py-2.5 text-sm font-medium text-white hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-900">
                        <i
                            class="fa-solid fa-pen-to-square flex w-6 justify-center text-white transition duration-75 group-hover:text-gray-900 dark:text-gray-100 dark:group-hover:text-white"></i>
                        Edit
                    </a>
                </div>
                <div class="space-y-6">
                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                        <p
                            class="rounded-lg border border-gray-200 bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {{ $data['user']->full_name }}
                        </p>
                    </div>
                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama
                            Pengguna</label>
                        <p
                            class="rounded-lg border border-gray-200 bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {{ $data['user']->username }}
                        </p>
                    </div>
                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat Email</label>
                        <p
                            class="rounded-lg border border-gray-200 bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {{ $data['user']->email }}
                        </p>
                    </div>
                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Kelamin</label>
                        <p
                            class="rounded-lg border border-gray-200 bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {{ $data['user']->profile->gender }}
                        </p>
                    </div>
                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                        <p
                            class="{{ $data['user']->profile->national_id ? 'text-gray-800 dark:text-white' : 'text-gray-500' }} rounded-lg border border-gray-200 bg-gray-100 p-2.5 text-sm dark:bg-gray-700">
                            {{ $data['user']->profile->national_id ?? 'Anda belum mengisi NIK' }}
                        </p>
                    </div>
                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">KK</label>
                        <p
                            class="{{ $data['user']->profile->family_card_number ? 'text-gray-800 dark:text-white' : 'text-gray-500' }} rounded-lg border border-gray-200 bg-gray-100 p-2.5 text-sm dark:bg-gray-700">
                            {{ $data['user']->profile->family_card_number ?? 'Anda belum mengisi KK' }}
                        </p>
                    </div>
                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Telepon</label>
                        <p
                            class="rounded-lg border border-gray-200 bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {{ $data['user']->profile->phone }}
                        </p>
                    </div>
                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <p
                            class="rounded-lg border border-gray-200 bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {{ $data['user']->profile->address }}
                        </p>
                    </div>
                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Foto Profil</label>
                        <img class="h-auto w-48 rounded-lg border border-gray-200 bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white"
                            src="{{ $data['user']->profile->profile_picture ?? asset('img/default-profile-picture.png') }}"
                            alt="image description"></img>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
