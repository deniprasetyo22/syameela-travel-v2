<div>
    @if (Auth::check() && Auth::user()->hasVerifiedEmail() && Auth::user()->role_id == 1)
        <footer class="bg-gray-100 p-4 md:ml-64 md:px-6 md:py-4 dark:bg-gray-800">
            <span class="flex justify-center text-sm text-gray-500 sm:text-center dark:text-gray-400">
                ©{{ date('Y') }} Travel Syamilah. All Rights Reserved.
            </span>
        </footer>
    @else
        <footer class="bg-gray-100 p-4 md:px-6 md:py-4 dark:bg-gray-800">
            <div class="mx-auto">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 flex flex-col justify-between md:mb-0">
                        <div class="flex items-center">
                            <img src="{{ asset('img/logo.png') }}" class="mr-3 h-8" alt="Logo Travel Syamilah" />
                            <span class="self-center whitespace-nowrap text-2xl font-semibold dark:text-white">
                                Travel Syamilah
                            </span>
                        </div>
                        <div class="my-6 md:p-2">
                            <a href="https://wa.me/6283844682472" target="_blank" rel="noopener noreferrer"
                                class="bg-primary-600 hover:bg-primary-700 focus:ring-primary-400 inline-flex items-center justify-center rounded-full p-2 text-white focus:outline-none focus:ring-2">
                                <i class="fa-brands fa-whatsapp text-lg"></i>
                            </a>
                            <a href="https://web.facebook.com/people/Syameela-Id/pfbid04TEnpstXsBUVUzHo1G7ipR9k58tXamQB6joEpQd2vns28wYdjT33tUVwGY6CHtZVl"
                                target="_blank" rel="noopener noreferrer"
                                class="bg-primary-600 hover:bg-primary-700 focus:ring-primary-400 inline-flex items-center justify-center rounded-full p-2 text-white focus:outline-none focus:ring-2">
                                <i class="fa-brands fa-facebook text-lg"></i>
                            </a>
                            <a href="https://instagram.com/syameela.travel" target="_blank" rel="noopener noreferrer"
                                class="bg-primary-600 hover:bg-primary-700 focus:ring-primary-400 inline-flex items-center justify-center rounded-full p-2 text-white focus:outline-none focus:ring-2">
                                <i class="fa-brands fa-instagram text-lg"></i>
                            </a>
                            <a href="https://www.tiktok.com/@syameelatravel" target="_blank" rel="noopener noreferrer"
                                class="bg-primary-600 hover:bg-primary-700 focus:ring-primary-400 inline-flex items-center justify-center rounded-full p-2 text-white focus:outline-none focus:ring-2">
                                <i class="fa-brands fa-tiktok text-lg"></i>
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-8 sm:grid-cols-4 sm:gap-6">
                        <div>
                            <h2 class="mb-4 text-sm font-semibold uppercase text-gray-900 dark:text-white">
                                Tautan Cepat
                            </h2>
                            <ul class="space-y-2 text-gray-600 dark:text-gray-400">
                                <li><a href="{{ route('home') }}" class="hover:underline">Beranda</a></li>
                                <li><a href="{{ route('testimonials') }}" class="hover:underline">Testimoni</a></li>
                                <li><a href="{{ route('contact') }}" class="hover:underline">Kontak</a></li>
                            </ul>
                        </div>

                        <div>
                            <h2 class="mb-4 text-sm font-semibold uppercase text-gray-900 dark:text-white">
                                Paket Perjalanan
                            </h2>
                            <ul class="space-y-2 text-gray-600 dark:text-gray-400">
                                <li><a href="{{ route('hajj') }}" class="hover:underline">Paket Haji</a></li>
                                <li><a href="{{ route('umrah') }}" class="hover:underline">Paket Umrah</a></li>
                            </ul>
                        </div>

                        <div>
                            <h2 class="mb-4 text-sm font-semibold uppercase text-gray-900 dark:text-white">
                                Media Sosial
                            </h2>
                            <ul class="space-y-2 text-gray-600 dark:text-gray-400">
                                <li><a href="https://web.facebook.com/people/Syameela-Id/pfbid04TEnpstXsBUVUzHo1G7ipR9k58tXamQB6joEpQd2vns28wYdjT33tUVwGY6CHtZVl"
                                        class="hover:underline">Facebook</a></li>
                                <li><a href="https://instagram.com/syameela.travel"
                                        class="hover:underline">Instagram</a></li>
                                <li><a href="https://www.tiktok.com/@syameelatravel" class="hover:underline">Tiktok</a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h2 class="mb-4 text-sm font-semibold uppercase text-gray-900 dark:text-white">
                                Hubungi Kami
                            </h2>
                            <ul class="space-y-2 text-gray-600 dark:text-gray-400">
                                <li>
                                    <a href="https://wa.me/6283844682472" class="hover:underline">
                                        <i class="fa-brands fa-whatsapp"></i>
                                        <span>+6283844682472</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:travelsyameela@gmail.com" class="hover:underline">
                                        <i class="fa-solid fa-envelope"></i>
                                        <span>travelsyameela@gmail.com</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr class="my-4 border-gray-200 sm:mx-auto lg:my-4 dark:border-gray-700" />

                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="flex justify-center text-sm text-gray-500 sm:text-center dark:text-gray-400">
                        ©{{ date('Y') }} Travel Syamilah. All Rights Reserved.
                    </span>
                </div>
            </div>
        </footer>
    @endif
</div>
