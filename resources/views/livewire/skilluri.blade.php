<div>
<div class="max-w-4xl min-h-screen px-4 py-8 mx-auto text-white md:py-12"
     x-data="{
         skills: [
             { name: 'Fotografie', icon: 'camera', description: 'Capturarea momentelor unice cu creativitate și precizie.', progress: 95 },
             { name: 'Editare Foto', icon: 'image', description: 'Prelucrare avansată pentru rezultate impresionante.', progress: 90 },
             { name: 'Editare Video', icon: 'film', description: 'Montaj și editare video pentru conținut dinamic.', progress: 85 },
             { name: 'Creativitate', icon: 'sparkles', description: 'Abordare inovatoare în fiecare proiect.', progress: 98 },
             { name: 'Rapiditate', icon: 'lightning-bolt', description: 'Livrare promptă fără compromisuri de calitate.', progress: 92 }
         ],
         activeSkill: null,
         isMobile: window.innerWidth < 768,
         isIntersecting: false
     }"
     x-init="
         window.addEventListener('resize', () => {
             isMobile = window.innerWidth < 768;
         });
     "
     x-intersect="isIntersecting = true">

    <h1 class="mb-6 text-2xl font-bold text-center uppercase md:mt-12 md:text-4xl font-roboto-condensed md:mb-8"
        x-intersect="$el.classList.add('animate-fade-in-up')">
        Competențe și Abilități
    </h1>

    {{-- <p class="max-w-2xl mb-8 text-lg leading-relaxed text-gray-300 md:text-xl md:mb-12"
       x-intersect="$el.classList.add('animate-fade-in-up')">
        A fi fotograf nu mai este de mult timp despre a avea un aparat foto și o cameră întunecată în care să developezi poze. Astăzi este în aceeași măsură despre creativitate și rapiditate, despre imaginație și reacție de răspuns. Pentru a putea oferi clienților ceea ce își doresc, într-un timeframe cât mai scurt, m-am specializat pe prelucrare foto-video.
    </p> --}}

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        <template x-for="(skill, index) in skills" :key="index">
            <div class="p-6 transition-all duration-500 transform bg-gray-800 rounded-lg hover:scale-105 hover:shadow-xl"
                 :class="{ 'ring-2 ring-yellow-400': activeSkill === index }"
                 @click="activeSkill = activeSkill === index ? null : index"
                 x-intersect="$el.classList.add('animate-fade-in-up')"
                 :style="`transition-delay: ${index * 100}ms`">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-yellow-400" x-text="skill.name"></h3>
                    <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="
                            skill.icon === 'camera' ? 'M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z M15 13a3 3 0 11-6 0 3 3 0 016 0z' :
                            skill.icon === 'image' ? 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z' :
                            skill.icon === 'film' ? 'M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z' :
                            skill.icon === 'sparkles' ? 'M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z' :
                            'M13 10V3L4 14h7v7l9-11h-7z'
                        "></path>
                    </svg>
                </div>
                <p class="mb-4 text-gray-300" x-text="skill.description"></p>
                <div class="w-full bg-gray-700 rounded-full h-2.5">
                    <div class="h-2.5 rounded-full bg-yellow-400 transition-all duration-1000 ease-out"
                         :style="isIntersecting ? `width: ${skill.progress}%` : 'width: 0%'"></div>
                </div>
                <span class="text-sm text-gray-400" x-text="`Nivel de expertiză: ${skill.progress}%`"></span>
            </div>
        </template>
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
