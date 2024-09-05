<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PortfolioItem;
use App\Models\Category;
use Livewire\WithPagination;
use App\Services\CloudinaryService;

class Portofoliu extends Component
{
    use WithPagination;

    public $selectedCategory = null;
    public $search = '';
    public $perPage = 12;
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
    }

    public function updatingSelectedCategory()
    {
        $this->resetPage();
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->resetPage();
    }

    public function getPortfolioItemsProperty()
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

        $items = $query->get();

        // Fetch image info for each item
        $items->each(function ($item) {
            $imageInfo = $this->cloudinaryService->getImageInfo($item->image_public_id);
            $item->imageInfo = $imageInfo;
        });

        // Group items by category and sort
        $groupedItems = $items->groupBy('category.name')->map(function ($categoryItems) {
            return $categoryItems->sortByDesc('created_at');
        })->sortByDesc(function ($categoryItems) {
            return $categoryItems->first()->created_at;
        });

        return $groupedItems;
    }

    public function render()
    {
        $categories = Category::all();
        
        return view('livewire.portofoliu', [
            'portfolioItems' => $this->portfolioItems,
            'categories' => $categories,
            'paginator' => PortfolioItem::with('category')
                ->when($this->selectedCategory, fn($query) => $query->where('category_id', $this->selectedCategory))
                ->when($this->search, fn($query) => $query->whereHas('category', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                }))
                ->paginate($this->perPage),
            'cloudinaryService' => $this->cloudinaryService
        ]);
    }
}