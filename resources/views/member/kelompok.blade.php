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

          @foreach ($pengajar->daftar_jadwal as $jadwal)
          <div class="box-body">
            <table class="table">
            <thead>
              <tr>
                <td><strong>Kelompok {{$jadwal->kelompok->id}}</strong></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="20%">Jenjang</td>
                <td>: {{$jadwal->kelompok->jenjang->nama}}</td>
              </tr>
              <tr>
                <td>Jadwal</td>
                <td>: {{$hari[$jadwal->hari]}}, {{$jadwal->waktu}} WIB</td>
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
                @foreach ($jadwal->kelompok->daftar_santri as $santri)
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
          	<table class="table">
	          	<thead>
	              <tr>
	              	<td><strong>Kelompok {{$santri->id}}</strong></td>
	              </tr>
	          	</thead>
	          	<tbody>
	              	<tr width="">
	              		<td width="20%"> Jenjang</td>
	              		<td>: {{$santri->kelompok->jenjang->nama}}</td>
	              	</tr>
	              	<tr>
		              	<td>Pengajar</td>
		              	<td>: {{$santri->kelompok->jadwal->pengajar->pengguna->nama_lengkap}}</td>
	              	</tr>
	              	<tr>
		              	<td>Jadwal</td>
		              	<td>: {{$hari[$santri->kelompok->jadwal->hari]}}, {{$santri->kelompok->jadwal->waktu}}WIB</td>
	              	</tr>
	              	<tr>
		              	<td>Nomor HP/ WA</td>
		              	<td>: {{$santri->kelompok->jadwal->pengajar->pengguna->nomor_hp}}</td>
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
                <tr>
                  @foreach ($santri->kelompok->daftar_santri as $daftar_santri)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$daftar_santri->pengguna->nama_lengkap}}</td>
                  <td>{{$daftar_santri->pengguna->nomor_hp}}</td>
                </tr>
                @endforeach
                </tr>
              </tbody>
            </table>
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
