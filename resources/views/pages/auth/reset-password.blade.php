<x-layout :title="$title">
    <div class="mx-auto mt-16 max-w-md rounded-lg bg-white p-6 shadow">
        <h2 class="mb-4 text-xl font-semibold">Reset Password</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-4">
                <label for="email" class="mb-1 block text-sm font-medium">Email</label>
                <input type="email" name="email" id="email" required
                    class="w-full rounded-md border px-3 py-2 focus:ring focus:ring-blue-200"
                    value="{{ old('email') }}" />
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="mb-1 block text-sm font-medium">Password Baru</label>
                <input type="password" name="password" id="password" required
                    class="w-full rounded-md border px-3 py-2 focus:ring focus:ring-blue-200" />
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="mb-1 block text-sm font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full rounded-md border px-3 py-2 focus:ring focus:ring-blue-200" />
            </div>

            <button type="submit"
                class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800">
                Reset Password
            </button>
        </form>
    </div>
</x-layout>
