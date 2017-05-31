<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Pengguna;

class SeederPengguna extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Membuat role admin
      $adminRole = new Role();
      $adminRole->name = "admin";
      $adminRole->display_name = "Admin";
      $adminRole->save();

      // Membuat role member
      $memberRole = new Role();
      $memberRole->name = "member";
      $memberRole->display_name = "Member";
      $memberRole->save();

      // Membuat sample admin
      $admin = new Pengguna();
      $admin->nama_lengkap = 'SIM LPQ';
      $admin->email = 'lpqipb+simlpq@gmail.com';
      $admin->username = 'sim-lpq';
      $admin->password = bcrypt('sim-lpq');
      $admin->jenis_kelamin = 0;
      $admin->mahasiswa_ipb = 0;
      $admin->nomor_identitas = '123456789';
      $admin->nomor_hp = '08123456789';
      $admin->save();
      $admin->attachRole($adminRole);

      // Membuat sample member
      $member = new Pengguna();
      $member->nama_lengkap = 'Project Varokah';
      $member->email = 'lpqipb+varokah@gmail.com';
      $member->username = 'project';
      $member->password = bcrypt('varokah');
      $member->jenis_kelamin = 0;
      $member->mahasiswa_ipb = 0;
      $member->nomor_identitas = '987654321';
      $member->nomor_hp = '08987654321';
      $member->save();
      $member->attachRole($memberRole);
    }
}
