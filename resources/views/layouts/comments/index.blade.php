@extends('layouts.app')

@section('title')
    Wpisy
@stop

@section('content')

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-male"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Dostępne wpisy</span>
          <span class="info-box-number">
		  <h3>{{$comments -> count()}}</h3>
		  </span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-6 col-sm-6 col-xs-12">
     
    </div><!-- /.col -->
  </div>
  
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Wpisy</h3>

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
                  <th>Projekt</th>
                  <th>Zadanie</th>
                  <th>Data</th>
                  <th>Czas pracy</th>
                  <th>Komentarz</th>
                  <th>Stan wpisu</th>
                  <th></th>
                </tr>
                @foreach($comments as $c)
                <tr>
                  <td>{{$c->task->project->name}}</td>
                  <td>{{$c->task->name}}</td>
                  <td>{{$c->workday}}</td>
                  <td>{{$c->time}}</td>
                  <td>{{$c->content}}</td>
                  <td><span class="label 
                  @if($c->stan == "Zaakceptowany")
                    label-success
                  @elseif($c->stan == "Oczekuje")
                    label-default
                  @else
                    label-danger
                  @endif
                  ">{{$c->stan}}</span>
                  </td>
                  <td>@if($c->stan == "Oczekuje")	<a class="btn btn-xs btn-primary" href="{{route('comment.edit',['id' => $c->id])}}">Edytuj</a>@endif</td>
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