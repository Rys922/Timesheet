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
          <span class="info-box-text">Dostępne projekty</span>
          <span class="info-box-number">
		  <h3>{{$projects -> count()}}</h3>
		  </span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
    </div><!-- /.col -->
    <div class="col-md-6 col-sm-6 col-xs-12">
     
    </div><!-- /.col -->



    <div class="col-md-3 col-sm-3 col-xs-12">
    @if(Auth::user()->role == "admin")
      <a class="btn btn-success btn-lg" href="{{route('project.add')}}">Dodaj nowy</a>  
      @endif
    </div><!-- /.col -->

    <div class="col-md-3 col-sm-3 col-xs-12">
    <form method="get" action="{{route('projects')}}">
            <div class="input-group input-group-sm" style="width: 150px;" align="right">
                  <input type="text" name="query" class="form-control pull-right" placeholder="Search" value="{{request()->has('query') ? request()->input('query'):''}}">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default">  <i class="fa fa-search"></i></button>
                  </div>
                </div></form>
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
			
      @if(Auth::user()->role == "admin")
			<div class="col-sm-2">
				<a class="btn btn-primary" href="{{route('project.edit',['id' => $p->id])}}">Edytuj</a>
				<a class="btn btn-danger" href="{{route('project.delete',['id' => $p->id])}}">Usuń</a>
			</div>
			
			<div class="col-sm-4">
						
			<div class="panel panel-default">
				<div class="panel-heading">Menedżer: {{$p -> manager -> name}} {{$p -> manager -> surname}}</div>
				<div class="panel-body">
					{{$p -> manager -> email}}					
				</div>
			</div>
			
			</div>
      @else
      <div class="col-sm-6">
        @if($p->workers)
          Pracownicy<br>
          @foreach($p->workers as $worker)
              <button class="btn btn-xs btn-default">{{$worker->name}} {{$worker->surname}}</button>
          @endforeach
        @endif
      </div>
      @endif
	</div>	
	
  </div><!-- /.box-body -->
</div><!-- /.box -->
@endforeach

@stop