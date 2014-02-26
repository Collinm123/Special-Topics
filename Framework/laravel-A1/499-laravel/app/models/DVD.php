<?php

class DVD {

  public static function search($title, $genre, $rating)
  {

    $query = DB::table('dvds')
      ->select('title', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name',  DB::raw("DATE_FORMAT(release_date, '%b %d %Y %h:%i %p') AS release_date"))
      ->join('ratings', 'dvds.rating_id', '=', 'ratings.id')
      ->join('genres', 'dvds.genre_id', '=', 'genres.id')
      ->join('labels', 'dvds.label_id', '=', 'labels.id')
      ->join('sounds', 'dvds.sound_id', '=', 'sounds.id')
      ->join('formats', 'dvds.format_id', '=', 'formats.id');

    if ($title) {
      $query->where('title', 'LIKE', "%$title%");
    }

    if ($genre) {
      $query->where('genre_id', 'LIKE', "%$genre%");
    }

    if ($rating) {
      $query->where('rating_id', 'LIKE', "%$rating%");
    }

    $dvds = $query->get();

    return $dvds;
  }


} 