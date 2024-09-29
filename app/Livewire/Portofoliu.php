<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\PortfolioItem;
use Livewire\Attributes\Title;
use App\Services\CloudinaryService;
use Illuminate\Support\Facades\Cache;
use Livewire\WithPagination;

#[Title('Portofoliu | InstaCapture Fotograf Profesionist în Cluj-Napoca')]
class Portofoliu extends Component
{
    use WithPagination;

    public $selectedCategory = null;
    public $search = '';
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
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    protected function getPortfolioItems()
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

        $perPage = $this->selectedCategory ? 20 : 1000; // A large number to get all items when no category is selected
        return $query->paginate($perPage);
    }

    protected function getImageInfoBulk($publicIds)
    {
        $cacheKey = 'cloudinary_image_info_bulk_' . md5(json_encode($publicIds));

        return Cache::remember($cacheKey, now()->addHours(24), function () use ($publicIds) {
            return $this->cloudinaryService->getImageInfoBulk($publicIds);
        });
    }

    public function render()
    {
        $portfolioItems = $this->getPortfolioItems();
        $publicIds = $portfolioItems->pluck('image_public_id')->unique()->toArray();
        $imageInfos = $this->getImageInfoBulk($publicIds);

        $groupedItems = [];
        foreach ($portfolioItems as $item) {
            $categoryName = $item->category->name;
            if (!isset($groupedItems[$categoryName])) {
                $groupedItems[$categoryName] = [
                    'items' => [],
                    'category_id' => $item->category_id
                ];
            }
            if ($this->selectedCategory || count($groupedItems[$categoryName]['items']) < 4) {
                $groupedItems[$categoryName]['items'][] = [
                    'id' => $item->id,
                    'image_public_id' => $item->image_public_id,
                    'caption' => $item->caption,
                    'category_id' => $item->category_id,
                    'imageInfo' => $imageInfos[$item->image_public_id] ?? null,
                ];
            }
        }

        return view('livewire.portofoliu', [
            'cloudinaryService' => $this->cloudinaryService,
            'groupedItems' => $groupedItems,
            'portfolioItems' => $portfolioItems,
        ]);
    }
}