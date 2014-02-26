<?php


class DVDController extends BaseController {

  public function searchScreen()
  {
      $genres = Genre::all();
      $ratings = Rating::all();
      return View::make('dvds/search', [
        'genres' => $genres,
        'ratings' => $ratings
    ]);
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

  public function createScreen()
  {

    $labels = Label::all();
    $sounds = Sound::all();
    $genres = Genre::all();
    $ratings = Rating::all();
    $formats = Format::all();
    return View::make('/dvds/create', [
      'labels' => $labels,
      'sounds' => $sounds,
      'genres' => $genres,
      'ratings' => $ratings,
      'formats' => $formats
      ]);
  }

  public function createDVD()
  {

    $validation = DVD::validate(Input::all());

    if($validation->passes()){
          $dvd = new DVD();
          $dvd->title = Input::get('title');
          $dvd->label_id = Input::get('label');
          $dvd->sound_id = Input::get('sound');
          $dvd->genre_id = Input::get('genre');
          $dvd->rating_id = Input::get('rating');
          $dvd->format_id = Input::get('format');
          $dvd->save();

          return Redirect::to('/dvds/create')
            ->with('success', 'DVD Added Successfully!');
    }else{
          return Redirect::to('/dvds/create')
            ->withInput()
            ->withErrors($validation);
            //->with('errors', $validation->messages());
    }

  }



} 