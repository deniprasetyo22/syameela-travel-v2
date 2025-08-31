<x-layout :title="$data['title']">
    <div class="mx-4 mb-10 mt-20 grid gap-4 bg-white antialiased md:grid-cols-5 dark:bg-gray-900">
        <x-main-menu-user />
        <div class="rounded-md bg-gray-50">
            <h2 class="my-2 text-center text-lg font-bold text-gray-900 dark:text-white">Profil Saya</h2>
            <ul class="mx-4 space-y-2" id="profile-tabs" role="tablist">
                <li>
                    <a href="{{ route('profile') }}"
                        class="{{ request()->routeIs('profile') ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                        <i
                            class="fa-solid fa-user flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                        Informasi Pribadi
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile-documents') }}"
                        class="{{ request()->routeIs('profile-documents') ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                        <i
                            class="fa-solid fa-folder-open flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                        Dokumen
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile-security') }}"
                        class="{{ request()->routeIs('profile-security') ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                        <i
                            class="fa-solid fa-lock flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                        Keamanan
                    </a>
                </li>
            </ul>
        </div>
        <div class="rounded-md bg-gray-50 md:col-span-3">
            {{-- Dokumen --}}
            <div class="mx-4 my-2">
                @if (session()->has('success'))
                    <div class="mb-2 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="flex justify-between">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white">Dokumen</h2>
                    <a href="{{ route('edit-profile-documents') }}"
                        class="mb-2 me-2 rounded-lg bg-yellow-400 px-5 py-2.5 text-sm font-medium text-white hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-900">
                        <i
                            class="fa-solid fa-pen-to-square flex w-6 justify-center text-white transition duration-75 group-hover:text-gray-900 dark:text-gray-100 dark:group-hover:text-white"></i>
                        Edit
                    </a>
                </div>
                <div class="space-y-6">
                    @php
                        $documents = [
                            'id_card' => 'KTP',
                            'family_card' => 'KK',
                            'passport' => 'Paspor',
                            'photo' => 'Foto',
                            'visa' => 'Visa',
                            'marriage_book' => 'Buku Nikah',
                            'vaccine_certificate' => 'Surat Vaksin'
                        ];
                    @endphp

                    @foreach ($documents as $field => $label)
                        <div class="mb-6">
                            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                {{ $label }}
                                @if (in_array($field, ['id_card', 'family_card', 'passport', 'photo']))
                                    <span class="text-red-500">*</span>
                                @endif
                            </label>
                            @if ($data['user']->documents?->$field)
                                <div class="flex items-center justify-between gap-2">
                                    <a href="{{ asset($data['user']->documents->$field) }}" target="_blank"
                                        class="inline-block w-full rounded-lg border border-gray-200 bg-gray-100 p-2.5 text-sm text-blue-600 hover:underline dark:bg-gray-700 dark:text-blue-400">
                                        Lihat {{ $label }}
                                    </a>
                                    <button data-modal-target="modal-delete-{{ $field }}"
                                        data-modal-toggle="modal-delete-{{ $field }}"
                                        class="cursor-pointer rounded-md bg-red-500 px-5 py-2.5 text-xs text-white hover:bg-red-600">
                                        Hapus
                                    </button>
                                </div>

                                <!-- Modal Konfirmasi -->
                                <div id="modal-delete-{{ $field }}" tabindex="-1"
                                    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
                                    <div class="relative max-h-full w-full max-w-md">
                                        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 cursor-pointer items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="modal-delete-{{ $field }}">
                                                <svg class="h-3 w-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Tutup</span>
                                            </button>
                                            <div class="p-4 text-center md:p-5">
                                                <svg class="mx-auto mb-4 h-12 w-12 text-gray-400 dark:text-gray-200"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                    Yakin ingin menghapus file {{ $label }}?
                                                </h3>
                                                <form
                                                    action="{{ route('delete-profile-document', ['field' => $field]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex cursor-pointer items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                                        Ya, Hapus
                                                    </button>
                                                    <button data-modal-hide="modal-delete-{{ $field }}"
                                                        type="button"
                                                        class="ms-3 cursor-pointer rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                                        Batal
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p
                                    class="rounded-lg border border-gray-200 bg-gray-100 p-2.5 text-sm text-gray-500 dark:bg-gray-700 dark:text-white">
                                    Anda belum mengunggah {{ $label }}
                                </p>
                            @endif
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-layout>
