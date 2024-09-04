<div>
<div class="max-w-6xl min-h-screen px-4 py-12 mx-auto text-white md:py-16 lg:py-20"
     x-data="{
         services: [
             { name: 'Fotografie', icon: 'camera', description: 'Captură profesională pentru evenimente, portrete, și produse.' },
             { name: 'Editare Foto', icon: 'adjustments', description: 'Retușare și îmbunătățire avansată a imaginilor.' },
             { name: 'Invitații Nuntă', icon: 'mail', description: 'Design personalizat pentru invitații de nuntă memorabile.' },
             { name: 'Tipografie', icon: 'printer', description: 'Servicii de imprimare de înaltă calitate pentru diverse materiale.' },
             { name: 'Grafică Publicitară', icon: 'pencil', description: 'Creație vizuală pentru branduri și campanii publicitare.' },
             { name: 'Editare Video', icon: 'film', description: 'Montaj și editare video pentru conținut dinamic și atractiv.' },
             { name: 'Fotografie de Produs', icon: 'cube', description: 'Imagini profesionale pentru cataloage și e-commerce.' },
             { name: 'Fotografie de Eveniment', icon: 'users', description: 'Capturarea momentelor cheie din evenimente corporate sau private.' }
         ],
         activeService: null,
         isInView: false
     }"
     x-intersect="isInView = true">

    <h1 class="mb-8 text-2xl font-bold text-center uppercase font-roboto-condensed md:text-4xl "
        x-intersect="$el.classList.add('animate-fade-in-up')">
        Serviciile mele
    </h1>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        <template x-for="(service, index) in services" :key="index">
            <div class="relative p-4 overflow-hidden transition-all duration-300 transform bg-gray-800 rounded-lg group hover:shadow-2xl hover:scale-105"
                 :class="{ 'ring-2 ring-yellow-400': activeService === index }"
                 @mouseenter="activeService = index"
                 @mouseleave="activeService = null"
                 x-intersect="$el.classList.add('animate-fade-in-up')"
                 :style="`transition-delay: ${index * 100}ms`">
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-semibold text-yellow-400 transition-colors duration-300 group-hover:text-white" x-text="service.name"></h3>
                        <svg class="w-8 h-8 text-yellow-400 transition-transform duration-300 transform group-hover:scale-110 group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="
                                service.icon === 'camera' ? 'M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z' :
                                service.icon === 'adjustments' ? 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4' :
                                service.icon === 'mail' ? 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z' :
                                service.icon === 'printer' ? 'M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z' :
                                service.icon === 'pencil' ? 'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z' :
                                service.icon === 'film' ? 'M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z' :
                                service.icon === 'cube' ? 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4' :
                                'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'
                            "></path>
                        </svg>
                    </div>
                    <p class="text-gray-300 transition-colors duration-300 group-hover:text-white" x-text="service.description"></p>
                    <a href="#" class="inline-block mt-4 text-yellow-400 transition-colors duration-300 group-hover:text-white hover:underline">Află mai multe</a>
                </div>
                <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-br from-yellow-400 to-yellow-600 group-hover:opacity-20"></div>
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
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
    }
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
</style>
</div>
