<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Galleria Video</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1 class="gradient-text">Video di Famiglia</h1>
  <div class="gallery">
    <?php
    $videoDir = "video";
    $thumbDir = "thumbnails";
    if (!is_dir($thumbDir)) {
      mkdir($thumbDir, 0777, true);
    }
    $videos = glob($videoDir . "/*.mp4");
    foreach ($videos as $video) {
      $basename = pathinfo($video, PATHINFO_FILENAME);
      // Genera un elemento img vuoto con data-video-src
  echo "<img class='video-thumb' data-video-src='$video' alt='Anteprima Video' style='width:220px;height:124px;object-fit:cover;cursor:pointer;border-radius:8px;box-shadow:0 4px 8px rgba(0,0,0,0.2);margin:24px 24px 32px 24px;background:#222;display:inline-block;' onclick=\"playVideo('$video')\">";
    }
    ?>
  </div>
  <div id="videoModal" style="display:none;position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(0,0,0,0.85);align-items:center;justify-content:center;">
    <span onclick="closeVideo()" style="position:absolute;top:20px;right:35px;color:#fff;font-size:40px;font-weight:bold;cursor:pointer;">&times;</span>
    <video id="modalVideo" controls style="max-width:90vw;max-height:90vh;border-radius:12px;box-shadow:0 4px 16px #000;"></video>
  </div>
  <a href="index.php" class="back-button" style="display:inline-block;margin:32px auto 0 auto;padding:10px 24px;background:#ccc;border-radius:6px;color:black;font-weight:bold;text-decoration:none;">⬅ Torna al Menu</a>
  <script>
    // Genera le miniature lato client
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.video-thumb').forEach(function(img) {
        var videoSrc = img.getAttribute('data-video-src');
        var video = document.createElement('video');
        video.src = videoSrc;
        video.preload = 'metadata';
        video.muted = true;
        let timeout = setTimeout(function() {
          img.style.background = '#444';
          video.remove();
        }, 5000); // fallback dopo 5 secondi
        video.addEventListener('loadedmetadata', function() {
          // Prova a prendere il frame a 1 secondo, ma se il video è più corto, prendi a metà
          let seekTime = video.duration > 2 ? 1 : video.duration / 2;
          video.currentTime = seekTime;
        });
        video.addEventListener('seeked', function() {
          try {
            var canvas = document.createElement('canvas');
            canvas.width = 220;
            canvas.height = 124;
            var ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            img.src = canvas.toDataURL('image/jpeg');
          } catch (e) {
            img.style.background = '#444';
          }
          clearTimeout(timeout);
          video.remove();
        });
        video.addEventListener('error', function() {
          img.style.background = '#444';
          clearTimeout(timeout);
          video.remove();
        });
      });
    });
    function playVideo(src) {
      var modal = document.getElementById('videoModal');
      var video = document.getElementById('modalVideo');
      video.src = src;
      modal.style.display = 'flex';
      video.play();
    }
    function closeVideo() {
      var modal = document.getElementById('videoModal');
      var video = document.getElementById('modalVideo');
      video.pause();
      video.src = '';
      modal.style.display = 'none';
    }
    window.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') closeVideo();
    });
  </script>
</body>
</html>
