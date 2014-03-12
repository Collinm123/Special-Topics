<html>
<head>
	<meta charset="UTF-8">
	<title>Reviews</title>
</head>
<body>
<style>
	body{
		padding-left: 50px;
		padding-top: 50px;
	}
	.star{
		display:inline-block;
		width: 22px;
		height: 12px;
	}
</style>
	<h1>Yelp</h1>
	

	@foreach($reviews as $review)
		<p>Reviews for {{ $review->restaurant_name }}</p>
		<p>Facebook Activity</p>
			<ul>
				<li>Likes: {{ $likes }}</li>
				<li>Checkins: {{ $checkins }}</li>
			</ul>
		<hr>
		@if($review->rating === 5)
		<img class="star" src="<?php echo asset('star.jpg') ?>" alt="Star">
		<img class="star" src="<?php echo asset('star.jpg') ?>" alt="Star">
		<img class="star" src="<?php echo asset('star.jpg') ?>" alt="Star">
		<img class="star" src="<?php echo asset('star.jpg') ?>" alt="Star">
		<img class="star" src="<?php echo asset('star.jpg') ?>" alt="Star">
		@elseif($review->rating === 4)
		<img class="star" src="<?php echo asset('star.jpg') ?>" alt="Star">
		<img class="star" src="<?php echo asset('star.jpg') ?>" alt="Star">
		<img class="star" src="<?php echo asset('star.jpg') ?>" alt="Star">
		<img class="star" src="<?php echo asset('star.jpg') ?>" alt="Star">
		@elseif($review->rating === 3)
		<img class="star" src="<?php echo asset('star.jpg') ?>" alt="Star">
		<img class="star" src="<?php echo asset('star.jpg') ?>" alt="Star">
		<img class="star" src="<?php echo asset('star.jpg') ?>" alt="Star">
		@endif
		<p>{{ $review->review_description }}</p>
		<hr>
	@endforeach
	
</body>
</html>