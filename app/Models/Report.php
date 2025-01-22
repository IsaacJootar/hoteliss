<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = "logis_reports";
    protected $fillable = [
        'trips_made',
        'airport_pickups',
        'breakdowns',
        'other',
        'note',
        'report_to',
        'files',

    ];
}
