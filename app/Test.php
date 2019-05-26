<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
   protected $table ='pages';
   protected $fillable = ['name','description','banner','status'];
}
