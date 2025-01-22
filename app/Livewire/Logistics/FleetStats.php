<?php

namespace App\Livewire\Logistics;

use Livewire\Component;

class FleetStats extends Component
{
    public function render()
    {
        return view('livewire.logistics.fleet-stats')->layout('layouts.logistics');
    }
}
