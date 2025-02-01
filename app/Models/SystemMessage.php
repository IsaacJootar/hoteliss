<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemMessage extends Model
{
    protected $table = "system_messages";
    protected $fillable = [
        'message_id', //
        'message',
        'message_type',
        'sent_by',
        'sent_to',
        'section',
        'date',
    ];
}
 // come back apply the appropriate eloquent relation later
