@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class= "content">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Presensi
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
      <li><a href="">Admin</a></li>
      <li class="active">Presensi</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Presensi KBM</h3>
      </div>
      <div class="box-body">
        <a href="{{ url('admin/presensi/merge.xlsx') }}" class="btn btn-success">
          <i class="fa fa-download"></i>&ensp;
          Download Excel (Merge)
        </a>
      </div>
    </div>

  </section>
@stop
