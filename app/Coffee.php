<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coffee extends Model
{
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function coffee_type()
    {
        return $this->belongsTo('App\CoffeeType');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}
