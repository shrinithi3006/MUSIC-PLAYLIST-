<?php
// Get the clicked song if any
$selectedSong = isset($_GET['play']) ? $_GET['play'] : null;

// Whitelist of songs (for safety)
$songs = [
  "Naa ready" => ["file" => "songs/naaready.mp3", "image" => "images/naaready.jpg"],
  "Nee Singam Thaan" => ["file" => "songs/nsd.mp3", "image" => "images/nsd.jpeg"],
  "Vaathi coming" => ["file" => "songs/vaathicoming.mp3", "image" => "images/vaathicoming.jpg"],
  "Vikram" => ["file" => "songs/vikram.mp3", "image" => "images/vikram.jpg"],
  "Naatu Naatu" => ["file" => "songs/naatunaatu.mp3", "image" => "images/naatunaatu.jpeg"]
];

// Get song path from GET value if valid
$currentTrack = null;
foreach ($songs as $title => $data) {
  if ($data['file'] === $selectedSong) {
    $currentTrack = ["title" => $title, "file" => $data['file'], "image" => $data['image']];
    break;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Electric Horizon - Echo Pulse</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gradient-to-br from-purple-700 via-pink-600 to-yellow-500 text-white min-h-screen font-sans">
  <header class="bg-black/30 backdrop-blur-md shadow-md px-6 py-4 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-yellow-300">🎵 BeatVibe</h1>
    <nav class="space-x-6 text-white font-medium">
      <a href="index.php" class="hover:text-yellow-300 transition">Home</a>
      <a href="album.php" class="hover:text-yellow-300 transition">Albums</a>
    </nav>
  </header>

  <h1 class="text-5xl font-bold text-cyan-400 mb-8 drop-shadow-md text-center mt-10" id="alname">🎧 Electric Horizon</h1>

  <!-- Songs List -->
  <ul class="space-y-4 max-w-md mx-auto">
    <?php foreach ($songs as $title => $data): ?>
      <li class="bg-white/10 p-4 rounded-xl flex justify-between items-center">
        <span class="text-lg font-medium"><?= $title ?></span>
        <a href="?play=<?= urlencode($data['file']) ?>" class="bg-pink-300 text-black px-4 py-1 rounded hover:bg-pink-700 transition">▶️ Play</a>
      </li>
    <?php endforeach; ?>
  </ul>

  <!-- Audio Player -->
  <?php if ($currentTrack): ?>
    <div class="mt-10 max-w-md mx-auto bg-white/10 p-4 rounded-xl">
      <p class="mb-2 text-lg">Now Playing: <span class="font-bold"><?= htmlspecialchars($currentTrack['title']) ?></span></p>
      <img src="<?= htmlspecialchars($currentTrack['image']) ?>" alt="<?= $currentTrack['title'] ?>" class="w-full rounded mb-4 shadow-md" id="cover">
      <audio controls autoplay class="w-0" id="audio">
        <source src="<?= htmlspecialchars($currentTrack['file']) ?>" type="audio/mpeg">
        Your browser does not support the audio element.
      </audio>
      <button id="playPauseBtn" class="mt-4 bg-white-500 text-white px-4 py-2 rounded hover:bg-pink-700 transition bg-white/25">
        ⏸ Pause</button>

      <input type="range" id="progress" value="0" min="0" max="100" class="w-full h-2 rounded-full appearance-none">
    </div>
  <?php endif; ?>

  <script src="style.js"></script>
</body>
</html>
