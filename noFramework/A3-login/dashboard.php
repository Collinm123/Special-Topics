<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/Db.php';

use \Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\HttpFoundation\Session\Session;
use Carbon\Carbon;


$session = new Session();
$username = $session->get('username');

if(!$username){
	$session->getFlashBag()->add('statusMessage', 'You must login to access that page!');
	$response = new RedirectResponse('login.php');
	return $response->send(); 
}


$songQuery = new Classes\Songs\SongQuery($pdo);
$songs = $songQuery
			->withArtist()
			->withGenre()
			->orderBy('title')
			->all();



?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<h2>Dashboard</h2>
	<?php
	$session->getFlashBag()->add('statusMessage', 'Welcome '.$username.', you have successfully logged in!');
	foreach ($session->getFlashBag()->get('statusMessage', array()) as $message) {
    	echo '<div class="flash-notice">'.$message.'</div>';
	}

	$loginTime = $session->get('loginTime');
	echo 'Last Login: '.$loginTime->diffForHumans();
	?>
	<br>
	<hr>
	<form action="logout.php">
		<input type="submit" value="Logout"></input>
	</form>
	
	<table class="results" border="1">
	  <colgroup span="4" class="columns"></colgroup>
	  <tr>
	    	<th>Title</th>
			<th>Artist</th>
			<th>Genre</th>
			<th>Price</th>
	  </tr>
	<?php foreach($songs as $song) : ?>
			<tr>
			<td class="bodyCell" colspan="1" rowspan="1"><?php echo $song->title?></td>
			<td class="bodyCell" colspan="1" rowspan="1"><?php echo $song->artist_name?></td>
			<td class="bodyCell" colspan="1" rowspan="1"><?php echo $song->genre?></td>
			<td class="bodyCell" colspan="1" rowspan="1"><?php echo $song->price?></td>
			</tr>
	<?php endforeach; ?>
	</table>
	
</body>
</html>