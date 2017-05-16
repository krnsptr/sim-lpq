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
          $table->integer('tahun_kbm_terakhir')->nullable();
          $table->boolean('semester_kbm_terakhir')->nullable();
          $table->boolean('spp_lunas');
          $table->integer('id_jenjang')->unsigned()->nullable();
          $table->foreign('id_jenjang')->references('id')->on('jenjang')->onDelete('restrict');
          $table->integer('id_jenjang_lulus')->unsigned()->nullable();
          $table->foreign('id_jenjang_lulus')->references('id')->on('jenjang')->onDelete('restrict');
          $table->integer('id_kelompok')->unsigned()->nullable();
          $table->foreign('id_kelompok')->references('id')->on('kelompok')->onDelete('set null');
          $table->integer('id_pengguna')->unsigned();
          $table->foreign('id_pengguna')->references('id')->on('pengguna')->onDelete('cascade');


          });
    }


    public function down()
    {
          Schema::dropIfExists('santri');
    }
}
