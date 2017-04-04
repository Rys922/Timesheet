@extends('layouts.app')

@section('title')
    Projekty | @if(isset($project)) Edycja @else Nowy @endif
@stop

@section('content')
     <form method="POST" action="{{ route('project.save') }}">
                        {{ csrf_field() }}
    @if(isset($project)) <input name="id" type="hidden" value="{{$project->id}}"> @endif
    <div class="form-group has-feedback">
        <input name="name" class="form-control" placeholder="Nazwa">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
      @if ($errors->has('name'))
      <span class="help-block text-red">
         {{ $errors->first('name') }}
      </span>
      @endif
      <div class="form-group has-feedback">
        <input name="description" class="form-control" placeholder="Opis">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
      @if ($errors->has('description'))
      <span class="help-block text-red">
         {{ $errors->first('description') }}
      </span>
      @endif
      <div class="form-group has-feedback">

        <select name="manager" class="form-control">
            @foreach(\App\User::whereRole('manager')->get() as $m)
                <option value="{{$m->id}}">{{$m->name}} {{$m->surname}}</option>
            @endforeach
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
      @if ($errors->has('manager'))
      <span class="help-block text-red">
         {{ $errors->first('manager') }}
      </span>
      @endif

        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Zapisz</button>
        </div>

      </form>

@stop