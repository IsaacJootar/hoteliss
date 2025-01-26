<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = "resv_reservations";
    protected $fillable = [
        'room_id',
        'category_id',
        'reservation_id',
         'nor',
         'medium',
         'fullname',
         'address',
         'requests',
         'phone',
         'email',
         'checkin',
         'checkout',
    ];
}
