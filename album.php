<?php
// Simulated albums array (same as before)
$albums = [
    1 => ["title" => "Synthwave Dreams", "link" => "synthwave"],
    2 => ["title" => "Electric Horizon", "link" => "album-electric"],
    3 => ["title" => "Chill Sessions", "link" => "lofi"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Albums - BeatVibe</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-700 via-pink-600 to-yellow-500 text-white min-h-screen font-sans">

<!-- Navbar -->
<div class="flex justify-between items-center p-4">
  <h1 class="text-3xl font-bold text-yellow-300">🎵 BeatVibe</h1>
  <div>
    <a href="index.php" class="text-yellow-300 hover:underline ml-4">Back to Home</a>
  </div>
</div>

<!-- Album List -->
<div class="max-w-3xl mx-auto p-6 space-y-6">
  <h2 class="text-4xl font-bold text-center text-yellow-300 mb-6">Explore Albums</h2>
  
  <ul class="space-y-4">
    <?php foreach ($albums as $id => $album): ?>
      <li class="bg-black/40 backdrop-blur-md p-6 rounded-xl shadow-md flex justify-between items-center">
        <span class="text-xl font-semibold"><?= $album['title'] ?></span>
        <a href="<?= $album['link'] ?>.php" class="bg-yellow-300 text-black px-4 py-2 rounded hover:bg-yellow-200 transition">View</a>
    </li>
    <?php endforeach; ?>
  </ul>
</div>

</body>
</html>
