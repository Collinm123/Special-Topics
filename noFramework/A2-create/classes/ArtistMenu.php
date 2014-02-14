<?php

class ArtistMenu
{
	public $artists;

		public function __construct($artists){
				$this->artists = $artists;
				
		}

		public function __toString() {  
    		$return = array();
    		foreach($this->artists as $artist) :
    		$return[] = "<option value='".$artist['id']."'>".$artist['artist_name']."</option>";
			endforeach;
			$return = '<select name="artist">'.PHP_EOL.implode($return, PHP_EOL).'</select>';
			return $return;
		}

}

?>