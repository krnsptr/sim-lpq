@extends('layouts.admin')
@section('content')

<div class= "content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SPP Santri
        <small>Pengelolaan SPP Santri</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
        <li><a href="">Admin</a></li>
        <li class="active">Dasbor</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="callout callout-info">
        <h4>Info!</h4>
        <p>bla bla bla.</p>
      </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Daftar Santri</h3>
        </div>

        <div class="box-body table-responsive">
          <table class="table table-bordered table-striped" id="dataTable" style="white-space: nowrap;">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Program</th>
                <th>Jenjang</th>
                <th>SPP</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td>Jenis Kelamin</td>
                <td>Program</td>
                <td>Jenjang</td>
                <td></td>
                <td></td>
              </tr>
            </tfoot>
            <tbody>
              @foreach ($daftar_santri as $santri)          
              @if($santri->id_jenjang !=1)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$santri->pengguna->nama_lengkap}}</td>
                <td>@if($santri->pengguna->jenis_kelamin){{"laki-laki"}}
                  @else {{"perempuan"}}
                  @endif </td>
                <td>{{$santri->jenjang->Jenis_program->nama}}</td>              
                <td>{{$santri->jenjang->nama}}</td>
                <td>@if ($santri->spp_lunas==1){{"Lunas"}} @else {{"Belum Lunas"}}
                @endif </td>
                <td>
                  <button class="btn btn-sm btn-primary edit" onclick="edit(this);">Edit Data</button>
                  <!--button class="btn btn-sm btn-danger hapus" onclick="hapus(this)">Hapus</button-->
                </td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.box-body -->
    </section>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@stop
