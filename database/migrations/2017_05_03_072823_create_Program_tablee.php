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


          });
    }


    public function down()
    {
      Schema::dropIfExists('program');

    }
}
