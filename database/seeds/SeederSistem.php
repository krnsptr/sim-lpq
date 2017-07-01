<?php

use Illuminate\Database\Seeder;
use App\Sistem;

class SeederSistem extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Sistem::create([
        'pengumuman' => '...',
        'pendaftaran_santri' => TRUE,
        'pendaftaran_pengajar' => FALSE,
        'penjadwalan_santri' => FALSE,
        'penjadwalan_pengajar' => TRUE
      ]);
    }
}
