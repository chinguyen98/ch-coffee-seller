<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function coffees()
    {
        return $this->hasMany('App\Coffee', 'id_unit', 'id');
    }
}
