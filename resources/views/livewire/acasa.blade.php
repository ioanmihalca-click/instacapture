<div class="flex flex-col items-start justify-center max-w-3xl px-2 mx-auto mt-16 space-y-8 md:mt-24"
     x-data="{ 
         professions: ['Fotograf Profesionist', 'Editor Foto Expert', 'Cameraman Creativ'],
         currentIndex: 0,
         showContent: false
     }"
     x-init="
         setInterval(() => { currentIndex = (currentIndex + 1) % professions.length }, 3000);
         setTimeout(() => showContent = true, 500);
     ">
    <div class=""
         x-show="showContent"
         x-transition:enter="transition ease-out duration-1000"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0">
        <h1 class="mb-4 text-lg font-bold text-gray-100 uppercase md:text-3xl font-roboto-condensed">
       Fotografie Profesională <br class="md:hidden"> în Cluj-Napoca
        </h1>
        <p class="text-lg leading-relaxed text-gray-300 md:text-xl">
            Bine ai venit la InstaCapture! Sunt <span itemprop="name">Paul Țuț</span>,
            <span class="block mt-2 text-3xl font-semibold text-yellow-400 uppercase font-roboto-condensed md:text-5xl" 
                  x-text="professions[currentIndex]"
                  x-transition:enter="transition ease-out duration-500"
                  x-transition:enter-start="opacity-0 transform translate-y-4"
                  x-transition:enter-end="opacity-100 transform translate-y-0">
            </span>
        </p>
        <p class="mt-4 text-lg leading-relaxed text-gray-300">
            Cu peste un deceniu de experiență în domeniul fotografiei, m-am specializat în capturarea momentelor unice și transformarea lor în amintiri de neuitat în Cluj-Napoca și împrejurimi.
        </p>
        <p class="mt-4 text-lg leading-relaxed text-gray-300">
            Pasiunea mea pentru fotografie se reflectă în fiecare imagine pe care o creez. Fie că este vorba despre o nuntă romantică, un eveniment corporate important sau o ședință foto de familie plină de veselie, mă dedic întotdeauna să surprind esența și emoția fiecărui moment.
        </p>
    </div>

    <div class="w-full space-y-6"
         x-show="showContent"
         x-transition:enter="transition ease-out duration-1000 delay-1000"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0">
        <h2 class="text-2xl font-semibold text-yellow-400 md:text-3xl">
            Serviciile Mele de Fotografie Profesională în Cluj
        </h2>
        <p class="text-lg leading-relaxed text-white">
            Ofer o gamă largă de servicii fotografice pentru a răspunde tuturor nevoilor dumneavoastră. Iată câteva din domeniile mele de expertiză:
        </p>

        <ul class="mt-4 space-y-4 text-gray-300">
            <li>📸 Fotografie de eveniment în locații emblematice din Cluj</li>
            <li>🏙️ Sesiuni foto corporate pentru companiile din Cluj-Napoca</li>
            <li>👰🤵 Fotografie de nuntă în cele mai frumoase locuri din Cluj și împrejurimi</li>
            <li>🎸 Acoperire foto pentru evenimente culturale majore precum TIFF, Untold, și Electric Castle</li>
            <li>📦 Fotografie de produs pentru e-commerce și cataloage locale</li>
            <li>🎂 Fotografie pentru zile de naștere ale copiilor, captând bucuria în parcurile și locațiile distractive din Cluj</li>
        </ul>

        <p class="mt-4 text-lg leading-relaxed text-white">
            Abordez fiecare proiect cu creativitate și profesionalism, asigurându-mă că rezultatele depășesc așteptările clienților mei. Utilizez echipamente de ultimă generație și tehnici avansate de editare pentru a livra fotografii de cea mai înaltă calitate.
        </p>

        <h3 class="mt-6 text-xl font-semibold text-yellow-400">
            Descoperă Portofoliul Meu
        </h3>
        <p class="text-lg leading-relaxed text-white">
            Te invit să explorezi <a class="text-yellow-200 hover:underline" href="{{ route('portofoliu') }}">portofoliul meu de fotografie profesională</a>. Aici vei găsi exemple din proiectele mele recente, de la evenimente corporate în centrul Clujului până la nunți în împrejurimile pitorești, și de la concerte în Piața Unirii la fotografii de produs pentru afacerile locale.
        </p>

        <p class="mt-4 text-lg leading-relaxed text-white">
            La InstaCapture, mă angajez să ofer nu doar fotografii, ci experiențe memorabile. Fiecare client este unic pentru mine, și abordez fiecare proiect cu atenție la detalii și dedicare pentru a captura esența momentelor speciale.
        </p>

        {{-- <a href="{{ route('contact') }}" class="inline-block px-6 py-3 mt-6 text-lg font-bold text-black transition-colors duration-300 bg-yellow-400 rounded-full hover:bg-yellow-300">
            Programează o Ședință Foto cu Mine în Cluj
        </a> --}}
    </div>
</div>