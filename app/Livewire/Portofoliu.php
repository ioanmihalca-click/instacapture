<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PortfolioItem;

class Portofoliu extends Component
{
    public $portfolioItems = [];
    public $selectedCategory = null;

    public function mount()
    {
        $this->loadPortfolioItems();
    }

    public function loadPortfolioItems()
    {
        $query = PortfolioItem::query();
        
        if ($this->selectedCategory) {
            $query->where('category', $this->selectedCategory);
        }

        $items = $query->get();

        // Group items manually
        $this->portfolioItems = [];
        foreach ($items as $item) {
            $this->portfolioItems[$item->category][] = [
                'id' => $item->id,
                'image_public_id' => $item->image_public_id,
                // Add other fields as needed
            ];
        }

        $this->dispatch('photos-loaded');
    }

    public function selectCategory($category)
    {
        $this->selectedCategory = $category;
        $this->loadPortfolioItems();
    }

    public function render()
    {
        return view('livewire.portofoliu');
    }
}