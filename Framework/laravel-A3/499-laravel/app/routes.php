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

Route::get('/dvds/search', 'DVDController@searchScreen');
Route::get('/dvds/list', 'DVDController@listDVDs');
Route::get('/dvds/create', 'DVDController@createScreen');
Route::post('/dvds', 'DVDController@createDVD');

Route::get('/genre/{id}/dvds', function($id)
{
   
    $dvds = Genre::search($id);
    return View::make('dvds/genre-list', [
      'dvds' => $dvds
    ]);
});



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
    	return View::make('user', array('data'=>$data));
    }   
    
});

Route::get('login/fb', 'FacebookController@login');
Route::get('login/fb/callback', 'FacebookController@callback');
Route::get('fb/search/friends', 'FacebookController@searchFriends');
Route::get('fb/search/feed', 'FacebookController@searchFeed');
Route::get('fb/search', 'FacebookController@makeSearch');
Route::get('fb/search/query', 'FacebookController@search');
Route::get('logout', function() {
    Session::flush();
    return Redirect::to('/');
});


