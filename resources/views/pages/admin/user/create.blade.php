<x-layout :title="$data['title']">
    <div class="mb-4 h-auto p-4 pt-20 md:ml-64">
        <div class="rounded-lg border border-gray-200 bg-white p-2 dark:bg-gray-900">
            <div class="p-2">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Pengguna Baru</h2>

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

                <form action="{{ route('store-user') }}" method="POST">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="w-full">
                            <label for="full_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Nama Lengkap
                            </label>
                            <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('full_name') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Nama Lengkap" required="" autofocus>
                            @error('full_name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="username" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Nama Pengguna
                            </label>
                            <input type="text" name="username" id="username" value="{{ old('username') }}"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('username') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Nama Pengguna" required="">
                            @error('username')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="email"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat
                                Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('email') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="email@example.com" required="">
                            @error('email')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="role_id"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Peran</label>
                            <select name="role_id" id="role_id"
                                class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('role_id') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                required>
                                <option value="" disabled selected>Pilih Peran</option>
                                @foreach ($data['roles'] as $role)
                                    <option value="{{ $role->id }}" @selected(old('role_id') == $role->id)>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="password" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Kata Sandi
                            </label>
                            <input type="password" name="password" id="password"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('password') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="••••••••" required="">
                            @error('password')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="password_confirmation"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Konfirmasi Kata Sandi
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 @error('password_confirmation') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="••••••••" required="">
                            @error('password_confirmation')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('users') }}"
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
</x-layout>
