<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramTablee extends Migration
{

    public function up()
    {
      Schema::create('program', function (Blueprint $table)
        {
          $table->increments('id');
          $table->integer('id_pengguna')->unsigned();
          $table->foreign('id_pengguna')->references('id')->on('pengguna') ->onDelete('cascade');


          });
    }


    public function down()
    {
      Schema::dropIfExists('program');

    }
}
