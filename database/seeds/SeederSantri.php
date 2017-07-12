<?php

use Illuminate\Database\Seeder;
use App\Pengguna;
use App\Santri;
use App\Jenjang;

class SeederSantri extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $belum_dites = Jenjang::find(1);

      $santri1 = Pengguna::where('username', 'santri1')->first();
      $santri = new Santri();
      $santri->spp_lunas = 0;
      $santri->jenjang()->associate($belum_dites);
      $santri->pengguna()->associate($santri1);
      $santri->kelompok()->associate(1);
      $santri->save();

      $santri2 = Pengguna::where('username', 'santri2')->first();
      $santri = new Santri();
      $santri->spp_lunas = 0;
      $santri->jenjang()->associate($belum_dites);
      $santri->pengguna()->associate($santri2);
      $santri->kelompok()->associate(1);
      $santri->save();

      $santri3 = Pengguna::where('username', 'santri3')->first();
      $santri = new Santri();
      $santri->spp_lunas = 0;
      $santri->jenjang()->associate(3);
      $santri->pengguna()->associate($santri3);
      $santri->kelompok()->associate(1);
      $santri->save();

      $santri4 = Pengguna::where('username', 'santri4')->first();
      $santri = new Santri();
      $santri->spp_lunas = 1;
      $santri->jenjang()->associate(2);
      $santri->pengguna()->associate($santri4);
      $santri->kelompok()->associate(3);
      $santri->save();

      $santri5 = Pengguna::where('username', 'santri5')->first();
      $santri = new Santri();
      $santri->spp_lunas = 0;
      $santri->jenjang()->associate(3);
      $santri->pengguna()->associate($santri5);
      $santri->kelompok()->associate(3);
      $santri->save();

      $santri6 = Pengguna::where('username', 'santri6')->first();
      $santri = new Santri();
      $santri->spp_lunas = 1;
      $santri->jenjang()->associate(1);
      $santri->pengguna()->associate($santri6);
      $santri->kelompok()->associate(3);
      $santri->save();

      $santri7 = Pengguna::where('username', 'santri7')->first();
      $santri = new Santri();
      $santri->spp_lunas = 0;
      $santri->jenjang()->associate(3);
      $santri->pengguna()->associate($santri7);
      $santri->kelompok()->associate(5);
      $santri->save();

      $santri8 = Pengguna::where('username', 'santri8')->first();
      $santri = new Santri();
      $santri->spp_lunas = 1;
      $santri->jenjang()->associate(1);
      $santri->pengguna()->associate($santri8);
      $santri->kelompok()->associate(5);
      $santri->save();

      $santri9 = Pengguna::where('username', 'santri9')->first();
      $santri = new Santri();
      $santri->spp_lunas = 0;
      $santri->jenjang()->associate(1);
      $santri->pengguna()->associate($santri9);
      $santri->kelompok()->associate(2);
      $santri->save();

      $santri10 = Pengguna::where('username', 'santri10')->first();
      $santri = new Santri();
      $santri->spp_lunas = 0;
      $santri->jenjang()->associate(2);
      $santri->pengguna()->associate($santri10);
      $santri->kelompok()->associate(4);
      $santri->save();

      $santri11 = Pengguna::where('username', 'santri11')->first();
      $santri = new Santri();
      $santri->spp_lunas = 1;
      $santri->jenjang()->associate(3);
      $santri->pengguna()->associate($santri11);
      $santri->kelompok()->associate(6);
      $santri->save();

      $santri12 = Pengguna::where('username', 'santri12')->first();
      $santri = new Santri();
      $santri->spp_lunas = 1;
      $santri->jenjang()->associate(2);
      $santri->pengguna()->associate($santri12);
      $santri->kelompok()->associate(5);
      $santri->save();
    }
}
