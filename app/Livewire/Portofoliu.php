<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PortfolioItem;
use App\Services\CloudinaryService;

class Portofoliu extends Component
{
    public $portfolioItems;

    public function mount()
    {
        $this->loadPortfolioItems();
    }

    public function loadPortfolioItems()
    {
        $this->portfolioItems = PortfolioItem::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.portofoliu');
    }
}