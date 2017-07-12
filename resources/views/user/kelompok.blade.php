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
          <li><a href="">Admin</a></li>
          <li class="active">Dasbor</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div style="margin-top:10px">
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
			</div>
            <div class="callout callout-info">
                <h4><i class="icon fa fa-info"></i>&emsp;Pengumuman</h4>
            </div>
        </div>
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Mualim Bahasa Arab</h3>
          </div>
          <div class="box-body">

            <table class="table">
          	<thead>
              <tr>
              	<td><strong>Kelompok </strong></td>
              </tr>
          	</thead>
          	<tbody>
              <tr>
              	<td width="20%">Jenjang</td>
              	<td>:</td>
              </tr>
              <tr>
              	<td>Jadwal</td>
              	<td>:WIB</td>
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
                <tr>
                  <th></th>
                  <th></th>
                  <th></th>
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

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Santri Takhosus/ Tahfidz</h3>
          </div>
          <div class="box-body">
          	<table class="table">
	          	<thead>
	              <tr>
	              	<td><strong>Kelompok 9</strong></td>
	              </tr>
	          	</thead>
	          	<tbody>
	              	<tr width="">
	              		<td width="20%"> Jenjang</td>
	              		<td>: Tingkat 1</td>
	              	</tr>
	              	<tr>
		              	<td>Pengajar</td>
		              	<td>: Abu Ubaidah Al Jarrah</td>
	              	</tr>
	              	<tr>
		              	<td>Jadwal</td>
		              	<td>: Senin, 16.00 WIB</td>
	              	</tr>
	              	<tr>
		              	<td>Nomor HP/ WA</td>
		              	<td>: 087666555777</td>
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
                  <td>1</td>
                  <td>Dony Rahmad Agung S</td>
                  <td>B09877666555</td>
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

      </section>
  </div>
@stop
