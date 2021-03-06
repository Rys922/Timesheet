<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TimeSheet | Rejestracja</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>Time</b>Sheet
  </div>

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

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>