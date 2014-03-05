<?php 
namespace custom\api;

class FacebookSearch {

	public function getResults($id, $query, $access_token) 
	{
		$endpoint = "https://graph.facebook.com/".$id."/?fields=".$query."&access_token=".$access_token;
		$json = file_get_contents($endpoint);
		$json = json_decode($json);
		return $json;
	}

}


 ?>