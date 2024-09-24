<div>
    <div class="max-w-4xl min-h-screen px-2 py-8 mx-auto text-white md:py-16 lg:py-20">
        <h1 class="mb-6 text-2xl font-bold md:text-4xl">
            Contactează-mă
        </h1>

        <p class="max-w-2xl mx-auto mb-8 text-base text-gray-300 md:text-lg lg:mb-12">
            Sunt aici pentru a răspunde întrebărilor tale și pentru a discuta despre viitoarele colaborări. Nu ezita să mă contactezi!
        </p>

        <!-- Contact Form -->
        <div class="max-w-2xl mx-auto">
            <h2 class="mb-4 text-xl font-semibold text-yellow-400 md:text-2xl md:mb-6">Trimite-mi un Mesaj</h2>
            <form wire:submit.prevent="submitForm">
                @csrf
                <div class="mb-3 md:mb-4">
                    <label for="name" class="block mb-1 text-sm font-medium text-gray-300 md:mb-2">Nume</label>
                    <input type="text" id="name" wire:model="name" class="w-full px-3 py-2 text-sm text-white bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 md:text-base" required>
                    @error('name') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3 md:mb-4">
                    <label for="email" class="block mb-1 text-sm font-medium text-gray-300 md:mb-2">Email</label>
                    <input type="email" id="email" wire:model="email" class="w-full px-3 py-2 text-sm text-white bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 md:text-base" required>
                    @error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3 md:mb-4">
                    <label for="message" class="block mb-1 text-sm font-medium text-gray-300 md:mb-2">Mesaj</label>
                    <textarea id="message" wire:model="message" rows="4" class="w-full px-3 py-2 text-sm text-white bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 md:text-base" required></textarea>
                    @error('message') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="w-full px-4 py-2 text-sm font-semibold text-black transition-colors duration-300 bg-yellow-400 rounded-md hover:bg-yellow-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-50 md:text-base" wire:loading.attr="disabled">
                    <span wire:loading.remove>Trimite Mesajul</span>
                    <span wire:loading>Se trimite...</span>
                </button>
                @if (session()->has('message'))
                    <p class="mt-3 text-sm text-green-400 md:text-base">{{ session('message') }}</p>
                @endif
            </form>
        </div>
    </div>
</div>