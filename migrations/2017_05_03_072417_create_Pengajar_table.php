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
          $table->integer('kapasitas_membina');
          $table->text('motivasi_mengajar');


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
