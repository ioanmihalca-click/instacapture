<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'InstaCapture | Fotograf Profesionist în Cluj-Napoca' }}</title>
    <meta name="description"
        content="InstaCapture oferă servicii de fotografie profesională în Cluj-Napoca și întreaga Românie. Specializat în fotografie de eveniment, portrete și fotografie comercială.">
    <meta name="keywords"
        content="fotograf Cluj, fotografie profesională, fotograf evenimente Cluj, fotograf nuntă Cluj, InstaCapture, fotografie comercială">
    <meta name="author" content="Paul Tut">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

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
    <meta property="og:title" content="{{ $title ?? 'InstaCapture' }}">
    <meta property="og:description" content="InstaCapture | Fotografie profesionala">
    <meta property="og:image" content="{{ asset('assets/OG-instacapture.jpg') }}" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:alt" content="InstaCapture | Fotografie Profesionala, Cluj sau oriunde in Romania" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="ro_RO" />
    <meta property="og:site_name" content="InstaCapture" />

    <!-- Local Business Schema Markup -->

    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "InstaCapture | Fotografie Profesionala Cluj",
  "description": "Servicii profesionale de fotografie, editare foto, design invitații nuntă, tipografie, grafică publicitară, editare video, și fotografie de produs și eveniment în Cluj-Napoca, Romania.",
  "image": "https://www.instacapture.ro/logo-instacapture.jpg",
  "url": "https://www.instacapture.ro",
  "telephone": "+40754857466",
  "email": "contact@instacapture.ro",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Cluj-Napoca",
    "addressCountry": "RO"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 46.7712,
    "longitude": 23.6236
  },
  "sameAs": [
    "https://www.facebook.com/paultutphoto",
    "https://www.instagram.com/paul.tut.insta.capture"
  ],
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday"
    ],
    "opens": "09:00",
    "closes": "18:00"
  },
  "offers": [
    {
      "@type": "Offer",
      "itemOffered": {
        "@type": "Service",
        "name": "Fotografie",
        "description": "Captură profesională pentru evenimente, portrete, și produse."
      }
    },
    {
      "@type": "Offer",
      "itemOffered": {
        "@type": "Service",
        "name": "Editare Foto",
        "description": "Retușare și îmbunătățire avansată a imaginilor."
      }
    },
    {
      "@type": "Offer",
      "itemOffered": {
        "@type": "Service",
        "name": "Invitații Nuntă",
        "description": "Design personalizat pentru invitații de nuntă memorabile."
      }
    },
    {
      "@type": "Offer",
      "itemOffered": {
        "@type": "Service",
        "name": "Tipografie",
        "description": "Servicii de imprimare de înaltă calitate pentru diverse materiale."
      }
    },
    {
      "@type": "Offer",
      "itemOffered": {
        "@type": "Service",
        "name": "Grafică Publicitară",
        "description": "Creație vizuală pentru branduri și campanii publicitare."
      }
    },
    {
      "@type": "Offer",
      "itemOffered": {
        "@type": "Service",
        "name": "Editare Video",
        "description": "Montaj și editare video pentru conținut dinamic și atractiv."
      }
    },
    {
      "@type": "Offer",
      "itemOffered": {
        "@type": "Service",
        "name": "Fotografie de Produs",
        "description": "Imagini profesionale pentru cataloage și e-commerce."
      }
    },
    {
      "@type": "Offer",
      "itemOffered": {
        "@type": "Service",
        "name": "Fotografie de Eveniment",
        "description": "Capturarea momentelor cheie din evenimente corporate sau private."
      }
    }
  ]
}
</script>



    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    @livewireStyles


    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans bg-black">
    <div class="relative flex h-screen" x-data="{
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

        <!-- Left side with fixed photo background (hidden for portfolio page) -->
        <div x-show="!isPortfolioPage"
            class="fixed overflow-hidden top-[-10%] md:top-0 left-0 w-2/5 md:w-1/2 h-screen bg-center bg-cover z-0"
            style="background-image: url('/assets/photo-bg.webp');">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent to-black "></div>
        </div>



        <x-nav />


        <!-- Main content area -->
        <div x-bind:class="{
            'ml-[30%] sm:ml-[25%] md:ml-[40%] w-[80%] sm:w-3/4 md:w-3/5': !isPortfolioPage,
            'w-full': isPortfolioPage
        }"
            class="relative z-10 h-screen overflow-y-auto">
            <div class="absolute inset-0 content-gradient"></div>
            <div class="relative z-20 h-full p-2 overflow-y-auto md:pl-8">
                <div class="text-white">
                    {{ $slot }}
                </div>
            </div>
        </div>


        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div>
                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                        <button class="pswp__button pswp__button--share" title="Share"></button>
                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div>
                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div>

        @livewireScripts



</body>

</html>
