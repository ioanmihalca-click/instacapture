<div class="flex flex-col items-start justify-center h-full max-w-3xl px-4 mx-auto space-y-8"     x-data="{ showContent: false }"
     x-init="setTimeout(() => showContent = true, 300)">
    
    <h1 class="mt-8 text-2xl font-bold uppercase md:text-4xl font-roboto-condensed"
        x-show="showContent"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 transform -translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0">
        Despre Mine
    </h1>

    <div class="space-y-6"
         x-show="showContent"
         x-transition:enter="transition ease-out duration-700 delay-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100">
        
        <p class="text-lg leading-relaxed text-gray-300">
            De peste 8 ani ofer amintiri unice și sesiuni de fotografie memorabile, fie că este vorba despre evenimente în familie sau evenimente corporate.
        </p>

        <p class="text-lg leading-relaxed text-gray-300">
            Mi s-a spus că sunt <span class="font-semibold text-yellow-400">efervescent, carismatic și comunicativ</span>, ceea ce face ca toată experiența să fie una dinamică și frumoasă, iar rezultatul pe măsura așteptărilor, cuvântul cheie fiind, bineînțeles, comunicarea.
        </p>

        <p class="text-lg leading-relaxed text-gray-300">
            Răsfoiește  <a class="text-yellow-400" href="{{ route('portofoliu') }}">portofoliul</a>. Dacă îți place ce vezi și ai nevoie de un fotograf, dă-mi un mesaj.
        </p>
    </div>

    <div class="mt-8 space-y-4"
         x-show="showContent"
         x-transition:enter="transition ease-out duration-700 delay-600"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0">
        
        <h2 class="text-xl font-semibold text-yellow-400">Contact</h2>
        
        <ul class="space-y-2 text-gray-300">
            <li class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                </svg>
                <span>0754 857 466</span>
            </li>
            <li class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                </svg>
                <span>Cluj - Napoca</span>
            </li>
            <li class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                </svg>
                <span>paultut@yahoo.com / contact@instacapture.ro</span>
            </li>
        </ul>
    </div>

</div>