<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\PortfolioItem;
use Livewire\Attributes\Title;
use App\Services\CloudinaryService;
use Illuminate\Support\Facades\Cache;

#[Title('Portofoliu | InstaCapture Fotograf Profesionist în Cluj-Napoca')]
class Portofoliu extends Component
{
    use WithPagination;

    public $selectedCategory = null;
    public $search = '';
    public $perPage = 12;
    public $loadedItems = [];
    public $portfolioItems = [];
    public $categories = [];

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

    public function mount()
    {
        $this->loadCategories();
    }

    protected function loadCategories()
    {
        $this->categories = Category::all();
    }

    public function getListeners()
    {
        return [
            'categoryAdded' => 'handleCategoryChange',
            'categoryDeleted' => 'handleCategoryChange',
        ];
    }

    public function handleCategoryChange()
    {
        $this->loadCategories();
        $this->resetPage();
        $this->loadedItems = [];
        $this->portfolioItems = [];
        $this->loadMoreItems();
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
        if ($this->selectedCategory === null) {
            $this->loadItemsForAllCategories();
        } else {
            $this->loadItemsForSelectedCategory();
        }

        $this->dispatch('itemsLoaded');
    }

    protected function loadItemsForAllCategories()
    {
        $loadedItemCount = count($this->loadedItems);
        $itemsPerCategory = 4;
        $categoriesToLoad = ceil(($loadedItemCount + $this->perPage) / $itemsPerCategory);

        $newItems = collect();

        foreach ($this->categories as $index => $category) {
            if ($index >= $categoriesToLoad) break;

            $categoryItems = PortfolioItem::where('category_id', $category->id)
                ->whereNotIn('id', $this->loadedItems)
                ->take($itemsPerCategory)
                ->get();

            foreach ($categoryItems as $item) {
                $this->addItemInfo($item);
                $newItems->push($item);
            }
        }

        $this->updatePortfolioItems($newItems);
    }

    protected function loadItemsForSelectedCategory()
    {
        $newItems = $this->getPortfolioItemsQuery()
            ->whereNotIn('id', $this->loadedItems)
            ->take($this->perPage)
            ->get();

        foreach ($newItems as $item) {
            $this->addItemInfo($item);
        }

        $this->updatePortfolioItems($newItems);
    }

    protected function addItemInfo($item)
    {
        $imageInfo = $this->getImageInfo($item->image_public_id);
        $item->imageInfo = $imageInfo;
        $this->loadedItems[] = $item->id;
    }

    protected function updatePortfolioItems($newItems)
    {
        $this->portfolioItems = collect($this->portfolioItems)
            ->merge($newItems)
            ->groupBy('category.name');
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
        if (empty($this->portfolioItems)) {
            $this->loadMoreItems();
        }

        $this->dispatch('portfolioLoaded');

        return view('livewire.portofoliu', [
            'portfolioItems' => $this->portfolioItems,
            'categories' => $this->categories,
            'hasMoreItems' => $this->getPortfolioItemsQuery()->count() > count($this->loadedItems),
            'cloudinaryService' => $this->cloudinaryService
        ]);
    }
}