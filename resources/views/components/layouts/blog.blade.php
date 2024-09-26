<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $meta_title ?? 'Blog InstaCapture | Fotograf Profesionist în Cluj-Napoca' }}</title>
    <link rel="canonical" href="{{ url()->current() }}" />

    <meta name="description" content="{{ $meta_description ?? 'InstaCapture oferă servicii de fotografie profesională în Cluj-Napoca și întreaga Românie. Specializat în fotografie de eveniment, portrete și fotografie comercială.' }}">

    <meta name="keywords" content="{{ $meta_keywords ?? 'fotograf Cluj, Romania fotografie profesională, fotograf evenimente Cluj, fotograf nuntă Cluj, InstaCapture, fotografie comercială' }}">

    <meta name="author" content="Paul Tut">
    <meta name="robots" content="index, follow">
    

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YTSF9VSD6Q"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-YTSF9VSD6Q');
    </script>

    <!-- Facebook Open Graph meta tags -->
    <meta property="og:title" content="{{ $meta_title ?? 'InstaCapture' }}">
    <meta property="og:description" content="{{ $meta_description ?? 'InstaCapture | Fotografie profesionala' }}">
    <meta property="og:image" content="{{ $og_image ?? asset('assets/OG-instacapture.jpg') }}" />
    <meta property="og:image:alt" content="InstaCapture | Fotografie Profesionala, Cluj sau oriunde in Romania" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article" />
    <meta property="og:locale" content="ro_RO" />
    <meta property="og:site_name" content="InstaCapture Blog" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#000000">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="font-sans bg-black">
    <div  x-data="{
        isMenuOpen: false,
        isTransitioning: false,
        currentUrl: '{{ url()->current() }}',
        isPortfolioPage: {{ request()->routeIs('portofoliu') ? 'true' : 'false' }}
    }" x-on:livewire:navigating.window="isTransitioning = true"
        x-on:livewire:navigated.window="
          setTimeout(() => {
              isTransitioning = false;
          }, 300);
          if ($event.detail && $event.detail.url) {
              currentUrl = $event.detail.url;
              isPortfolioPage = currentUrl.includes('portofoliu');
          }
      ">
        <!-- Loading Indicator -->
        <div x-show="isTransitioning"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="w-32 h-32 border-t-2 border-b-2 rounded-full border-x-yellow-400 animate-spin"></div>
        </div>

    <x-nav />

    <main>
        <div class="container mt-20">
            {{ $slot }}
        </div>
    </main>

    @livewireScripts
</body>

</html>