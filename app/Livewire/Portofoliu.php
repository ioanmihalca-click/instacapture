<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PortfolioItem;
use App\Models\Category;
use Livewire\WithPagination;
use App\Services\CloudinaryService;
use Illuminate\Support\Facades\Cache;

class Portofoliu extends Component
{
    use WithPagination;

    public $selectedCategory = null;
    public $search = '';
    public $perPage = 12;
    public $loadedItems = [];
    public $portfolioItems = [];

    protected $cloudinaryService;

    protected $queryString = [
        'selectedCategory' => ['except' => ''],
        'search' => ['except' => ''],
        'perPage' => ['except' => 12],
    ];

    public function boot(CloudinaryService $cloudinaryService)
    {
        $this->cloudinaryService = $cloudinaryService;
    }

    public function updatingSearch()
    {
        $this->resetPage();
        $this->loadedItems = [];
        $this->portfolioItems = [];
    }

    public function updatingSelectedCategory()
    {
        $this->resetPage();
        $this->loadedItems = [];
        $this->portfolioItems = [];
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->resetPage();
        $this->loadedItems = [];
        $this->portfolioItems = [];
    }

    public function loadMoreItems()
    {
        $newItems = $this->getPortfolioItemsQuery()
            ->whereNotIn('id', $this->loadedItems)
            ->take($this->perPage)
            ->get();

        foreach ($newItems as $item) {
            $imageInfo = $this->getImageInfo($item->image_public_id);
            $item->imageInfo = $imageInfo;
            $this->loadedItems[] = $item->id;
        }

        $this->portfolioItems = collect($this->portfolioItems)->merge($newItems)->groupBy('category.name');
        
        $this->dispatch('itemsLoaded');
    }

    protected function getImageInfo($publicId)
    {
        return Cache::remember("image_info_{$publicId}", now()->addHours(24), function () use ($publicId) {
            return $this->cloudinaryService->getImageInfo($publicId);
        });
    }

    public function getPortfolioItemsQuery()
    {
        $query = PortfolioItem::with('category')
            ->orderBy('created_at', 'desc');

        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        if ($this->search) {
            $query->whereHas('category', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            });
        }

        return $query;
    }

    public function render()
    {
        $categories = Cache::remember('all_categories', now()->addHours(24), function () {
            return Category::all();
        });

        if (empty($this->portfolioItems)) {
            $this->loadMoreItems();
        }

        $this->dispatch('portfolioLoaded');

        return view('livewire.portofoliu', [
            'portfolioItems' => $this->portfolioItems,
            'categories' => $categories,
            'hasMoreItems' => $this->getPortfolioItemsQuery()->count() > count($this->loadedItems),
            'cloudinaryService' => $this->cloudinaryService
        ]);
    }
}