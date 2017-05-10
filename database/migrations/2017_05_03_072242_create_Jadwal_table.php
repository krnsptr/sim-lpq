<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalTable extends Migration
{

    public function up()
    {
      Schema::create('jadwal', function (Blueprint $table)
        {
          $table->increments('id');
          $table->time('waktu');
          $table->tinyInteger('hari');

          });
    }


    public function down()
    {
      Schema::dropIfExists('jadwal');

    }
}
