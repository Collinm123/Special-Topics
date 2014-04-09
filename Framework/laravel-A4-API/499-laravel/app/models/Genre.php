
<?php

class Genre extends Eloquent{


	public static function search($genre)
    {

      	$query = DVD::join('ratings', 'dvds.rating_id', '=', 'ratings.id')
			        ->join('genres', 'dvds.genre_id', '=', 'genres.id')
			        ->join('labels', 'dvds.label_id', '=', 'labels.id')
			        ->join('sounds', 'dvds.sound_id', '=', 'sounds.id')
			        ->join('formats', 'dvds.format_id', '=', 'formats.id');

	      if ($genre) {
	        $query->where('genre_id', 'LIKE', "%$genre%");
	      }

	      $dvds = $query->get();

	      return $dvds;

    }

	public function dvds()
	{
		return $this->hasMany('DVD');
	}

}