<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = ['image','status','gallery_id'];
    protected  $table = 'images';

    public function galleryTitle()
    {
        return $this->belongsTo('App\Gallery','gallery_id','id');
    }
}
