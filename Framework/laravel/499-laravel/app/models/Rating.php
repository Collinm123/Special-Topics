
<?php

class Rating {

	public static function queryAll(){
		    $query = DB::table('ratings')
      		->select('*');

      		$ratings = $query->get();
    		return $ratings;
	}

}