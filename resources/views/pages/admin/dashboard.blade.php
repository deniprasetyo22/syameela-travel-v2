<x-layout :title="$data['title']">
    <div class="mb-4 h-auto p-4 pt-20 md:ml-64">
        <div class="mb-4">
            <h3 class="text-md font-semibold md:text-lg">Halo, {{ Auth::user()->full_name }}!</h3>
        </div>
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div class="mb-4 md:col-span-2">
                <div class="mb-8 grid grid-cols-2 gap-4">
                    <div class="flex items-center justify-between rounded-lg bg-white p-4 shadow-sm">
                        <div>
                            <h5 class="mb-1 text-base font-medium text-gray-900">Pengguna</h5>
                            <p class="text-2xl font-bold text-gray-900">10</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-notch animate-spin-slow text-3xl text-blue-600"></i>
                        </div>
                    </div>
                    <div class="flex items-center justify-between rounded-lg bg-white p-4 shadow-sm">
                        <div>
                            <h5 class="mb-1 text-base font-medium text-gray-900">Paket Umroh</h5>
                            <p class="text-2xl font-bold text-gray-900">10</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-notch animate-spin-slow text-3xl text-blue-600"></i>
                        </div>
                    </div>
                    <div class="flex items-center justify-between rounded-lg bg-white p-4 shadow-sm">
                        <div>
                            <h5 class="mb-1 text-base font-medium text-gray-900">Pengguna</h5>
                            <p class="text-2xl font-bold text-gray-900">10</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-notch animate-spin-slow text-3xl text-blue-600"></i>
                        </div>
                    </div>
                    <div class="flex items-center justify-between rounded-lg bg-white p-4 shadow-sm">
                        <div>
                            <h5 class="mb-1 text-base font-medium text-gray-900">Pembayaran</h5>
                            <p class="text-2xl font-bold text-gray-900">10</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-notch animate-spin-slow text-3xl text-blue-600"></i>
                        </div>
                    </div>
                    <div class="flex items-center justify-between rounded-lg bg-white p-4 shadow-sm">
                        <div>
                            <h5 class="mb-1 text-base font-medium text-gray-900">Jadwal</h5>
                            <p class="text-2xl font-bold text-gray-900">10</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-notch animate-spin-slow text-3xl text-blue-600"></i>
                        </div>
                    </div>
                </div>

                <div class="relative overflow-x-auto">
                    <div class="mb-4">
                        <h3 class="text-md font-semibold md:text-lg">Transaksi Terakhir</h3>
                    </div>
                    <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Paket
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
                                <th scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    Deni
                                </th>
                                <td class="px-6 py-4">
                                    Haji
                                </td>
                                <td class="px-6 py-4">
                                    1 Januari 2023
                                </td>
                                <td class="px-6 py-4">
                                    Pending
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
                                <th scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    Deni
                                </th>
                                <td class="px-6 py-4">
                                    Haji
                                </td>
                                <td class="px-6 py-4">
                                    1 Januari 2023
                                </td>
                                <td class="px-6 py-4">
                                    Pending
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
                                <th scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    Deni
                                </th>
                                <td class="px-6 py-4">
                                    Haji
                                </td>
                                <td class="px-6 py-4">
                                    1 Januari 2023
                                </td>
                                <td class="px-6 py-4">
                                    Pending
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
                                <th scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    Deni
                                </th>
                                <td class="px-6 py-4">
                                    Haji
                                </td>
                                <td class="px-6 py-4">
                                    1 Januari 2023
                                </td>
                                <td class="px-6 py-4">
                                    Pending
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="mb-4">
                <div class="mb-4 flex justify-center">
                    <div id="datepicker-inline" inline-datepicker
                        data-date="{{ \Carbon\Carbon::now('Asia/Jakarta')->format('m/d/Y') }}" data-language="id"
                        data-week-start="1">
                    </div>
                </div>
                <div class="mb-4 flex justify-center">
                    <div class="w-74 rounded-lg border border-gray-200 bg-white p-4 shadow-sm sm:p-6">
                        <div class="mb-4 flex items-center justify-between">
                            <h5 class="text-lg font-semibold text-gray-900">New User</h5>
                            <a href="#" class="text-sm font-medium text-blue-600 hover:underline">See all</a>
                        </div>
                        <div class="flow-root">
                            <ul class="-my-5 divide-y divide-gray-200">
                                @foreach ($data['users'] as $user)
                                    <li class="flex items-center gap-4 py-3">
                                        <img class="h-8 w-8 rounded-full"
                                            src="{{ asset($user['avatar'] ?? 'img/default-profile-picture.png') }}"
                                            alt="{{ $user['full_name'] }}" />
                                        <span class="text-sm font-medium text-gray-900">{{ $user['full_name'] }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</x-layout>
