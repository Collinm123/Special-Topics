<?php 

Class Review extends Eloquent {

	protected $table = 'reviews';

	public static function search($id)
	{
		$reviews = Review::join('restaurants', 'reviews.restaurant_id', '=', 'restaurants.id')
							->where('reviews.id', '=', "$id")
							->get();
		return $reviews;
	}



}



 ?>