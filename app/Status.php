<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function orders()
    {
        return $this->hasMany('App\Order', 'id_status', 'id');
    }
}
