<div class="mt-24 md:p-8">
    <h2 class="mb-8 text-3xl font-bold text-center md:text-4xl lg:text-5xl">Portofoliu</h2>
    
    <div class="mb-8">
        <div class="grid grid-cols-2 gap-2 sm:flex sm:flex-wrap sm:justify-center">
            <button wire:click="selectCategory(null)"
                    aria-label="Show all categories"
                    class="w-full px-4 py-2 text-sm font-medium transition-colors duration-300 rounded-full sm:w-auto md:text-base {{ is_null($selectedCategory) ? 'bg-yellow-400 text-black' : 'bg-gray-700 text-white hover:bg-gray-600' }}">
                Toate
            </button>
            @foreach(App\Models\PortfolioItem::CATEGORIES as $value => $label)
                <button wire:click="selectCategory('{{ $value }}')"
                        aria-label="Show {{ $label }} category"
                        class="w-full px-4 py-2 text-sm font-medium transition-colors duration-300 rounded-full sm:w-auto md:text-base {{ $selectedCategory === $value ? 'bg-yellow-400 text-black' : 'bg-gray-700 text-white hover:bg-gray-600' }}">
                    {{ $label }}
                </button>
            @endforeach
        </div>
    </div>

    <div wire:loading class="text-center">
        <div class="inline-block w-8 h-8 border-4 border-t-4 border-yellow-400 rounded-full animate-spin"></div>
        <p>Încărcare...</p>
    </div>

    @if(!empty($portfolioItems))
        @foreach($portfolioItems as $category => $items)
            <div class="mb-12">
                <h3 class="mb-6 text-2xl font-semibold text-yellow-400 md:text-3xl">
                    {{ App\Models\PortfolioItem::CATEGORIES[$category] ?? $category }}
                </h3>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4" 
                     id="gallery-{{ $category }}" 
                     wire:ignore>
                    @foreach($items as $item)
                        <a href="{{ app(App\Services\CloudinaryService::class)->getImageUrl($item['image_public_id']) }}"
                           data-pswp-width="1024"
                           data-pswp-height="768"
                           target="_blank"
                           class="overflow-hidden transition-transform duration-300 rounded-lg shadow-lg portfolio-item hover:scale-105">
                            <img src="{{ app(App\Services\CloudinaryService::class)->getImageUrl($item['image_public_id'], ['width' => 400, 'height' => 300, 'crop' => 'fill']) }}"
                                 alt="Portfolio image from {{ App\Models\PortfolioItem::CATEGORIES[$category] ?? $category }} category"
                                 class="object-cover w-full h-64 transition-transform duration-300 hover:scale-110"
                                 loading="lazy"
                                 onerror="this.onerror=null;this.src='/path/to/fallback-image.jpg';">
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    @else
        <p class="text-center text-gray-400">Nu s-au găsit elemente în portofoliu.</p>
    @endif

    @if($paginator->hasPages())
        <div class="mt-8">
            {{ $paginator->links() }}
        </div>
    @endif
</div>

