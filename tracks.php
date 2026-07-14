<?php
$album = htmlspecialchars($_GET['album'] ?? 'Unknown Album');
$title = htmlspecialchars($_GET['title'] ?? 'Unknown Track');
$file = htmlspecialchars($_GET['file'] ?? '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $title; ?> - <?php echo $album; ?></title>
</head>
<body style="font-family: sans-serif; background: #111; color: white; text-align: center;">
  <h1><?php echo $title; ?></h1>
  <h3>Album: <?php echo $album; ?></h3>

  <audio controls autoplay>
    <source src="assets/audio/<?php echo $file; ?>" type="audio/mpeg">
    Your browser does not support the audio element.
  </audio>

  <br><br>
  <a href="album-<?php echo strtolower($album); ?>.php" style="color: yellow;">Back to <?php echo $album; ?> Album</a>
</body>
</html>