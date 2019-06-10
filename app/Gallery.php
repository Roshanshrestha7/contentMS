<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $fillable = ['title','status','banner','image'];

    public function image()
    {
        return $this->hasMany('App\Image','gallery_id','id');
    }
}
