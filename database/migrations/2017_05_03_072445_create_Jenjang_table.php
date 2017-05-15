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
          $table->integer('id_program')->unsigned();
          $table->foreign('id_program')->references('id')->on('program') ->onDelete('cascade');



          });
    }


    public function down()
    {
      Schema::dropIfExists('jenjang');

    }
}
