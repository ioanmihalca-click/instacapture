<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'InstaCapture' }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon" />
    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/apple-touch-icon.png') }}" />

    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
    <script src="{{ asset('resources/js/app.js') }}"></script>
    <script src="{{ asset('resources/js/tsparticle.min.js') }}"></script>
    @livewireStyles


    <!-- Add custom CSS -->
    <style>
        nav ul li a {
            position: relative;
            padding-bottom: 0.5rem;
            display: inline-block;
            color: #e5e7eb;
            /* Tailwind gray-300 color */
        }

        nav ul li a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 2px;
            width: 0;
            background-color: #d1d5db;
            /* Tailwind gray-400 color */
            transition: width 0.3s ease;
        }

        nav ul li a:hover::after {
            width: 100%;
        }
    </style>

</head>

<body class="h-screen flex bg-black">
    <!-- Left side with photo background and gradient to black -->
    <div class="w-1/3 relative">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('/assets/photo-bg.jpg');">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-transparent to-black"></div>
    </div>

    <!-- Particles Container -->
    <div id="particles-js" class="absolute inset-0"></div>

    <!-- Logo Section in Top Left Corner -->
    <div class="absolute top-4 left-4 flex items-center space-x-2">
        <!-- SVG Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="h-6 w-6 md:h-9 md:w-9 font-semibold md:pb-1 text-white">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
        </svg>
        <!-- Logo Text -->
        <p class="text-xl md:text-3xl tracking-wider font-roboto-condensed uppercase text-white">Insta<span
                class="font-semibold">Capture</span></p>
    </div>
    </div>

    <!-- Right side with black background and increased content width -->
    <div class="w-2/3 bg-black text-white flex flex-col">
        <header class="bg-gray-800 bg-opacity-80">
            <nav class="container mx-auto px-4 py-2 flex justify-end">
                <ul class="flex space-x-4">
                    <li><a href="/" class="hover:text-gray-300">Acasa</a></li>
                    <li><a href="/despre" class="hover:text-gray-300">Despre</a></li>
                    <li><a href="#" class="hover:text-gray-300">Skill-uri</a></li>
                    <li><a href="#" class="hover:text-gray-300">Servicii</a></li>
                    <li><a href="#" class="hover:text-gray-300">Experiente</a></li>
                    <li><a href="#" class="hover:text-gray-300">Portofoliu</a></li>
                    <li><a href="#" class="hover:text-gray-300">Contact</a></li>
                </ul>
            </nav>
        </header>

        <main class="flex-1 text-center mt-20 p-4">
            {{ $slot }}
        </main>

    </div>

    @livewireScripts
</body>

</html>
