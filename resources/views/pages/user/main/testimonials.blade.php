<x-layout :title="$data['title']">
    {{-- Hero Section --}}
    <div class="bg-gray-500 bg-cover bg-center bg-no-repeat bg-blend-multiply"
        style="background-image: url('{{ asset('img/hero-3.png') }}')">
        <div
            class="mx-auto flex min-h-[500px] max-w-screen-xl flex-col items-center justify-center px-4 pt-40 text-center md:pt-20">
            <h1
                class="mb-4 max-w-2xl text-2xl font-extrabold leading-none tracking-tight text-white md:text-5xl xl:text-6xl">
                Testimoni
            </h1>
            <p class="mb-6 max-w-2xl font-light text-white md:text-lg lg:mb-8 lg:text-xl">
                Apa kata mereka tentang layanan kami? Temukan kisah dan pengalaman para pelanggan.
            </p>
        </div>
    </div>

    {{-- Testimonials --}}
    <div class="mx-auto mb-20 max-w-screen-xl px-4 pt-10">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($data['testimonials'] as $testimonial)
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
                            <div id="more-{{ $id }}" class="mt-2 cursor-pointer text-blue-600 hover:underline"
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

                    <div class="flex items-center gap-3">
                        <img class="h-10 w-10 rounded-full" src="{{ asset('/img/default-profile-picture.png') }}"
                            alt="Foto Profil">
                        <div class="text-sm font-medium text-gray-900 dark:text-white">
                            {{ $testimonial->name }}
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full flex items-center justify-center py-20">
                    <p class="text-center text-lg text-gray-500">Tidak ada data</p>
                </div>
            @endforelse
        </div>
        <div class="mt-10">
            {{ $data['testimonials']->links() }}
        </div>
    </div>

</x-layout>
