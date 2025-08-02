<x-layout :title="$title">
    <div class="flex min-h-screen items-center justify-center bg-gray-50">
        <div class="w-full max-w-md rounded-lg bg-white p-6 shadow">
            <h2 class="mb-4 text-xl font-semibold">Lupa Password</h2>
            <p class="mb-4 text-sm text-gray-600">Masukkan email kamu dan kami akan mengirim link untuk reset password.
            </p>

            @if (session('status'))
                <div class="mb-4 rounded-lg bg-green-100 p-3 text-sm text-green-700">
                    {{ session('status') === __('passwords.sent')
                        ? 'Link reset password berhasil dikirim. Silakan cek email Anda.'
                        : session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="mb-1 block text-sm font-medium">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full rounded-md border px-3 py-2 focus:ring focus:ring-blue-200" />
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800">
                    Kirim Link Reset
                </button>
            </form>
        </div>
    </div>
</x-layout>
