<?php

use Illuminate\Database\Seeder;
use App\Jenis_program;
use App\Kelompok;
class SeederKelompok extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelompok= new Kelompok();
        $kelompok->jadwal()->associate(3);
        $kelompok->jenjang()->associate($kelompok->jadwal->pengajar->jenjang);
        $kelompok->save();

        $kelompok= new Kelompok();
        $kelompok->jadwal()->associate(2);
        $kelompok->jenjang()->associate($kelompok->jadwal->pengajar->jenjang);
        $kelompok->save();

        $kelompok= new Kelompok();
        $kelompok->jadwal()->associate(1);
        $kelompok->jenjang()->associate($kelompok->jadwal->pengajar->jenjang);
        $kelompok->save();

        $kelompok= new Kelompok();
        $kelompok->jadwal()->associate(5);
        $kelompok->jenjang()->associate($kelompok->jadwal->pengajar->jenjang);
        $kelompok->save();

        $kelompok= new Kelompok();
        $kelompok->jadwal()->associate(6);
        $kelompok->jenjang()->associate($kelompok->jadwal->pengajar->jenjang);
        $kelompok->save();

        $kelompok= new Kelompok();
        $kelompok->jadwal()->associate(4);
        $kelompok->jenjang()->associate($kelompok->jadwal->pengajar->jenjang);
        $kelompok->save();
    }
}
