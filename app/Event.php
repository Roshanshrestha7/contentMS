<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title','banner','from_date','to_date','time','venue','description','user_id',
        'status','order'];
}
