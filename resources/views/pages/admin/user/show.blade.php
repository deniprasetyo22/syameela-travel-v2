<x-layout :title="$data['title']">
    <div class="mb-4 h-auto p-4 pt-20 md:ml-64">
        <div class="rounded-lg border border-gray-200 bg-white p-2 dark:bg-gray-900">
            <div class="p-2">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Detail Pengguna</h2>

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                        <p class="rounded-lg bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {{ $data['user']->full_name }}
                        </p>
                    </div>

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama Pengguna</label>
                        <p class="rounded-lg bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {{ $data['user']->username }}
                        </p>
                    </div>

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <p class="rounded-lg bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {{ $data['user']->email }}
                        </p>
                    </div>

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Peran</label>
                        <p class="rounded-lg bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {{ $data['user']->role->name }}
                        </p>
                    </div>

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Dibuat</label>
                        <p class="rounded-lg bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {{ $data['user']->created_at ? $data['user']->created_at->translatedFormat('j F Y, H:i') : '-' }}
                        </p>
                    </div>

                    <div class="w-full">
                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Terakhir
                            Diperbarui</label>
                        <p class="rounded-lg bg-gray-100 p-2.5 text-sm text-gray-800 dark:bg-gray-700 dark:text-white">
                            {{ $data['user']->updated_at ? $data['user']->updated_at->translatedFormat('j F Y, H:i') : '-' }}
                        </p>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('users-dashboard') }}"
                        class="mb-2 me-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:hover:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                        Kembali
                    </a>
                    <a href="{{ route('edit-user', $data['user']->id) }}"
                        class="mb-2 me-2 rounded-lg bg-yellow-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-yellow-600 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
