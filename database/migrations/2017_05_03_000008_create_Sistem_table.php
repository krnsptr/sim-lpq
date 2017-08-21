<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSistemTable extends Migration
{

    public function up()
    {
      Schema::create('sistem', function (Blueprint $table)
        {
          $table->increments('id');
          $table->text('pengumuman');
          $table->boolean('pendaftaran_santri');
          $table->boolean('pendaftaran_pengajar');
          $table->boolean('penjadwalan_santri');
          $table->boolean('penjadwalan_pengajar');
          $table->unsignedMediumInteger('spp_biaya');
          $table->string('spp_status', 100);
          $table->timestamps();


          });
    }


    public function down()
    {
      Schema::dropIfExists('sistem');

    }
}
