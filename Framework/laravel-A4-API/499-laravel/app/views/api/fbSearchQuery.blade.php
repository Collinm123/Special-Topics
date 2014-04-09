@extends('layouts/layout')

@section('content')
	@if(Session::has('message'))
		<div class="alert alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  {{ Session::get('message')}}
		</div>
	@endif

	@if(Session::has('access_token'))
	    <div class="media">
	      <a class="pull-left" href="#">
	        <img class="media-object" src="{{ $photo }}" alt="Profile image">
	      </a>
	      <div class="media-body">
	        <h4 class="media-heading">{{{ $name }}} </h4>
	        <br>
	        <form action="{{url('fb/search/query')}}">
	        	<div class="row">
				  <div class="col-lg-4">
				    <div class="input-group">
				      <input type="text" name="query" class="form-control" placeholder="Type friends or home..">
				      <span class="input-group-btn">
				        <button class="btn btn-default" type="submit">Go!</button>
				      </span>
				    </div><!-- /input-group -->
				  </div><!-- /.col-lg-6 -->
				</div>
	        </form>
	      </div>
	    </div>
	    <hr>
		@if(!empty( $feed ))
			@foreach( $feed as $post )
			<div class="well">
				<div class="media">
					@if(!empty($post->picture))
	  				<a class="pull-left" href="#">
	        			<img class="media-object" src="{{ $post->picture }}" alt="Profile image">
	      			</a>
	      			@endif
	      			<div class="media-body">
	      				<div class="media-heading">
	      					<h4>{{ $post->from->name }}</h4>
	      				</div>
	      				@if(!empty($post->message))
	      				{{ $post->message }}
	      				@elseif(!empty($post->story))
	      				{{ $post->story }}
	      				@else
	      				@endif
	      			</div>
	      		</div>
			</div>
	  		@endforeach
		@elseif(!empty( $friends ))
			@foreach( $friends as $friend )
			<div class="well">
	  			<div class="media">
	  				<a class="pull-left" href="#">
	        			<img class="media-object" src="{{ $friend->picture->data->url }}" alt="Profile image">
	      			</a>
	      			<div class="media-body">
	      				<div class="media-header">{{ $friend->name }}</div>
	      			</div>
	      		</div>
	      	</div>
	  		@endforeach
		@endif
	@else
		<div class="jumbotron">
		    <h1>Facebook API</h1>
		    <br>
		    <p class="text-center">
		      <a class="btn btn-lg btn-primary" href="{{url('login/fb')}}"><i class="icon-facebook"></i> Login with Facebook</a>
		    </p>
		</div>
	@endif

@stop