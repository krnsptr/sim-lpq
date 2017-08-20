@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pengajar
      <small>Pengelolaan program dan jadwal pengajar</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
      <li><a href="">Admin</a></li>
      <li class="active">Pengajar</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Pengajar</h3>
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
            </tr>
          </tfoot>
          <tbody>
            @foreach ($daftar_pengajar as $pengajar)
            <tr data-id-pengajar="{{ $pengajar->id }}" data-program="{{ $pengajar->jenjang->jenis_program->id }}">
              <td>{{$loop->iteration}}</td>
              <td>{{ $pengajar->pengguna->nama_lengkap}}</td>
              <td>@if($pengajar->pengguna->jenis_kelamin){{"laki-laki"}}
              @else {{"perempuan"}}
              @endif  </td>
              <td>{{ $pengajar->jenjang->jenis_program->nama}}</td>
              <td>{{ $pengajar->jenjang->nama}}</td>
              <td>
                <button class="btn btn-sm btn-primary edit" onclick="edit(this);">Edit Data</button>
                <!--button class="btn btn-sm btn-danger hapus" onclick="hapus(this)">Hapus</button-->
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>

  <div class="modal fade" id="modal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Program</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id_pengajar" value="" />
                  <div class="form-group col-md-12">
                    <label class="control-group">Pendaftaran</label>
                    <select class="form-control" id="pendaftaran">
    									<option value="0">Pendaftaran baru</option>
    									<option value="1">Pendaftaran ulang</option>
    								</select><br />
                  </div>
                  <div class="form-group col-md-12 hidden" id="memenuhi_syarat">
                    <label class="control-group">Memenuhi Syarat</label><br />
                    <input type="checkbox" id="memenuhi_syarat0" value="1"> Lulus Tahsin 2<br />
    								<input type="checkbox" id="memenuhi_syarat1" value="1"> Lulus Dauroh Syahadah<br />
    								<input type="checkbox" id="memenuhi_syarat2" value="1"> Berkompetensi mengajar<br />
                  </div>
                  <div class="form-group col-md-12">
                    <label class="control-group">Motivasi mengajar</label>
                    <textarea class="form-control" id="motivasi_mengajar"></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <label class="control-group">Jenjang</label>
                    <select class="form-control" id="jenjang">

                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" onclick="simpan();">Simpan</button>
              </div>
            </div>

          </div>
  </div>

  @foreach ($daftar_jenis_program as $jenis_program)
        <select id="jj{{ $jenis_program->id}}">
          @foreach ($jenis_program->daftar_jenjang as $jenjang)
            <option value="{{ $jenjang->id }}">{{ $jenjang->nama }}</option>
          @endforeach
        </select>
  @endforeach

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
            this.api().columns([2,3,4]).every( function () {
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

    $('[id^=jj]').hide();
    $('#modal').on('hidden.bs.modal', function () {
      $('#jenjang > option').remove();
      $('#id_pengajar').val('');
      $('#memenuhi_syarat').addClass('hidden');
      $('#memenuhi_syarat > input').prop('checked', false);
    });
    var id_pengajar;

    function edit(pointer) {
      tr = $(pointer).parent().parent();
      id_pengajar = tr.attr('data-id-pengajar');
      program = tr.attr('data-program');
      if(program == 1) $('#memenuhi_syarat').removeClass('hidden');
      $('#jj'+program+' > option').clone().appendTo('#jenjang');
      $.ajax({
            data: {'id_pengajar': id_pengajar},
            dataType: 'json',
            url: '{{ url('admin/pengajar/pengajar') }}',
            success: function(data){
              $('#id_pengajar').val(id_pengajar);
              $('#pendaftaran').val(data['pendaftaran']).change();
              for(i=0; i<3; i++) {
                if(data['memenuhi_syarat'][i] == 1) $('#memenuhi_syarat'+i).prop('checked', true);
              }
              $('#motivasi_mengajar').val(data['motivasi_mengajar']);
              $('#jenjang').val(data['id_jenjang']).change();
              $('#modal').modal('show');
            },
            error: function(data){
              alert('error');
            }
      });
    }

    function simpan() {
      $.ajax({
          data: {
            id_pengajar: $('#id_pengajar').val(),
            jenjang: $('#jenjang').val(),
            pendaftaran: $('#pendaftaran').val(),
            memenuhi_syarat: [
              $('#memenuhi_syarat0').prop('checked') ? 1 : null,
              $('#memenuhi_syarat1').prop('checked') ? 1 : null,
              $('#memenuhi_syarat2').prop('checked') ? 1 : null
            ],
            motivasi_mengajar: $('#motivasi_mengajar').val()
          },
          url: '{{ url('admin/pengajar/edit') }}',
          success: function(){
            alert('berhasil');
            $('td', tr).eq(4).html($('#jenjang > option:selected').text());
            myTable.row(tr).invalidate().draw(false);
            $('#modal').modal('hide');
          },
          error: function() {
            alert('gagal');
          }
        });
    }

    function hapus(pointer){
      var tr = $(pointer).parent().parent();
      var button = pointer;
      if(confirm('Anda yakin?')) {
        $.ajax({
            data: {id_pengajar: tr.attr('data-id-pengajar')},
            url: '{{ url('admin/pengajar/hapus') }}',
            success: function(){
              alert('berhasil');
              myTable.row(tr).remove().draw();
            },
            error: function(){
              alert('gagal');
            }
          });
        }
    }
  </script>
</div>
@stop
