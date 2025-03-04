<?php

namespace App\Livewire\Reservations;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Reservation;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
#[Title('Reservations | Checkedout Rooms')]
class CheckedoutRooms extends Component
{

    public $reservations;


    public $due_today;

    public function mount() {
        // for due rooms in the past-forgoten - notification should have handled this, atleast a reminder, maybe later
        $this->due_today = Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d');
           $this->reservations = Reservation::whereDate('checkout', '<=', $this->due_today )
            ->Where('payment_status', '=',  'Checkedout') //  checked out
            ->orderBy("id","desc")->get();
            return view('livewire.reservations.checkedout-rooms', [
                'reservations' => $this->reservations,
            ])->layout('layouts.reservations');




        }

            // Event Handler for re-rendering checked out rooms view
        #[On('refresh-filter-checkedout-rooms')]
        public function refreshFilterDueRooms($search_due1, $search_due2 ){
            //dd($this->reservations = $search_due);
            $this->reservations = Reservation::whereBetween('checkout', [$search_due1, $search_due2])
            ->Where('payment_status', '=',  'Checkedout') // already checked out
            ->orderBy("id","desc")->get();



        }




    public function render()
    {
        return view('livewire.reservations.checkedout-rooms')->layout('layouts.reservations');
    }









}





