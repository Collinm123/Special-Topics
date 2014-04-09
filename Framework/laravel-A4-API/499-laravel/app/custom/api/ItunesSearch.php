<?php 

namespace custom\api;

class ItunesSearch {

	public function getResults() 
	{
		$endpoint = "https://itunes.apple.com/search?term=jack+johnson";
		$json = file_get_contents($endpoint);
		$json = json_decode($json);
		return $json;
	}

}


 ?>