@extends('layouts/layout')

@section('content')
	@if(Session::has('message'))
		<div class="alert alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  {{ Session::get('message')}}
		</div>
	@endif


	@if(Session::has('access_token'))

		@if(!empty( $results ))
			@foreach( $results as $result )
			<div class="well">
				<div class="media">
					@if(!empty($result->picture))
	  				<a class="pull-left" href="#">
	        			<img class="media-object" src="{{ $result->picture }}" alt="Profile image">
	      			</a>
	      			@endif
	      			<div class="media-body">
	      				<div class="media-heading">
	      					<h4>{{ $result->from->name }}</h4>
	      				</div>
	      				@if(!empty($result->message))
	      					{{ $result->message }}
	      				@elseif(!empty($result->story))
	      					{{ $result->story }}
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