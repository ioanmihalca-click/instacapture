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
        $this->categories = Cache::remember('portfolio_categories', now()->addDay(), function () {
            return Category::select('id', 'name')->get()->toArray();
        });
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
        $query = PortfolioItem::with('category:id,name')
            ->select('id', 'category_id', 'image_public_id', 'created_at')
            ->orderBy('created_at', 'desc');

        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        if ($this->search) {
            $query->whereHas('category', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            });
        }

        $perPage = $this->selectedCategory ? 20 : 100; 
        return $query->paginate($perPage);
    }

    protected function getImageInfoBulk($publicIds)
    {
        $cacheKey = 'cloudinary_image_info_bulk_' . md5(json_encode($publicIds));

        return Cache::remember($cacheKey, now()->addDay(), function () use ($publicIds) {
            return $this->cloudinaryService->getImageInfoBulk($publicIds);
        });
    }

    public function render()
    {
        $cacheKey = "portfolio_page_{$this->selectedCategory}_{$this->search}_" . $this->getPage();
        
        $viewData = Cache::remember($cacheKey, now()->addMinutes(30), function () {
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
                        'category_id' => $item->category_id,
                        'imageInfo' => $imageInfos[$item->image_public_id] ?? null,
                    ];
                }
            }

            return [
                'groupedItems' => $groupedItems,
                'portfolioItems' => $portfolioItems,
            ];
        });

        return view('livewire.portofoliu', array_merge($viewData, [
            'cloudinaryService' => $this->cloudinaryService,
        ]));
    }
}