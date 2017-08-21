@extends('layouts.default')
@section('content')

  <div class= "content">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          SPP
        </h1>
        <ol class="breadcrumb">
          <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
          <li><a href="">Admin</a></li>
          <li class="active">Dasbor</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div style="margin-top:10px">
          <div class="callout callout-info">
            <h4><i class="icon fa fa-info"></i>&emsp;Pengumuman</h4>
            {!! sistem('pengumuman') !!}
          </div>
        </div>
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div>
          <div class="box-body">
            <table class="table">
              <thead>
                <tr>
                  <th>Program</th>
                  <th>SPP per Semester</th>
                  <th>SPP Dibayar</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($daftar_santri as $santri)
                <tr>
                  <td>{{$santri->jenjang->jenis_program->nama}}</td>
                  <td>{{ sistem('spp_biaya') }}</td>
                  <td>{{ $santri->spp_dibayar }}</td>
                  <td>{{
                    json_decode(sistem('spp_status'))[$santri->spp_status]
                  }}</td>
                  <td>{{ $santri->spp_keterangan }}</td>
                </tr>
              @endforeach
              </tbody>
            </table>

          </div>
          <!-- /.box-body -->
          <div class="box-footer">

          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
  </div>
@stop
