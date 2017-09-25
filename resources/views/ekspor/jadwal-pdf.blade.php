<html>
  <head>
    <style type="text/css">
      th {
        text-align: center;
        vertical-align: middle !important;
        border: 1px solid #ddd !important;
      }
      td {
        border: 1px solid #ddd !important;
      }
      table {
        border-collapse: separate;
        border: 1px solid #ddd !important;
      }
    </style>
  </head>
  <body>
    @foreach ($daftar_kelompok as $kelompok)
    <table>
      <thead>
        <tr>
          <th>.</th>
          <th>Kelompok</th>
          <th>Jenjang</th>
          <th>Hari</th>
          <th>Waktu</th>
        </tr>
        <tr>
          <td></td>
          <td>{{ $kelompok->id }}</td>
          <td>{{ $kelompok->jenjang->nama }}</td>
          <td>{{ $hari[$kelompok->jadwal->hari] }}</td>
          <td>{{ $kelompok->jadwal->waktu }}</td>
        </tr>
        <tr>
          <th></th>
          <th colspan="2">Nama Pengajar</th>
          <th>Nomor HP</th>
          <th>Nomor WA</th>
        </tr>
        <tr>
          <td></td>
          <td colspan="2">{{ $kelompok->jadwal->pengajar->pengguna->nama_lengkap }}</td>
          <td>{{ $kelompok->jadwal->pengajar->pengguna->nomor_hp }}</td>
          <td>{{ $kelompok->jadwal->pengajar->pengguna->nomor_wa }}</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>No. </th>
          <th colspan="2">Nama Santri</th>
          @if($untuk_pengajar)
            <th>Nomor HP</th>
            <th>Nomor WA</th>
          @else
            <th colspan="2">Nomor Identitas</th>
          @endif
        </tr>
        @foreach ($kelompok->daftar_santri as $santri)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td colspan="2">{{ $santri->pengguna->nama_lengkap }}</td>
          @if($untuk_pengajar)
            <td>{{ $santri->pengguna->nomor_hp }}</td>
            <td>{{ $santri->pengguna->nomor_wa }}</td>
          @else
            <td colspan="2">{{ $santri->pengguna->nomor_identitas }}</td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>
    @endforeach
  </body>
</html>
