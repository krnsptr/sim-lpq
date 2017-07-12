<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $table = "kelompok";
    function jadwal() {
          return $this->belongsTo('App\Jadwal', 'id_jadwal');

      }
    function jenjang(){
          return $this->belongsTo('App\Jenjang', 'id_jenjang');
      }
    function daftar_santri(){
          return $this->hasMany('App\Santri', 'id');
      }
}
