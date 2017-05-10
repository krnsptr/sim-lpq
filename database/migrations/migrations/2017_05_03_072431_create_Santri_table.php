<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('santri', function (Blueprint $table)
        {
          $table->increments('id');
          $table->integer('tahun_kbm_terakhir');
          $table->boolean('semester_kbm_terakhir');
          $table->boolean('spp_lunas');



          });
    }


    public function down()
    {
          Schema::dropIfExists('santri');
    }
}
