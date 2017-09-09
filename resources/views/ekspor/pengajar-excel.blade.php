<html>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Lengkap</th>
        <th>Username</th>
        <th>Jenis Kelamin</th>
        <th>Mahasiswa IPB</th>
        <th>Nomor Identitas</th>
        <th>Email</th>
        <th>Nomor HP</th>
        <th>Nomor WA</th>
        <th>Program</th>
        <th>Jenjang</th>
        <th>Pendaftaran</th>
        <th>Memenuhi Syarat</th>
        <th>Kapasitas Membina</th>
        <th>Penjadwalan</th>
        <th>Motivasi Mengajar</th>
      </tr>
    </thead>
    <tbody>
    @foreach($daftar_pengajar as $pengajar)
      <tr>
        <td>{{ $pengajar->id }}</td>
        <td>{{ $pengajar->pengguna->nama_lengkap }}</td>
        <td>{{ $pengajar->pengguna->username }}</td>
        <td>@if($pengajar->pengguna->jenis_kelamin) Laki-laki @else Perempuan @endif</td>
        <td>
          @if($pengajar->pengguna->mahasiswa_ipb == 1)
            Ya (Diploma/Sarjana)
          @elseif($pengajar->pengguna->mahasiswa_ipb == 2)
            Ya (Pascasarjana)
          @else
            Bukan (Umum)
          @endif
        </td>
        <td>{{ $pengajar->pengguna->nomor_identitas}}</td>
        <td>{{ $pengajar->pengguna->email}}</td>
        <td>{{ $pengajar->pengguna->nomor_hp}}</td>
        <td>{{ $pengajar->pengguna->nomor_wa}}</td>
        <td>{{ $pengajar->jenjang->jenis_program->nama }}</td>
        <td>{{ $pengajar->jenjang->nama }}</td>
        <td>@if($pengajar->pendaftaran == 0) Baru @else Ulang @endif</td>
        <td>
          @if($pengajar->jenjang->jenis_program->id === 1)
            @if(!empty($pengajar->memenuhi_syarat[0])) Lulus Tahsin 2, @endif
            @if(!empty($pengajar->memenuhi_syarat[1])) Lulus Dauroh Syahadah, @endif
            @if(!empty($pengajar->memenuhi_syarat[2])) Berkompetensi mengajar, @endif
          @endif
        </td>
        <td>{{ $pengajar->kapasitas_membina }}</td>
        <td>@if($pengajar->has('daftar_jadwal')) Sudah @else Belum @endif</td>
        <td>{{ $pengajar->motivasi_mengajar }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</html>
