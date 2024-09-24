<div class="flex flex-col items-start justify-center h-full max-w-3xl px-4 mx-auto space-y-8 "     x-data="{ showContent: false }"
     x-init="setTimeout(() => showContent = true, 300)">
    
    <h1 class="mt-24 text-2xl font-bold uppercase md:text-4xl font-roboto-condensed"
        x-show="showContent"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 transform -translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0">
         Despre Paul Țuț - Fotograf Profesionist în Cluj-Napoca
    </h1>

    <div class="space-y-6"
         x-show="showContent"
         x-transition:enter="transition ease-out duration-700 delay-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100">
        
        <p class="text-lg leading-relaxed text-gray-300">
            Cu o experiență de peste 10 ani în fotografie profesională și o carieră îndelungată în televiziune, am dezvoltat o perspectivă unică asupra captării momentelor memorabile. Lucrul în televiziune mi-a adus un plus semnificativ de experiență, perfecționându-mi abilitățile de a surprinde acțiunea, emoția și detaliile într-un mod dinamic și captivant.
        </p>

        <p class="text-lg leading-relaxed text-gray-300">
            Mi s-a spus că sunt <span class="font-semibold text-yellow-400">efervescent, carismatic și comunicativ</span>, ceea ce face ca toată experiența să fie una dinamică și frumoasă, iar rezultatul pe măsura așteptărilor, cuvântul cheie fiind, bineînțeles, comunicarea.
        </p>

         <p class="text-lg leading-relaxed text-gray-300">
            Te invit să răsfoiești <a class="text-yellow-400 hover:underline" href="{{ route('portofoliu') }}">portofoliul meu</a>. Acolo vei găsi o selecție de lucrări care îmbină tehnicile profesionale din fotografie și televiziune. Dacă îți place ce vezi și ai nevoie de un fotograf cu o perspectivă unică, nu ezita să mă contactezi.
        </p>
    </div>

    <div class="mt-8 space-y-4"
         x-show="showContent"
         x-transition:enter="transition ease-out duration-700 delay-600"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0">
        
        <!-- Contact Information -->
        <div class="p-4 md:p-6">
            <h2 class="mb-4 text-xl font-semibold text-yellow-400 md:text-2xl md:mb-6">Contactează Fotograful Tău din Cluj-Napoca</h2>
            <ul class="space-y-3 text-sm text-gray-300 md:text-base md:space-y-4">
                <li class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400 md:w-6 md:h-6" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                    </svg>
                    <a href="tel:0754857466" class="transition-colors hover:text-yellow-400">0754 857 466</a>
                </li>
                <li class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400 md:w-6 md:h-6" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                    </svg>
                    <a href="https://wa.me/40754857466" target="_blank" rel="noopener noreferrer" class="transition-colors hover:text-yellow-400">WhatsApp pentru programări rapide</a>
                </li>
                <li class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400 md:w-6 md:h-6" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    <span>Cluj-Napoca, disponibil pentru proiecte în tot județul Cluj</span>
                </li>
                <li class="flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400 md:w-6 md:h-6" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                    <div>
                        <a href="mailto:paultut@yahoo.com" class="transition-colors hover:text-yellow-400">paultut@yahoo.com</a><br>
                        <a href="mailto:contact@instacapture.ro" class="transition-colors hover:text-yellow-400">contact@instacapture.ro</a>
                    </div>
                </li>
            </ul>
            
            
            <div class="mt-6 md:mt-8">
                <h3 class="mb-3 text-lg font-semibold text-yellow-400 md:text-xl md:mb-4">Urmărește-mă</h3>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com/paultutphoto" class="text-gray-300 transition-colors duration-300 hover:text-yellow-400">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/paul.tut.insta.capture" class="text-gray-300 transition-colors duration-300 hover:text-yellow-400">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>