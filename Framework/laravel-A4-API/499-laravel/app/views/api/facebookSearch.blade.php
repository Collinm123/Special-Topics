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
	        <form action="{{url('fb/search/query')}}">
	        	<select name="query">
	        		<option value="friends.limit(100).fields(posts)">Recent Feed</option>
	        		<option value="friends.limit(100).fields(picture,name)">Friends</option>
	        	</select>
	        	<input type="submit" value="Search">
	        </form>
	      </div>
	    </div>
	    <hr>
	    <a href="{{url('logout')}}">Logout</a>
	@else
		<div class="jumbotron">
		    <h1>Facebook API</h1>
		    <br>
		    <p class="text-center">
		      <a class="btn btn-lg btn-primary" href="{{url('login/fb')}}"><i class="icon-facebook"></i> Login with Facebook</a>
		    </p>
		</div>
	@endif
	@if(!empty( $results ))
		@foreach( $results as $result )
  			<div class="media">
  				<a class="pull-left" href="#">
        			<img class="media-object" src="{{ $result->picture->data->url }}" alt="Profile image">
      			</a>
      			<div class="media-body">
      				<div class="media-header">{{ $result->name }}</div>
      			</div>
      		</div>
  		@endforeach
	@endif

@stop