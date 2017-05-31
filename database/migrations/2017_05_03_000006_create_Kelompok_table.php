<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelompokTable extends Migration
{

    public function up()
    {
      Schema::create('kelompok', function (Blueprint $table)
        {
          $table->increments('id');
          $table->integer('id_jadwal')->unsigned();
          $table->foreign('id_jadwal')->references('id')->on('jadwal')->onDelete('restrict');
          $table->integer('id_jenjang')->unsigned();
          $table->foreign('id_jenjang')->references('id')->on('jenjang')->onDelete('restrict');
          $table->timestamps();

          });
    }


    public function down()
    {
      Schema::dropIfExists('kelompok');

    }
}
