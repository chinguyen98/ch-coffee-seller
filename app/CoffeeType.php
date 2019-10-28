<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoffeeType extends Model
{
    public function coffees(){
        return $this->hasMany('App\Coffee','id_type','id');
    }
}
