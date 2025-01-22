<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


// my helper class to write custom functions
class Helper {

// for reservations
public static function format_currency($value){

        return '₦'.number_format($value, 2); //swap for other curencies and do any maths here if neccessary
}

// without the string ('₦')
public static function format_currency_plain($value){

    return number_format($value, 2); //swap for other curencies and do any maths here if neccessary
}

public static function get_number_of_days($checkin, $checkout){

    $start =  Carbon::parse($checkin);
    $end =  Carbon::parse($checkout);

     $days =  $start->diffInDays($end); // count days in the selected dates//
    return ($days == 0) ? 1 : $days; //if days return 0 it means one night-weird
}


public static function get_total_amount_due_plain($checkin, $checkout, $category_id, $nor){
     $amount=DB::table('room_allocations')->where('category_id', $category_id)->get()->value('price');
    $amount= $amount * $nor;
    return $amount * static::get_number_of_days($checkin, $checkout);
}


public static function get_total_amount_due($checkin, $checkout, $category_id, $nor){
    $amount=DB::table('room_allocations')->where('category_id', $category_id)->get()->value('price');
   $amount= $amount * $nor;
   return static::format_currency($amount * static::get_number_of_days($checkin, $checkout));
}

//reservation status-paid or pending-find a way to clear abandoned online reservations
public static function get_reservation_payment_status( $reservation_id){
    $payment_status = DB::table('reservations')->where('reservation_id', $reservation_id)->get()->value('payment_status');
   echo ($payment_status == "Paid") ?
    "<span class='badge bg-label-success me-1'> $payment_status</span>"
    :      "<span class='badge bg-label-warning me-1'>$payment_status</span>";



}




}
?>
