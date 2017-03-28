@extends('layouts.app')

@section('title')
    Zmiana hasła
@stop

@section('content')

  <div class="register-box-body">
    <p class="login-box-msg">Rejestracja</p>

    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="text" name="name" class="form-control" placeholder="Imię">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      @if ($errors->has('name'))
                                    <span class="help-block text-red">
                                        {{ $errors->first('name') }}
                                    </span>
      @endif
      <div class="form-group has-feedback">
        <input name="surname" class="form-control" placeholder="Nazwisko">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      @if ($errors->has('surname'))
                                    <span class="help-block text-red">
                                        {{ $errors->first('surname') }}
                                    </span>
      @endif
      <div class="form-group has-feedback">
        <input name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      @if ($errors->has('email'))
                                    <span class="help-block text-red">
                                        {{ $errors->first('email') }}
                                    </span>
      @endif
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
          <button type="submit" class="btn btn-primary btn-block btn-flat">Zarejestruj</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="{{route('login')}}" class="text-center">Już mam konto w serwisie</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
@stop