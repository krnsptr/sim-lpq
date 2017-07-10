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

      $member = new Pengguna();
      $member->nama_lengkap = 'Santri 3 (L)';
      $member->email = 'santri3@gmail.com';
      $member->username = 'santri3';
      $member->password = bcrypt('santri3');
      $member->jenis_kelamin = 1;
      $member->mahasiswa_ipb = 1;
      $member->nomor_identitas = 'santri003';
      $member->nomor_hp = '085500000003';
      $member->save();
      $member->attachRole($memberRole);

      $member = new Pengguna();
      $member->nama_lengkap = 'Santri 4 (L)';
      $member->email = 'santri4@gmail.com';
      $member->username = 'santri4';
      $member->password = bcrypt('santri4');
      $member->jenis_kelamin = 1;
      $member->mahasiswa_ipb = 1;
      $member->nomor_identitas = 'santri004';
      $member->nomor_hp = '085500000004';
      $member->save();
      $member->attachRole($memberRole);

      $member = new Pengguna();
      $member->nama_lengkap = 'Santri 5 (L)';
      $member->email = 'santri5@gmail.com';
      $member->username = 'santri5';
      $member->password = bcrypt('santri5');
      $member->jenis_kelamin = 1;
      $member->mahasiswa_ipb = 1;
      $member->nomor_identitas = 'santri005';
      $member->nomor_hp = '085500000005';
      $member->save();
      $member->attachRole($memberRole);

      $member = new Pengguna();
      $member->nama_lengkap = 'Santri 6 (L)';
      $member->email = 'santri6@gmail.com';
      $member->username = 'santri6';
      $member->password = bcrypt('santri6');
      $member->jenis_kelamin = 1;
      $member->mahasiswa_ipb = 1;
      $member->nomor_identitas = 'santri006';
      $member->nomor_hp = '085500000006';
      $member->save();
      $member->attachRole($memberRole);

      $member = new Pengguna();
      $member->nama_lengkap = 'Santri 7 (L)';
      $member->email = 'santri7@gmail.com';
      $member->username = 'santri7';
      $member->password = bcrypt('santri7');
      $member->jenis_kelamin = 1;
      $member->mahasiswa_ipb = 1;
      $member->nomor_identitas = 'santri007';
      $member->nomor_hp = '085500000007';
      $member->save();
      $member->attachRole($memberRole);


      $member = new Pengguna();
      $member->nama_lengkap = 'Santri 8 (P)';
      $member->email = 'santri8@gmail.com';
      $member->username = 'santri8';
      $member->password = bcrypt('santri8');
      $member->jenis_kelamin = 0;
      $member->mahasiswa_ipb = 1;
      $member->nomor_identitas = 'santri008';
      $member->nomor_hp = '085500000008';
      $member->save();
      $member->attachRole($memberRole);

      $member = new Pengguna();
      $member->nama_lengkap = 'Santri 9 (P)';
      $member->email = 'santri9@gmail.com';
      $member->username = 'santri9';
      $member->password = bcrypt('santri9');
      $member->jenis_kelamin = 0;
      $member->mahasiswa_ipb = 1;
      $member->nomor_identitas = 'santri009';
      $member->nomor_hp = '085500000009';
      $member->save();
      $member->attachRole($memberRole);

      $member = new Pengguna();
      $member->nama_lengkap = 'Santri 10 (P)';
      $member->email = 'santri10@gmail.com';
      $member->username = 'santri10';
      $member->password = bcrypt('santri10');
      $member->jenis_kelamin = 0;
      $member->mahasiswa_ipb = 1;
      $member->nomor_identitas = 'santri010';
      $member->nomor_hp = '085500000010';
      $member->attachRole($memberRole);
      $member->save();

      $member = new Pengguna();
      $member->nama_lengkap = 'Santri 11 (P)';
      $member->email = 'santri11@gmail.com';
      $member->username = 'santri11';
      $member->password = bcrypt('santri11');
      $member->jenis_kelamin = 0;
      $member->mahasiswa_ipb = 1;
      $member->nomor_identitas = 'santri011';
      $member->nomor_hp = '085500000011';
      $member->attachRole($memberRole);
      $member->save();

      $member = new Pengguna();
      $member->nama_lengkap = 'Santri 12 (P)';
      $member->email = 'santri12@gmail.com';
      $member->username = 'santri12';
      $member->password = bcrypt('santri12');
      $member->jenis_kelamin = 0;
      $member->mahasiswa_ipb = 1;
      $member->nomor_identitas = 'santri012';
      $member->nomor_hp = '085500000012';
      $member->save();
      $member->attachRole($memberRole);
    }
}
