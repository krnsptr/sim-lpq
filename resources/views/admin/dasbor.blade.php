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

  <div class="box box-default">
      <div class="box-header with-border">
        <h4>Pengaturan</h4>
      </div>
      <div class="box-body">
        <div class="form-group">
        <h5>Pengumuman</h5>
          <textarea class="form-control" name="pengumuman">{{ sistem('pengumuman') }}</textarea>
        </div>
        <h5>Formulir</h5>

        <div class="form-group">
            <ul class="todo-list">
                     <li>
                       <!-- drag handle -->
                           <span class="handle">
                             <i class="fa fa-ellipsis-v"></i>
                             <i class="fa fa-ellipsis-v"></i>
                           </span>
                       <!-- checkbox -->
                       <input type="checkbox" name="pendaftaran_pengajar" value="1" autocomplete="off"@if (sistem('pendaftaran_pengajar')) checked @endif></input>
                       <!-- todo text -->
                       <span class="text">Pendaftaran pengajar</span>
                       <!-- Emphasis label -->

                       <!-- General tools such as edit or delete-->

                     </li>
                     <li>
                           <span class="handle">
                             <i class="fa fa-ellipsis-v"></i>
                             <i class="fa fa-ellipsis-v"></i>
                           </span>
                       <input type="checkbox" name="pendaftaran_santri" value="1" autocomplete="off"@if (sistem('pendaftaran_santri')) checked @endif></input>
                       <span class="text">Pendaftaran santri</span>
                     </li>
                     <li>
                           <span class="handle">
                             <i class="fa fa-ellipsis-v"></i>
                             <i class="fa fa-ellipsis-v"></i>
                           </span>
                       <input type="checkbox" name="penjadwalan_pengajar" value="1" autocomplete="off"@if (sistem('penjadwalan_pengajar')) checked @endif></input>
                       <span class="text">Penjadwalan pengajar</span>


                     </li>
                     <li>
                           <span class="handle">
                             <i class="fa fa-ellipsis-v"></i>
                             <i class="fa fa-ellipsis-v"></i>
                           </span>
                       <input type="checkbox"  name="penjadwalan_santri" value="1" autocomplete="off"@if (sistem('penjadwalan_santri')) checked @endif></input>
                       <span class="text">Penjadwalan santri</span>
                    </li>


          </ul>
        </div>
             <!-- /.box-body -->
        <div class="box-footer clearfix no-border">
           <button type="submit" class="btn btn-primary"></i>Ubah</button>
       </div>
  </div>
</div>
@stop
