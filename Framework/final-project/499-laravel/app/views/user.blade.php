@extends('layouts/layout')

@section('content')
	@if(Session::has('message'))
		<div class="alert alert-success alert-dismissable">
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
	        <h4 class="media-heading">Welcome {{{ $name }}}!</h4>
	        <strong>Your email is:</strong> {{ $email }}
	        <br>
	      </div>
	    </div>
	    <hr>
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