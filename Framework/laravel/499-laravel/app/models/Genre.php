
<?php

class Genre {

	public static function queryAll(){
		    $query = DB::table('genres')
      		->select('*');

      		$genres = $query->get();
    		return $genres;
	}

}