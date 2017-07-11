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

      $pengajar3 = Pengguna::where('username', 'pengajar3')->first();
      $pengajar = new Pengajar();
      $pengajar->kapasitas_membina = 1;
      $pengajar->jenjang()->associate(4);
      $pengajar->pengguna()->associate($pengajar3);
      $pengajar->save();

      $pengajar4 = Pengguna::where('username', 'pengajar4')->first();
      $pengajar = new Pengajar();
      $pengajar->kapasitas_membina = 1;
      $pengajar->jenjang()->associate(2);
      $pengajar->pengguna()->associate($pengajar4);
      $pengajar->save();

      $pengajar5 = Pengguna::where('username', 'pengajar5')->first();
      $pengajar = new Pengajar();
      $pengajar->kapasitas_membina = 1;
      $pengajar->jenjang()->associate(3);
      $pengajar->pengguna()->associate($pengajar5);
      $pengajar->save();

      $pengajar6 = Pengguna::where('username', 'pengajar6')->first();
      $pengajar = new Pengajar();
      $pengajar->kapasitas_membina = 1;
      $pengajar->jenjang()->associate($belum_dites);
      $pengajar->pengguna()->associate($pengajar6);
      $pengajar->save();

      $pengajar7 = Pengguna::where('username', 'pengajar7')->first();
      $pengajar = new Pengajar();
      $pengajar->kapasitas_membina = 1;
      $pengajar->jenjang()->associate(2);
      $pengajar->pengguna()->associate($pengajar7);
      $pengajar->save();

      $pengajar8 = Pengguna::where('username', 'pengajar8')->first();
      $pengajar = new Pengajar();
      $pengajar->kapasitas_membina = 1;
      $pengajar->jenjang()->associate(3);
      $pengajar->pengguna()->associate($pengajar8);
      $pengajar->save();

      $pengajar9 = Pengguna::where('username', 'pengajar9')->first();
      $pengajar = new Pengajar();
      $pengajar->kapasitas_membina = 1;
      $pengajar->jenjang()->associate(4);
      $pengajar->pengguna()->associate($pengajar9);
      $pengajar->save();

      //$this->command->info($pengajar1->nama_lengkap);
    }
}
