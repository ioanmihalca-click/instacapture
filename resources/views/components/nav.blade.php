 <!-- Navigation -->


        <!-- Overlay navigation -->
        <div class="absolute top-0 left-0 right-0 z-30 p-6 bg-gradient-to-t from-transparent to-black" :class="{ 'w-full': isPortfolioPage }">
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
                        <button @click="isMenuOpen = !isMenuOpen" aria-label="Deschide meniul"
                            class="text-white hover:text-gray-300 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>

                    <ul class="items-center hidden space-x-4 text-white uppercase md:flex font-roboto-condensed">
                        <li>
                            <a wire:navigate href="{{ route('home') }}"
                                class="hover:text-gray-300 {{ request()->routeIs('home') ? 'text-yellow-400 font-bold' : '' }}">
                                Acasa
                            </a>
                        </li>
                        <li>
                            <a wire:navigate href="{{ route('despre') }}"
                                class="hover:text-gray-300 {{ request()->routeIs('despre') ? 'text-yellow-400 font-bold' : '' }}">
                                Despre
                            </a>
                        </li>
                        <li>
                            <a wire:navigate href="{{ route('skilluri') }}"
                                class="hover:text-gray-300 {{ request()->routeIs('skilluri') ? 'text-yellow-400 font-bold' : '' }}">
                                Skill-uri
                            </a>
                        </li>
                        <li>
                            <a wire:navigate href="{{ route('servicii') }}"
                                class="hover:text-gray-300 {{ request()->routeIs('servicii') ? 'text-yellow-400 font-bold' : '' }}">
                                Servicii
                            </a>
                        </li>
                        <li>
                            <a wire:navigate href="{{ route('experienta') }}"
                                class="hover:text-gray-300 {{ request()->routeIs('experienta') ? 'text-yellow-400 font-bold' : '' }}">
                                Experiente
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('portofoliu') }}"
                                class="hover:text-gray-300 {{ request()->routeIs('portofoliu') ? 'text-yellow-400 font-bold' : '' }}">
                                Portofoliu
                            </a>
                        </li>
                        <li>
                            <a wire:navigate href="{{ route('blog.index') }}"
                                class="hover:text-gray-300 {{ request()->routeIs('blog.index') ? 'text-yellow-400 font-bold' : '' }}">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a wire:navigate href="{{ route('contact') }}"
                                class="hover:text-gray-300 {{ request()->routeIs('contact') ? 'text-yellow-400 font-bold' : '' }}">
                                Contact
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Full-screen mobile menu -->
        <<div x-cloak x-show="isMenuOpen"  x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-black bg-opacity-90 md:hidden"
            @click.away="isMenuOpen = false">

            <!-- Close button -->
            <button @click="isMenuOpen = false"
                class="absolute text-white top-4 right-4 hover:text-gray-300 focus:outline-none">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>

            <!-- Logo Mobile Section -->
            <div class="flex items-center mb-4 space-x-2">
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

            <ul class="text-center text-white font-roboto-condensed">
                <li class="my-4">
                    <a wire:navigate href="{{ route('home') }}"
                        class="text-2xl hover:text-gray-300 {{ request()->routeIs('home') ? 'text-yellow-400 font-bold' : '' }}"
                        @click="isMenuOpen = false">
                        Acasa
                    </a>
                </li>
                <li class="my-4">
                    <a wire:navigate href="{{ route('despre') }}"
                        class="text-2xl hover:text-gray-300 {{ request()->routeIs('despre') ? 'text-yellow-400 font-bold' : '' }}"
                        @click="isMenuOpen = false">
                        Despre
                    </a>
                </li>
                <li class="my-4">
                    <a wire:navigate href="{{ route('skilluri') }}"
                        class="text-2xl hover:text-gray-300 {{ request()->routeIs('skilluri') ? 'text-yellow-400 font-bold' : '' }}"
                        @click="isMenuOpen = false">
                        Skill-uri
                    </a>
                </li>
                <li class="my-4">
                    <a wire:navigate href="{{ route('servicii') }}"
                        class="text-2xl hover:text-gray-300 {{ request()->routeIs('servicii') ? 'text-yellow-400 font-bold' : '' }}"
                        @click="isMenuOpen = false">
                        Servicii
                    </a>
                </li>
                <li class="my-4">
                    <a wire:navigate href="{{ route('experienta') }}"
                        class="text-2xl hover:text-gray-300 {{ request()->routeIs('experienta') ? 'text-yellow-400 font-bold' : '' }}"
                        @click="isMenuOpen = false">
                        Experiente
                    </a>
                </li>
                <li class="my-4">
                    <a href="{{ route('portofoliu') }}"
                        class="text-2xl hover:text-gray-300 {{ request()->routeIs('portofoliu') ? 'text-yellow-400 font-bold' : '' }}"
                        @click="isMenuOpen = false">
                        Portofoliu
                    </a>
                </li>
                <li class="my-4">
                    <a wire:navigate href="{{ route('blog.index') }}"
                        class="text-2xl hover:text-gray-300 {{ request()->routeIs('blog.index') ? 'text-yellow-400 font-bold' : '' }}"
                        @click="isMenuOpen = false">
                        Blog
                    </a>
                </li>
                <li class="my-4">
                    <a wire:navigate href="{{ route('contact') }}"
                        class="text-2xl hover:text-gray-300 {{ request()->routeIs('contact') ? 'text-yellow-400 font-bold' : '' }}"
                        @click="isMenuOpen = false">
                        Contact
                    </a>
                </li>
            </ul>
        </div>