@extends('layouts.default')
@section('content')

  <!-- Full Width Column -->
  <div class="">
    <div class="container">

      <!-- Main content -->
      <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
            	<h4>Jadwal Program</h4>
            </div>
			<div class="box-body table-condensed">
				<div class="form-group col-md-5">
					
				</div>
				<table class="table">
					<thead>
						<tr>
							<th>Program</th>
							<th>Jenjang</th>
							<th>Hari</th>
							<th>Waktu</th>
							<th>Nama Santri</th>
							<th>Nomor Identitas</th>
							<th>Nama Instruktur</th>
							<th>Nomor HP/ WA</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Tahsin</td>
							<td>Pra-tahsin</td>
							<td>Senin</td>
							<td>16:00</td>
							<td>Umar bin Abdul Aziz</td>
							<td>13457</td>
							<td>Khalid bin Walid</td>
							<td>085666888223</td>
						</tr>
					</tbody>
				</table>
			</div>
          	<!-- /.box-body -->
          	<div class="box-footer">
          	</div>
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
@stop