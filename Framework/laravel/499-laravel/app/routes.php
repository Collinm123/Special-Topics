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



Route::get('/dvds/search', 'DVDController@search');
Route::get('/dvds', 'DVDController@listDVDs');

Route::get('/dvds/search', function(){
	$genres = Genre::queryAll();
	$ratings = Rating::queryAll();
	return View::make('dvds/search', [
		'genres' => $genres,
		'ratings' => $ratings
		]);
});