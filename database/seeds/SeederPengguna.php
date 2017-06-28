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
      $member->nama_lengkap = 'Pengajar 1 (L)';
      $member->email = 'pengajar1@gmail.com';
      $member->username = 'pengajar1';
      $member->password = bcrypt('pengajar1');
      $member->jenis_kelamin = 1;
      $member->mahasiswa_ipb = 1;
      $member->nomor_identitas = 'pengajar001';
      $member->nomor_hp = '089900000001';
      $member->save();
      $member->attachRole($memberRole);

      // Membuat sample member
      $member = new Pengguna();
      $member->nama_lengkap = 'Pengajar 2 (P)';
      $member->email = 'pengajar2@gmail.com';
      $member->username = 'pengajar2';
      $member->password = bcrypt('pengajar2');
      $member->jenis_kelamin = 0;
      $member->mahasiswa_ipb = 1;
      $member->nomor_identitas = 'pengajar002';
      $member->nomor_hp = '089900000002';
      $member->save();
      $member->attachRole($memberRole);

      // Membuat sample member
      $member = new Pengguna();
      $member->nama_lengkap = 'Santri 1 (L)';
      $member->email = 'santri1@gmail.com';
      $member->username = 'santri1';
      $member->password = bcrypt('santri1');
      $member->jenis_kelamin = 1;
      $member->mahasiswa_ipb = 1;
      $member->nomor_identitas = 'santri001';
      $member->nomor_hp = '085500000001';
      $member->save();
      $member->attachRole($memberRole);

      // Membuat sample member
      $member = new Pengguna();
      $member->nama_lengkap = 'Santri 2 (P)';
      $member->email = 'santri2@gmail.com';
      $member->username = 'santri2';
      $member->password = bcrypt('santri2');
      $member->jenis_kelamin = 0;
      $member->mahasiswa_ipb = 1;
      $member->nomor_identitas = 'santri002';
      $member->nomor_hp = '085500000002';
      $member->save();
      $member->attachRole($memberRole);
    }
}
