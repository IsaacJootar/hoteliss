<?php

namespace App\Livewire\Reservations;

use Carbon\Carbon;
use App\Models\Room;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\Roomcategory;
use Livewire\Attributes\Title;
#[Title('Reservations | Reservation  Feeds')]
class ReservationFeeds extends Component
{
public $reserved;
public $checkouts;


    public function mount() {
        $this->reserved  = Reservation::whereMonth('created_at', Carbon::now()->month) // limit feeds for month alone-for now
                             ->where('payment_status', '!=', 'Checkedout')
                             ->distinct('reservation_id')->get();

         $this->checkouts  = Reservation::whereMonth('created_at', Carbon::now()->month)
                             ->where('payment_status', 'Checkedout')
                             ->distinct('reservation_id')->get();


        return view('livewire.reservations.reservation-feeds', [
            'reserved' => $this->reserved,
            'checkouts'=>$this->checkouts,
          ])->layout('layouts.reservations');
        }

    public function render()
    {
        return view('livewire.reservations.reservation-feeds')->layout('layouts.reservations');
    }
}
