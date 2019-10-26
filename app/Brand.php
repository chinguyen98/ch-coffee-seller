<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function coffees()
    {
        return $this->hasMany('App\Coffee','id_brand','id');
    }
}
