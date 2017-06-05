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

    <div class="col-md-3 col-sm-3 col-xs-12">
    <form method="get" action="{{route('tasks')}}">
            <div class="input-group input-group-sm" style="width: 150px;" align="right">
                  <input type="text" name="query" class="form-control pull-right" placeholder="Szukaj" value="{{request()->has('query') ? request()->input('query'):''}}">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default">  <i class="fa fa-search"></i></button>
                  </div>
                </div></form>
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
      <div class="col-sm-4">
						
        <div class="panel panel-default">
          <div class="panel-heading">Projekt: {{$t -> project -> name}}</div>
        </div>
			
			</div>
      <div class="col-sm-4">
						
        <div class="panel panel-default">
          <div class="panel-heading">Menadżer: {{$t -> project -> manager ->name}} {{$t -> project -> manager ->surname}}</div>
        </div>
			
			</div>
      <div class="col-sm-4">			
        @if(Auth::user()->role=='user')		
          <a class="btn btn-block btn-primary" href="{{route('comment.add',['id'=>$t->id])}}">Dodaj wpis</a>		
        @endif
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