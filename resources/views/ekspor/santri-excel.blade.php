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
        <th>Lulus Jenjang</th>
        <th>Tahun KBM Terakhir</th>
        <th>Semester KBM Terakhir</th>
        <th>ID Kelompok</th>
      </tr>
    </thead>
    <tbody>
    @foreach($daftar_santri as $santri)
      <tr>
        <td>{{ $santri->id }}</td>
        <td>{{ $santri->pengguna->nama_lengkap }}</td>
        <td>{{ $santri->pengguna->username }}</td>
        <td>@if($santri->pengguna->jenis_kelamin) Laki-laki @else Perempuan @endif</td>
        <td>
          @if($santri->pengguna->mahasiswa_ipb == 1)
            Ya (Diploma/Sarjana)
          @elseif($santri->pengguna->mahasiswa_ipb == 2)
            Ya (Pascasarjana)
          @else
            Bukan (Umum)
          @endif
        </td>
        <td>{{ $santri->pengguna->nomor_identitas}}</td>
        <td>{{ $santri->pengguna->email}}</td>
        <td>{{ $santri->pengguna->nomor_hp}}</td>
        <td>{{ $santri->pengguna->nomor_wa}}</td>
        <td>{{ $santri->jenjang->jenis_program->nama }}</td>
        <td>{{ $santri->jenjang->nama }}</td>
        <td>@if($santri->sudah_lulus) {{ $santri->sudah_lulus->nama }} @endif</td>
        <td>{{ $santri->tahun_kbm_terakhir }}</td>
        <td>{{ $santri->semester_kbm_terakhir }}</td>
        <td>{{ $santri->id_kelompok }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</html>
