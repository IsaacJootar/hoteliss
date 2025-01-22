<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Roomallocation extends Model
{
    protected $table="room_allocations";

    Protected $guarded=[];   // disable mass asignment issue

    public function category() : BelongsTo{

        return $this->belongsTo(Roomcategory::class, 'category_id','id'); // relation is where cat_id  in  Roomallocation = id in Roomcategory
    }

}
