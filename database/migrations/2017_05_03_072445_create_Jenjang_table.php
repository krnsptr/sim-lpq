<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenjangTable extends Migration
{

    public function up()
    {
      Schema::create('jenjang', function (Blueprint $table)
        {
          $table->increments('id');
          $table->string('nama');
          $table->integer('id_jenis_program')->unsigned();
          $table->foreign('id_jenis_program')->references('id')->on('jenis_program')->onDelete('restrict');



          });
    }


    public function down()
    {
      Schema::dropIfExists('jenjang');

    }
}
