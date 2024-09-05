<div>
    <footer class="py-4 text-gray-300 bg-gray-900">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col items-center justify-between md:flex-row">
                <!-- Logo and motto -->
                <div class="flex items-center mb-4 md:mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2 text-yellow-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                    </svg>
                    <div>
                        <span class="text-lg font-semibold text-white">InstaCapture</span>
                        <p class="text-xs text-gray-400">Capturez momente, creez amintiri</p>
                    </div>
                </div>
                
                <!-- Quick links -->
                <div class="flex space-x-4">
                    <a href="{{ route('home') }}" class="text-sm transition-colors duration-300 hover:text-yellow-400">Acasa</a>
                    <a href="{{ route('despre') }}" class="text-sm transition-colors duration-300 hover:text-yellow-400">Despre</a>
                    <a href="{{ route('servicii') }}" class="text-sm transition-colors duration-300 hover:text-yellow-400">Servicii</a>
                    <a href="{{ route('portofoliu') }}" class="text-sm transition-colors duration-300 hover:text-yellow-400">Portfoliu</a>
                    <a href="{{ route('contact') }}" class="text-sm transition-colors duration-300 hover:text-yellow-400">Contact</a>
                </div>
            </div>
            
            <div class="pt-4 mt-4 text-xs text-center border-t border-gray-700">
                <p>&copy; {{ date('Y') }} InstaCapture. Toate drepturile rezervate.</p>
                <p class="mt-1">
                    Aplicatie web de 
                    <a href="https://clickstudios-digital.com" target="_blank" rel="noopener noreferrer" class="text-yellow-400 transition-colors duration-300 hover:text-yellow-300">
                        Click Studios Digital
                    </a>
                </p>
            </div>
        </div>
    </footer>
</div>