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

        <!-- Cinzel -->
        <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">

        <!-- atau Playfair Display -->
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">


        <!-- Tom Select CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">

        {{-- Fontawesome --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">


        @vite('resources/css/app.css')
    </head>

    <body class="flex min-h-screen flex-col">
        <!-- Header -->
        <x-header />

        <!-- Sidebar -->
        @auth
            @if (Auth::check() && Auth::user()->hasVerifiedEmail() && Auth::user()->role_id == 1)
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

        {{-- TinyMCE --}}
        <script src="https://cdn.tiny.cloud/1/c1h7urknom6z3593gwvhghj48iwjyopu2h5bhtc6orsbde0v/tinymce/8/tinymce.min.js"
            referrerpolicy="origin" crossorigin="anonymous"></script>
        <script>
            tinymce.init({
                selector: 'textarea#formTextArea',
                plugins: 'code table lists',
                onboarding: false,
                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
            });
        </script>

        {{-- Script Toggle Testimonials --}}
        <script>
            function toggleMore(id) {
                document.getElementById(`content-${id}`).classList.remove('max-h-30');
                document.getElementById(`content-${id}`).classList.add('max-h-full');
                document.getElementById(`more-${id}`).classList.add('hidden');
                document.getElementById(`close-${id}`).classList.remove('hidden');
            }

            function toggleClose(id) {
                document.getElementById(`content-${id}`).classList.remove('max-h-full');
                document.getElementById(`content-${id}`).classList.add('max-h-30');
                document.getElementById(`more-${id}`).classList.remove('hidden');
                document.getElementById(`close-${id}`).classList.add('hidden');
            }
        </script>

        <!-- Tom Select JS -->
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    </body>

</html>
