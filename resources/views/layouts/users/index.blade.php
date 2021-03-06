@extends('layouts.app')

@section('title')
    Użytkownicy
@stop

@section('content')

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-male"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Dostępni użytkownicy</span>
          <span class="info-box-number">
		  <h3>{{$users -> count()}}</h3>
		  </span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-6 col-sm-6 col-xs-12">
     
    </div><!-- /.col -->



    <div class="col-md-3 col-sm-3 col-xs-12">
    <form method="get" action="{{route('users')}}">
            <div class="input-group input-group-sm" style="width: 150px;" align="right">
                  <input type="text" name="query" class="form-control pull-right" placeholder="Szukaj" value="{{request()->has('query') ? request()->input('query'):''}}">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default">  <i class="fa fa-search"></i></button>
                  </div>
                </div></form>
    </div><!-- /.col -->
  
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Użytkownicy</h3>

              <!--<div class="box-tools">
                //<div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Imię</th>
                  <th>Nazwisko</th>
                  <th>Email</th>
                  <th>Rola</th>
                  <th></th>
                </tr>
                @foreach($users as $user)
                <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->surname}}</td>
                  <td>{{$user->email}}</td>
                  <td><span class="label 
                  @if($user->role == "admin")
                    label-info
                  @elseif($user->role == "manager")
                    label-primary
                  @else
                    label-default
                  @endif
                  ">{{$user->role}}</span>
                  </td>
                  <td>      
                     @if(!$user->forced)             
                        <button class="btn btn-xs btn-warning"><a href="{{route('force.user',['id'=>$user->id])}}">Wymuś zmiane hasła</a></button>
                     @else
                        <button class="btn btn-xs btn-warning"><a href="{{route('force.user',['id'=>$user->id])}}">Odwymuś zmiane hasła</a></button>
                     @endif
                     @if($user->blocked)
                        <button class="btn btn-xs btn-success"><a href="{{route('block.user',['id'=>$user->id])}}">Odblokuj</a></button>
                     @else
                        <button class="btn btn-xs btn-danger"><a href="{{route('block.user',['id'=>$user->id])}}">Zablokuj</a></button>
                    @endif
                  </td>
                </tr>
                @endforeach
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

@stop