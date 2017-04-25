@extends('layouts.app')

@section('title')
    Projekty
@stop

@section('content')

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-orange"><i class="fa fa-file"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Dostępne zadania</span>
          <span class="info-box-number">
		  <h3>{{$tasks -> count()}}</h3>
		  </span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-6 col-sm-6 col-xs-12">
     
    </div><!-- /.col -->
    <div class="col-md-6 col-sm-6 col-xs-12">
      @if(Auth::user()->role=='manager')
        <a class="btn btn-success btn-lg" href="{{route('project.add')}}">Dodaj nowy</a>  
      @endif
    </div><!-- /.col -->
  </div>
  
  @foreach($tasks as $t)
<div class="box box-default collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title">{{$t -> name}}</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-sm-8">
						
        <div class="panel panel-default">
          <div class="panel-heading">Projekt: {{$t -> project -> name}}</div>
        </div>
			
			</div>
      <div class="col-sm-4">					
          <a class="btn btn-block btn-primary" href="#">Dodaj wpis</a>		
			</div>
   
	
			<div class="col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading">Treść zadania: {{$t -> content}}</div>
        </div>
      </div>
		 </div>	

	
  </div><!-- /.box-body -->
</div><!-- /.box -->
@endforeach

@stop