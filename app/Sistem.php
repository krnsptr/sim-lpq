<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistem extends Model
{
    protected $table = "sistem";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pengumuman', 'pendaftaran_santri', 'pendaftaran_pengajar', 'penjadwalan_santri', 'penjadwalan_pengajar'
    ];

    protected $casts = [
        'pendaftaran_santri' => 'boolean',
        'pendaftaran_pengajar' => 'boolean',
        'penjadwalan_santri' => 'boolean',
        'penjadwalan_pengajar' => 'boolean'
    ];
}
