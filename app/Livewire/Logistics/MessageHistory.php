<?php

namespace App\Livewire\Logistics;

use Livewire\Component;
use App\Livewire\Logistics\Reports;

class MessageHistory extends Component
{

    public $reports;

    public function mount()
    {
        $this->reports = Reports::all();
    }
    public function render()
    {
        return view('livewire.logistics.message-history');
    }
}
