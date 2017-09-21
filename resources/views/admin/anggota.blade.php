@extends('layouts.admin')
@section('content')
<div class="content">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Anggota
       <small>Pengelolaan profil dan akun anggota</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href=""><i class="fa fa-dashboard"></i> SIM LPQ</a></li>
       <li><a href="">Admin</a></li>
       <li class="active">Anggota</li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">
     <!-- Default box -->
     <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Anggota</h3>
       </div>
       <div class="box-body table-responsive">
         <table class="table table-bordered table-striped" id="dataTable" style="white-space: nowrap;">
           <thead>
             <tr>
               <th>No.</th>
               <th>Nama Lengkap</th>
               <th>Jenis Kelamin</th>
               <th>Mahasiswa IPB</th>
               <th>Nomor Identitas</th>
               <th>Nomor HP</th>
               <th>Nomor WA</th>
               <th>Email</th>
               <th>Username</th>
               <th>Aksi</th>
             </tr>
           </thead>
           <tbody>
            @foreach ($daftar_anggota as $anggota)
            <tr data-id-anggota="{{ $anggota->id }}" data-jenis-kelamin="{{ intval($anggota->jenis_kelamin) }}" data-mahasiswa-ipb="{{ intval($anggota->mahasiswa_ipb) }}">
              <td></td>
              <td>{{ $anggota->nama_lengkap}}</td>
              <td>@if($anggota->jenis_kelamin) Laki-laki @else Perempuan @endif</td>
              <td>
                @if($anggota->mahasiswa_ipb == 1)
                  Ya (Diploma/Sarjana)
                @elseif($anggota->mahasiswa_ipb == 2)
                  Ya (Pascasarjana)
                @else
                  Bukan (Umum)
                @endif
              </td>
              <td>{{ $anggota->nomor_identitas}}</td>
              <td>{{ $anggota->nomor_hp}}</td>
              <td>{{ $anggota->nomor_wa}}</td>
              <td>{{ $anggota->email}}</td>
              <td>{{ $anggota->username}}</td>
              <td>
                <button class="btn btn-sm btn-primary edit" onclick="edit(this);">Edit Data</button>
                <button class="btn btn-sm btn-success simpan hidden" onclick="simpan();">Simpan</button>
                <button class="btn btn-sm btn-danger batal hidden" onclick="batal();">Batal</button>
                <button class="btn btn-sm btn-warning password" onclick="password(this)">Password</button>
                <!--button class="btn btn-sm btn-danger hapus" onclick="hapus(this);">Hapus</button-->
              </td>
            </tr>
            @endforeach
           </tbody>
         </table>
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->
     <!-- Default box -->
     <div class="box">
       <div class="box-header with-border">
         <h3 class="box-title">Tanpa program</h3>
       </div>
       <div class="box-body table-responsive">
         <table class="table table-bordered table-striped" id="dataTable2" style="white-space: nowrap;">
           <thead>
             <tr>
               <th>No.</th>
               <th>Nama Lengkap</th>
               <th>Jenis Kelamin</th>
               <th>Nomor HP</th>
               <th>Nomor WA</th>
               <th>Email</th>
             </tr>
           </thead>
           <tbody>
             @foreach ($daftar_anggota_tanpa_program as $anggota)
               <tr>
                 <td></td>
                 <td>{{ $anggota->nama_lengkap}}</td>
                 <td>@if($anggota->jenis_kelamin) Laki-laki @else Perempuan @endif</td>
                 <td>{{ $anggota->nomor_hp}}</td>
                 <td>{{ $anggota->nomor_wa}}</td>
                 <td>{{ $anggota->email}}</td>
               </tr>
             @endforeach
           </tbody>
         </table>
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->
  </div>

   </section>

   <select id="jk" autocomplete="off">
     <option value="1">Laki-Laki</option>
     <option value="0">Perempuan</option>
   </select>
   <select id="mi" autocomplete="off">
     <option value="0">Bukan (Umum)</option>
     <option value="1">Ya (Diploma/Sarjana)</option>
     <option value="2">Ya (Pascasarjana)</option>
   </select>

   <div class="modal fade" id="modal" role="dialog">
           <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Ganti Password</h4>
               </div>
               <div class="modal-body">
                   <input type="hidden" id="id_anggota" value="" />
                   <label for="password_baru">Password Baru:</label><br />
                   <input type="text" id="password_baru" value=""/>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                 <button type="button" class="btn btn-primary" onclick="ganti();">Ganti</button>
               </div>
             </div>

           </div>
   </div>

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
       var dataTable2_title = $('#dataTable2').parent().prev().text()+moment().format('YYYY-MM-DD HH.mm.ss');
       var dataTable2_columns = [1,2,3,4,5];
       var myTable2 = $('#dataTable2').DataTable({
         "columnDefs": [
           {
              "searchable": false,
              "orderable": false,
              "targets": [0]
           }],
         "order": [[ 2, 'asc' ], [ 1, 'asc' ]],
         "paging": false,
         "searching": false,
         "dom": 'Bfrtip',
         "buttons": [
           {
              extend: 'copyHtml5',
              title: dataTable2_title,
              exportOptions: { columns: dataTable2_columns }
           },
           {
               extend: 'csvHtml5',
               title: dataTable2_title,
               exportOptions: { columns: dataTable2_columns }
           },
           {
               extend: 'excelHtml5',
               title: dataTable2_title,
               exportOptions: { columns: dataTable2_columns }
           },
           {
               extend: 'pdfHtml5',
               title: dataTable2_title,
               exportOptions: { columns: dataTable2_columns }
           },
           {
               extend: 'print',
               title: dataTable2_title,
               exportOptions: { columns: dataTable2_columns }
           }
          ],
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
       });
      myTable2.buttons().container()
        .appendTo( '#dataTable2_wrapper .col-sm-6:eq(0)' );
       myTable2.on( 'order.dt search.dt', function () {
           myTable2.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
               cell.innerHTML = i+1;
           } );
       } ).draw();

       var myTable = $('#dataTable').DataTable({
         "columnDefs": [
           {
              "searchable": false,
              "orderable": false,
              "targets": [0,-1]
           }],
         "order": [[ 1, 'asc' ]],
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
         }
       },
       "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]]
       });
       myTable.on( 'order.dt search.dt', function () {
           myTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
               cell.innerHTML = i+1;
           } );
       } ).draw();

       var tr, id_anggota, row, inputs;
       function td(n) { return tr.children(':nth-child('+(n+1)+')'); }
       function inputText(id, value, maxlength) {return '<input type="text" id="'+id+'" value="'+value+'" maxlength="'+ maxlength +'" />';}
       $('#jk, #mi').hide();

       function edit(pointer) {
         tr = $(pointer).parent().parent();
         id_anggota = tr.attr('data-id-anggota');
         row = $('td', tr).map(function(index, td) {
             return $(td).text();
         });
         td(1).html(inputText('nama_lengkap', row[1], 64));
         td(2).html($('#jk').clone().show().prop('id', 'jenis_kelamin').prop('outerHTML'));
         $('#jenis_kelamin').val(tr.attr('data-jenis-kelamin')).change();
         td(3).html($('#mi').clone().show().prop('id', 'mahasiswa_ipb').prop('outerHTML'));
         $('#mahasiswa_ipb').val(tr.attr('data-mahasiswa-ipb')).change();
         td(4).html(inputText('nomor_identitas', row[4], 32));
         td(5).html(inputText('nomor_hp', row[5], 13));
         td(6).html(inputText('nomor_wa', row[6], 13));
         td(7).html(inputText('email', row[7], 64));
         td(8).html(inputText('username', row[8], 16));
         $('.edit, .password').addClass('hidden');
         $('.simpan, .batal', tr).removeClass('hidden');
       }

       function batal(){
         for(i=1; i<=8; i++) td(i).html(row[i]);
         $('.edit, .password').removeClass('hidden');
         $('.simpan, .batal', tr).addClass('hidden');
       }

       function simpan() {
         inputs = $("input, select", tr);
         var obj = {}
         inputs.each(function(){
           var key= $(this).attr('id');
           var value= $(this).val();
           obj[key] = value;
         });

         obj['id_anggota'] = id_anggota;

         $.ajax({
             data: obj,
             url: '{{ url('admin/anggota/edit') }}',
             success: function(){
               alert('berhasil');
               for(i=1; i<=8; i++) td(i).html((i==2 || i==3) ? $('option:selected', inputs.eq(i-1)).text() : inputs.eq(i-1).val());
               $('.edit, .password').removeClass('hidden');
               $('.simpan, .batal', tr).addClass('hidden');
               tr.attr('data-jenis-kelamin',inputs.eq(1).val());
               tr.attr('data-mahasiswa-ipb',inputs.eq(2).val());
               myTable.row(tr).invalidate();
             },
             error: function(){
               alert('gagal');
               console.log(obj);
               batal();
             }
           })
       }

       function password(pointer) {
         $('#modal').modal('show');
         $('#password_baru').val('');
         $('#id_anggota').val($(pointer).parent().parent().attr('data-id-anggota'));
       }

       function ganti() {
       $.ajax({
           data: {id_anggota: $('#id_anggota').val(), password: $('#password_baru').val()},
           url: '{{ url('admin/anggota/password') }}',
           success: function(){
             alert('berhasil');
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
             data: {id_anggota: tr.attr('data-id-anggota')},
             url: '{{ url('admin/anggota/hapus') }}',
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


@stop
