<html>
<head>
	<meta charset="UTF-8">
	<title>DVD Title Search</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
</head>
<body>
	<h1>Search Any DVD Title</h1>
<!--
		Instead of using the normal get functionality in the form like this 
		<form method="get" action="results.php"> 
		I decided to use jquery so that we didn't even have to click back to get to the search page again 
-->

        <input class="title" type="text" name="title" placeholder="Enter DVD title...">
        <input class="submit" type="submit" value="Search">
    <br>
        <div class="search"></div>
	
	<br>
	<hr>
	<br>

<div class="container">

</div>


<script>
	function getData(){

		var title = $('input[name="title"]').val();
		$.get('results.php?title='+title, function(data){
			$('div.search').text('You searched for "'+title+'"');
			$('div.container').html(data);

		});
	}

	$('input[name="title"]').keydown(function(){
		if ( event.which == 13 ) {
   			getData();
  		}
	})

	$('input[type="submit"]').click(function(){
		getData();
	});
</script>
</body>
</html>



