<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use Notifiable;

    public function services(){

      return $this->belongsToMany('App\Service');

    }
}
