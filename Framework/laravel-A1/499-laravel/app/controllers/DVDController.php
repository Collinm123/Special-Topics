<?php


class DVDController extends BaseController {

  public function search()
  {
    return View::make('dvds/search');
  }


  public function listDVDs()
  {
    $title = Input::get('title');
    $genre = Input::get('genre');
    $rating = Input::get('rating');

    
    $dvds = DVD::search($title, $genre, $rating);
   
  
    return View::make('dvds/dvds-list', [
      'dvds' => $dvds
    ]);
  }


} 