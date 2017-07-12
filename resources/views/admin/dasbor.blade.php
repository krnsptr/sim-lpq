@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class= "content">
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <h1>
      Dasbor
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
      <li><a href="">Admin</a></li>
      <li class="active">Dasbor</li>
    </ol>
  </section>
  <br>
  @if (session()->has('error'))
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
    {{ session()->get('error') }}
  </div>
  @endif
  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
    {{ session()->get('success') }}
  </div>
  @endif
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$santri}}</h3>

              <p>Jumlah Santri</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-person"></i>
            </div>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$pengajar}}</h3>

              <p>Jumlah Pengajar</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-person"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>

  <div class="box box-default">
      <div class="box-header with-border">
        <h4>Pengaturan</h4>
      </div>
      <form action="{{ url('admin/pengaturan/edit') }}" method="post">
      <div class="box-body">
        <div class="form-group">
        <h5>Pengumuman</h5>
          <textarea class="form-control" name="pengumuman">{{ sistem('pengumuman') }}</textarea>
        </div>
        <h5>Formulir</h5>


          {{ csrf_field() }}
        <div class="form-group">
            <ul class="todo-list">
                     <li>
                       <input type="checkbox" name="pendaftaran_pengajar" value="1" autocomplete="off"@if (sistem('pendaftaran_pengajar')) checked @endif></input>
                       <span class="text">Pendaftaran pengajar</span>
                     </li>
                     <li>
                       <input type="checkbox" name="pendaftaran_santri" value="1" autocomplete="off"@if (sistem('pendaftaran_santri')) checked @endif></input>
                       <span class="text">Pendaftaran santri</span>
                     </li>
                     <li>
                       <input type="checkbox" name="penjadwalan_pengajar" value="1" autocomplete="off"@if (sistem('penjadwalan_pengajar')) checked @endif></input>
                       <span class="text">Penjadwalan pengajar</span>
                     </li>
                     <li>
                       <input type="checkbox"  name="penjadwalan_santri" value="1" autocomplete="off"@if (sistem('penjadwalan_santri')) checked @endif></input>
                       <span class="text">Penjadwalan santri</span>
                    </li>


          </ul>
        </div>

        <div class="box-footer clearfix no-border">
           <button type="submit" class="btn btn-primary" ></i>Ubah</button>
       </div>
       </form>
  </div>
</div>
@stop
