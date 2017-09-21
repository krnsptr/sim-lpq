<html>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Pengajar</th>
        <th>Nomor HP Pengajar</th>
        <th>Program</th>
        <th>Jenjang</th>
        <th>Hari</th>
        <th>Waktu</th>
        @for($i=1; $i<=$maksimum_santri; $i++)
          <th>Nama Santri {{ $i }}</th>
          <th>Nomor HP Santri {{ $i }}</th>
        @endfor
      </tr>
    </thead>
    <tbody>
    @foreach($daftar_kelompok as $kelompok)
      <tr>
        <td>{{ $kelompok->id }}</td>
        <td>{{ $kelompok->jadwal->pengajar->pengguna->nama_lengkap }}</td>
        <td>{{ $kelompok->jadwal->pengajar->pengguna->nomor_hp }}</td>
        <td>{{ $kelompok->jenjang->jenis_program->nama }}</td>
        <td>{{ $kelompok->jenjang->nama }}</td>
        <td>{{ $hari[$kelompok->jadwal->hari] }}</td>
        <td>{{ $kelompok->jadwal->waktu }}</td>
        @foreach ($kelompok->daftar_santri as $santri)
          <td>{{ $santri->pengguna->nama_lengkap }}</td>
          <td>{{ $santri->pengguna->nomor_hp }}</td>
        @endforeach
      </tr>
    @endforeach
    </tbody>
  </table>
</html>
