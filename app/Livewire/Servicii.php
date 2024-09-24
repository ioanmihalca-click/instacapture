<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Servicii | InstaCapture Fotograf Profesionist în Cluj-Napoca')]

class Servicii extends Component
{
    public function render()
    {
        return view('livewire.servicii');
    }
}
