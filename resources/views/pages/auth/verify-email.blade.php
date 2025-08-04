<x-layout :title="$title">
    <div class="flex min-h-screen items-center justify-center bg-gray-100 px-4">
        <div class="mx-auto flex max-w-md flex-col items-center rounded-lg bg-white p-6 text-center shadow">
            <h1 class="mb-4 text-xl font-semibold">Verifikasi Alamat Email Anda</h1>

            @if (session('message'))
                <div class="mb-4 text-green-500">
                    {{ session('message') }}
                </div>
            @endif

            <p class="mb-4">
                Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi.
                Jika Anda belum menerima email tersebut,
            </p>

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                    class="bg-primary-700 hover:bg-primary-800 focus:ring-primary-300 cursor-pointer rounded-lg px-5 py-2.5 text-sm font-medium text-white focus:ring-4">
                    Kirim Ulang Email Verifikasi
                </button>
            </form>
        </div>
    </div>
</x-layout>
