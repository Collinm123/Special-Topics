@extends('layouts/layout')

@section('content')
      @if(Session::has('isAdmin'))
      <h2>Welcome "{{ Auth::user()->username }}" to the protected page!</h2>
       <p>Your user ID is: {{ Auth::user()->id }}</p>
        <div class="well">
          <p>Register New Admin</p>
          <form action="add/admin">
              <input type="text" name="admin-username" placeholder="Username">
              <input type="password" name="admin-password" placeholder="password">
              <input name="add-admin" type="submit" value="submit">
          </form>
        </div>
      @endif
@stop