<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = ['parent_page_id','title','description','status','order'];

    public function parentPage(){
        return $this->belongsTo('App\Pages','parent_page_id','id');
    }
}

