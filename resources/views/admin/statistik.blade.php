@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class= "content">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Statistik
      <!--small></small-->
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
      <li><a href="">Admin</a></li>
      <li class="active">Statistik</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Jumlah</h3>
      </div>
      <div class="box-body table-responsive">
        <style type="text/css" scoped>
          th {
            text-align: center;
            font-weight: normal;
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
        <table class="table table-bordered" style="white-space: nowrap;">
          <thead>
            <tr>
              <th colspan="2">Program</th>
              @foreach($daftar_jenis_program as $jenis_program)
                <th colspan="{{ $jenis_program->daftar_jenjang->count() + 1 }}">{{ $jenis_program->nama }}</th>
              @endforeach
              <th rowspan="2">Semua</th>
            </tr>
            <tr>
              <th colspan="2">Jenjang</th>
              @foreach($daftar_jenis_program as $jenis_program)
                @foreach ($jenis_program->daftar_jenjang as $jenjang)
                  <th>@if($loop->iteration === 1) Belum dites @else {{ $jenjang->nama }} @endif</th>
                @endforeach
                  <th>Semua</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            <tr>
              <th rowspan="3">Santri</th>
              <th>Laki-Laki</th>
              @foreach($daftar_jenis_program as $jenis_program)
                @foreach ($jenis_program->daftar_jenjang as $jenjang)
                  <td>{{ App\Santri::jumlah(1, $jenjang->id) }}</td>
                @endforeach
                  <td>.</td>
              @endforeach
              <td>.</td>
            </tr>
            <tr>
              <th>Perempuan</th>
              @foreach($daftar_jenis_program as $jenis_program)
                @foreach ($jenis_program->daftar_jenjang as $jenjang)
                  <td>{{ App\Santri::jumlah(0, $jenjang->id) }}</td>
                @endforeach
                  <td>.</td>
              @endforeach
              <td>.</td>
            </tr>
            <tr>
              <th>Semua</th>
              @foreach($daftar_jenis_program as $jenis_program)
                @foreach ($jenis_program->daftar_jenjang as $jenjang)
                  <td>{{ App\Santri::jumlah(null, $jenjang->id) }}</td>
                @endforeach
                  <td>.</td>
              @endforeach
              <td>.</td>
            </tr>
            <tr>
              <th rowspan="3">Pengajar</th>
              <th>Laki-Laki</th>
              @foreach($daftar_jenis_program as $jenis_program)
                @foreach ($jenis_program->daftar_jenjang as $jenjang)
                  <td>.</td>
                @endforeach
                  <td>.</td>
              @endforeach
              <td>.</td>
            </tr>
            <tr>
              <th>Perempuan</th>
              @foreach($daftar_jenis_program as $jenis_program)
                @foreach ($jenis_program->daftar_jenjang as $jenjang)
                  <td>.</td>
                @endforeach
                  <td>.</td>
              @endforeach
              <td>.</td>
            </tr>
            <tr>
              <th>Semua</th>
              @foreach($daftar_jenis_program as $jenis_program)
                @foreach ($jenis_program->daftar_jenjang as $jenjang)
                  <td>.</td>
                @endforeach
                  <td>.</td>
              @endforeach
              <td>.</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <script>
    $('th')
  </script>
@stop
