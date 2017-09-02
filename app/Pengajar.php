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

  public function scopeJenjang($query, $id_jenjang = null)
  {
      if(is_null($id_jenjang)) return $query;
      if(is_array($id_jenjang)) return $query->whereIn('id_jenjang', $id_jenjang);
      return $query->where('id_jenjang', $id_jenjang);
  }

  public function scopeProgram($query, $id_jenis_program = null)
  {
      if(is_null($id_jenis_program)) return $query;
      $daftar_id_jenjang = Jenis_program::find($id_jenis_program)->daftar_jenjang->pluck('id')->all();
      return $this->scopeJenjang($query, $daftar_id_jenjang);
  }

  public function scopeJenisKelamin($query, $jenis_kelamin = null)
  {
      if(is_null($jenis_kelamin)) return $query;
      return $query->whereHas('pengguna', function ($query) use ($jenis_kelamin) {
          $query->where('jenis_kelamin', $jenis_kelamin);
      });
  }

  public static function jumlah($jenis_kelamin, $id_jenjang, $id_jenis_program = null) {
    if(is_null($id_jenjang)) return Pengajar::jenisKelamin($jenis_kelamin)->program($id_jenis_program)->count();
    return Pengajar::jenisKelamin($jenis_kelamin)->jenjang($id_jenjang)->count();
  }

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
