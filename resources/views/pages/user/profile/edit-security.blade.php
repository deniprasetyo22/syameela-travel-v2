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
                <h2 class="text-lg font-bold text-gray-900 dark:text-white">Edit Keamanan</h2>
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

            <form action="{{ route('update-security') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="new_password" class="block text-sm font-medium text-gray-900 dark:text-white">
                        Kata Sandi Baru
                    </label>
                    <input type="password" name="new_password" id="new_password"
                        class="@error('new_password') border-red-500 @else border-gray-300 @enderror mt-2 block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                        required placeholder="********">
                    @error('new_password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="new_password_confirmation"
                        class="block text-sm font-medium text-gray-900 dark:text-white">
                        Konfirmasi Kata Sandi Baru
                    </label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                        class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                        required placeholder="********">
                </div>

                <div class="mt-6">
                    <a href="{{ route('profile-security') }}"
                        class="mb-2 me-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                        Batal
                    </a>
                    <button type="submit"
                        class="mb-2 me-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
