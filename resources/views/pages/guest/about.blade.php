<x-layout :title="$title">
    <div class="bg-gray-500 bg-cover bg-center bg-no-repeat bg-blend-multiply"
        style="background-image: url('{{ asset('img/hero-3.png') }}')">
        <div
            class="mx-auto flex min-h-[500px] max-w-screen-xl flex-col items-center justify-center px-4 pt-40 text-center md:pt-20">
            <h1
                class="mb-4 max-w-2xl text-2xl font-extrabold leading-none tracking-tight text-white md:text-5xl xl:text-6xl">
                Tentang Kami
            </h1>
            <p class="mb-6 max-w-2xl font-light text-white md:text-lg lg:mb-8 lg:text-xl">
                Temukan perjalanan spiritual yang bermakna bersama Syameela Travel – mitra ibadah Anda menuju Tanah Suci
                dengan layanan profesional, aman, dan penuh keberkahan.
            </p>
        </div>
    </div>
    <div class="mx-auto mb-20 w-full px-4 pt-10">
        <div class="mx-auto mb-10 max-w-screen-xl">
            <img class="h-auto" src="{{ asset('img/hero.png') }}" alt="image description">
        </div>

        <div class="mx-auto mb-10 max-w-screen-lg text-center">
            <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">
                Tentang Syameela Travel
            </h2>
            <p>
                Syameela Travel adalah travel agency terpercaya yang berfokus pada perjalanan religi, hemat, dan nyaman
                untuk keluarga, pelajar, maupun komunitas. Berdiri sejak 2021, kami telah melayani ratusan jamaah dalam
                destinasi ziarah, ibadah umrah, hingga tur budaya Islam baik dalam maupun luar negeri.
                Dengan pendekatan personal dan profesional, Travel Syamilah berkomitmen memberikan layanan terbaik dari
                konsultasi, perjalanan, hingga layanan purna jual untuk mewujudkan pengalaman spiritual yang aman,
                nyaman, dan berkah.
            </p>
        </div>

        <div class="mx-auto mb-10 max-w-screen-lg text-center">
            <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">
                Visi
            </h2>
            <p>
                Menjadi Pelayanan Ibadah Terbaik Yang Memudahkan Jamaah
                Hingga Sampai Ke Tanah Suci Mekkah Dan Madinah Secara Aman,
                Nyaman, Dan Penuh Keberkahan.
            </p>
        </div>

        <div class="mx-auto mb-10 max-w-screen-lg text-center">
            <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">
                Misi
            </h2>
            <p>
                Menebarkan Keberkahan Hingga Mendunia Lewat Pelayanan Ibadah
                Yang Amanah, Nyaman, Dan Profesional.
            </p>
        </div>
    </div>
</x-layout>
