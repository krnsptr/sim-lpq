@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class= "content">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashbor
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
      <li><a href="">Admin</a></li>
      <li class="active">Dasbor</li>
    </ol>
  </section>
  <br>

  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
  </div>

  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
  </div>

  <div class="box box-default">
      <div class="box-header with-border">
        <h4>Pengumuman</h4>
      </div>
      <div class="form-group">
        <textarea class="form-control" type="18">
          @foreach ($daftar_sistem as $sistem)
          {{$sistem->pengumuman}}
          @endforeach
        </textarea>
      </div>
      <div class="box-header with-border">
        <h4>Formulir</h4>
        <div class="form-group">
            <ul class="todo-list">
                     <li>
                       <!-- drag handle -->
                           <span class="handle">
                             <i class="fa fa-ellipsis-v"></i>
                             <i class="fa fa-ellipsis-v"></i>
                           </span>
                       <!-- checkbox -->
                       <input type="checkbox" value=""></input>
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
                       <input type="checkbox" value=""></input>
                       <span class="text">Pendaftaran santri</span>
                     </li>

                     <li>
                       <span class="handle">
                         <i class="fa fa-ellipsis-v"></i>
                         <i class="fa fa-ellipsis-v"></i>
                       </span>
                       <input type="checkbox" value=""></input>
                       <span class="text">Penjadwalan pengajar</span>
                     </li>

                     <li>
                       <span class="handle">
                         <i class="fa fa-ellipsis-v"></i>
                         <i class="fa fa-ellipsis-v"></i>
                       </span>
                       <input type="checkbox" value=""></input>
                       <span class="text">Penjadwalan santri</span>
                     </li>
            </ul>
        </div>
             <!-- /.box-body -->
       <div class="box-footer clearfix no-border">
         <button type="button"></i>Ubah</button>
       </div>
      </div>
  </div>
</div>
@stop
