<x-layout :title="$title">
    <div class="bg-gray-500 bg-cover bg-center bg-no-repeat bg-blend-multiply"
        style="background-image: url('{{ asset('img/hero-3.png') }}')">
        <div
            class="mx-auto flex min-h-[500px] max-w-screen-xl flex-col items-center justify-center px-4 pt-40 text-center md:pt-20">
            <h1
                class="mb-4 max-w-2xl text-2xl font-extrabold leading-none tracking-tight text-white md:text-5xl xl:text-6xl">
                Testimoni
            </h1>
            <p class="mb-6 max-w-2xl font-light text-white md:text-lg lg:mb-8 lg:text-xl">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores deleniti voluptas, repellendus at
                aspernatur et sequi ab natus libero amet?
            </p>
        </div>
    </div>
    <div class="mx-auto mb-20 max-w-screen-xl px-4 pt-10">
        <div class="mb-8 grid grid-cols-1 gap-4 md:mb-12 md:grid-cols-2 lg:grid-cols-2">
            <!-- Testimonial 1 -->
            <figure
                class="flex flex-col items-center justify-center rounded-lg border border-gray-200 bg-white p-8 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <blockquote class="mx-auto mb-4 max-w-2xl text-gray-500 lg:mb-8 dark:text-gray-400">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Very easy this was to integrate</h3>
                    <p class="my-4">If you care for your time, I hands down would go with this."</p>
                </blockquote>
                <figcaption class="flex items-center justify-center">
                    <img class="h-9 w-9 rounded-full"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/karen-nelson.png"
                        alt="profile picture">
                    <div class="ms-3 space-y-0.5 text-left font-medium rtl:text-right dark:text-white">
                        <div>Bonnie Green</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Developer at Open AI</div>
                    </div>
                </figcaption>
            </figure>

            <!-- Testimonial 2 -->
            <figure
                class="flex flex-col items-center justify-center rounded-lg border border-gray-200 bg-white p-8 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <blockquote class="mx-auto mb-4 max-w-2xl text-gray-500 lg:mb-8 dark:text-gray-400">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Solid foundation for any project
                    </h3>
                    <p class="my-4">Designing with Figma components that can be easily translated to the utility
                        classes of Tailwind CSS is a huge timesaver!"</p>
                </blockquote>
                <figcaption class="flex items-center justify-center">
                    <img class="h-9 w-9 rounded-full"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/roberta-casas.png"
                        alt="profile picture">
                    <div class="ms-3 space-y-0.5 text-left font-medium rtl:text-right dark:text-white">
                        <div>Roberta Casas</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Lead designer at Dropbox</div>
                    </div>
                </figcaption>
            </figure>

            <!-- Testimonial 3 -->
            <figure
                class="flex flex-col items-center justify-center rounded-lg border border-gray-200 bg-white p-8 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <blockquote class="mx-auto mb-4 max-w-2xl text-gray-500 lg:mb-8 dark:text-gray-400">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Mindblowing workflow</h3>
                    <p class="my-4">Aesthetically, the well designed components are beautiful and will undoubtedly
                        level up your next application."</p>
                </blockquote>
                <figcaption class="flex items-center justify-center">
                    <img class="h-9 w-9 rounded-full"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                        alt="profile picture">
                    <div class="ms-3 space-y-0.5 text-left font-medium rtl:text-right dark:text-white">
                        <div>Jese Leos</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Software Engineer at Facebook</div>
                    </div>
                </figcaption>
            </figure>

            <!-- Testimonial 4 -->
            <figure
                class="flex flex-col items-center justify-center rounded-lg border border-gray-200 bg-white p-8 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <blockquote class="mx-auto mb-4 max-w-2xl text-gray-500 lg:mb-8 dark:text-gray-400">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Efficient Collaborating</h3>
                    <p class="my-4">You have many examples that can be used to create a fast prototype for your team."
                    </p>
                </blockquote>
                <figcaption class="flex items-center justify-center">
                    <img class="h-9 w-9 rounded-full"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png"
                        alt="profile picture">
                    <div class="ms-3 space-y-0.5 text-left font-medium rtl:text-right dark:text-white">
                        <div>Joseph McFall</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">CTO at Google</div>
                    </div>
                </figcaption>
            </figure>
        </div>

    </div>
</x-layout>
