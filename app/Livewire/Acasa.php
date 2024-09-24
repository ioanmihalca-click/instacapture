<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Acasa | InstaCapture Fotograf Profesionist în Cluj-Napoca')]

class Acasa extends Component
{
    public function render()
    {
        return view('livewire.acasa');
    }
}
