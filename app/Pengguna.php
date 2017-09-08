<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Notifications\ResetPassword;

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

    public function sendPasswordResetNotification($token)
    {
       $this->notify(new ResetPassword($token, $this->nama_lengkap, $this->username));
    }

    public function scopeJenisKelamin($query, $jenis_kelamin = null)
    {
        if(is_null($jenis_kelamin)) return $query;
        return $query->where('jenis_kelamin', $jenis_kelamin);
    }

    public function scopeSantri($query)
    {
        return $query->has('daftar_santri');
    }

    public function scopePengajar($query)
    {
        return $query->has('daftar_pengajar');
    }

    public function scopeTanpaProgram($query)
    {
        return $query->doesntHave('daftar_santri')->doesntHave('daftar_pengajar');
    }

    public static function jumlah_santri($jenis_kelamin = null) {
      return Pengguna::jenisKelamin($jenis_kelamin)->santri()->count();
    }

    public static function jumlah_pengajar($jenis_kelamin = null) {
      return Pengguna::jenisKelamin($jenis_kelamin)->pengajar()->count();
    }

    public static function jumlah_tanpa_program($jenis_kelamin = null) {
      return Pengguna::jenisKelamin($jenis_kelamin)->tanpaProgram()->count();
    }

    function daftar_pengajar() {
        return $this->hasMany('App\Pengajar', 'id_pengguna');
    }

    function daftar_santri() {
        return $this->hasMany('App\Santri', 'id_pengguna');
    }
}
