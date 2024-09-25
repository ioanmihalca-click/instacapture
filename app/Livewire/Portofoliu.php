<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\PortfolioItem;
use Livewire\Attributes\Title;
use App\Services\CloudinaryService;
use Illuminate\Support\Facades\Cache;

#[Title('Portofoliu | InstaCapture Fotograf Profesionist în Cluj-Napoca')]
class Portofoliu extends Component
{
    public $selectedCategory = null;
    public $search = '';
    public $portfolioItems = [];
    public $categories = [];

    protected $cloudinaryService;

    protected $queryString = [
        'selectedCategory' => ['except' => ''],
        'search' => ['except' => ''],
    ];

    public function boot(CloudinaryService $cloudinaryService)
    {
        $this->cloudinaryService = $cloudinaryService;
    }

    public function mount()
    {
        $this->loadCategories();
        $this->loadPortfolioItems();
    }

    protected function loadCategories()
    {
        $this->categories = Category::all()->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
            ];
        })->toArray();
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->loadPortfolioItems();
    }

    public function updatedSearch()
    {
        $this->loadPortfolioItems();
    }

    protected function loadPortfolioItems()
    {
        $query = PortfolioItem::with('category')->orderBy('created_at', 'desc');

        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        if ($this->search) {
            $query->whereHas('category', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            });
        }

        $items = $query->get();

        $groupedItems = [];
        foreach ($items as $item) {
            $categoryName = $item->category->name;
            if (!isset($groupedItems[$categoryName])) {
                $groupedItems[$categoryName] = [];
            }
            $groupedItems[$categoryName][] = [
                'id' => $item->id,
                'image_public_id' => $item->image_public_id,
                'caption' => $item->caption,
                'category_id' => $item->category_id,
                'imageInfo' => $this->getImageInfo($item->image_public_id),
            ];
        }

        // Dacă nicio categorie nu este selectată, limitează fiecare categorie la 4 elemente
        if ($this->selectedCategory === null) {
            foreach ($groupedItems as $categoryName => $items) {
                $groupedItems[$categoryName] = array_slice($items, 0, 4);
            }
        }

        $this->portfolioItems = $groupedItems;
    }

    protected function getImageInfo($publicId)
    {
        return Cache::remember("image_info_{$publicId}", now()->addHours(24), function () use ($publicId) {
            return $this->cloudinaryService->getImageInfo($publicId);
        });
    }

    public function render()
    {
        return view('livewire.portofoliu', [
            'cloudinaryService' => $this->cloudinaryService
        ]);
    }
}