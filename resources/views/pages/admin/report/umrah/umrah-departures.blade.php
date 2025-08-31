<x-layout :title="$data['title']">
    <div class="mb-4 h-auto p-4 pt-20 md:ml-64">
        <div class="rounded-lg border border-gray-200 bg-white p-2 dark:bg-gray-900">
            <div class="p-2">
                <div class="flex flex-col items-center justify-between pb-2 md:flex-row md:space-x-4">
                    <div class="w-full md:w-1/2">
                        <h1 class="mb-2 text-lg font-bold text-gray-900 dark:text-white">
                            Export Keberangkatan Jamaah Umroh
                        </h1>
                    </div>
                </div>

                <div class="relative w-full overflow-x-auto">
                    <table class="w-full text-left text-sm dark:text-gray-400">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-4 py-3">Tahun</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-3">
                                    <select name="year" id="year"
                                        class="block w-full rounded-lg border border-gray-300 bg-white p-2 text-sm dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                                        <option value="">Pilih Tahun</option>
                                        @foreach ($data['years'] as $y)
                                            <option value="{{ $y }}">{{ $y }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="px-4 py-3">
                                    <a id="export-btn" href="#" target="_blank"
                                        class="pointer-events-none flex w-32 items-center justify-center rounded-lg bg-green-500 px-4 py-2 text-sm font-medium text-white opacity-50 hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                        <i class="fa-solid fa-download mr-2"></i> Export
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const yearSelect = document.getElementById('year');
            const exportBtn = document.getElementById('export-btn');
            const baseUrl = @json(route('export-umrah-departures', ['year' => '__YEAR__']));

            function updateExportLink() {
                const y = yearSelect.value;
                if (y) {
                    exportBtn.href = baseUrl.replace('__YEAR__', y);
                    exportBtn.classList.remove('opacity-50', 'pointer-events-none');
                } else {
                    exportBtn.href = '#';
                    exportBtn.classList.add('opacity-50', 'pointer-events-none');
                }
            }

            yearSelect.addEventListener('change', updateExportLink);
            updateExportLink();
        });
    </script>
</x-layout>
