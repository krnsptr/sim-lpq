<?php

use Illuminate\Database\Seeder;

class SeederSistem extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('sistem')->insert(
        [
          'pengumuman' => '...',
          'pendaftaran_santri' => TRUE,
          'pendaftaran_pengajar' => FALSE,
          'penjadwalan_santri' => FALSE,
          'penjadwalan_pengajar' => TRUE
        ]
      );
    }
}
