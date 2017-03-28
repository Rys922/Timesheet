@extends('layouts.app')

@section('title')
    Użytkownicy
@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Użytkownicy</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
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
                        <button class="btn btn-xs btn-warning">Wymuś zmiane hasła</button>
                     @else
                        <button class="btn btn-xs disabled btn-warning">Wymuś zmiane hasła</button>
                     @endif
                     @if($user->blocked)
                        <button class="btn btn-xs btn-success">Odblokuj</button>
                     @else
                        <button class="btn btn-xs btn-danger"><a href="{{route('block.user')}}">Zablokuj</a></button>
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