<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TimeSheet | @section('title') Dashboard @show</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Time</b>Sheet</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <i class="fa fa-3x fa-user"></i>
                      </div>
                      <h4>
                        Support Team
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">Zobacz wszystkie wiadomości</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <i class="fa fa-3x fa-user" style="color: #fff"></i>
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}} {{Auth::user()->surname}}</p>
          <a href="{{route('logout')}}"> Wyloguj</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      @if(Auth::user()->role == 'admin')
      <ul class="sidebar-menu">
        <li class="header">ADMIN</li>

        <li>
          <a href="{{route('projects')}}">
            <i class="fa fa-files-o"></i> <span>Projekty</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{\App\Project::all()->count()}}</small>
            </span>
          </a>
        </li>

        <li>
          <a href="{{route('tasks')}}">
            <i class="fa fa-tasks"></i> <span>Zadania</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{\App\Task::all()->count()}}</small>
            </span>
          </a>
        </li>

        <li>
          <a href="{{route('users')}}">
            <i class="fa fa-users"></i> <span>Użytkownicy</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{\App\User::all()->count()}}</small>
            </span>
          </a>
        </li>
           
        <li>
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Wiadomości</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">4</small>
              <small class="label pull-right bg-green">16</small>
            </span>
          </a>
        </li>

      </ul>
      @endif

      @if(Auth::user()->role == 'manager')
      <ul class="sidebar-menu">
        <li class="header">MANAGER</li>

        <li>
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Projekty</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{\App\Project::all()->count()}}</small>
            </span>
          </a>
        </li>

         <li>
          <a href="#">
            <i class="fa fa-files-o"></i> <span>Do zatwierdzenia</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{\App\Comment::all()->count()}}</small>
            </span>
          </a>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Wiadomości</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">4</small>
              <small class="label pull-right bg-green">16</small>
            </span>
          </a>
        </li>

      </ul>
      @endif
      @if(Auth::user()->role == 'user')
      <ul class="sidebar-menu">
        <li class="header">PRACOWNIK</li>
        <li>
          <a href="{{route('tasks')}}">
            <i class="fa fa-files-o"></i> <span>Zadania</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">{{Auth::user()->tasks->count()}}</small>
            </span>
          </a>
        </li>

      </ul>
      @endif
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 
    <!-- Main content -->
    <section class="content">

      @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



 
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/app.min.js')}}"></script>
</body>
</html>
