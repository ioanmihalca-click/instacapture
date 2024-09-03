<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Acasa | InstaCapture')]

class Acasa extends Component
{
    public function render()
    {
        return view('livewire.acasa');
    }
}
