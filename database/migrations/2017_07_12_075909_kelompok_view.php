<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KelompokView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW kelompok_view AS
          SELECT kelompok.id AS id_k, hari, waktu, kuota, kuota-(SELECT COUNT(*) FROM santri WHERE santri.id_kelompok = id_k) AS sisa, nama_lengkap, jenis_kelamin, jenjang.id AS id_jenjang, jenjang.nama AS nama_jenjang
          FROM jenjang, kelompok, jadwal, pengajar, pengguna WHERE jenjang.id = kelompok.id_jenjang AND kelompok.id_jadwal = jadwal.id AND jadwal.id_pengajar = pengajar.id AND pengajar.id_pengguna = pengguna.id ORDER BY jenis_kelamin DESC, id_jenjang, hari, waktu");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW kelompok_view");
    }
}
