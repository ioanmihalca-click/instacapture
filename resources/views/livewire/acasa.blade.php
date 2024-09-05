<div class="flex flex-col items-start justify-center max-w-3xl px-4 mx-auto mt-12 space-y-12 md:mt-32"
     x-data="{ 
         professions: ['Paul Tut', 'Fotograf', 'Editor Foto'],
         currentIndex: 0,
         showContent: false
     }"
     x-init="
         setInterval(() => { currentIndex = (currentIndex + 1) % professions.length }, 3000);
         setTimeout(() => showContent = true, 500);
     ">
    <div class="space-y-6"
         x-show="showContent"
         x-transition:enter="transition ease-out duration-1000"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0">
        <h1 class="text-2xl font-bold leading-tight uppercase md:text-4xl font-roboto-condensed">
            Salut! Eu sunt 
            <span class="block mt-2 text-3xl text-yellow-400 md:text-5xl" 
                  x-text="professions[currentIndex]"
                  x-transition:enter="transition ease-out duration-500"
                  x-transition:enter-start="opacity-0 transform translate-y-4"
                  x-transition:enter-end="opacity-100 transform translate-y-0">
            </span>
        </h1>
        <p class="text-xl leading-relaxed text-gray-300"
           x-show="showContent"
           x-transition:enter="transition ease-out duration-1000 delay-500"
           x-transition:enter-start="opacity-0 transform translate-y-4"
           x-transition:enter-end="opacity-100 transform translate-y-0">
            Capturând momente unice și transformându-le în amintiri de neuitat.
        </p>
    </div>

    <div class="w-full md:space-y-3"
         x-show="showContent"
         x-transition:enter="transition ease-out duration-1000 delay-1000"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0">
        <h2 class="inline-block pb-2 text-2xl font-semibold text-yellow-400 md:text-3xl">
            Exploreaza <a class="hover:text-yellow-200 " href="{{ route('portofoliu') }}">Portofoliul Meu</a>
        </h2>
        <p class="text-lg leading-relaxed text-white md:text-xl">
            Evenimente corporate sau private, concerte sau fotografii de produs profesionale.
            Portofoliul meu îți va oferi o perspectivă asupra stilului și calității muncii mele.
        </p>
        {{-- <a href="{{ route('portofoliu') }}" 
           class="inline-block px-8 py-4 text-lg font-semibold text-black transition-all duration-300 bg-yellow-400 rounded-full md:text-xl hover:bg-yellow-300 hover:shadow-lg hover:-translate-y-1">
            Portofoliu
        </a> --}}
    </div>
</div>