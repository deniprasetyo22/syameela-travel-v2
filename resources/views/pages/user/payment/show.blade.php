<x-layout :title="$data['title']">
    <div class="mx-4 mb-10 mt-20 grid gap-4 bg-white antialiased md:grid-cols-5 dark:bg-gray-900">
        <x-main-menu-user />
        <div class="relative overflow-x-auto rounded-md bg-gray-50 md:col-span-4">
            <h2 class="px-4 py-2 text-lg font-bold text-gray-900 dark:text-white">Pembayaran</h2>
            @if (session()->has('success'))
                <div class="mx-4 mb-2 rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mx-4 space-y-2 pb-4">
                <div class="relative overflow-x-auto rounded-md bg-gray-50">
                    <div class="shadow-xs relative rounded-lg border border-gray-200 bg-white dark:bg-gray-700">
                        <div>
                            <h2 class="mx-4 my-2 font-bold text-gray-900 md:text-lg dark:text-white">
                                Detail Pembayaran {{ $data['payment']->registration_number }}
                            </h2>

                            <div class="shadow-xs m-4 rounded-lg border border-gray-200 bg-white p-4 dark:bg-gray-700">
                                <p><strong>Paket:</strong> {{ $data['payment']->package->name }}</p>
                                <p><strong>Skema Pembayaran:</strong>
                                    @if ($data['payment']->payment_scheme == 'full_payment')
                                        <span>Pembayaran Penuh</span>
                                    @elseif ($data['payment']->payment_scheme == 'installment_3')
                                        <span>Cicilan 3x</span>
                                    @elseif ($data['payment']->payment_scheme == 'installment_6')
                                        <span>Cicilan 6x</span>
                                    @elseif ($data['payment']->payment_scheme == 'installment_9')
                                        <span>Cicilan 9x</span>
                                    @elseif ($data['payment']->payment_scheme == 'ccl')
                                        <span>Tempo</span>
                                    @endif
                                </p>
                                <p><strong>Status:</strong>
                                    @if ($data['payment']->status == 'unpaid')
                                        <span>
                                            Belum Dibayar
                                        </span>
                                    @elseif ($data['payment']->status == 'processing')
                                        <span>
                                            Sedang diproses
                                        </span>
                                    @elseif ($data['payment']->status == 'paid')
                                        <span>
                                            Lunas
                                        </span>
                                    @endif
                                </p>
                                <p><strong>Total Pembayaran:</strong>
                                    {{ Number::currency($data['payment']->package->price, 'Rp ', 'id', 0) }}
                                </p>
                            </div>
                        </div>
                        <div class="shadow-xs m-4 rounded-lg border border-gray-200 bg-white p-4 dark:bg-gray-700">
                            <h2 class="mb-4"><strong>Rekening Pembayaran Syameela Travel:</strong></h2>
                            <div class="grid gap-4 md:grid-cols-2">
                                <div class="mb-2">
                                    <p><strong>BRI:</strong> PT SYAMILAH BERKAH MAKMUR</p>
                                    <p><strong>Nomor rekening:</strong> 058901001121562</p>
                                </div>
                                <div class="mb-2">
                                    <p><strong>BSI:</strong> M SYUKRON DAMIN</p>
                                    <p><strong>Nomor rekening:</strong> 7202522321</p>
                                </div>
                                <div class="mb-2">
                                    <p><strong>Bank JAGO:</strong> M SYUKRON DAMIN</p>
                                    <p><strong>Nomor rekening:</strong> 106640420002</p>
                                </div>
                                <div class="mb-2">
                                    <p><strong>MANDIRI:</strong> WARDATUL MILLA CAMELIA</p>
                                    <p><strong>Nomor rekening:</strong> 1440023870238</p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="shadow-xs relative m-4 overflow-x-auto rounded-lg border border-gray-200 bg-white dark:bg-gray-700">
                            <table class="w-full min-w-[640px] text-left text-sm dark:text-gray-400">
                                <thead
                                    class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th class="px-4 py-3">No</th>
                                        <th class="px-4 py-3">Jumlah</th>
                                        <th class="px-4 py-3">Bukti Pembayaran</th>
                                        <th class="px-4 py-3">Status</th>
                                        <th class="sr-only px-4 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data['payment']->payments->isNotEmpty())
                                        @foreach ($data['payment']->payments as $index => $payment)
                                            <tr class="odd:bg-white even:bg-gray-50 dark:border-gray-700">
                                                <td class="px-4 py-3">{{ $index + 1 }}</td>
                                                <td class="px-4 py-3">
                                                    {{ Number::currency($payment->amount, 'Rp ', 'id', 0) }}
                                                </td>
                                                <td class="px-4 py-3">
                                                    @if ($payment->payment_proof)
                                                        <a href="{{ asset($payment->payment_proof) }}"
                                                            class="text-blue-500 hover:underline" target="_blank">
                                                            Lihat Bukti Pembayaran
                                                        </a>
                                                    @else
                                                        <span>Belum ada bukti pembayaran.</span>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-3">
                                                    @if ($payment->verification_status == 'unpaid')
                                                        <span
                                                            class="me-2 rounded-lg bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-300">
                                                            Belum Dibayar
                                                        </span>
                                                    @elseif ($payment->verification_status == 'processing')
                                                        <span
                                                            class="me-2 rounded-lg bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                                            Sedang diproses
                                                        </span>
                                                    @elseif ($payment->verification_status == 'paid')
                                                        <span
                                                            class="me-2 rounded-lg bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                                                            Lunas
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-3">
                                                    <!-- Tombol -->
                                                    <button data-modal-target="bayar-modal-{{ $payment->id }}"
                                                        data-modal-toggle="bayar-modal-{{ $payment->id }}"
                                                        class="block cursor-pointer rounded-lg bg-blue-700 px-5 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        type="button">
                                                        Bayar
                                                    </button>

                                                    <div id="bayar-modal-{{ $payment->id }}" tabindex="-1"
                                                        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                                        <div class="relative max-h-full w-full max-w-lg p-4">
                                                            <div
                                                                class="relative rounded-lg bg-white shadow-sm dark:bg-gray-700">
                                                                <button type="button"
                                                                    class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                                                    data-modal-hide="bayar-modal-{{ $payment->id }}">
                                                                    <svg class="h-3 w-3" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 14 14">
                                                                        <path stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                                <div class="p-4 md:p-5">
                                                                    <form method="POST"
                                                                        action="{{ route('update-my-payment', $payment->id) }}"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="p-6">
                                                                            <h3
                                                                                class="mb-4 text-center text-lg font-medium text-gray-900 dark:text-white">
                                                                                Unggah Bukti Pembayaran
                                                                            </h3>
                                                                            <label for="payment_proof"><span
                                                                                    class="mb-2 text-xs text-gray-400">*JPG,
                                                                                    PNG (Max. 3MB)</span></label>
                                                                            <input type="file" name="payment_proof"
                                                                                id="payment_proof"
                                                                                class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400"
                                                                                accept="image/*">
                                                                        </div>
                                                                        <div class="flex justify-end gap-2">
                                                                            <button type="button"
                                                                                data-modal-hide="bayar-modal-{{ $payment->id }}"
                                                                                class="cursor-pointer rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                                                Batal
                                                                            </button>
                                                                            <button type="submit"
                                                                                class="cursor-pointer rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                                                                                Simpan
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="px-4 py-3 text-center text-gray-500">Belum ada
                                                pembayaran.
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <div class="p-4">
                            <a href="{{ route('my-payments') }}"
                                class="mb-2 me-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:hover:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
