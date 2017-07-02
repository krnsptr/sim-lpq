<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pengajar', function (Blueprint $table)
        {
          $table->increments('id');
          $table->integer('kapasitas_membina')->unsigned()->default(1);
          $table->text('motivasi_mengajar')->nullable();
          $table->integer('id_jenjang')->unsigned()->nullable();
          $table->foreign('id_jenjang')->references('id')->on('jenjang')->onDelete('restrict');
          $table->integer('id_pengguna')->unsigned();
          $table->foreign('id_pengguna')->references('id')->on('pengguna')->onDelete('cascade');
          $table->timestamps();
          $table->unique(['id_pengguna','id_jenjang']);
          });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('pengajar');

    }
}
