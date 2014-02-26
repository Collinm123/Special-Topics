<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>DVD Search Results</title>
	<link rel="stylesheet" href="<?php echo asset('style/style.css') ?>">
	
</head>
<body>

	<h2>DVD Search Results</h2>
	<a href="<?php echo url('dvds/search') ?>" style="text-decoration: none; color: black;">Back to Search</a>
	
	<table class="results" border="1">
	  <colgroup span="4" class="columns"></colgroup>
	  <tr>
	    	<th>Title</th>
			<th>Rating</th>
			<th>Genre</th>
			<th>Label</th>
			<th>Sound</th>
			<th>Format</th>
			<th>Release Date</th>
	  </tr>
	<?php foreach($dvds as $dvd) : ?>
			<tr>
			<td class="bodyCell" colspan="1" rowspan="1"><?php echo $dvd->title?></td>
			<td class="bodyCell" colspan="1" rowspan="1"><?php echo $dvd->rating_name?></td>
			<td class="bodyCell" colspan="1" rowspan="1"><a href="<?php echo url("genre/$dvd->genre_id/dvds") ?>" style="text-decoration: none; color: blue;"><?php echo $dvd->genre_name?></a></td>
			<td class="bodyCell" colspan="1" rowspan="1"><?php echo $dvd->label_name?></td>
			<td class="bodyCell" colspan="1" rowspan="1"><?php echo $dvd->sound_name?></td>
			<td class="bodyCell" colspan="1" rowspan="1"><?php echo $dvd->format_name?></td>
			<td class="bodyCell" colspan="1" rowspan="1"><?php echo $dvd->release_date?></td>
			</tr>
	<?php endforeach; ?>
	</table>
	
</body>
</html>