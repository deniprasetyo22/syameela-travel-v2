<x-layout :title="$data['title']">
    {{-- Hero Section --}}
    <section id="hero" class="md:pt-30 bg-gray-500 bg-cover bg-center bg-no-repeat pt-20 bg-blend-multiply"
        style="background-image: url('{{ asset('img/hero.png') }}')">
        <div class="mx-auto grid max-w-screen-xl px-4 md:pt-20 lg:grid-cols-12 lg:gap-8 xl:gap-0">
            <div class="my-10 mr-auto md:my-0 lg:col-span-7">
                <h1
                    class="md:mt-25 mb-4 max-w-2xl text-center text-2xl font-extrabold leading-none tracking-tight text-white md:text-center md:text-5xl lg:text-left xl:text-6xl">
                    Agen Travel Haji dan Umroh Terbaik
                </h1>
                <p
                    class="mb-6 max-w-xl text-center font-light text-white md:block md:text-left md:text-lg lg:mb-8 lg:text-xl dark:text-gray-400">
                    Menjadi sahabat para calon tamu Allah untuk memudahkan menuju tanah suci dengan mudah dan amanah
                </p>
            </div>
            <div class="hidden lg:col-span-5 lg:mt-0 lg:flex">
                <img src="{{ asset('img/hero-2.png') }}" alt="mockup">
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section id="about" class="bg-gray-100 px-4 py-6 antialiased dark:bg-gray-900">
        <div class="mx-auto grid rounded-lg p-4 md:p-8 lg:grid-cols-12 lg:gap-8 lg:p-16 xl:gap-16 dark:bg-gray-800">
            <div class="me-auto place-self-center lg:col-span-7">
                <h1
                    class="mb-5 text-center text-xl font-bold leading-tight tracking-tight text-blue-500 md:text-left md:text-2xl dark:text-white">
                    Tentang Kami
                </h1>
                <h1
                    class="mb-3 text-2xl font-bold leading-tight tracking-tight text-gray-900 md:text-4xl dark:text-white">
                    Kenapa Memilih Kami?
                </h1>
                <p class="mb-5 text-justify text-gray-500 md:text-left dark:text-gray-400">
                    Syameela Travel adalah travel agency terpercaya yang berfokus pada perjalanan religi, hemat, dan
                    nyaman
                    untuk keluarga, pelajar, maupun komunitas. Berdiri sejak 2021, kami telah melayani ratusan jamaah
                    dalam
                    destinasi ziarah, ibadah umrah, hingga tur budaya Islam baik dalam maupun luar negeri.
                    Dengan pendekatan personal dan profesional, Travel Syamilah berkomitmen memberikan layanan terbaik
                    dari
                    konsultasi, perjalanan, hingga layanan purna jual untuk mewujudkan pengalaman spiritual yang aman,
                    nyaman, dan berkah.
                </p>
                <a href="{{ route('about') }}"
                    class="bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 dark:focus:ring-primary-900 md:text-md inline-flex items-center justify-center rounded-lg px-4 py-2.5 text-center text-xs font-medium text-white focus:ring-4 md:px-4 md:py-2.5">
                    Lihat Detail <i class="fa-solid fa-arrow-right ml-2"></i> </a>
            </div>
            <div class="mt-5 flex justify-center lg:col-span-5 lg:mt-0">
                <a href="#">
                    <img class="mb-4 h-72 w-72 sm:h-96 sm:w-96 md:h-full md:w-full dark:hidden"
                        src="{{ asset('img/about.png') }}" alt="about" />
                </a>
            </div>
        </div>
    </section>

    {{-- Packages Section --}}
    <section id="packages" class="bg-white py-10 dark:bg-gray-900">
        <div class="mx-auto mb-20 max-w-screen-xl px-4">
            <div class="mb-6">
                <div class="flex justify-center md:items-center md:justify-between">
                    <h2
                        class="mb-4 text-center text-3xl font-extrabold tracking-tight text-gray-900 md:text-left lg:text-4xl dark:text-white">
                        Paket Haji
                    </h2>
                    <a href="{{ route('hajj') }}"
                        class="hidden items-center text-sm font-medium text-blue-600 hover:underline md:inline-flex">
                        Lihat Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                </div>
                <p class="text-center font-light text-gray-500 sm:text-left sm:text-xl dark:text-gray-400">
                    Pilihan paket Haji terbaik untuk kenyamanan ibadah Anda, dengan fasilitas lengkap dan bimbingan
                    profesional.
                </p>
            </div>
            <div class="grid grid-cols-1 place-items-center gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($data['hajj'] as $hajj)
                    <div
                        class="max-w-sm rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <img class="rounded-t-lg" src="{{ asset($hajj->image) }}" alt="{{ $hajj->name }}" />
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $hajj->name }}
                                </h5>
                            </a>
                            <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {!! Str::limit($hajj->description, 100, '...') !!}
                            </div>
                            <a href="{{ route('show-hajj-package', $hajj->id) }}"
                                class="inline-flex items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Lihat Detail <i class="fa-solid fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500 dark:text-gray-400">
                        Tidak ada paket Haji yang tersedia saat ini.
                    </div>
                @endforelse
                <div>
                    <a href="{{ route('hajj') }}"
                        class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline md:hidden">
                        Lihat selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="mx-auto max-w-screen-xl px-4 lg:px-6">
            <div class="mb-6">
                <div class="flex justify-center md:items-center md:justify-between">
                    <h2
                        class="mb-4 text-center text-3xl font-extrabold tracking-tight text-gray-900 md:text-left lg:text-4xl dark:text-white">
                        Paket Umroh
                    </h2>
                    <a href="{{ route('umrah') }}"
                        class="hidden items-center text-sm font-medium text-blue-600 hover:underline md:inline-flex">
                        Lihat Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                </div>
                <p class="text-center font-light text-gray-500 sm:text-left sm:text-xl dark:text-gray-400">
                    Pilihan paket Umroh lengkap dan nyaman untuk menemani perjalanan ibadah Anda ke Tanah Suci.
                </p>
            </div>
            <div class="grid grid-cols-1 place-items-center gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($data['umrah'] as $umrah)
                    <div
                        class="max-w-sm rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <a href="#">
                            <img class="rounded-t-lg" src="{{ asset($umrah->image) }}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $umrah->name }}
                                </h5>
                            </a>
                            <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {!! Str::limit($umrah->description, 100, '...') !!}
                            </div>
                            <a href="{{ route('show-umrah-package', $umrah->id) }}"
                                class="inline-flex items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Lihat Detail <i class="fa-solid fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500 dark:text-gray-400">
                        Tidak ada paket Umrah yang tersedia saat ini.
                    </div>
                @endforelse

                <div>
                    <a href="{{ route('umrah') }}"
                        class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline md:hidden">
                        Lihat selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonials Section --}}
    <section id="testimonials" class="bg-gray-100 dark:bg-gray-900">
        <div class="mx-auto max-w-screen-xl px-4 py-8 text-center lg:px-6 lg:py-10">
            <div class="mx-auto max-w-screen-lg">
                <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">Testimoni</h2>
                <p class="mb-8 font-light text-gray-500 sm:text-xl dark:text-gray-400">
                    Pengalaman jamaah yang telah berangkat bersama kami ke Tanah Suci.
                </p>
            </div>
            <div class="mb-8 flex w-full justify-center">
                <div class="grid w-full max-w-4xl grid-cols-1 items-center gap-6 md:grid-cols-2">
                    @foreach ($data['testimonials'] as $testimonial)
                        @php
                            $id = $testimonial->id;
                        @endphp
                        <div
                            class="h-fit rounded-lg border border-gray-200 bg-white p-4 shadow dark:border-gray-700 dark:bg-gray-800">
                            <div class="mb-4 text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                                <div id="content-{{ $id }}"
                                    class="max-h-30 relative overflow-hidden transition-all duration-300">
                                    {!! $testimonial->content !!}
                                </div>

                                @if (strlen($testimonial->content) > 100)
                                    <div id="more-{{ $id }}"
                                        class="mt-2 cursor-pointer text-blue-600 hover:underline"
                                        onclick="toggleMore('{{ $id }}')">
                                        Selengkapnya...
                                    </div>

                                    <div id="close-{{ $id }}"
                                        class="hidden cursor-pointer text-blue-600 hover:underline"
                                        onclick="toggleClose('{{ $id }}')">
                                        Tutup
                                    </div>
                                @endif
                            </div>

                            <div class="flex items-center justify-center gap-3">
                                <img class="h-10 w-10 rounded-full"
                                    src="{{ asset('/img/default-profile-picture.png') }}" alt="Foto Profil">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $testimonial->name }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('testimonials') }}"
                    class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline">
                    Lihat Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
                </a>
            </div>
    </section>

    {{-- Gallery Section --}}
    <section id="gallery" class="mx-auto max-w-screen-xl bg-white px-4 py-10 dark:bg-gray-900">
        <div class="mx-auto max-w-screen-lg">
            <h2 class="mb-4 text-center text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                Galeri
            </h2>
        </div>

        {{-- Tab Header --}}
        <div class="mb-6 flex flex-wrap items-center justify-center">
            @foreach (['all' => 'Semua Kategori', 'haji' => 'Haji', 'umroh' => 'Umroh'] as $key => $label)
                <button type="button"
                    class="gallery-tab {{ $key === 'all' ? 'text-blue-700 cursor-pointer hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800' : 'text-gray-900 border cursor-pointer border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800' }}"
                    data-tab="{{ $key }}">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        {{-- Tab Content --}}
        <div>
            @foreach (['all' => 'Semua', 'haji' => 'Haji', 'umroh' => 'Umroh'] as $key => $label)
                <div id="content-{{ $key }}" class="tab-content {{ $key !== 'all' ? 'hidden' : '' }}">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
                        @forelse ($data['galleries'][$key] as $gallery)
                            <div>
                                <img class="h-auto w-full rounded-lg" src="{{ asset($gallery->image) }}"
                                    alt="{{ $gallery->title }}">
                            </div>
                        @empty
                            <p class="col-span-3 text-center text-gray-500">Belum ada galeri {{ strtolower($label) }}.
                            </p>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-8 text-center">
            <a href="{{ route('gallery') }}"
                class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline">
                Lihat Selengkapnya <i class="fa-solid fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>

    {{-- Script Select Gallery by Category --}}
    <script>
        const activeClasses = [
            'text-blue-700', 'hover:text-white', 'border-blue-600', 'hover:bg-blue-700',
            'focus:ring-blue-300', 'dark:text-blue-500', 'dark:border-blue-500',
            'dark:hover:bg-blue-500', 'dark:hover:text-white', 'dark:focus:ring-blue-800'
        ];
        const inactiveClasses = [
            'text-gray-900', 'border-white', 'hover:border-gray-200', 'dark:border-gray-900',
            'dark:bg-gray-900', 'dark:hover:border-gray-700', 'bg-white',
            'focus:ring-gray-300', 'dark:text-white', 'dark:focus:ring-gray-800'
        ];

        document.querySelectorAll('.gallery-tab').forEach(button => {
            button.addEventListener('click', () => {
                const tab = button.getAttribute('data-tab');

                // Ubah style tab
                document.querySelectorAll('.gallery-tab').forEach(btn => {
                    btn.classList.remove(...activeClasses);
                    btn.classList.add(...inactiveClasses);
                });

                button.classList.remove(...inactiveClasses);
                button.classList.add(...activeClasses);

                // Tampilkan konten yang sesuai
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.add('hidden');
                });
                document.getElementById('content-' + tab).classList.remove('hidden');
            });
        });
    </script>


</x-layout>
