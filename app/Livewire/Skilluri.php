<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Skilluri | InstaCapture Fotograf Profesionist în Cluj-Napoca')]

class Skilluri extends Component
{
    public function render()
    {
        return view('livewire.skilluri');
    }
}
