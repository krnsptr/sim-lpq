@extends('layouts.default')

@section('content')
    <div style="margin-top:10px">
			<?php /*if(!empty($error)) { ?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
				<?php echo $error; ?>
			</div>
			<?php } ?>
			<?php if(!empty($success)) { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                <?php echo $success; ?>
            </div>
			<?php }*/ ?>
		</div>
		
		<div class="login-box">
		  <!-- /.login-logo -->
		  <div class="login-box-body">
			<h3 class="login-box-msg">Masuk ke SIM LPQ</h3>

			<?php //echo form_open(site_url('user/login')); ?>
			  <div class="form-group has-feedback">
				<input type="text" name="username" class="form-control" placeholder="Username" maxlength="16">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			  </div>
			  <div class="form-group has-feedback">
				<input type="password" name="password" class="form-control" placeholder="Password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			  </div>
				<!-- /.col -->
				<div class="col-xs-4">
				  <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
				</div>
				<!-- /.col -->
			<?php //echo form_close(); ?>
			<div>
				<!--Lupa Password? <a href="#">Reset Password</a><br>-->
				Belum terdaftar? <a href="#" class="text-center">Daftar</a>
			</div>
		  </div>
		  <!-- /.login-box-body -->
		</div>
		<!-- /.login-box -->
      <!-- /.content -->
@stop