<?php if (Session::has('success')) : ?>
  <p style="color: green;">
    <?php echo Session::get('success') ?>
  </p>
<?php endif; ?>


<!doctype html>
<html>
<head>
  <title>DVD Search</title>
  <link rel="stylesheet" href="<?php echo asset('style/style.css') ?>">
</head>
<body>

<form action="<?php echo url('dvds') ?>" method="post">
  <h1>Add a DVD</h1>
    <div>
      <input type="text" name="title">
    <div>
    Label:
    <select name="label">  
      <?php foreach($labels as $label) : ?>
      <option value="<?php echo $label->id ?>">
        <?php echo $label->label_name ?>
      </option>
    <?php endforeach; ?>
    </select>
  </div>
    <div>
    Sound:
    <select name="sound">  
      <?php foreach($sounds as $sound) : ?>
      <option value="<?php echo $sound->id ?>">
        <?php echo $sound->sound_name ?>
      </option>
    <?php endforeach; ?>
    </select>
  </div>
  <div>
    Genre:
    <select name="genre">  
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
      <?php foreach($ratings as $rating) : ?>
      <option value="<?php echo $rating->id ?>">
        <?php echo $rating->rating_name ?>
      </option>
    <?php endforeach; ?>
    </select>
  </div>
    <div>
    Format:
    <select name="format">  
      <?php foreach($formats as $format) : ?>
      <option value="<?php echo $format->id ?>">
        <?php echo $format->format_name ?>
      </option>
    <?php endforeach; ?>
    </select>
  </div>
  <div>
    <input type="submit" value="Add DVD" />
  </div>
</form>
<a rel="stylesheet" href="<?php echo url('dvds/search') ?>" style="text-decoration: none; color: blue;">Search DVDs</a>

</body>
</html>