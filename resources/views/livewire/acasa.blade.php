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
     <div class="space-y-6 md:pr-24"
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

     <div class="w-full space-y-6 md:pr-24"
         x-show="showContent"
         x-transition:enter="transition ease-out duration-1000 delay-1000"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0">
      
        <template x-for="(item, index) in [
            {type: 'h3', content: 'Descoperă Portofoliul Meu', class: 'mt-1 text-2xl font-semibold text-yellow-400 uppercase md:text-3xl font-roboto-condensed'},
            {type: 'p', content: 'Te invit să explorezi <a class=\'text-yellow-400 hover:underline\' href=\'{{ route('portofoliu') }}\'>portofoliul meu</a>. Acesta îți va oferi o perspectivă asupra stilului și calității muncii mele.', class: 'text-base leading-relaxed text-white md:text-xl'},
            {type: 'p', content: 'Pasiunea mea pentru fotografie se reflectă în fiecare imagine pe care o creez. Fie că este vorba despre o nuntă romantică, un eveniment corporate important sau o ședință foto de familie plină de veselie, mă dedic întotdeauna să surprind esența și emoția fiecărui moment.', class: 'mt-4 text-base leading-relaxed text-gray-300 md:text-xl'},
            {type: 'a', content: 'Programează o Ședință Foto', class: 'inline-block px-6 py-2 my-6 text-xs font-bold text-black transition-colors duration-300 bg-yellow-400 rounded-full font-roboto-condensed md:text-base hover:bg-yellow-300', href: '{{ route('contact') }}'},
            {type: 'p', content: 'Abordez fiecare proiect cu creativitate și profesionalism, asigurându-mă că rezultatele depășesc așteptările clienților mei. Utilizez echipamente de ultimă generație și tehnici avansate de editare pentru a livra fotografii de cea mai înaltă calitate.', class: 'mt-4 text-base leading-relaxed text-white md:text-xl'},
            {type: 'p', content: 'Iată câteva din domeniile mele de expertiză:', class: 'text-base leading-relaxed text-white md:text-xl'}
        ]">
            <div x-show="showContent"
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 transform translate-y-4"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 :style="'transition-delay: ' + (1500 + index * 300) + 'ms'">
                <template x-if="item.type === 'h3'">
                    <h3 :class="item.class" x-html="item.content"></h3>
                </template>
                <template x-if="item.type === 'p'">
                    <p :class="item.class" x-html="item.content"></p>
                </template>
                <template x-if="item.type === 'a'">
                    <a :href="item.href" :class="item.class" x-text="item.content"></a>
                </template>
            </div>
        </template>

         <div class="transition-all duration-1000 ease-out delay-3000"
             :class="{ 'opacity-0 translate-y-4': !showContent, 'opacity-100 translate-y-0': showContent }">
            <ul class="p-4 mt-4 space-y-4 text-base text-gray-300 font-roboto-condensed">
                <template x-for="(expertise, index) in [
                    '📸 Fotografie de eveniment în locații emblematice din Cluj',
                    '🏙️ Sesiuni foto corporate',
                    '👰🤵 Fotografie de nuntă în cele mai frumoase locuri din Cluj și împrejurimi',
                    '🎸 Acoperire foto pentru evenimente culturale majore precum TIFF, Untold, și Electric Castle',
                    '📦 Fotografie de produs pentru e-commerce și cataloage locale',
                    '🎂 Fotografie pentru zile de naștere ale copiilor, captând bucuria în parcurile și locațiile distractive din Cluj si nu numai.'
                ]">
                    <li class="transition-all duration-500 ease-out"
                        :class="{ 'opacity-0 translate-y-4': !showContent, 'opacity-100 translate-y-0': showContent }"
                        :style="'transition-delay: ' + (3200 + index * 100) + 'ms'"
                        x-text="expertise"></li>
                </template>
            </ul>
        </div>
    </div>
</div>