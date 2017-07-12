<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SeederPengguna::class);
        $this->call(SeederProgram::class);
        $this->call(SeederPengajar::class);
        $this->call(SeederJadwal::class);
        $this->call(SeederKelompok::class);
        $this->call(SeederSantri::class);
        $this->call(SeederSistem::class);
    }
}
