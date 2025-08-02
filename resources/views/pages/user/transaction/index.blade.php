<x-layout :title="$data['title']">
    <div class="mx-4 mb-10 mt-20 grid gap-4 bg-white antialiased md:grid-cols-4 dark:bg-gray-900">
        <div class="rounded-md bg-gray-50">
            <h2 class="my-2 text-center text-lg font-bold text-gray-900 dark:text-white">Transaksi</h2>
            <ul class="mx-4 space-y-2" id="profile-tabs" role="tablist">
                <li>
                    <form method="GET" action="{{ route('my-transactions') }}">
                        <input type="hidden" name="type" value="">
                        <button type="submit"
                            class="{{ request('type') == '' ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                            <i
                                class="fa-solid fa-list flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                            Semua Transaksi
                        </button>
                    </form>
                </li>
                <li>
                    <form method="GET" action="{{ route('my-transactions') }}">
                        <input type="hidden" name="type" value="Haji">
                        <button type="submit"
                            class="{{ request('type') == 'Haji' ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                            <i
                                class="fa-solid fa-list flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                            Haji
                        </button>
                    </form>
                </li>
                <li>
                    <form method="GET" action="{{ route('my-transactions') }}">
                        <input type="hidden" name="type" value="Umroh">
                        <button type="submit"
                            class="{{ request('type') == 'Umroh' ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                            <i
                                class="fa-solid fa-list flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                            Umroh
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="overflow-x-auto rounded-md bg-gray-50 md:col-span-3">
            @if (session()->has('success'))
                <div class="mb-2 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="shadow-xs relative m-4 rounded-lg border border-gray-200 bg-white dark:bg-gray-700">
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
                                        <a href="{{ route('show-my-transaction', ['id' => $transaction->id]) }}"
                                            class="inline-flex items-center text-sm text-blue-600 hover:underline">
                                            Lihat
                                        </a>
                                    </td>
                                </tr>
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
