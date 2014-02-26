<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>DVD Search Results</title>
	<link rel="stylesheet" href="<?php echo asset('style/style.css') ?>">
	
</head>
<body>

	<h2>All DVD's with Specific Genre</h2>
	<a href="<?php echo url('dvds/search') ?>" style="text-decoration: none; color: black;">Back to Search</a>
	
	<table class="results" border="1">
	  <colgroup span="4" class="columns"></colgroup>
	  <tr>
	    	<th>Title</th>
			<th>Release Date</th>
	  </tr>
	<?php foreach($dvds as $dvd) : ?>
			<tr>
			<td class="bodyCell" colspan="1" rowspan="1"><?php echo $dvd->title?></td>
			<td class="bodyCell" colspan="1" rowspan="1"><?php echo $dvd->release_date?></td>
			</tr>
	<?php endforeach; ?>
	</table>
	
</body>
</html>