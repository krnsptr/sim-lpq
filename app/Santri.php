<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Program
{
  protected $table = "santri";

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'tahun_kbm_terakhir', 'semester_kbm_terakhir', 'spp_lunas'
  ];

    function jenjang() {
      this->hasOne('App\Jenjang');
    }

    function sudah_lulus() {
      return $this->hasOne('App\Jenjang');
    }
}
