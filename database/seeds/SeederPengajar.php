<?php

use Illuminate\Database\Seeder;
use App\Pengguna;
use App\Pengajar;
use App\Jenjang;

class SeederPengajar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $belum_dites = Jenjang::find(1);

      $pengajar1 = Pengguna::where('username', 'pengajar1')->first();
      $pengajar = new Pengajar();
      $pengajar->kapasitas_membina = 1;
      $pengajar->jenjang()->associate($belum_dites);
      $pengajar->pengguna()->associate($pengajar1);
      $pengajar->save();

      $pengajar2 = Pengguna::where('username', 'pengajar2')->first();
      $pengajar = new Pengajar();
      $pengajar->kapasitas_membina = 1;
      $pengajar->jenjang()->associate($belum_dites);
      $pengajar->pengguna()->associate($pengajar2);
      $pengajar->save();

      //$this->command->info($pengajar1->nama_lengkap);
    }
}
