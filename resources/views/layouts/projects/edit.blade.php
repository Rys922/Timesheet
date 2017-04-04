@extends('layouts.app')

@section('title')
    Projekty | @if(isset($project)) Edycja @else Nowy @endif
@stop

@section('content')
<h2>Dodaj nowy projekt</h2>
<hr />
     <form method="POST" action="{{ route('project.save') }}">
                        {{ csrf_field() }}
    @if(isset($project)) <input name="id" type="hidden" value="{{$project->id}}"> @endif
	
	<label for="nameForm">Nazwa projektu:</label>
    <div class="form-group has-feedback">
        <input name="name" id="nameForm" class="form-control" placeholder="Nazwa" value="{{old('name') ? old('name') : (isset($project) ? $project->name : '') }}">
        <span class="fa fa-file-text form-control-feedback"></span>
    </div>
      @if ($errors->has('name'))
      <span class="help-block text-red">
         {{ $errors->first('name') }}
      </span>
      @endif
	  
	  <label for="descriptionForm">Opis projektu:</label>
      <div class="form-group has-feedback">
	  <span class="fa fa-pencil form-control-feedback"></span>
		<textarea name="description" id="descriptionForm" class="form-control" rows="3" 
			placeholder="Opis..." dir="ltr" style="margin: 0px -7px 0px 0px;  min-width:100%; max-width:100%; min-height: 100px; max-height:200px;">
			{{old('description') ? old('description') : (isset($project) ? $project->description : '') }}</textarea>        
    </div>
      @if ($errors->has('description'))
      <span class="help-block text-red">
         {{ $errors->first('description') }}
      </span>
      @endif
	  
		<label for="managerForm">Wybierz menedżera:</label>
		<div class="form-group has-feedback">

        <select name="manager" id="managerForm" class="form-control">
            @foreach(\App\User::whereRole('manager')->get() as $m)
                <option value="{{$m->id}}" {{old('manager') && old('manager') == $m->id ? "selected" : (isset($project) && $project->manager_id == $m->id? "selected" : '') }}>{{$m->name}} {{$m->surname}}</option>
            @endforeach
        </select>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
      @if ($errors->has('manager'))
      <span class="help-block text-red">
         {{ $errors->first('manager') }}
      </span>
      @endif

     
          <button type="submit" class="btn btn-primary btn-block btn-flat">Zapisz</button>
    
      </form>

@stop