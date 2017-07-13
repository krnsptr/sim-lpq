@extends('layouts.default')
@section('content')

  <div class= "content">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Kelompok
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
          <li><a href="">User</a></li>
          <li class="active">Dasbor</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div style="margin-top:10px">
          <div class="callout callout-info">
            <h4><i class="icon fa fa-info"></i>&emsp;Pengumuman</h4>
            {{ sistem('pengumuman') }}
          </div>
        </div>
        <!-- Default box -->
        @foreach ($daftar_pengajar as $pengajar)
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Pengajar {{$pengajar->jenjang->nama}}</h3>
          </div>

          @foreach ($pengajar->daftar_kelompok as $kelompok)
          <div class="box-body">
            <table class="table">
            <thead>
              <tr>
                <td><strong>Kelompok {{$kelompok->id}}</strong></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="20%">Jenjang</td>
                <td>: {{$kelompok->jenjang->nama}}</td>
              </tr>
              <tr>
                <td>Jadwal</td>
                <td>: {{$hari[$kelompok->jadwal->hari]}}, {{$kelompok->jadwal->waktu}} WIB</td>
              </tr>
            </tbody>
            </table>

            <table class="table">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama Santri</th>
                  <th>Nomor HP/WA</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kelompok->daftar_santri as $santri)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$santri->pengguna->nama_lengkap}}</td>
                  <td>{{$santri->pengguna->nomor_hp}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
          <!-- /.box-body -->
          @endforeach

          <div class="box-footer">

          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        @endforeach

        @foreach ($daftar_santri as $santri)
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Santri {{$santri->jenjang->nama}}</h3>
          </div>

          <div class="box-body">
            @if ($santri->kelompok)
            <?php $kelompok = $santri->kelompok; ?>
          	<table class="table">
	          	<thead>
	              <tr>
	              	<td><strong>Kelompok {{$kelompok->id}}</strong></td>
	              </tr>
	          	</thead>
	          	<tbody>
	              	<tr width="">
	              		<td width="20%"> Jenjang</td>
	              		<td>: {{$kelompok->jenjang->nama}}</td>
	              	</tr>
	              	<tr>
		              	<td>Pengajar</td>
		              	<td>: {{$kelompok->jadwal->pengajar->pengguna->nama_lengkap}}</td>
	              	</tr>
	              	<tr>
		              	<td>Jadwal</td>
		              	<td>: {{$hari[$kelompok->jadwal->hari]}}, {{date('H:i', strtotime($kelompok->jadwal->waktu))}}</td>
	              	</tr>
	              	<tr>
		              	<td>Nomor HP/ WA</td>
		              	<td>: {{$kelompok->jadwal->pengajar->pengguna->nomor_hp}} / {{$kelompok->jadwal->pengajar->pengguna->nomor_wa}}</td>
	              	</tr>
	            </tbody>
          	</table>

            <table class="table">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama Santri</th>
                  <th>Nomor HP/ WA</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kelompok->daftar_santri as $santri)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$santri->pengguna->nama_lengkap}}</td>
                  <td>{{$santri->pengguna->nomor_hp}} / {{$santri->pengguna->nomor_wa}}</td>
                </tr>
                @endforeach
                </tr>
              </tbody>
            </table>
            @else
              Anda belum memilih jadwal.
            @endif
          </div>

          <!-- /.box-body -->
          <div class="box-footer">

          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        @endforeach

      </section>
  </div>
@stop
