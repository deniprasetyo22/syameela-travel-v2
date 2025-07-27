<x-layout :title="$title">
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="mx-auto flex flex-col items-center justify-center px-6 py-8 md:h-screen">
            <div
                class="mt-12 w-full rounded-lg bg-white shadow sm:max-w-md dark:border dark:border-gray-700 dark:bg-gray-800">
                <div class="space-y-4 p-6 sm:p-8 md:space-y-6">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Registrasi Akun
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('attempt_register') }}" method="POST">
                        @csrf
                        <div>
                            <label for="full_name"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                            <input type="text" name="full_name" id="full_name"
                                class="focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Nama Lengkap" required>
                        </div>
                        <div>
                            <label for="username"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama
                                Pengguna</label>
                            <input type="text" name="username" id="username"
                                class="focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Nama Pengguna" required>
                        </div>
                        <div>
                            <label for="email"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat
                                Email</label>
                            <input type="email" name="email" id="email"
                                class="focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="email@example.com" required>
                        </div>
                        <div>
                            <label for="password"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Kata Sandi</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                required>
                        </div>
                        <button type="submit"
                            class="bg-primary-600 hover:bg-primary-700 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 w-full rounded-lg px-5 py-2.5 text-center text-sm font-medium text-white focus:outline-none focus:ring-4">
                            Registrasi</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Sudah punya akun? <a href="{{ route('login') }}"
                                class="text-primary-600 dark:text-primary-500 font-medium hover:underline">
                                Masuk disini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
