<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title }}</title>

        <link
            href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
            rel="stylesheet">
        @vite('resources/css/app.css')
    </head>

    <body class="flex min-h-screen flex-col">
        <!-- Header -->
        <x-header />

        <!-- Sidebar -->
        @auth
            @if (Auth::check())
                <x-sidebar />
            @endif
        @endauth

        <!-- Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        {{-- Footer --}}
        <x-footer />

        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </body>

</html>
