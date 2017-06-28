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
      $santri->save();

      $santri2 = Pengguna::where('username', 'santri2')->first();
      $santri = new Santri();
      $santri->spp_lunas = 0;
      $santri->jenjang()->associate($belum_dites);
      $santri->pengguna()->associate($santri2);
      $santri->save();
    }
}
