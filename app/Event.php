<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title','image','from_date','to_date','start_time',
        'end_time','venue','description','user_id','status','order'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

