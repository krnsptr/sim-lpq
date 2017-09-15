@extends('layouts.default')

@section('content')
<div class="container">
<br><br><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Kesalahan!</h4>
              {{ session()->get('error') }}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Masuk ke SIM LPQ</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username atau Email</label>

                            <div class="col-md-8">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 0">
                            <div class="col-md-8 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingat saya
                                    </label>
                                    <button type="submit" class="btn btn-primary pull-right">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                  <div class="row">
                    <div class="col-md-6 text-center"><a class="btn btn-link" href="{{ route('password.request') }}">Lupa password? </a></div>
                    <div class="col-md-6 text-center"><a class="btn btn-link" href="{{ route('register') }}">Belum terdaftar?</a></div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
