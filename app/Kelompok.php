<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{

    function jadwal() {
          return $this->hasOne('App\Jadwal');

      }
    function jenjang(){
          return $this->hasOne('App\Jenjang');

      }
}
