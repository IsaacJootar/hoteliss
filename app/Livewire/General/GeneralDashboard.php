<?php

namespace App\Livewire\General;

use Livewire\Component;
use Livewire\Attributes\Title;
#[Title('GM-DASHBOARD')]
class GeneralDashboard extends Component
{
    public function render()
    {
        return view('livewire.general.general-dashboard')->layout('layouts.general');
    }
}
