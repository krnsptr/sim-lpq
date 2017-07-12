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
              <tr data-id-santri="{{ $santri->id }}">
                <td></td>
                <td>{{$santri->pengguna->nama_lengkap}}</td>
                <td>@if($santri->pengguna->jenis_kelamin) Laki-laki @else Perempuan @endif</td>
                <td>{{$santri->jenjang->jenis_program->nama}}</td>
                <td>{{$santri->jenjang->nama}}</td>
                <td>@if ($santri->spp_lunas) Lunas @else Belum lunas @endif</td>
                <td>
                  <button class="btn btn-sm btn-success edit" onclick="lunas(this);">Lunas</button>
                  <button class="btn btn-sm btn-warning edit" onclick="belum(this);">Belum lunas</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.box-body -->
    </section>
    <script>
      $.ajaxSetup({
          type:"post",
          cache:false,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      $(document).ajaxStart(function ()
      {
          $('html, body, button').css("cursor", "wait");
      }).ajaxComplete(function () {
          $('html, body').css("cursor", "auto");
          $('button').css("cursor", "pointer");
      });

      $.fn.dataTable.Api.register( 'column().title()', function () {
          var colheader = this.header();
          return $(colheader).text().trim();
      } );

        var myTable = $('#dataTable').DataTable({
          "columnDefs": [
            {
               "searchable": false,
               "orderable": false,
               "targets": [0,-1]
            }],
          "order": [[2, 'asc'], [3, 'desc'], [ 1, 'asc' ]],
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "language": {
           "sProcessing":   "Sedang proses...",
           "sLengthMenu":   "_MENU_ entri per halaman",
           "sZeroRecords":  "Data tidak ditemukan",
           "sInfo":         "Menampilkan _START_&ndash;_END_ dari _TOTAL_ entri",
           "sInfoEmpty":    "Menampilkan 0&ndash;0 dari 0 entri",
           "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
           "sInfoPostFix":  "",
           "sSearch":       "Cari:",
           "sUrl":          "",
           "oPaginate": {
               "sFirst":    "&laquo;",
               "sPrevious": "&lt;",
               "sNext":     "&gt;",
               "sLast":     "&raquo;"
           },
          },
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]],
          "drawCallback": function () {
              this.api().columns([2,3,4, 5]).every( function () {
                  var column = this;
                  var select = $('<select><option value="">'+column.title()+'</option></select>')
                      .appendTo( $(column.footer()).empty() )
                      .on( 'change', function () {
                          var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                          );

                          column
                              .search( val ? '^'+val+'$' : '', true, false )
                              .draw();
                      } );
                  column.data().unique().sort().each( function ( d, j ) {
                      if(column.search() === '^'+$.fn.dataTable.util.escapeRegex(d)+'$'){
                          select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
                      } else {
                          select.append( '<option value="'+d+'">'+d+'</option>' )
                      }
                  } );
                  var exists = false;
                  $('option', select).each(function(){
                      if ('^'+$.fn.dataTable.util.escapeRegex(this.value)+'$' == column.search() || column.search() == '') {
                          exists = true;
                          return false;
                      }
                  });
                  if(!exists) column.search('').draw();
              } );
          }
        });
        myTable.on( 'order.dt search.dt', function () {
            myTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

      var id_santri;

      function lunas(pointer) {
        tr = $(pointer).parent().parent();
        id_santri = tr.attr('data-id-santri');

        $.ajax({
            data: {
              'id_santri': id_santri,
              'spp_lunas': true
            },
            url: '{{ url('admin/spp/edit') }}',
            success: function(){
              alert('berhasil');
              $('td', tr).eq(5).text('Lunas');
              myTable.row(tr).invalidate().draw(false);
            },
            error: function() {
              alert('gagal');
            }
          });
      }

      function belum(pointer) {
        tr = $(pointer).parent().parent();
        id_santri = tr.attr('data-id-santri');

        $.ajax({
            data: {
              'id_santri': id_santri,
              'spp_lunas': false
            },
            url: '{{ url('admin/spp/edit') }}',
            success: function(){
              alert('berhasil');
              $('td', tr).eq(5).text('Belum lunas');
              myTable.row(tr).invalidate().draw(false);
            },
            error: function() {
              alert('gagal');
            }
          });
      }

    </script>
@stop
