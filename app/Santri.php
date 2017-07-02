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
      return $this->belongsTo('App\Jenjang', 'id_jenjang');
    }

    function sudah_lulus() {
      return $this->belongsTo('App\Jenjang', 'id_jenjang_lulus');
    }

    function pengguna() {
        return $this->belongsTo('App\Pengguna', 'id_pengguna');
    }
}
