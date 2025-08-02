<x-layout :title="$title">
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="mx-auto flex flex-col items-center justify-center px-6 py-8 md:h-screen lg:py-0">
            <div
                class="mt-12 w-full rounded-lg bg-white shadow sm:max-w-md md:mt-0 xl:p-0 dark:border dark:border-gray-700 dark:bg-gray-800">
                <div class="space-y-4 p-6 sm:p-8 md:space-y-6">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Masuk ke Akun Anda
                    </h1>
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
                    @if (session('status'))
                        <div class="mb-4 rounded-lg bg-green-100 p-3 text-sm text-green-700">
                            {{ session('status') === __('passwords.reset')
                                ? 'Password berhasil direset. Silakan login dengan password baru Anda.'
                                : session('status') }}
                        </div>
                    @endif
                    <form class="space-y-4 md:space-y-6" action="{{ route('attempt_login') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat
                                Email</label>
                            <input type="email" name="email" id="email"
                                class="focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="email@example.com" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Kata Sandi</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="focus:ring-primary-600 focus:border-primary-600 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                required="">
                        </div>
                        <div class="flex items-center justify-between">
                            {{-- <div class="flex items-start">
                                <div class="flex h-5 items-center">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 h-4 w-4 rounded border border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800"
                                        required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div> --}}
                            <a href="{{ route('password.request') }}"
                                class="text-primary-600 dark:text-primary-500 text-sm font-medium hover:underline">
                                Lupa password?
                            </a>
                        </div>
                        <button type="submit"
                            class="bg-primary-600 hover:bg-primary-700 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 w-full rounded-lg px-5 py-2.5 text-center text-sm font-medium text-white focus:outline-none focus:ring-4">
                            Masuk
                        </button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Belum punya akun? <a href="{{ route('register') }}"
                                class="text-primary-600 dark:text-primary-500 font-medium hover:underline">Daftar
                                disini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
