<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajar extends Program
{
  protected $table = "pengajar";

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'kapasitas_membina', 'motivasi_mengajar'
  ];

    function jenjang() {
      this->hasOne('App\Jenjang');
    }
}
