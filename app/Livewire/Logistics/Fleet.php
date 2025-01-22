<?php

namespace App\Livewire\Logistics;

use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Logistics | Fleet')]
class Fleet extends Component
{
    public function render()
    {
        return view('livewire.logistics.fleet')->layout('layouts.logistics');
    }
}
