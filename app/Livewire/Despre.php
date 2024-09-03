<?php

namespace App\Livewire;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Despre | InstaCapture')]

class Despre extends Component
{
    public function render()
    {
        return view('livewire.despre');
    }
}
