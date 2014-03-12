<html>
<head>
	<meta charset="UTF-8">
	<title>Restaurants</title>
</head>
<body>
<style>
	body{
		padding-left: 50px;
		padding-top: 50px;
	}
</style>
	<h1>Yelp</h1>
	@foreach($restaurants as $restaurant)
		<h3>{{ $restaurant->restaurant_name }}</h3>
		<p>{{ $restaurant->type }}</p>
		<p>{{ $restaurant->city }}</p>
		<p>Facebook Page: 
			@if($restaurant->facebook_page)
			<a href="http://facebook.com/<?php echo $restaurant->facebook_page ?>" style="text-decoration: none; color: blue;">here</a>
			@else
			Not on Facebook
			@endif
		</p>
		<p><a href="<?php echo url("restaurants/$restaurant->id/reviews/$restaurant->facebook_page") ?>" style="text-decoration: none; color: blue;">View Reviews</a></p>
		<hr>
	@endforeach
	
</body>
</html>