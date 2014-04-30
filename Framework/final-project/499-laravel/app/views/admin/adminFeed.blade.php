@extends('layouts/layout')

@section('content')
	@if(Session::has('message'))
		<div class="alert alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  {{ Session::get('message')}}
		</div>
	@endif
	@if(Session::has('access_token'))

		  @if(Auth::check())
		    <form style="margin-bottom: 20px;" action="{{url('post/create')}}" method="POST" class="form-inline" role="form">
	            <div class="form-group">
	              <textarea style="width: 200px;" class="form-control" type="text" name="body" value="{{ Input::old('body') }}" placeholder="Say something.."></textarea>
	            </div>        
	            <button style="margin-left: 20px;" type="submit" class="btn btn-lg btn-default">Add New</button>
	        </form>
		@endif
		@if(!empty( $posts ))
			@foreach( $posts as $post )
			<div class="well">
				<div class="media">
					@if(!empty($post->photo))
	  				<a class="pull-left" href="#">
	        			<img class="media-object" style="width: 60px; height:auto;" src="{{ $post->photo }}" alt="Profile image">
	      			</a>
	      			@endif
	      			<div class="media-body">
	      				<div class="media-heading">
	      					<h4>{{ $post->name }}</h4>
	      				</div>
	      				@if(!empty($post->body))
	      					<p>{{ $post->body }}</p>
	      					<p>{{ $post->created_at }}</p>
	      				@endif
	      			</div>
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