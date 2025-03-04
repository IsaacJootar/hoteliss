<?php

namespace App\Livewire\Reservations;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Reservation;
use Livewire\Attributes\On;
use App\Models\Roomallocation;
use Livewire\Attributes\Title;
use Illuminate\Validation\ValidationException;
#[Title('Reservations | Due Rooms')]
class DueRooms extends Component
{

    public $reservations;


    public $due_today;

    public function mount() {
        // for due rooms in the past-forgoten - notification should have handlesd this, atleast reminder
        $this->due_today = Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d');
           $this->reservations = Reservation::whereDate('checkout', '<=', $this->due_today )
            ->Where('payment_status', '!=',  'Checkedout') // not already checked out
            ->orderBy("id","desc")->get();
            return view('livewire.reservations.due-rooms', [
                'reservations' => $this->reservations,
            ])->layout('layouts.reservations');




        }

            // Event Handler for re-rendering due rooms view
        #[On('refresh-filter-due-rooms')]
        public function refreshFilterDueRooms($search_due1, $search_due2 ){
            //dd($this->reservations = $search_due);
            $this->reservations = Reservation::whereBetween('checkout', [$search_due1, $search_due2])
            ->Where('payment_status', '!=',  'Checkedout') // not already checked out
            ->orderBy("id","desc")->get();



        }




    public function render()
    {
        return view('livewire.reservations.due-rooms')->layout('layouts.reservations');
    }





    public function checkout($reservation_id, $category_id, $room_id){
        if(Reservation::where('reservation_id', $reservation_id)
        ->where('payment_status', 'pending')
        ->exists()){

            {

                throw ValidationException::withMessages(['message' => ['Checkout is unsuccessful. Payment is yet to be received on this reservation!']]);
            }

}
        Roomallocation::where('category_id', $category_id)
                        ->where('room_id', $room_id)
                        ->update([
                    'checkin'=>'1986-09-01', //reset dates back to default past dates
                    'checkout'=>'1986-09-01',
                    ]);

        Reservation::where('reservation_id', $reservation_id)
                ->update([
                    'payment_status'=>'Checkedout',
                    ]);
        toastr()->info('Customer  Has Been Checked out Successfully');
        return to_route ('due-rooms');


    }




}





