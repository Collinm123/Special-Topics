@extends('layouts/layout')

@section('content')
  @if(Session::has('message'))
    <div class="alert alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{ Session::get('message')}}
    </div>
  @endif
@if(Session::has('access_token'))
  <form method="get" action="/dvds/list">
    <h1>DVD Search</h1>
    <div>
      <input type="text" name="title" class="form-control" placeholder="Dvd Title.."/>
    </div>
    <br>
    <div>
      Genre:
      <select name="genre">  
        <option value="">All</option>
        @foreach ($genres as $genre)
        <option value="{{ $genre->id }}">
          {{ $genre->genre_name }}
        </option>
       @endforeach
      </select>

    </div>
    <br>
    <div>
      Rating:
      <select name="rating">  
        <option value="">All</option>
        @foreach ($ratings as $rating)
        <option value="{{ $rating->id }}">
          {{ $rating->rating_name }}
        </option>
       @endforeach
      </select>
    </div>
    <br>
    <div>
      <input class="btn btn-lg btn-primary" type="submit" value="Search" />
    </div>
  </form>
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