const audio = document.getElementById('audio');
const progress = document.getElementById('progress');

// Update progress bar as song plays
audio.addEventListener('timeupdate', () => {
  const value = (audio.currentTime / audio.duration) * 100;
  progress.value = value;
});

// Seek when progress bar is changed
progress.addEventListener('input', () => {
  const seekTime = (progress.value / 100) * audio.duration;
  audio.currentTime = seekTime;
});

//pause button
const playPauseBtn = document.getElementById("playPauseBtn");
if (audio && playPauseBtn) {
  playPauseBtn.addEventListener("click", () => {
    if (audio.paused) {
      audio.play();
      playPauseBtn.textContent = "⏸ Pause";
    } else {
      audio.pause();
      playPauseBtn.textContent = "▶ Play";
    }
  });

  // Optional: update progress bar
  const progress = document.getElementById("progress");
  audio.addEventListener("timeupdate", () => {
    const percent = (audio.currentTime / audio.duration) * 100;
    progress.value = percent || 0;
  });

  // Optional: make progress bar seekable
  progress.addEventListener("input", () => {
    audio.currentTime = (progress.value / 100) * audio.duration;
  });
}
