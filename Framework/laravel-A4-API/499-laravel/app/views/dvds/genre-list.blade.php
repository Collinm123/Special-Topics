@extends('layouts/layout')

@section('content')
  @if(Session::has('message'))
    <div class="alert alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ Session::get('message')}}
    </div>
  @endif
@if(Session::has('access_token'))
	<h2>All DVD's with a Specific Genre</h2>
	
	<table class="results" border="1">
	  <colgroup span="4" class="columns"></colgroup>
	  <tr>
	    	<th>Title</th>
			<th>Release Date</th>
	  </tr>
	@foreach ($dvds as $dvd)
			<tr>
			<td class="bodyCell" colspan="1" rowspan="1">{{ $dvd->title }}</td>
			<td class="bodyCell" colspan="1" rowspan="1">{{ $dvd->release_date }}</td>
			</tr>
	@endforeach
	</table>
@else
	<div class="jumbotron">
	    <h1>Facebook login example</h1>
	    <br>
	    <p class="text-center">
	      <a class="btn btn-lg btn-primary" href="{{url('login/fb')}}"><i class="icon-facebook"></i> Login with Facebook</a>
	    </p>
	</div>
@endif
@stop