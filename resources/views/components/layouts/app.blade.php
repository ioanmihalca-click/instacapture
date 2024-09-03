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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @livewireStyles

    
     <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-black">
<div class="relative flex h-screen" 
      x-data="{ 
          isMenuOpen: false,
          isTransitioning: false,
          currentUrl: '{{ url()->current() }}',
      }" 
      x-on:livewire:navigating.window="isTransitioning = true"
      x-on:livewire:navigated.window="
          setTimeout(() => {
              isTransitioning = false;
          }, 300);
          if ($event.detail && $event.detail.url) {
              currentUrl = $event.detail.url;
          }
      ">
    
    <!-- Loading Indicator -->
    <div x-show="isTransitioning" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="w-32 h-32 border-t-2 border-b-2 rounded-full border-x-yellow-400 animate-spin"></div>
    </div>

    <!-- Left side with photo background and particles -->
    <div class="relative z-0 w-1/3 md:w-1/2">
        <div class="absolute inset-0 bg-center bg-cover" style="background-image: url('/assets/photo-bg.jpg');">
            
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-transparent to-black"></div>
    </div>
    <!-- Navigation -->

    <!-- Overlay navigation -->
    <div class="absolute top-0 left-0 right-0 z-30 p-4">
        <div class="container flex items-center justify-between mx-auto">
            <!-- Logo Section -->
            <div class="flex items-center space-x-2 md:-ml-8">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 font-semibold text-white md:h-9 md:w-9 md:pb-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                </svg>
                <p class="text-xl tracking-wider text-white uppercase md:text-3xl font-roboto-condensed">Insta<span
                        class="font-semibold">Capture</span></p>
            </div>

            <!-- Navigation -->
            <nav>
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button @click="isMenuOpen = !isMenuOpen" class="text-white hover:text-gray-300 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

           <!-- Desktop menu -->
<ul class="items-center hidden space-x-4 text-white uppercase md:flex font-roboto-condensed">
    <li><a wire:navigate href="{{ route('home') }}" class="hover:text-gray-300">Acasa</a></li>
    <li><a wire:navigate href="{{ route('despre') }}" class="hover:text-gray-300">Despre</a></li>
    <li><a wire:navigate href="{{ route('skilluri') }}" class="hover:text-gray-300">Skill-uri</a></li>
    <li><a wire:navigate href="{{ route('servicii') }}" class="hover:text-gray-300">Servicii</a></li>
    <li><a wire:navigate href="{{ route('experienta') }}" class="hover:text-gray-300">Experienta</a></li>
    <li><a wire:navigate href="{{ route('portofoliu') }}" class="hover:text-gray-300">Portofoliu</a></li>
    <li><a wire:navigate href="{{ route('contact') }}" class="hover:text-gray-300">Contact</a></li>
</ul>
            </nav>
        </div>
    </div>

    <!-- Full-screen mobile menu -->
    <div x-show="isMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-90"
         class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-black bg-opacity-90 md:hidden"
         @click.away="isMenuOpen = false">
          <!-- Logo Section -->
            <div class="flex mb-4 space-x-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 font-semibold text-white md:h-9 md:w-9 md:pb-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                </svg>
                <p class="text-xl tracking-wider text-white uppercase md:text-3xl font-roboto-condensed">Insta<span
                        class="font-semibold">Capture</span></p>
            </div>
        <!-- Close button -->
        <button @click="isMenuOpen = false" class="absolute text-white top-4 right-4 hover:text-gray-300 focus:outline-none">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        
        <ul class="text-center text-white">
            <li class="my-4"><a wire:navigate href="{{ route('home') }}" class="text-2xl hover:text-gray-300">Acasa</a></li>
            <li class="my-4"><a wire:navigate href="{{ route('despre') }}" class="text-2xl hover:text-gray-300" @click="isMenuOpen = false">Despre</a></li>
            <li class="my-4"><a wire:navigate href="{{ route('skilluri') }}" class="text-2xl hover:text-gray-300" @click="isMenuOpen = false">Skill-uri</a></li>
            <li class="my-4"><a wire:navigate href="{{ route('servicii') }}" class="text-2xl hover:text-gray-300" @click="isMenuOpen = false">Servicii</a></li>
            <li class="my-4"><a wire:navigate href="{{ route('experienta') }}" class="text-2xl hover:text-gray-300" @click="isMenuOpen = false">Experiente</a></li>
            <li class="my-4"><a wire:navigate href="{{ route('portofoliu') }}" class="text-2xl hover:text-gray-300" @click="isMenuOpen = false">Portofoliu</a></li>
            <li class="my-4"><a wire:navigate href="{{ route('contact') }}" class="text-2xl hover:text-gray-300" @click="isMenuOpen = false">Contact</a></li>
        </ul>
    </div>

  
     <!-- Right side with black background and content -->
    <div class="relative z-20 flex flex-col w-2/3 mt-12 text-white bg-black bg-opacity-50 md:mt-2 md:w-1/2">
        <main class="flex-1 p-4 text-left">
            {{ $slot }}
        </main>
    </div>

    

    @livewireScripts
</div>
<footer class="text-gray-300 bg-gray-900">

           
                <p class="text-sm text-center">
                    &copy; <span x-text="new Date().getFullYear()"></span> InstaCapture. Toate drepturile rezervate.
                </p>
           

           
      
        <div class="mt-4 text-sm text-center text-gray-400">
            Aplicație web dezvoltată de 
            <a href="https://clickstudios.ro" target="_blank" rel="noopener noreferrer" class="text-yellow-400 transition-colors duration-300 hover:text-yellow-300">
                Click Studios Digital
            </a>
        </div>
  
</footer>
</body>
</html>