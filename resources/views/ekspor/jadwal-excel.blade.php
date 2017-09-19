<html>
  @foreach ($daftar_kelompok as $kelompok)
  <table>
    <thead>
      <tr>
        <th>Kelompok</th>
        <th>Jenjang</th>
        <th>Jadwal</th>
        <th>Nama Pengajar</th>
        <th>Nomor HP, WA</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $kelompok->id }}</td>
        <td>{{ $kelompok->jenjang->nama }}</td>
        <td>{{ $hari[$kelompok->jadwal->hari] }}, {{ $kelompok->jadwal->waktu }}</td>
        <td>{{ $kelompok->jadwal->pengajar->pengguna->nama_lengkap }}</td>
        <td>{{ $kelompok->jadwal->pengajar->pengguna->nomor_hp }}, {{ $kelompok->jadwal->pengajar->pengguna->nomor_wa }}</td>
      </tr>
      <tr>
        <th>No. </th>
        <th colspan="2">Nama Santri</th>
        <th colspan="2">Nomor Identitas</th>
      </tr>
      @foreach ($kelompok->daftar_santri as $santri)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td colspan="2">{{ $santri->pengguna->nama_lengkap }}</td>
        <td colspan="2">{{ $santri->pengguna->nomor_identitas }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endforeach
</html>
