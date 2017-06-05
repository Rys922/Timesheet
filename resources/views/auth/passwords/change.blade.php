@extends('layouts.app')

@section('title')
    Zamiana hasła
@stop

@section('content')
<p class="login-box-msg">Zmiana hasła</p>
<form method="POST" action="{{ route('post.password') }}">
                        {{ csrf_field() }}

      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Hasło">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      @if ($errors->has('password'))
                                    <span class="help-block text-red">
                                        {{ $errors->first('password') }}
                                    </span>
      @endif
      <div class="form-group has-feedback">
        <input name="password_confirmation"  type="password"  class="form-control" placeholder="Potwierdzenie hasła">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Zmień hasło</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

@stop