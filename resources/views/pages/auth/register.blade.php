<x-layout :title="$title">
    <section class="bg-white dark:bg-gray-900">
        <div class="mx-auto flex h-auto justify-center p-4 pt-20">
            <div class="w-full rounded-lg bg-white shadow sm:max-w-xl dark:border dark:border-gray-700 dark:bg-gray-800">
                <div class="space-y-4 p-6 sm:p-8 md:space-y-6">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Registrasi Akun
                    </h1>

                    @if ($errors->any())
                        <div class="mb-4 rounded bg-red-100 p-4 text-sm text-red-700 dark:bg-red-700 dark:text-white">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="space-y-4 md:space-y-6" action="{{ route('attempt_register') }}" method="POST">
                        @csrf

                        {{-- Nama Lengkap --}}
                        <div>
                            <label for="full_name"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama
                                Lengkap</label>
                            <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}"
                                class="focus:ring-primary-600 focus:border-primary-600 @error('full_name') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Nama Lengkap" required>
                            @error('full_name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Username --}}
                        <div>
                            <label for="username"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama
                                Pengguna</label>
                            <input type="text" name="username" id="username" value="{{ old('username') }}"
                                class="focus:ring-primary-600 focus:border-primary-600 @error('username') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Nama Pengguna" required>
                            @error('username')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat
                                Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="focus:ring-primary-600 focus:border-primary-600 @error('email') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="email@example.com" required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Jenis Kelamin --}}
                        <div>
                            <label for="gender"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Kelamin</label>
                            <select name="gender" id="gender"
                                class="focus:ring-primary-600 focus:border-primary-600 @error('gender') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                                <option disabled selected value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                </option>
                                <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                            @error('gender')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Nomor Telepon --}}
                        <div>
                            <label for="phone"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nomor
                                Telepon</label>
                            <input type="number" maxlength="15" name="phone" id="phone"
                                value="{{ old('phone') }}"
                                class="focus:ring-primary-600 focus:border-primary-600 @error('phone') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                placeholder="+62 123 456 789" required>
                            @error('phone')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Alamat --}}
                        <div>
                            <label for="address"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <textarea name="address" id="address" rows="3" placeholder="Alamat Lengkap"
                                class="focus:ring-primary-600 focus:border-primary-600 @error('address') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white">{{ old('address') }}</textarea>
                            @error('address')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div>
                            <label for="password"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Kata Sandi</label>
                            <input type="password" name="password" id="password"
                                class="focus:ring-primary-600 focus:border-primary-600 @error('password') border-red-500 @else border-gray-300 @enderror block w-full rounded-lg border bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                placeholder="••••••••" required>
                            @error('password')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div>
                            <label for="password_confirmation"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Kata
                                Sandi</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                placeholder="••••••••" required>
                        </div>

                        {{-- Tombol --}}
                        <button type="submit"
                            class="bg-primary-600 hover:bg-primary-700 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 w-full rounded-lg px-5 py-2.5 text-center text-sm font-medium text-white focus:outline-none focus:ring-4">
                            Registrasi
                        </button>

                        {{-- Link Masuk --}}
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Sudah punya akun? <a href="{{ route('login') }}"
                                class="text-primary-600 dark:text-primary-500 font-medium hover:underline">Masuk
                                disini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
