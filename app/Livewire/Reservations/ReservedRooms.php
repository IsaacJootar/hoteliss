<?php

namespace App\Livewire\Reservations;

use Carbon\Carbon;
use App\Models\Room;
use Livewire\Component;
use App\Models\Reservation;
use App\Models\Roomcategory;
use Livewire\Attributes\Title;
use App\Services\EmailMessageService;
#[Title('Reservations | Reserved Rooms')]
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

        $this->reserved = Reservation::whereBetween('checkout', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])

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



        public function confirmPayment($reservation_id, $email){// for front desk

            Reservation::where('reservation_id', $reservation_id)
                    ->update([
                        'payment_status'=>'Paid',
                        ]); // this wil comfirm for all rooms under that reservation group

 // sent comfirmation Email
 $subject = 'Reservation  Comfirmed';
 $message =  'Your Reservation has been comfirm.  ID:'.$reservation_id;
 $sendmail = app(abstract: EmailMessageService::class); // inject the dependency class
 $sendmail ->ComfirmReservationEmail(mail_message: $message, customer_email: $email,  mail_subject: $subject);


            toastr()->info('Customer Payment Has Been Comfirmed');
            return to_route ('reserved-rooms');


        }
    public function render()
    {
        return view('livewire.reservations.reserved-rooms')->layout('layouts.reservations');

    }
}
