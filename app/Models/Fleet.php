<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fleet extends Model
{
    protected $table = "logis_fleets";
    protected $fillable = [
        'category',
        'item_name',
        'item_number',
    ];
}
