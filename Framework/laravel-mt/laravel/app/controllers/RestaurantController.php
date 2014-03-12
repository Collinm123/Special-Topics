<?php

Class RestaurantController extends BaseController {

	public function getAll()
	{
		$restaurants = Restaurant::all();
		return View::make('yelp/restaurants', [
			'restaurants' => $restaurants
			]);
	}

	public function getReview($id, $fb_id)
	{

		$fbpage = new \Yelp\Facebook\FacebookPage();
		$fbpage = $fbpage->get($fb_id);
		$reviews = Review::search($id);
		return View::make('yelp/reviews', [
			'reviews' => $reviews,
			'likes' => $fbpage->likes,
      		'checkins' => $fbpage->checkins
			]);
	}

}