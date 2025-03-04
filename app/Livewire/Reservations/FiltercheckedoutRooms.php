<?php

namespace App\Livewire\Reservations;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Reservation;
use Livewire\Attributes\Title;

#[Title('Reservations | Filter CheckedOut Rooms')]
class FilterCheckedoutRooms extends Component
{

    public $reservations;
    public $today;
    public $start;
    public $end;
    public $yesterday;

    public $tomorrow;

    public $month;

    public $twomonths;
    public $threemonths;
    public $three;
    public $four;
    public $week;

    public $year;
    public $period;
    public $due_period;



    public function due()
    {

        switch ($this->due_period) {
            case 'yesterday':

                $this->tomorrow = Carbon::yesterday()->timezone('Africa/Lagos')->format('Y-m-d');
                $this->reservations = Reservation::whereBetween('checkout', [$this->tomorrow, $this->tomorrow])
                    ->Where('payment_status', '=',  'Checkedout')
                    ->orderBy("id", "desc")->get();
                $this->dispatch('refresh-filter-due-rooms', $this->tomorrow, $this->tomorrow); //pass the  DB query to disptach - view

                break;

            case 'three':
                $this->three = Carbon::now()->addDays(-3)->timezone('Africa/Lagos')->format('Y-m-d');
                $this->reservations = Reservation::whereBetween('checkout', [$this->three, $this->three])
                    ->Where('payment_status', '=',  'Checkedout')
                    ->orderBy("id", "desc")->get();
                $this->dispatch('refresh-filter-due-rooms', $this->three, $this->three);
                break;
            case 'four':
                $this->four = Carbon::now()->addDays(-4)->timezone('Africa/Lagos')->format('Y-m-d');
                $this->reservations = Reservation::whereBetween('checkout', [$this->four, $this->four])
                    ->Where('payment_status', '=',  'Checkedout')
                    ->orderBy("id", "desc")->get();
                $this->dispatch('refresh-filter-due-rooms', $this->four, $this->four);
                break;

            case 'week': // past  week
                $this->week = Carbon::now()->addDays(-7)->timezone('Africa/Lagos')->format('Y-m-d');
                $this->reservations = Reservation::whereBetween('checkout', [ $this->week , $this->week])
                    ->Where('payment_status', '=',  'Checkedout')
                    ->orderBy("id", "desc")->get();
                $this->dispatch('refresh-filter-due-rooms',  $this->week , $this->week);
                break;

            case 'month': // within the next one month

                $this->start = Carbon::now()->subMonth()->startOfMonth()->timezone('Africa/Lagos')->format('Y-m-d');
                $this->end = Carbon::now()->subMonth()->endOfMonth()->timezone('Africa/Lagos')->format('Y-m-d');
                $this->month = Carbon::now()->addMonth()->timezone('Africa/Lagos')->format('Y-m-d');
                $this->reservations = Reservation::whereBetween('checkout', [$this->start, $this->end])
                    ->Where('payment_status', '=',  'Checkedout')
                    ->orderBy("id", "desc")->get();
                $this->dispatch('refresh-filter-due-rooms', $this->start, $this->end);

                break;

            case 'year':  // a year from now
                $this->start = Carbon::now()->subYear()->startOfYear()->timezone('Africa/Lagos')->format('Y-m-d');
                $this->end =Carbon::now()->subYear()->endOfYear()->timezone('Africa/Lagos')->format('Y-m-d');
                $this->reservations = Reservation::whereBetween('checkout', [$this->start, $this->end])
                ->Where('payment_status', '=',  'Checkedout')
                ->orderBy("id", "desc")->get();
                $this->dispatch('refresh-filter-due-rooms', $this->start, $this->end);

                break;

            default:
                $this->period = Carbon::today()->timezone('Africa/Lagos')->format('Y-m-d');
                $this->reservations = Reservation::whereDate('checkout', $this->period)
                    ->Where('payment_status', '=',  'Checkedout')
                    ->orderBy("id", "desc")->get();
                $this->dispatch('refresh-filter-due-rooms', $this->period, $this->period); //pass the  DB query parameters to disptach - view
                break;
        }

        toastr()->info('Search is complete');
        $this->reset();
    }



    public function exit()
    { //rest modal feilds
        $this->reset();
    }
    public function render()
    {
        return view('livewire.reservations.filtercheckedout-rooms');
    }
}
