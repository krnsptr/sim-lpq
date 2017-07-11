<?php


use Illuminate\Database\Seeder;
use App\Jenis_program;
use App\Jadwal;

class SeederJadwal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $jadwal= new Jadwal();
      $jadwal->hari = 1;
      $jadwal->waktu = "17:00";
      $jadwal->pengajar()->associate(4);
      $jadwal->save();

      $jadwal= new Jadwal();
      $jadwal->hari = 1;
      $jadwal->waktu = "17:00";
      $jadwal->pengajar()->associate(2);
      $jadwal->save();

      $jadwal= new Jadwal();
      $jadwal->hari = 1;
      $jadwal->waktu = "17:00";
      $jadwal->pengajar()->associate(4);
      $jadwal->save();

      $jadwal= new Jadwal();
      $jadwal->hari = 2;
      $jadwal->waktu = "18:00";
      $jadwal->pengajar()->associate(2);
      $jadwal->save();

      $jadwal= new Jadwal();
      $jadwal->hari = 2;
      $jadwal->waktu = "20:00";
      $jadwal->pengajar()->associate(2);
      $jadwal->save();

      $jadwal= new Jadwal();
      $jadwal->hari = 3;
      $jadwal->waktu = "16:00";
      $jadwal->pengajar()->associate(5);
      $jadwal->save();

      $jadwal= new Jadwal();
      $jadwal->hari = 4;
      $jadwal->waktu = "19:00";
      $jadwal->pengajar()->associate(6);
      $jadwal->save();

      $jadwal= new Jadwal();
      $jadwal->hari = 4;
      $jadwal->waktu = "18:00";
      $jadwal->pengajar()->associate(4);
      $jadwal->save();

      $jadwal= new Jadwal();
      $jadwal->hari = 5;
      $jadwal->waktu = "18:00";
      $jadwal->pengajar()->associate(3);
      $jadwal->save();

      $jadwal= new Jadwal();
      $jadwal->hari = 6;
      $jadwal->waktu = "18:00";
      $jadwal->pengajar()->associate(6);
      $jadwal->save();

      $jadwal= new Jadwal();
      $jadwal->hari = 7;
      $jadwal->waktu = "19:00";
      $jadwal->pengajar()->associate(3);
      $jadwal->save();


    }
}
