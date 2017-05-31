<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisProgramTable extends Migration
{

    public function up()
    {
      Schema::create('jenis_program', function (Blueprint $table)
        {
          $table->increments('id');
          $table->string('nama');
          $table->string('enrollment_pengajar')->nullable();
          $table->timestamps();


          });
    }


    public function down()
    {
      Schema::dropIfExists('jenis_program');

    }
}
