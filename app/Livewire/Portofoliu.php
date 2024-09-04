<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PortfolioItem;
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

    public function selectCategory($category)
    {
        $this->selectedCategory = $category;
        $this->resetPage();
    }

    public function getPortfolioItemsProperty()
    {
        $query = PortfolioItem::query();
        
        if ($this->selectedCategory) {
            $query->where('category', $this->selectedCategory);
        }

        if ($this->search) {
            $query->where('category', 'like', '%' . $this->search . '%');
        }

        $items = $query->paginate($this->perPage);

        // Group items
        $groupedItems = [];
        foreach ($items as $item) {
            $groupedItems[$item->category][] = $item;
        }

        return $groupedItems;
    }

    public function render()
    {
        return view('livewire.portofoliu', [
            'portfolioItems' => $this->portfolioItems,
            'paginator' => PortfolioItem::query()
                ->when($this->selectedCategory, fn($query) => $query->where('category', $this->selectedCategory))
                ->when($this->search, fn($query) => $query->where('category', 'like', '%' . $this->search . '%'))
                ->paginate($this->perPage)
        ]);
    }
}