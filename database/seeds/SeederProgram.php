<?php

use Illuminate\Database\Seeder;
use App\Jenis_program;
use App\Jenjang;

class SeederProgram extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tahsin = Jenis_program::create(['nama' => 'Tahsin']);

        $belum_dites = new Jenjang();
        $belum_dites->nama = "Belum dites";
        $belum_dites->jenis_program()->associate($tahsin);
        $belum_dites->save();

        $pratahsin = new Jenjang();
        $pratahsin->nama = "Pra-Tahsin";
        $pratahsin->jenis_program()->associate($tahsin);
        $pratahsin->save();

        $tahsin_1 = new Jenjang();
        $tahsin_1->nama = "Tahsin 1";
        $tahsin_1->jenis_program()->associate($tahsin);
        $tahsin_1->save();

        $tahsin_2 = new Jenjang();
        $tahsin_2->nama = "Tahsin 2";
        $tahsin_2->jenis_program()->associate($tahsin);
        $tahsin_2->save();

        $bahasa_arab = Jenis_program::create(['nama' => 'Bahasa Arab']);

        $belum_dites = new Jenjang();
        $belum_dites->nama = "Belum dites";
        $belum_dites->jenis_program()->associate($bahasa_arab);
        $belum_dites->save();

        $tingkat_1 = new Jenjang();
        $tingkat_1->nama = "Tingkat 1";
        $tingkat_1->jenis_program()->associate($bahasa_arab);
        $tingkat_1->save();

        $tingkat_2 = new Jenjang();
        $tingkat_2->nama = "Tingkat 2";
        $tingkat_2->jenis_program()->associate($bahasa_arab);
        $tingkat_2->save();
    }
}
