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

	public function logout()
	{
		Session::flush();
		Cache::forget('facebook-friends');
		Cache::forget('facebook-feed');
		return Redirect::to('/');


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

	public function searchFriends()
	{
		
		$access_token = Session::get('access_token');
		$friendsCache = Cache::has('facebook-friends');

		//Get necessary variables for Facebook API
		$name = Session::get('name');

		$photo = Session::get('photo');

		$id = Session::get('id');

		$query = 'friends.limit(100).fields(picture,name)';

		if($access_token){

			if(!$friendsCache){

				//Retrieve the facebook feed with the variables above
				$object = new \custom\api\FacebookSearch();
				$feed = $object->getResults($id, $query, $access_token);


				//Cache the friends since we didn't already have them
				Cache::put('facebook-friends', $feed, 1);

				//Build the view
				return View::make('/api/fbSearchFriends', [
					'name' => $name,
					'photo' => $photo,
					'results' => $feed->friends->data
				]);

			}else{

				//Get the friends from the cache
				$feed = Cache::get('facebook-friends');
				
				//Build the view
				return View::make('/api/fbSearchFriends', [
					'name' => $name,
					'photo' => $photo,
					'results' => $feed->friends->data
				]);
			}

		}else{
			return Redirect::to('/')->with('message', 'You need to log in with Facebook before you can view that page.');
		}

	}

	public function searchFeed()
	{

		$access_token = Session::get('access_token');


		$fbCache = Cache::has('facebook-feed');

		//Get necessary variables for Facebook API and retrieve the feed
		$name = Session::get('name');

		$photo = Session::get('photo');

		$id = Session::get('id');

		$query = 'home.limit(50)';

		if($access_token){

			if(!$fbCache){

				//Retrieve the facebook feed with the variables above
				$object = new \custom\api\FacebookSearch();
				$feed = $object->getResults($id, $query, $access_token);


				//Cache facebook results and create the page
				Cache::put('facebook-feed', $feed, 1);

				//Build the view
				return View::make('/api/fbSearchFeed', [
					'name' => $name,
					'photo' => $photo,
					'results' => $feed->home->data,
				]);

			}else{
				//If we have the cache for the posts and the facebook feed, we just build it from that
				$feed = Cache::get('facebook-feed');

				//Build the view
				return View::make('/api/fbSearchFeed', [
					'name' => $name,
					'photo' => $photo,
					'results' => $feed->home->data,
				]);
			}
		}else{
			return Redirect::to('/')->with('message', 'You need to log in with Facebook before you can view that page.');
		}

	}



}





