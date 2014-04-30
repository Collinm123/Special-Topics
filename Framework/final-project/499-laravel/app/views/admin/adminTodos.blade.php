@extends('layouts/layout')

@section('content')

	@if(Session::has('access_token'))
	
		  @if(Auth::check())
		    <form style="margin-bottom: 20px;" action="{{url('todo/create')}}" method="POST" class="form-inline" role="form">
	            <div class="form-group">
	              <input class="form-control" type="text" name="body" value="{{ Input::old('body') }}" placeholder="New to-do..">
	            </div> 
	            <button style="margin-left: 20px;" type="submit" class="btn btn-primary">Add To-Do</button>
	        </form>
		@endif
		@if(!empty( $todos ))
			@foreach( $todos as $todo )
			<div class="well">
				<div class="media">
	      			<div class="media-body">
	      				<div class="media-heading">
	      					<h4>{{ $todo->name }}</h4>
	      				</div>
	      				@if(!empty($todo->body))
	      					<p>{{ $todo->body }}</p>
	      					<p>{{ $todo->created_at }}</p>
	      				@endif
	      			</div>
	      			<a href="<?php echo url("todo/$todo->id/delete")?>"><span class="glyphicon glyphicon-remove pull-right"></span></a>
	      		</div>
			</div>
	  		@endforeach
		@endif
	@else
		<div class="jumbotron">
		    <h1 style="text-align: center">Trivial App</h1>
		    <br>
		    <p class="text-center">
		      <a class="btn btn-lg btn-primary" href="{{url('login/fb')}}"><i class="icon-facebook"></i> Login with Facebook</a>
		    </p>
		</div>
	@endif
@stop