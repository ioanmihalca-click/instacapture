<div class="mt-24 md:p-8">
    <h2 class="mb-8 text-3xl font-bold text-center md:text-4xl lg:text-5xl">Portofoliu</h2>

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

    @if (!empty($portfolioItems))
        <div id="gallery--dynamic-zoom-level">
            @foreach ($portfolioItems as $categoryName => $items)
                <div class="mb-12">
                    <h3 class="mb-6 text-2xl font-semibold text-yellow-400 md:text-3xl">
                        {{ $categoryName }}
                    </h3>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach ($items as $item)
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
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-400">Nu s-au găsit elemente în portofoliu.</p>
    @endif

    @if ($hasMoreItems)
        <div class="mt-8 text-center">
            <button wire:click="loadMoreItems" wire:loading.attr="disabled"
                class="px-6 py-3 text-white transition duration-150 ease-in-out bg-yellow-400 rounded-full hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">
                <span wire:loading.remove>Încarcă mai multe</span>
                <span wire:loading>Se încarcă...</span>
            </button>
        </div>
    @endif
</div>