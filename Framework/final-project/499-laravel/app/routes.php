<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', function()
{
	$data = array();
    $name = Session::get('name');
    $email = Session::get('email');
    $photo = Session::get('photo');
    $access_token = Session::get('access_token');
    if ($access_token) {
		return View::make('user', array(
			'name' => $name,
			'email' => $email,
			'photo' => $photo,
			'access_token' => $access_token,

			));
    }else{
    	return View::make('user', array('data' => $data));
    }   
    
});

Route::get('login/fb', 'FacebookController@login');

Route::get('login/fb/callback', 'FacebookController@callback');

Route::get('fb/logout', 'FacebookController@logout');

Route::get('fb/search/friends', 'FacebookController@searchFriends');

Route::get('fb/search/feed', 'FacebookController@searchFeed');

Route::post('login', 'AdminController@login');

Route::get('logout', 'AdminController@logout')->before('auth');

Route::get('admin/new', 'AdminController@newAdmin');

Route::post('admin/create', 'AdminController@createAdmin');

Route::get('admin/{id}/delete', 'AdminController@deleteAdmin');

Route::get('posts/feed', 'PostController@postsFeed');

Route::post('post/create', 'PostController@createPost');

Route::get('todos/feed', 'TodoController@todosFeed');

Route::post('todo/create', 'TodoController@createTodo');

Route::get('todo/{id}/delete', 'TodoController@deleteTodo');

