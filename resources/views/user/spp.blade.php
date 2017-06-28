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
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Tahsin/ Takhosus/ Tahfidz</td>
                  <td>Rp 50.000,-</td>
                  <td>Belum dibayar</td>
                </tr>
                <tr>
                  <td>Bahasa Arab</td>
                  <td>Rp 50.000,-</td>
                  <td>Lunas</td>
                </tr>
              </tbody>
            </table>
            <br>
            Info bla bla bla...
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
