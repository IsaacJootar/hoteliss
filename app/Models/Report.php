<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = "logis_reports";
    protected $fillable = [
        'report_id', // must on all reports
        'trips_made',
        'airport_pickups',
        'breakdowns',
        'other',
        'note', // must on all reports
        'sent_by', // must on all reports
        'sent_to', // must on all reports
        'section', // must on all reports


    ];
}
