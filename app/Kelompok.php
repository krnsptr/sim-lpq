<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{

    function jadwal() {
          return $this->hasOne('App\Jadwal', 'id_jadwal');

      }
    function jenjang(){
          return $this->hasOne('App\Jenjang', 'id_jenjang');

      }
}
