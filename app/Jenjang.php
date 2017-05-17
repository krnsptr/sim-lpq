<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    /  protected $table = 'jenjang';

      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
          'nama'

    public function jenis_program() {
        return $this->hasOne('App\Jenis_program');
       }
}
