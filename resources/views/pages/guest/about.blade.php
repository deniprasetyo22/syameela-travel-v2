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
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti voluptas, repellendus at
                aspernatur et sequi ab natus libero amet?
            </p>
        </div>
    </div>
    <div class="mx-auto mb-20 max-w-screen-xl px-4 pt-10">
        <div class="mb-10">
            <img class="h-auto max-w-full" src="{{ asset('img/hero.png') }}" alt="image description">
        </div>

        <div class="mb-10">
            <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">
                Tentang Syamilah Travel
            </h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum laborum pariatur, atque dolores
                consequuntur iste modi maxime deleniti et, possimus aliquam quisquam beatae voluptas ut mollitia quam
                fugit velit quas. Rerum dignissimos molestiae tempore autem officiis similique consequuntur nobis, ullam
                explicabo amet veniam quibusdam assumenda reiciendis. Ducimus necessitatibus quasi at?
            </p>
        </div>

        <div class="mb-10">
            <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">
                Visi
            </h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque eius aspernatur consequuntur nam nobis
                quasi laboriosam placeat doloribus, perferendis excepturi tempore voluptatum. Quis error autem provident
                aut ad saepe, harum quod molestiae sint magnam. Accusantium quasi aut tempora magni ipsum culpa debitis
                repudiandae, necessitatibus voluptas aliquid provident illo nemo esse!
            </p>
        </div>

        <div class="mb-10">
            <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">
                Misi
            </h2>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi necessitatibus praesentium, laborum iure
                odit mollitia itaque debitis? Vitae cupiditate officia pariatur nisi debitis, consectetur, iste sapiente
                omnis dolorem culpa laboriosam quo, fugit rem sint necessitatibus est! Quas excepturi quam delectus
                aperiam incidunt, id hic quos quia consequatur quisquam adipisci. Quaerat.
            </p>
        </div>

        <div class="mb-10">
            <h2 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">
                Legalitas dan Sertifikasi
            </h2>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <img class="w-full" src="{{ asset('img/hero.png') }}" alt="image description">
                </div>
                <div>
                    <img class="w-full" src="{{ asset('img/hero.png') }}" alt="image description">
                </div>
            </div>
        </div>
</x-layout>
