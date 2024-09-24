<div>
    <div class="max-w-4xl min-h-screen px-4 py-16 mx-auto text-white lg:py-20"
     x-data="{ activeExperience: null }"
     x-init="() => {
         $nextTick(() => {
             let observer = new IntersectionObserver((entries) => {
                 entries.forEach(entry => {
                     if (entry.isIntersecting) {
                         entry.target.classList.add('animate-fade-in-up');
                     }
                 });
             }, { threshold: 0.1 });
             
             document.querySelectorAll('.experience-item').forEach(item => {
                 observer.observe(item);
             });
         });
     }">

    <h1 class="mb-8 text-2xl font-bold text-center md:text-4xl ">
        Experiențe Profesionale
    </h1>

    <p class="max-w-2xl mx-auto mb-12 text-lg text-center text-gray-300 md:text-xl">
        O privire asupra parcursului meu profesional în domeniul fotografiei, evidențiind proiectele și colaborările semnificative.
    </p>

    <div class="relative">
        <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-yellow-400"></div>

        <div class="space-y-8 md:space-y-12">
            <div class="relative pl-12 experience-item md:pl-0">
                <div class="md:flex md:items-center">
                    <div class="md:w-1/2 md:pr-8 md:text-right">
                        <h3 class="text-xl font-semibold text-yellow-400">Gala Universității de Arte și Design Cluj</h3>
                        <p class="text-sm text-gray-400 md:text-base">2017 - 2019</p>
                    </div>
                    <div class="absolute top-0 left-0 flex items-center justify-center w-8 h-8 bg-yellow-400 rounded-full md:left-1/2 md:-ml-4 md:top-1/2 md:-mt-4">
                        <span class="text-xs font-bold text-black">2019</span>
                    </div>
                    <div class="mt-2 md:w-1/2 md:pl-8 md:mt-0">
                        <p class="text-gray-300">Fotograf oficial pentru prestigioasa gală anuală, capturând momente cheie și creații artistice.</p>
                    </div>
                </div>
            </div>

            <div class="relative pl-12 experience-item md:pl-0">
                <div class="md:flex md:items-center">
                    <div class="md:w-1/2 md:pr-8 md:text-right">
                        <h3 class="text-xl font-semibold text-yellow-400">Teatrul Național Cluj Napoca</h3>
                        <p class="text-sm text-gray-400 md:text-base">2017 - 2022</p>
                    </div>
                    <div class="absolute top-0 left-0 flex items-center justify-center w-8 h-8 bg-yellow-400 rounded-full md:left-1/2 md:-ml-4 md:top-1/2 md:-mt-4">
                        <span class="text-xs font-bold text-black">2022</span>
                    </div>
                    <div class="mt-2 md:w-1/2 md:pl-8 md:mt-0">
                        <p class="text-gray-300">Colaborare de lungă durată pentru imortalizarea spectacolelor și evenimentelor teatrale.</p>
                    </div>
                </div>
            </div>

            <div class="relative pl-12 experience-item md:pl-0">
                <div class="md:flex md:items-center">
                    <div class="md:w-1/2 md:pr-8 md:text-right">
                        <h3 class="text-xl font-semibold text-yellow-400">Look TV Cluj</h3>
                        <p class="text-sm text-gray-400 md:text-base">2018 - 2019</p>
                    </div>
                    <div class="absolute top-0 left-0 flex items-center justify-center w-8 h-8 bg-yellow-400 rounded-full md:left-1/2 md:-ml-4 md:top-1/2 md:-mt-4">
                        <span class="text-xs font-bold text-black">2018</span>
                    </div>
                    <div class="mt-2 md:w-1/2 md:pl-8 md:mt-0">
                        <p class="text-gray-300">Fotograf pentru diverse producții TV, acoperind evenimente și sesiuni de studio.</p>
                    </div>
                </div>
            </div>

            <div class="relative pl-12 experience-item md:pl-0">
                <div class="md:flex md:items-center">
                    <div class="md:w-1/2 md:pr-8 md:text-right">
                        <h3 class="text-xl font-semibold text-yellow-400">Raliul Iașului și Raliul Brașovului</h3>
                        <p class="text-sm text-gray-400 md:text-base">2018 - 2019</p>
                    </div>
                    <div class="absolute top-0 left-0 flex items-center justify-center w-8 h-8 bg-yellow-400 rounded-full md:left-1/2 md:-ml-4 md:top-1/2 md:-mt-4">
                        <span class="text-xs font-bold text-black">2019</span>
                    </div>
                    <div class="mt-2 md:w-1/2 md:pl-8 md:mt-0">
                        <p class="text-gray-300">Fotograf oficial pentru competiții auto de anvergură, capturând acțiunea și emoția curselor.</p>
                    </div>
                </div>
            </div>

            <div class="relative pl-12 experience-item md:pl-0">
                <div class="md:flex md:items-center">
                    <div class="md:w-1/2 md:pr-8 md:text-right">
                        <h3 class="text-xl font-semibold text-yellow-400">Fotografie Comercială și de Studio</h3>
                        <p class="text-sm text-gray-400 md:text-base">2015 - Prezent</p>
                    </div>
                    <div class="absolute top-0 left-0 flex items-center justify-center w-8 h-8 bg-yellow-400 rounded-full md:left-1/2 md:-ml-4 md:top-1/2 md:-mt-4">
                        <span class="text-xs font-bold text-black">2015</span>
                    </div>
                    <div class="mt-2 md:w-1/2 md:pl-8 md:mt-0">
                        <p class="text-gray-300">Sesiuni foto pentru saloane de beauty & fashion, fotografie de produs și diverse proiecte de studio.</p>
                    </div>
                </div>
            </div>

            <div class="relative pl-12 experience-item md:pl-0">
                <div class="md:flex md:items-center">
                    <div class="md:w-1/2 md:pr-8 md:text-right">
                        <h3 class="text-xl font-semibold text-yellow-400">Evenimente Private</h3>
                        <p class="text-sm text-gray-400 md:text-base">2015 - Prezent</p>
                    </div>
                    <div class="absolute top-0 left-0 flex items-center justify-center w-8 h-8 bg-yellow-400 rounded-full md:left-1/2 md:-ml-4 md:top-1/2 md:-mt-4">
                        <span class="text-xs font-bold text-black">2015</span>
                    </div>
                    <div class="mt-2 md:w-1/2 md:pl-8 md:mt-0">
                        <p class="text-gray-300">Fotograf pentru numeroase evenimente private, inclusiv nunți, botezuri și alte celebrări personale.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
</div>

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
    }
</style>
</div>
