<div class="flex flex-col items-start justify-center max-w-3xl px-2 mx-auto mt-16 space-y-8 md:mt-24"
     x-data="{ 
         professions: ['Paul Țuț','Fotograf', 'Editor Foto', 'Cameraman'],
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
        
           <h1 class="sr-only">
                Fotografie Profesională în Cluj-Napoca
            </h1>
        <p class="mt-4 text-2xl font-bold leading-tight text-white uppercase md:text-4xl font-roboto-condensed">
            Salut! Eu sunt
            <span class="block mt-2 text-3xl text-yellow-400 md:text-5xl" 
                  x-text="professions[currentIndex]"
                  x-transition:enter="transition ease-out duration-500"
                  x-transition:enter-start="opacity-0 transform translate-y-4"
                  x-transition:enter-end="opacity-100 transform translate-y-0">
            </span>
        </p>
        <p class="text-base leading-relaxed text-gray-300 md:text-xl"
           x-show="showContent"
           x-transition:enter="transition ease-out duration-1000 delay-300"
           x-transition:enter-start="opacity-0 transform translate-y-4"
           x-transition:enter-end="opacity-100 transform translate-y-0">
            Capturând momente unice și transformându-le în amintiri de neuitat.
        </p>
    </div>

    <div class="w-full space-y-6"
         x-show="showContent"
         x-transition:enter="transition ease-out duration-1000 delay-1000"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0">
      
        <h3 class="mt-1 text-2xl font-semibold text-yellow-400 uppercase md:text-3xl font-roboto-condensed">
            Descoperă Portofoliul Meu
        </h3>
     
        <p class="text-base leading-relaxed text-white md:text-xl"
        x-show="showContent"
         x-transition:enter="transition ease-out duration-1000 delay-1500"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0">
          Te invit să explorezi <a class="text-yellow-400 hover:underline" href="{{ route('portofoliu') }}">portofoliul meu</a>. Acesta îți va oferi o perspectivă asupra stilului și calității muncii mele. 
        </p>


          <p class="mt-4 text-base leading-relaxed text-gray-300 md:text-xl"
          x-show="showContent"
           x-transition:enter="transition ease-out duration-1000 delay-500"
           x-transition:enter-start="opacity-0 transform translate-y-4"
           x-transition:enter-end="opacity-100 transform translate-y-0">
            Pasiunea mea pentru fotografie se reflectă în fiecare imagine pe care o creez. Fie că este vorba despre o nuntă romantică, un eveniment corporate important sau o ședință foto de familie plină de veselie, mă dedic întotdeauna să surprind esența și emoția fiecărui moment.
        </p>
        <p class="text-base leading-relaxed text-white md:text-xl">
        Iată câteva din domeniile mele de expertiză:
        </p>

        <ul class="mt-4 space-y-4 text-gray-300 font-roboto-condensed">
            <li>📸 Fotografie de eveniment în locații emblematice din Cluj</li>
            <li>🏙️ Sesiuni foto corporate</li>
            <li>👰🤵 Fotografie de nuntă în cele mai frumoase locuri din Cluj și împrejurimi</li>
            <li>🎸 Acoperire foto pentru evenimente culturale majore precum TIFF, Untold, și Electric Castle</li>
            <li>📦 Fotografie de produs pentru e-commerce și cataloage locale</li>
            <li>🎂 Fotografie pentru zile de naștere ale copiilor, captând bucuria în parcurile și locațiile distractive din Cluj si nu numai.</li>
        </ul>

        <p class="mt-4 text-base leading-relaxed text-white md:text-xl">
            Abordez fiecare proiect cu creativitate și profesionalism, asigurându-mă că rezultatele depășesc așteptările clienților mei. Utilizez echipamente de ultimă generație și tehnici avansate de editare pentru a livra fotografii de cea mai înaltă calitate.
        </p>

        <a href="{{ route('contact') }}" class="inline-block px-6 py-2 my-6 text-xs font-bold text-black transition-colors duration-300 bg-yellow-400 rounded-full md:text-lg hover:bg-yellow-300">
            Programează o Ședință Foto 
        </a>
    </div>
</div>