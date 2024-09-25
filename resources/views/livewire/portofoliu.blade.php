<div class="mt-24 md:p-8">
    <h2 class="mb-8 text-2xl font-bold font-roboto-condensed uppercase text-center md:text-4xl">Portofoliu</h2>

    <div class="mb-8">
        <div class="grid grid-cols-2 gap-2 sm:flex sm:flex-wrap sm:justify-center">
            <button wire:click="selectCategory(null)" aria-label="Show all categories"
                class="w-full px-4 py-2 text-sm font-medium transition-colors duration-300 rounded-full sm:w-auto md:text-base {{ is_null($selectedCategory) ? 'bg-yellow-400 text-black' : 'bg-gray-700 text-white hover:bg-gray-600' }}">
                Toate
            </button>
            @foreach ($categories as $category)
                <button wire:click="selectCategory('{{ $category->id }}')"
                    aria-label="Show {{ $category->name }} category"
                    class="w-full px-4 py-2 text-sm font-medium transition-colors duration-300 rounded-full sm:w-auto md:text-base {{ $selectedCategory == $category->id ? 'bg-yellow-400 text-black' : 'bg-gray-700 text-white hover:bg-gray-600' }}">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>
    </div>

    <div wire:loading class="text-center">
        <div class="inline-block w-8 h-8 border-4 border-t-4 border-yellow-400 rounded-full animate-spin"></div>
        <p>Încărcare...</p>
    </div>

    @if ($portfolioItems->isNotEmpty())
        <div id="gallery--dynamic-zoom-level">
            @foreach ($portfolioItems as $categoryName => $items)
                <div class="mb-12">
                    <h3 class="mb-6 text-2xl font-semibold font-roboto-condensed text-yellow-400 md:text-3xl">
                        {{ $categoryName }}
                    </h3>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach ($items->take($selectedCategory === null ? 4 : $items->count()) as $item)
                            @if ($item instanceof \App\Models\PortfolioItem)
                                <a href="{{ $cloudinaryService->getImageUrl($item->image_public_id) }}"
                                    data-public-id="{{ $item->image_public_id }}"
                                    data-pswp-width="{{ $item->imageInfo['width'] ?? '' }}"
                                    data-pswp-height="{{ $item->imageInfo['height'] ?? '' }}"
                                    class="overflow-hidden transition-transform duration-300 rounded-lg shadow-lg portfolio-item hover:scale-105">
                                    <img src="{{ $cloudinaryService->getImageUrl($item->image_public_id, [
                                        'width' => 400,
                                        'height' => 300,
                                        'crop' => 'fill',
                                        'quality' => 'auto',
                                        'fetch_format' => 'auto'
                                    ]) }}"
                                        srcset="{{ $cloudinaryService->getImageUrl($item->image_public_id, [
                                            'width' => 400,
                                            'height' => 300,
                                            'crop' => 'fill',
                                            'quality' => 'auto',
                                            'fetch_format' => 'auto'
                                        ]) }} 1x,
                                        {{ $cloudinaryService->getImageUrl($item->image_public_id, [
                                            'width' => 800,
                                            'height' => 600,
                                            'crop' => 'fill',
                                            'quality' => 'auto',
                                            'fetch_format' => 'auto'
                                        ]) }} 2x"
                                        alt="Portfolio image from {{ $categoryName }} category"
                                        class="object-cover w-full h-64 transition-transform duration-300 hover:scale-110"
                                        loading="lazy">
                                    <div class="hidden-caption" style="display: none;">{{ $item->caption ?? '' }}</div>
                                </a>
                            @endif
                        @endforeach
                    </div>

                 @if ($selectedCategory === null)
                        <div class="mt-4 text-center">
                            <button wire:click="selectCategory('{{ $item->category->id }}')" class="inline-flex items-center text-yellow-400 hover:text-yellow-500">
                                <span class="mr-2">Vezi toate din categoria {{ $categoryName }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </button>
                        </div>
                    @endif

                </div>
            @endforeach
            
        </div>
    @else
        <p class="text-center text-gray-400">Nu s-au găsit elemente în portofoliu.</p>
    @endif

    @if ($hasMoreItems && $selectedCategory !== null)
        <div class="mt-8 text-center">
            <button wire:click="loadMoreItems" wire:loading.attr="disabled"
                class="px-6 py-3 text-white transition duration-150 ease-in-out bg-yellow-400 rounded-full hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">
                <span wire:loading.remove>Încarcă mai multe</span>
                <span wire:loading>Se încarcă...</span>
            </button>
        </div>
    @endif
</div>