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
      'kapasitas_membina', 'motivasi_mengajar', 'pendaftaran', 'memenuhi_syarat'
  ];

  protected $casts = [
      'kapasitas_membina' => 'integer'
  ];

  public function getMemenuhiSyaratAttribute($value)
  {
      return explode(':', $value, 4);
  }

  public function setMemenuhiSyaratAttribute($array) {
    $memenuhi_syarat = '';
    for($i=0; $i<3; $i++) {
      if(isset($array[$i])) $memenuhi_syarat .= '1:'; else $memenuhi_syarat .= '0:';
    }
    $this->attributes['memenuhi_syarat'] = $memenuhi_syarat;
  }

  function jenjang() {
      return $this->belongsTo('App\Jenjang', 'id_jenjang');
  }

  function pengguna() {
      return $this->belongsTo('App\Pengguna', 'id_pengguna');
  }

  function daftar_jadwal() {
      return $this->hasMany('App\Jadwal', 'id_pengajar');
  }

  function daftar_kelompok() {
      return $this->hasManyThrough('App\Kelompok', 'App\Jadwal', 'id_pengajar', 'id_jadwal');
  }
}
