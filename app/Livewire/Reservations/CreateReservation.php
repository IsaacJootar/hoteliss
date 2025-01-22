<?php

namespace App\Livewire\Reservations;

use Livewire\Component;
use App\Models\Reservation;
use App\Models\Roomallocation;
use Livewire\Attributes\Title;

#[title('Reservation Form')]
class CreateReservation extends Component
{

    public $category_id;
    public $room_id;
    public $nor;
    public $checkin;
    public $checkout;
    public $medium = 'online';
    public $fullname;
    public $address;
    public $requests;
    public $payment_status;
    public $phone;
    public $email;

    public $allocations;
    public $allocation;
    public $reservation_id;
    public function mount()
    {
        //dd($this->category_id);
        $this->allocations = Roomallocation::with('category')->where('category_id', $this->category_id)->distinct()->get('category_id');
        return view('livewire.reservations.create-reservation')->with([
            'category_id' => $this->category_id,
            'nor' => $this->nor,
            'checkin' => $this->checkin,
            'checkout' => $this->checkout,
            'allocations' => $this->allocations,

        ])->layout('layouts.reservations');
    }

    public function render()
    {

        return view('livewire.reservations.create-reservation')
            ->layout('layouts.reservations');
    }





    public function store()
    {
        //validate inputs

        $validation = $this->validate(
            [
                'email' => ['email:rfc'],
                'nor' => ['required'],
                'fullname' => ['required'],
                'phone' => ['required', 'numeric'],
            ],
            [
                'nor.required' => 'Please select number of room(s).',
                'phone.required' => 'Please Your Contact Number is required.',
                'fullname.required' => 'Please Customer fullname is required.',

            ]
        );


        //if rooms are more than 1, get the name of available rooms at ramdom from customer selected (nor)and keep records of the rooms in reservations table
        $this->allocations = Roomallocation::where('category_id', $this->category_id)
            ->whereNotBetween('checkin', [$this->checkin, $this->checkout])
            ->whereNotBetween('checkout', [$this->checkin, $this->checkout])
            ->limit($this->nor)->get();
        $this->reservation_id = mt_rand(10000000, 99999999); // give me a random number
        foreach ($this->allocations as $this->allocation):

            Reservation::create([
                'category_id' => $this->category_id,
                'room_id' => $this->allocation->room_id,
                'medium' => $this->medium,
                'nor' => $this->nor,
                'fullname' => $this->fullname,
                'address' => $this->address,
                'requests' => $this->requests,
                'email' => $this->email,
                'phone' => $this->phone,
                'checkin' => $this->checkin,
                'checkout' => $this->checkout,
                'reservation_id' => $this->reservation_id,


            ]);

            Roomallocation::where('room_id', $this->allocation->room_id)
                ->update(['checkin' => $this->checkin, 'checkout' => $this->checkout]);

        endforeach;
        //dd($this->reservation_id)

        return to_route('checkout-reservation', ['reservation_id' => $this->reservation_id,]);
    }
}
