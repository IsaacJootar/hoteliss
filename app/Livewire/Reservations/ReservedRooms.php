<?php

namespace App\Livewire\Reservations;

use Carbon\Carbon;
use App\Models\Room;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\Roomcategory;
use Livewire\Attributes\Title;
#[Title('Reservations | Reserved Roooms')]
class ReservedRooms extends Component
{
 public $checkin;
public $checkout;

public $rooms;
public $categories;
public $reserved;


    public function mount() {

        $this->checkin=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d');
        $this->checkout=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d'); //working with dates sucks

        $this->reserved  = Reservation::whereYear('created_at', Carbon::now()->year)
                             ->where('payment_status', '!=', 'Checkedout')
                             ->distinct('reservation_id')->get();

        $this->rooms= Room::query()->orderBy("id","desc")->get();
        $this->categories= Roomcategory::orderBy("id","desc")->get();

        return view('livewire.reservations.reserved-rooms', [
            'reserved' => $this->reserved,
            'rooms'=> $this->rooms,
            'categories'=> $this->categories,
            'checkin'=>$this->checkin,
            'checkout'=>$this->checkout,
          ])->layout('layouts.reservations');
        }



        public function comfirmPayment($reservation_id){// for front desk

            Reservation::where('reservation_id', $reservation_id)
                    ->update([
                        'payment_status'=>'Paid',
                        ]); // this wil comfirm for all rooms under that reservation group

            toastr()->info('Customer Payment Has Been Comfirmed');
            return to_route ('reserved-rooms');


        }
    public function render()
    {
        return view('livewire.reservations.reserved-rooms')->layout('layouts.reservations');

    }
}
