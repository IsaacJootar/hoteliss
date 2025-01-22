<?php

namespace App\Livewire\Reservations;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Roomallocation;
use Livewire\Attributes\Title;
use Illuminate\Validation\ValidationException;


#[Title('Reservations | Room Search')]

class searchReservations extends Component
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
                    ->whereDate('checkin','>',  $this->checkin)
                    ->whereDate('checkout','>', $this->checkout)
                    ->orWhere('checkin', '=',  '1986-09-01') // my weird date, picked from the past (default)
                    ->orderBy("id","desc")->distinct()->get('category_id');


    }

public function search(){
    //search parameters should not be in the past,or the ones already reserved for today and tomorrow
    if (Carbon::parse($this->checkin)->isPast() || Carbon::parse($this->checkout)->isPast()){

    toastr()->warning('Search Cannot include past dates!');
    return view('livewire.reservations.search-reservations');
}

    $this->allocations= Roomallocation::with('category')
    ->whereNotBetween('checkin', [$this->checkin, $this->checkout])
    ->whereNotBetween('checkout', [$this->checkin, $this->checkout] )
    ->orderBy("id","desc")->distinct()->get('category_id');

            session()->put('checkin', $this->checkin );
            session()->put('checkout', $this->checkout);
            session()->put('token', 2);

            $this->dispatch('refresh-room-allocations', $this->checkin, $this->checkout);  // this doesnt refresh with the search parameters-fix it
            // toastr()->info('search completed')


}




    public function render()
    {

        return view('livewire.reservations.search-reservations')
        ->layout('layouts.reservations');
    }





}
