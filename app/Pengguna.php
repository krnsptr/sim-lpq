<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Pengguna extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    protected $table = 'pengguna';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_lengkap', 'email', 'username', 'password', 'jenis_kelamin', 'mahasiswa_ipb', 'nomor_identitas', 'nomor_hp', 'nomor_wa'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'jenis_kelamin' => 'boolean',
        'mahasiswa_ipb' => 'integer'
    ];

    public function scopeJenisKelamin($query, $jenis_kelamin = null)
    {
        if(is_null($jenis_kelamin)) return $query;
        return $query->where('jenis_kelamin', $jenis_kelamin);
    }

    public static function jumlah_santri($jenis_kelamin) {
      return Pengguna::jenisKelamin($jenis_kelamin)->has('daftar_santri')->count();
    }

    public static function jumlah_pengajar($jenis_kelamin) {
      return Pengguna::jenisKelamin($jenis_kelamin)->has('daftar_pengajar')->count();
    }

    public static function jumlah_tanpa_program($jenis_kelamin) {
      return Pengguna::jenisKelamin($jenis_kelamin)->doesntHave('daftar_santri')->count();
    }

    function daftar_pengajar() {
        return $this->hasMany('App\Pengajar', 'id_pengguna');
    }

    function daftar_santri() {
        return $this->hasMany('App\Santri', 'id_pengguna');
    }
}
