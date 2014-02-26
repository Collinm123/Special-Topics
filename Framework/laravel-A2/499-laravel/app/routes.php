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

    $genre = Genre::find($id);
   	$dvds = $genre->dvds;
    return View::make('dvds/genre-list', [
      'dvds' => $dvds
    ]);

});







