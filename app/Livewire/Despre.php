<?php

namespace App\Livewire;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Despre | InstaCapture Fotograf Profesionist în Cluj-Napoca')]

class Despre extends Component
{
    public function render()
    {
        return view('livewire.despre');
    }
}
