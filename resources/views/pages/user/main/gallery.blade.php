<x-layout :title="$data['title']">
    <div class="bg-gray-500 bg-cover bg-center bg-no-repeat bg-blend-multiply"
        style="background-image: url('{{ asset('img/hero-3.png') }}')">
        <div
            class="mx-auto flex min-h-[500px] max-w-screen-xl flex-col items-center justify-center px-4 pt-40 text-center md:pt-20">
            <h1
                class="mb-4 max-w-2xl text-2xl font-extrabold leading-none tracking-tight text-white md:text-5xl xl:text-6xl">
                Galeri
            </h1>
            <p class="mb-6 max-w-2xl font-light text-white md:text-lg lg:mb-8 lg:text-xl">
                Saksikan keindahan ibadah melalui galeri kami. Semoga foto-foto ini menjadi penyemangat dan inspirasi
                untuk meraih panggilan suci ke Tanah Suci.
            </p>
        </div>
    </div>

    <div class="mx-auto mb-10 max-w-screen-xl space-y-4 px-4 pt-10">
        {{-- Filter Dropdown --}}
        <form method="GET" action="{{ route('gallery') }}" class="mb-6 flex justify-end">
            <select name="category" onchange="this.form.submit()"
                class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 md:w-1/4 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                <option value="" {{ $data['category'] === '' ? 'selected' : '' }}>Semua Kategori</option>
                <option value="Haji" {{ $data['category'] === 'Haji' ? 'selected' : '' }}>Haji</option>
                <option value="Umroh" {{ $data['category'] === 'Umroh' ? 'selected' : '' }}>Umroh</option>
            </select>
        </form>


        {{-- Gallery Grid --}}
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
            @forelse ($data['galleries'] as $gallery)
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="{{ asset($gallery->image) }}"
                        alt="{{ $gallery->title }}">
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500">Belum ada galeri untuk kategori ini.</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div>
            {{ $data['galleries']->links() }}
        </div>
    </div>
</x-layout>
