<x-layout :title="$data['title']">
    <div class="mb-4 h-auto p-4 pt-20 md:ml-64">
        <div class="rounded-lg border border-gray-200 bg-white p-2 dark:bg-gray-900">
            <div class="p-2">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Detail Pesan</h2>

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <p class="rounded-lg bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {{ $data['contact']->name }}
                        </p>
                    </div>

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Alamat Email</label>
                        <p class="rounded-lg bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {{ $data['contact']->email }}
                        </p>
                    </div>

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Telepon</label>
                        <p class="rounded-lg bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {{ $data['contact']->phone }}
                        </p>
                    </div>

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Dibuat</label>
                        <p class="rounded-lg bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {{ $data['contact']->created_at->translatedFormat('j F Y, H:i') }}
                        </p>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Pesan</label>
                        <div
                            class="rounded-lg bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {!! $data['contact']->message !!}
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('contact-dashboard') }}"
                        class="mb-2 me-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:hover:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
