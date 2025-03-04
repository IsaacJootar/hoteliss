<?php

namespace App\Livewire\Reservations;

use Livewire\Component;

use App\Models\Reservation;
use App\Services\EmailMessageService;
use App\Models\Roomallocation;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;

#[Title('Reservations | Checkout')]


class CheckoutReservation extends Component
{
    public $reservation_id;
    public $category_id;
    public $checkin;
    public $checkout;
    public $nor;
    public $reservation;

    public $rooms;
    public $allocations;
    public $form_flag;
    public $form_title;

    public function mount()
    {

        //  Reservation id already passed to the view from createReservation class
        $this->reservation = Reservation::where('reservation_id', $this->reservation_id)->first();

        //get room(s)
        $this->rooms = DB::table('resv_reservations')
            ->join('resv_rooms', 'resv_reservations.room_id', '=', 'resv_rooms.id')
            ->where('reservation_id', $this->reservation_id) // where cond. is on the first table
            ->get();
        $this->category_id = $this->reservation->category_id;
        $this->checkin = $this->reservation->checkin;
        $this->checkout = $this->reservation->checkout;
        return view('livewire.reservations.checkout-reservation', [
            'reservation_id' => $this->reservation_id,
            'category_id' => $this->category_id,
            'checkin' => $this->checkin,
            'checkout' => $this->checkout,
            'rooms' => $this->rooms,

        ])->layout('layouts.reservations');
    }



    public function render()
    {
        return view('livewire.reservations.checkout-reservation')->layout('layouts.reservations');
    }



public function checkout($reservation_id, $room_id, $category_id){

    if(Reservation::where('reservation_id', $reservation_id)
                    ->where('payment_status', 'Pending')
                    ->exists()){

                toastr()->warning('Checkout not successful! Payment is yet to be made on this reservation!');
            return to_route ('due-rooms');

        }


    Roomallocation::where('category_id', $category_id) // reset to default date, to make room available during search
                    ->where('room_id', $room_id)
                    ->update([
                'checkin'=>'1986-09-01',
                'checkout'=>'1986-09-01',
                ]);

    Reservation::where('reservation_id', $reservation_id)
            ->update([
                'payment_status'=>'Checkedout',
                ]);
                toastr()->info('Customer  Has Been Checked Out Successfully');
    return to_route ('reserved-rooms');

}


public function comfirmPayment($reservation_id, $email){// for front desk

    Reservation::where('reservation_id', $reservation_id)
            ->update([
                'payment_status'=>'Paid',
                ]); // this wil comfirm for all rooms under that reservation group

                // sent comfirmation Email
        $subject =  'Reservation  Comfirmed';
        $message =  'Your Reservation has been comfirm.  ID:'.$reservation_id;
        $sendmail = app(abstract: EmailMessageService::class); // inject the dependency class
        $sendmail ->ComfirmReservationEmail($message, $email,  $subject);

            toastr()->info('Customer Reservation Has Been Comfirmed');
    return to_route ('reserved-rooms');

}






}
