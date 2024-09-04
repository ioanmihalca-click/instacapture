<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PortfolioItem;
use App\Models\Category;
use Livewire\WithPagination;

class Portofoliu extends Component
{
    use WithPagination;

    public $selectedCategory = null;
    public $search = '';
    public $perPage = 12;

    protected $queryString = [
        'selectedCategory' => ['except' => ''],
        'search' => ['except' => ''],
        'perPage' => ['except' => 12],
    ];

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
    $query = PortfolioItem::with('category');
    
    if ($this->selectedCategory) {
        $query->where('category_id', $this->selectedCategory);
    }

    if ($this->search) {
        $query->whereHas('category', function ($q) {
            $q->where('name', 'like', '%' . $this->search . '%');
        });
    }

    $items = $query->paginate($this->perPage);

    // Group items
    $groupedItems = [];
    foreach ($items as $item) {
        $groupedItems[$item->category->name][] = $item;
    }

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
                ->paginate($this->perPage)
        ]);
    }
}