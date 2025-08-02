<x-layout :title="$data['title']">
    <div class="mb-4 h-auto p-4 pt-20 md:ml-64">
        <div class="rounded-lg border border-gray-200 bg-white p-2 dark:bg-gray-900">
            <div class="p-2">
                @if (session()->has('success'))
                    <div class="mb-2 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="flex flex-col items-center justify-between py-2 md:flex-row md:space-x-4">
                    {{-- Bagian Search dan Tambah Pengguna (tidak ada perubahan) --}}
                    <form method="GET" action="{{ route('transaction-dashboard') }}"
                        class="flex w-full flex-col gap-2 md:flex-row md:items-center md:justify-between">
                        <div class="flex w-full gap-4 md:w-1/2">
                            <div class="relative w-full">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2 pl-10 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                    placeholder="Cari nama, nomor registrasi">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>

                            <a href="{{ route('transaction-dashboard') }}"
                                class="flex items-center justify-center rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-800">
                                Reset
                            </a>
                        </div>

                        <div class="w-full md:w-48">
                            <select name="type" onchange="this.form.submit()"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                                <option value="">Semua Tipe</option>
                                <option value="Umroh" {{ request('type') == 'Umroh' ? 'selected' : '' }}>Umrah</option>
                                <option value="Haji" {{ request('type') == 'Haji' ? 'selected' : '' }}>Haji</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="relative w-full overflow-x-auto">
                    <table class="w-full min-w-[640px] text-left text-sm dark:text-gray-400">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No</th>
                                <th scope="col" class="px-4 py-3">Nama</th>
                                <th scope="col" class="px-4 py-3">Paket</th>
                                <th scope="col" class="px-4 py-3">Tipe</th>
                                <th scope="col" class="px-4 py-3">Nomor Registrasi</th>
                                <th scope="col" class="px-4 py-3">Skema Pembayaran</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data['transactions']->isEmpty())
                                <tr>
                                    <td colspan="6" class="px-4 py-3 text-center">Tidak ada data</td>
                                </tr>
                            @else
                                @foreach ($data['transactions'] as $transaction)
                                    @php
                                        $dropdownId = 'dropdown-' . $transaction->id;
                                        $buttonId = 'dropdown-button-' . $transaction->id;
                                        $modalId = 'delete-modal-' . $transaction->id;
                                    @endphp
                                    <tr class="odd:bg-white even:bg-gray-50 dark:border-gray-700">
                                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-3">{{ $transaction->user->full_name }}</td>
                                        <td class="px-4 py-3">{{ $transaction->package->name }}</td>
                                        <td class="px-4 py-3">{{ $transaction->package->type }}</td>
                                        <td class="px-4 py-3">{{ $transaction->registration_number }}</td>
                                        <td class="px-4 py-3">
                                            @if ($transaction->payment_scheme == 'full_payment')
                                                <span>Pembayaran Penuh</span>
                                            @elseif ($transaction->payment_scheme == 'installment_3')
                                                <span>Cicilan 3x</span>
                                            @elseif ($transaction->payment_scheme == 'installment_6')
                                                <span>Cicilan 6x</span>
                                            @elseif ($transaction->payment_scheme == 'installment_9')
                                                <span>Cicilan 9x</span>
                                            @elseif ($transaction->payment_scheme == 'ccl')
                                                <span>Tempo</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3">
                                            @if ($transaction->status == 'unpaid')
                                                <span
                                                    class="me-2 rounded-lg bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-300">
                                                    Belum Dibayar
                                                </span>
                                            @elseif ($transaction->status == 'processing')
                                                <span
                                                    class="me-2 rounded-lg bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                                    Sedang diproses
                                                </span>
                                            @elseif ($transaction->status == 'paid')
                                                <span
                                                    class="me-2 rounded-lg bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                                                    Lunas
                                                </span>
                                            @endif
                                        </td>
                                        <td class="flex items-center justify-end px-4 py-3">
                                            <div class="relative inline-block text-left">
                                                <button id="{{ $buttonId }}"
                                                    data-dropdown-toggle="{{ $dropdownId }}"
                                                    class="inline-flex cursor-pointer items-center rounded-md bg-white px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">
                                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M6 10a2 2 0 114 0 2 2 0 01-4 0zm5 0a2 2 0 114 0 2 2 0 01-4 0zm5 0a2 2 0 114 0 2 2 0 01-4 0z" />
                                                    </svg>
                                                </button>
                                                <div id="{{ $dropdownId }}"
                                                    class="z-10 hidden w-32 divide-y divide-gray-100 rounded-lg bg-white shadow">
                                                    <ul class="py-2 text-sm text-gray-700"
                                                        aria-labelledby="{{ $buttonId }}">
                                                        <li>
                                                            <a href="{{ route('show-transaction', ['id' => $transaction->id]) }}"
                                                                class="block px-4 py-2 hover:bg-gray-100">Lihat</a>
                                                        </li>
                                                        <li>
                                                            <button data-modal-target="{{ $modalId }}"
                                                                data-modal-toggle="{{ $modalId }}"
                                                                class="block w-full cursor-pointer px-4 py-2 text-left hover:bg-gray-100"
                                                                type="button">
                                                                Hapus
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div id="{{ $modalId }}" tabindex="-1"
                                        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                        <div class="relative max-h-full w-full max-w-md p-4">
                                            <div class="relative rounded-lg bg-white shadow-sm dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="{{ $modalId }}">
                                                    <svg class="h-3 w-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 text-center md:p-5">
                                                    <svg class="mx-auto mb-4 h-12 w-12 text-gray-400 dark:text-gray-200"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3
                                                        class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                        Yakin ingin menghapus transaksi
                                                        <b>{{ $transaction->registration_number }}</b>?
                                                    </h3>
                                                    <form action="{{ route('delete-transaction', $transaction->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button data-modal-hide="{{ $modalId }}" type="submit"
                                                            class="inline-flex cursor-pointer items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                                            Ya, Hapus
                                                        </button>
                                                        <button data-modal-hide="{{ $modalId }}" type="button"
                                                            class="ms-3 cursor-pointer rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                                            Batal
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="p-4">
                        {{ $data['transactions']->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
