<div class="flex flex-col items-start justify-center max-w-3xl px-4 mx-auto mt-8 space-y-12 md:mt-24"
     x-data="{ 
         professions: ['Fotograf', 'Editor foto', 'Cameraman'],
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
        <h1 class="text-2xl font-bold leading-tight uppercase md:text-3xl font-roboto-condensed">
        InstaCapture | Fotografie Profesionala
        </h1>
        <p class="text-xl leading-relaxed text-gray-300">
            Salut! Eu sunt <span itemprop="name">Paul Țuț</span>,
            <span class="block mt-2 text-3xl text-yellow-400 uppercase font-roboto-condensed md:text-5xl" 
                  x-text="professions[currentIndex]"
                  x-transition:enter="transition ease-out duration-500"
                  x-transition:enter-start="opacity-0 transform translate-y-4"
                  x-transition:enter-end="opacity-100 transform translate-y-0">
            </span>
        </p>
        <p class="text-xl leading-relaxed text-gray-300"
           x-show="showContent"
           x-transition:enter="transition ease-out duration-1000 delay-500"
           x-transition:enter-start="opacity-0 transform translate-y-4"
           x-transition:enter-end="opacity-100 transform translate-y-0">
            Specializat în capturarea momentelor unice și transformarea lor în amintiri de neuitat în Cluj-Napoca și împrejurimi.
        </p>
    </div>

    <div class="w-full md:space-y-3"
         x-show="showContent"
         x-transition:enter="transition ease-out duration-1000 delay-1000"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0">
        <h2 class="inline-block pb-2 text-2xl font-semibold text-yellow-400 md:text-3xl">
            Descoperiți <a class="hover:text-yellow-200" href="{{ route('portofoliu') }}">Portofoliul Meu de Fotografie Profesională</a>
        </h2>
        <p class="text-lg leading-relaxed text-white md:text-xl">
            De la evenimente corporate în centrul Clujului până la nunți în împrejurimile pitorești, de la concerte în Piața Unirii la fotografii de produs pentru afacerile locale - portofoliul meu vă oferă o perspectivă asupra calității și versatilității serviciilor mele de fotografie în Cluj-Napoca.
        </p>

      <ul class="mt-4 space-y-4 text-gray-300">
    <li>📸 Fotografie de eveniment în locații emblematice din Cluj</li>
    <li>🏙️ Sesiuni foto corporate pentru companiile din Cluj-Napoca</li>
    <li>👰🤵 Fotografie de nuntă în cele mai frumoase locuri din Cluj și împrejurimi</li>
    <li>🎸 Acoperire foto pentru evenimente culturale majore precum TIFF, Untold, și Electric Castle</li>
    <li>📦 Fotografie de produs pentru e-commerce și cataloage locale</li>
    <li>🎂 Fotografie pentru zile de naștere ale copiilor, captând bucuria în parcurile și locațiile distractive din Cluj</li>
</ul>

        {{-- <a href="{{ route('contact') }}" class="inline-block px-6 py-2 mt-6 text-sm font-bold text-black transition-colors duration-300 bg-yellow-400 rounded-full md:text-lg hover:bg-yellow-300">
            Programează o Ședință Foto
        </a> --}}
    </div>
</div>