<?php 
namespace Yelp\Facebook;

class FacebookPage {

	public function get($id) 
	{
		$endpoint = "https://graph.facebook.com/".$id;
		$json = file_get_contents($endpoint);
		$json = json_decode($json);
		return $json;
	}

}


 ?>