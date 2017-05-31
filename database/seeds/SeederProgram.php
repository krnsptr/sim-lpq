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
    }
}
