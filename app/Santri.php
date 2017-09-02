<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jenis_program;

class Santri extends Program
{
  protected $table = "santri";

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'tahun_kbm_terakhir', 'semester_kbm_terakhir', 'spp_status', 'spp_dibayar', 'spp_keterangan'
  ];

  protected $casts = [
      'tahun_kbm_terakhir' => 'integer',
      'semester_kbm_terakhir' => 'integer',
      'spp_status' => 'integer',
      'spp_dibayar' => 'integer'
  ];

  public function scopeJenjang($query, $id_jenjang)
  {
      if(is_null($id_jenjang)) return $query;
      if(is_array($id_jenjang)) return $query->whereIn('id_jenjang', $id_jenjang);
      return $query->where('id_jenjang', $id_jenjang);
  }

  public function scopeProgram($query, $id_jenis_program)
  {
      if(is_null($id_jenis_program)) return $query;
      $daftar_id_jenjang = Jenis_program::find($id_jenis_program)->daftar_jenjang->pluck('id')->all();
      return $this->scopeJenjang($query, $daftar_id_jenjang);
  }

  public function scopeJenisKelamin($query, $jenis_kelamin)
  {
      if(is_null($jenis_kelamin)) return $query;
      return $query->whereHas('pengguna', function ($query) use ($jenis_kelamin) {
          $query->where('jenis_kelamin', $jenis_kelamin);
      });
  }

  public static function jumlah($jenis_kelamin = null, $id_jenjang = null, $id_jenis_program = null) {
    if(is_null($id_jenjang)) return Santri::jenisKelamin($jenis_kelamin)->program($id_jenis_program)->count();
    return Santri::jenisKelamin($jenis_kelamin)->jenjang($id_jenjang)->count();
  }

  function jenjang() {
    return $this->belongsTo('App\Jenjang', 'id_jenjang');
  }

  function sudah_lulus() {
    return $this->belongsTo('App\Jenjang', 'id_jenjang_lulus');
  }

  function pengguna() {
      return $this->belongsTo('App\Pengguna', 'id_pengguna');
  }

  function kelompok() {
      return $this->belongsTo('App\Kelompok', 'id_kelompok');
  }

  public function setTahunKBMTerakhirAttribute($value)
  {
      if(intval($value) > intval(date('Y')) || intval($value) < 2011)
        $this->attributes['tahun_kbm_terakhir'] = NULL;
      else
        $this->attributes['tahun_kbm_terakhir'] = intval($value);
  }
}
