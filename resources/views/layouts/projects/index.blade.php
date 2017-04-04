@extends('layouts.app')

@section('title')
    Projekty
@stop

@section('content')

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-orange"><i class="fa fa-star-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Dostępne projekty</span>
          <span class="info-box-number">
		  {{$projects -> count()}}
		  </span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-6 col-sm-6 col-xs-12">
     
    </div><!-- /.col -->
    <div class="col-md-6 col-sm-6 col-xs-12">
      <a class="btn btn-success btn-lg" href="{{route('project.add')}}">Dodaj nowy</a>  
    </div><!-- /.col -->
  </div>
  
  @foreach($projects as $p)
<div class="box box-default collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title">{{$p -> name}}</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
		<div class="row">
			<div class="col-sm-6">{{$p -> description}}</div>
			
			<div class="col-sm-2">
				<a class="btn btn-primary" href="{{route('project.edit',['id' => $p->id])}}">Edytuj</a>
				<button class="btn btn-danger">Usuń</button>
			</div>
			
			<div class="col-sm-4">
						
			<div class="panel panel-default">
				<div class="panel-heading">Menedżer: {{$p -> manager -> name}} {{$p -> manager -> surname}}</div>
				<div class="panel-body">
					{{$p -> manager -> email}}					
				</div>
			</div>
			
			</div>
	</div>	
	
  </div><!-- /.box-body -->
</div><!-- /.box -->
@endforeach

@stop