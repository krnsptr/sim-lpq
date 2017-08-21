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
        'pendaftaran_pengajar' => TRUE,
        'penjadwalan_santri' => TRUE,
        'penjadwalan_pengajar' => TRUE,
        'spp_biaya' => 70000,
        'spp_status' => json_encode([
          'Belum dibayar',
          'Cicilan',
          'Lunas',
        ])
      ]);
    }
}
