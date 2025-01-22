<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Room;
use App\Models\Roomallocation;
use App\Models\Roomcategory;
use App\Models\Reservation;
use Livewire\Attributes\On;
use Carbon\Carbon;

#[Title('Reservations | Room Search')]

class RoomSearch extends Component
{



    public $allocations;
    public $checkin= '';
    public $checkout = '';
    public $category_id;
    public  $nor = '';
    public function mount(){
                $this->checkin = Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d');
                $this->checkout=Carbon::now()->timezone('Africa/Lagos')->addDays(1)->format('Y-m-d'); //working with dates sucks
                $this->allocations= Roomallocation::with('category')
                    ->whereDate('checkin','>',  $this->checkin)
                    ->whereDate('checkout','>', $this->checkout)
                    ->orWhere('checkin', '=',  '1986-09-01') // my weird date
                    ->orderBy("id","desc")->distinct()->get('category_id');


        session()->put('checkin', $this->checkin );
        session()->put('checkout', $this->checkout);
        session()->put('token', 1);



    }


    public function search () {
        $checkin = $this->checkin;
        $checkout = $this->checkout;
        $allocations= Roomallocation::with('category')
        ->whereNotBetween('checkin', [$checkin, $checkout])
        ->whereNotBetween('checkout', [$checkin, $checkout] )
        ->orderBy("id","desc")->distinct()->get('category_id');


        session()->put('checkin', $checkin);
        session()->put('checkout', $checkout);
        session()->put('token', 2);

        return view('dashboard.search', [
            'allocations'=> $allocations,]);

        }




        public function checkout(Reservation $reservation)
        {
            //$dashboard = Reservation::query()->get();

            //return view('dashboard.checkout', compact('reservation'));
        }



    public function create ($category_id, $nor, $checkin,$checkout) {
        return view('dashboard.create')->with([
            'category_id'=> $category_id,
            'nor'=> $nor,
            'checkin'=>$checkin,
            'checkout'=>$checkout
        ]);
    }

    public function store(){

        $category_id=$request->input('category_id');
        $nor=$request->input('nor');
        $attributes = request()->validate([
            'category_id'=> [],
            'medium'=>[],
            'payment_status'=>[],
            'nor'=>['required'],
            'fullname'=>['required'],
            'address'=>[''],
            'requests'=>[''],
            'email'=>[''],
            'phone'=>['required'],
            'checkin'=>['required'],
            'checkout'=>['required'],

        ]);

        //get the rooms at ramdom from customer selection and keep record in reservations table

        $allocations=Roomallocation::where('category_id', $category_id)->limit($nor)->get();

        $reservation_id = mt_rand( 10000000, 99999999 );
              foreach ($allocations as $allocation):

                    Reservation::create([
                        'category_id'=>$category_id,
                        'room_id'=>$allocation->room_id,
                        'medium'=>$request->input('medium'),
                        'nor'=>$request->input('nor'),
                        'fullname'=>$request->input('fullname'),
                        'address'=>$request->input('address'),
                        'requests'=>$request->input('requests'),
                        'email'=>$request->input('email'),
                        'phone'=>$request->input('phone'),
                        'checkin'=>$request->input('checkin'),
                        'checkout'=>$request->input('checkout'),
                        'reservation_id'=>$reservation_id,


                    ]);

    Roomallocation::where('room_id', $allocation->room_id)
                    ->update(['checkin'=> $request->input('checkin'),'checkout'=> $request->input('checkout')]);

            endforeach;

            return view('dashboard.checkout')->with([
                'reservation'=> $reservation_id,
                'category_id'=> $category_id,
                'checkin'=>     $request->input('checkin'),
                'checkout'=>    $request->input('checkout'),
                'nor'=>$request->input('nor'),
            ]);

}






    public function destroyRoom($id){
        $room = Room::findOrFail($id);
        $room->delete();
        //$this->dispatch('refresh-rooms');
        session()->flash('status', 'Room is deleted successfully');
        $this->redirect('/home-create-rooms');
    }



    public function render()
    {
        return view('livewire.room-search')
        ->layout('layouts.room-search');
    }
}
