<!doctype html>
<html>
<head>
  <title>DVD Search</title>
  <link rel="stylesheet" href="<?php echo asset('style/style.css') ?>">
</head>
<body>

<form method="get" action="/dvds/list">
  <h1>DVD Search</h1>
  <div>
    DVD Title:
    <input type="text" name="title" />
  </div>
  <div>
    Genre:
    <select name="genre">  
      <option value="">All</option>
      <?php foreach($genres as $genre) : ?>
      <option value="<?php echo $genre->id ?>">
        <?php echo $genre->genre_name ?>
      </option>
    <?php endforeach; ?>
    </select>

  </div>
  <div>
    Rating:
    <select name="rating">  
      <option value="">All</option>
      <?php foreach($ratings as $rating) : ?>
      <option value="<?php echo $rating->id ?>">
        <?php echo $rating->rating_name ?>
      </option>
    <?php endforeach; ?>
    </select>
  </div>
  <div>
    <input type="submit" value="Search" />
  </div>
</form>
<a rel="stylesheet" href="<?php echo url('dvds/create') ?>" style="text-decoration: none; color: blue;">Add DVD</a>

</body>
</html>