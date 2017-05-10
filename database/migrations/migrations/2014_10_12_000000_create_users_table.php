<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('username', 16)->unique();
            $table->string('password');
            $table->boolean('jenis_kelamin');
            $table->boolean('mahasiswa_ipb');
            $table->string('nomor_identitas')->unique();
            $table->string('nomor_hp', 13)->unique();
            $table->string('nomor_wa', 13)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
}
