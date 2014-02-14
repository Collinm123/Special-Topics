<?php
$host = 'itp460.usc.edu';
$dbname = 'dvd';
$user = 'student';
$pass = 'ttrojan';

$title = $_GET['title'];

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$sql = "
	SELECT dvd_titles.id AS id, title, rating, genre, format
	FROM dvd_titles
	INNER JOIN ratings ON dvd_titles.rating_id = ratings.id
	INNER JOIN genres ON dvd_titles.genre_id = genres.id
	INNER JOIN formats ON dvd_titles.format_id = formats.id
  	WHERE title LIKE ?
  	ORDER BY title ASC
";

$statement = $pdo->prepare($sql);

$like = '%'.$title.'%';
$statement->bindParam(1, $like);

$statement->execute();
$dvds = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<?php if($dvds) : ?>
<table class="results" border="1">
  <colgroup span="4" class="columns"></colgroup>
  <tr>
    <th>Title</th>
		<th>Rating</th>
		<th>Genre</th>
		<th>Format</th>
  </tr>
<?php foreach($dvds as $dvd) : ?>
		<?php 
		 $format = $dvd->format === 'test' ? 'N/A' : $dvd->format ?>
		<tr>
		<td class="bodyCell" colspan="1" rowspan="1"><?php echo $dvd->title?></td>
		<td class="bodyCell" colspan="1" rowspan="1"><?php echo $dvd->rating?></td>
		<td class="bodyCell" colspan="1" rowspan="1"><?php echo $dvd->genre?></td>
		<td class="bodyCell" colspan="1" rowspan="1"><?php echo $format?></td>
		</tr>
<?php endforeach; ?>
</table>
<?php else : ?>
	<div class="noResults">Sorry, there are no results for that DVD Title.</div>

<?php endif; ?>



