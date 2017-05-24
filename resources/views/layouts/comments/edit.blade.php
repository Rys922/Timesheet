@extends('layouts.app')

@section('title')
    Wpis | @if(isset($comment)) Edycja @else Nowy @endif
@stop

@section('content')
<h2>@if(isset($comment)) Edytuj @else Dodaj nowy @endif wpis</h2>
<hr />
     <form method="POST" action="{{ route('comment.save') }}">
                        {{ csrf_field() }}
    @if(isset($comment)) <input name="id" type="hidden" value="{{$comment->id}}"> @endif
    @if(isset($task_id)) <input name="task_id" type="hidden" value="{{$task_id}}"> @endif
	
	 <label for="content">Komentarz:</label>
     <div class="form-group has-feedback">
         <input name="content" id="content" class="form-control" placeholder="Komentarz" value="{{old('content') ? old('content') : (isset($comment) ? $comment->content : '') }}">
         <span class="fa fa-file-text form-control-feedback"></span>
     </div>
      @if ($errors->has('content'))
      <span class="help-block text-red">
         {{ $errors->first('content') }}
      </span>
      @endif	

      <label for="workday">Data:</label>
     <div class="form-group has-feedback">
         <input name="workday" id="workday" class="form-control" placeholder="Data" value="{{old('workday') ? old('workday') : (isset($comment) ? $comment->workday : '') }}">
         <span class="fa fa-file-text form-control-feedback"></span>
     </div>
      @if ($errors->has('workday'))
      <span class="help-block text-red">
         {{ $errors->first('workday') }}
      </span>
      @endif 

      <label for="time">Czas pracy:</label>
     <div class="form-group has-feedback">
         <input name="time" id="time" class="form-control" placeholder="Czas pracy" value="{{old('time') ? old('time') : (isset($comment) ? $comment->time : '') }}">
         <span class="fa fa-file-text form-control-feedback"></span>
     </div>
      @if ($errors->has('time'))
      <span class="help-block text-red">
         {{ $errors->first('time') }}
      </span>
      @endif
	  


     
          <button type="submit" class="btn btn-primary btn-block btn-flat">Zapisz</button>
    
      </form>

@stop