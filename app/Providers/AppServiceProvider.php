<?php

namespace App\Providers;
use App\Models\Roomallocation;
use App\Models\Reservation;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
                // // share variables to start_bar
                // // available rooms today
                // $checkin=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d');
                // $checkout=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d'); //working with dates sucks
                // $available= Roomallocation::whereDate('checkin','>',  $checkin)  //more than future dates
                //     ->whereDate('checkin','>', $checkin)
                //     ->whereDate('checkout','>', $checkout)
                //     ->orWhere('checkin', '=',  '1986-09-01')
                //     ->get()->count();
                //     view::share('today', $available);





                //      //Booked rooms today
                //      $booked= Reservation::with('category')
                //      ->whereDate('checkin','=',  $checkin)
                //      ->whereDate('checkout','=', $checkout)
                //      ->count();
                //     view::share('today', $booked);


                // // reservations this month
                // $this_month = Reservation::whereYear('created_at', Carbon::now()->year)
                //              ->whereMonth('created_at', Carbon::now()->month)
                //              ->distinct('reservation_id')
                //              ->count();


                //     view::share('this_month', $this_month);


    }


}
