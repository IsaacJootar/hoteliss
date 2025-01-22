<?php

namespace App\Livewire\Reservations;
use Livewire\Component;
use Livewire\Attributes\Title;


#[Title('Logistics | Activity Stats')]

class activityStats extends Component
{


    public function render()
    {

        return view('livewire.logistics.activity-stats')
        ->layout('layouts.logistics');
    }





}
