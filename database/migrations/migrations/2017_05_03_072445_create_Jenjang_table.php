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



          });
    }


    public function down()
    {
      Schema::dropIfExists('jenjang');

    }
}
