@extends('layouts/layout')

@section('content')
     @if(Auth::check())
      <h2>Welcome {{ ucfirst(Auth::user()->username) }}!</h2>
       <p>Your user ID is: {{ Auth::user()->id }}</p>
        <div class="well">
          <p>Register New Admin</p>
          <form action="{{url('admin/create')}}" method="POST" class="form-inline" role="form">
            <div class="form-group">
              <input class="form-control" type="text" name="first_name" value="{{ Input::old('first_name') }}" placeholder="First Name">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="last_name" value="{{ Input::old('last_name') }}" placeholder="Last Name">
            </div>
            <div class="form-group">
              <input class="form-control" type="text" name="username" value="{{ Input::old('username') }}" placeholder="Username">
            </div>
            <div class="form-group">
              <input class="form-control" type="password" name="password" placeholder="Password">
            </div>          
            <button type="submit" class="btn btn-primary">Add New</button>
          </form>
        </div>
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Admin</div>
          <!-- Table -->
          <table class="table">
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>First Name</th>
              <th>Last Name</th>
            </tr>
            @foreach ($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{ucfirst($user->username)}}</td>
                <td>{{ucfirst($user->first_name)}}</td>
                <td>{{ucfirst($user->last_name)}}</td>
                <td><a href="<?php echo url("admin/$user->id/delete")?>"><span id="removeAdmin" class="glyphicon glyphicon-remove pull-right"></span></a></td>
              </tr>
            @endforeach
          </table>
        </div>
      @endif
@stop