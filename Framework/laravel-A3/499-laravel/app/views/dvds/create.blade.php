@extends('layouts/layout')

@section('content')
  @if(Session::has('errors'))
    <div class="alert alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      @foreach($errors->all() as $error)
        {{ $error }}
      @endforeach
    </div>
  @elseif(Session::has('messages'))
    <div class="alert alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ Session::get('messages') }}
    </div>
  @endif
@if(Session::has('access_token'))
  <form action="{{ url('dvds') }}" method="post">
    <h1>Add a DVD</h1>
      <div>
        <input type="text" name="title" class="form-control" value="{{ Input::old('title') }}" placeholder="Add a title..">
      <div>
    <br>
      Label:
      <select name="label">  
        @foreach ($labels as $label)
        <option value="{{ $label->id }}">
          {{ $label->label_name }}
        </option>
       @endforeach
      </select>
    </div>
    <br>
    <div>
      Sound:
      <select name="sound">  
        @foreach ($sounds as $sound)
        <option value="{{ $sound->id }}">
          {{ $sound->sound_name }}
        </option>
        @endforeach
      </select>
    </div>
    <br>
    <div>
      Genre:
      <select name="genre">  
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
        @foreach ($ratings as $rating)
        <option value="{{ $rating->id }}">
          {{ $rating->rating_name }}
        </option>
        @endforeach
      </select>
    </div>
    <br>
    <div>
      Format:
      <select name="format">  
        @foreach ($formats as $format)
        <option value="{{ $format->id }}">
          {{ $format->format_name }}
        </option>
        @endforeach
      </select>
    </div>
    <br>
    <div>
      <input class="btn btn-primary btn-lg" type="submit" value="Add DVD" />
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