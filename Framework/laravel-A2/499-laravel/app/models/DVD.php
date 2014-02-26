<?php

class DVD extends Eloquent {

  protected $table = 'dvds';

    public static function search($title, $genre, $rating)
    {

      $query = self::join('ratings', 'dvds.rating_id', '=', 'ratings.id')
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

    public function getDates()
    {
      return ['created_at', 'updated_at', 'added'];
    }

} 