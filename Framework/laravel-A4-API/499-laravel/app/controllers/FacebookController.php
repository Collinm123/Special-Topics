<?php

class FacebookController extends BaseController{


	public function login()
	{
		$facebook = new Facebook(Config::get('facebook'));
	    $params = array(
	        'redirect_uri' => url('login/fb/callback'),
	        'scope' => 'email, read_stream'
	    );
	    return Redirect::to($facebook->getLoginUrl($params));
	}

	public function callback()
	{
		$code = Input::get('code');
	    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');
	    
	    $facebook = new Facebook(Config::get('facebook'));
	    $uid = $facebook->getUser();
	     
	    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');
	     
	    $me = $facebook->api('/me');
    	$name = $me['first_name'].' '.$me['last_name'];
    	$email = $me['email'];
    	$photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';
		$access_token = $facebook->getAccessToken();
		$id = $facebook->getUser();
		Session::put('name', $name);
		Session::put('email', $email);
		Session::put('photo', $photo);
		Session::put('access_token', $access_token);
		Session::put('id', $id);
	    if($access_token) {
	    	return Redirect::to('/')->with('message', 'Logged In With Facebook');
	    	
	    }
	    
	}

	public function makeSearch()
	{
		$name = Session::get('name');
		$photo = Session::get('photo');
		return View::make('/api/fbSearchQuery', [
		'name' => $name,
		'photo' => $photo
		]);
	}

	public function search()
	{
		$name = Session::get('name');
		$photo = Session::get('photo');
		$id = Session::get('id');
		$query = Input::get('query');
		if($query === 'friends'){
			$query = 'friends.limit(100).fields(name,picture)';
		}else if ($query === 'home'){
			$query = 'home.limit(100)';
		}
		$access_token = Session::get('access_token');
		$object = new \custom\api\FacebookSearch();
		$results = $object->getResults($id, $query, $access_token);
		//dd($results);
		if($query === 'home.limit(100)'){
			return View::make('/api/fbSearchQuery', [
			'name' => $name,
			'photo' => $photo,
			'feed' => $results->home->data
			]);
		}else{
			return View::make('/api/fbSearchQuery', [
			'name' => $name,
			'photo' => $photo,
			'friends' => $results->friends->data
			]);
		}

	}

	public function searchFriends()
	{
		$access_token = Session::get('access_token');
		$json = Cache::get('facebook-friends');
		if($access_token && !$json){
			$name = Session::get('name');
			$photo = Session::get('photo');
			$id = Session::get('id');
			$query = 'friends.limit(100).fields(picture,name)';
			$object = new \custom\api\FacebookSearch();
			$results = $object->getResults($id, $query, $access_token);
			//dd($results);
			Cache::put('facebook-friends', $json, 10);
			return View::make('/api/fbSearchFriends', [
				'name' => $name,
				'photo' => $photo,
				'results' => $results->friends->data
			]);
		}else{
			return Redirect::to('/')->with('message', 'You need to log in with Facebook before you can view that page.');
		}

	}

	public function searchFeed()
	{
		$access_token = Session::get('access_token');
		$json = Cache::get('facebook-feed');
		if($access_token && !$json){
			$name = Session::get('name');
			$photo = Session::get('photo');
			$id = Session::get('id');
			$query = 'home.limit(50)';
			$access_token = Session::get('access_token');
			$object = new \custom\api\FacebookSearch();
			$results = $object->getResults($id, $query, $access_token);
			//dd($results);
			Cache::put('facebook-feed', $json, 10);
			return View::make('/api/fbSearchFeed', [
				'name' => $name,
				'photo' => $photo,
				'results' => $results->home->data
			]);
		}else{
			return Redirect::to('/')->with('message', 'You need to log in with Facebook before you can view that page.');
		}

	}
}