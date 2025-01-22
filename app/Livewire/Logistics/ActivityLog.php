<?php

namespace App\Livewire\Logistics;

use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('Logistics | Activity Logs')]
class ActivityLog extends Component
{
    public function render()
    {
        return view('livewire.logistics.activity-log')->layout('layouts.logistics');
    }
}
