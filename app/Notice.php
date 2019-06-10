<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = ['title','description','file','status','order','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

