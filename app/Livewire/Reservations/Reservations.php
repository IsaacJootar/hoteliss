<?php

namespace App\Livewire\Reservations;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Roomallocation;
use Livewire\Attributes\On;
use Carbon\Carbon;


#[Title('Reservations | Room Search')]

class Reservations extends Component
{



    public $allocations;
    public $checkin= '';
    public $checkout = '';
    public $category_id;
    public  $nor = '';
    public function mount(){
                $this->checkin = Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d');
                $this->checkout=Carbon::now()->timezone('Africa/Lagos')->addDays(1)->format('Y-m-d');
                $this->allocations= Roomallocation::with('category')
                ->whereNotBetween('checkin', [$this->checkin, $this->checkout])
                ->whereNotBetween('checkout', [$this->checkin, $this->checkout] )
                ->orderBy("id","desc")->distinct()->get('category_id');

                    session()->put('checkin', $this->checkin );
                    session()->put('checkout', $this->checkout);
                    session()->put('token', 1);



    }


    #[On('refresh-room-allocations')]
    public function refreshRoomAllocations($checkin, $checkout){  //variables from  dispatch
        $this->allocations= Roomallocation::with('category')
        ->whereNotBetween('checkin', [$checkin, $checkout])
        ->whereNotBetween('checkout', [$checkin, $checkout] )
        ->orderBy("id","desc")->distinct()->get('category_id');
    }





    public function render()
    {
        return view('livewire.reservations.reservations')
        ->layout('layouts.reservations');
    }
}
