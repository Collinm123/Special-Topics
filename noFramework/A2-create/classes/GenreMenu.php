<?php

class GenreMenu
{

	public $genres;

		public function __construct($genres){
				$this->genres = $genres;
				
		}

		public function __toString() {  	
    		$return = array();
    		foreach($this->genres as $genre) :
    		$return[] = "<option value='".$genre['id']."'>".$genre['genre']."</option>";
			endforeach;
			$return = '<select name="genre">'.PHP_EOL.implode($return, PHP_EOL).'</select>';
			return $return;
		}

}

?>