
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Galleria Foto</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: 16px;
      padding: 20px;
      justify-items: center;
      width: 90%;
      max-width: 1000px;
    }

    .gallery img {
      width: 150px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      transition: transform 0.3s, box-shadow 0.3s;
      cursor: pointer;
    }

    .gallery img:hover {
      transform: scale(1.05);
      box-shadow: 0 6px 12px rgba(0,0,0,0.3);
    }

    .year-divider {
      width: 100%;
      margin: 40px 0 10px;
      font-size: 24px;
      font-weight: bold;
      color: #333;
      border-bottom: 2px solid #ccc;
      text-align: center;
    }

    /* Modal stile */
    .modal {
      display: none;
      position: fixed;
      z-index: 9999;
      padding-top: 60px;
      left: 0; top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.85);
    }

    .modal-content {
      margin: auto;
      display: block;
      max-width: 90%;
      max-height: 90%;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(255,255,255,0.4);
      animation: zoom 0.3s ease-in-out;
    }

    @keyframes zoom {
      from {transform: scale(0.7);}
      to {transform: scale(1);}
    }

    .modal-close {
      position: absolute;
      top: 20px;
      right: 35px;
      color: #fff;
      font-size: 40px;
      font-weight: bold;
      cursor: pointer;
    }

    .modal-close:hover {
      color: #f00;
    }
  </style>
</head>
<body>
  <h1 class="gradient-text">Galleria Foto</h1>
  <a href="index.php" class="back-button" style="display:inline-block;margin:24px auto 32px auto;padding:10px 24px;background:#ccc;border-radius:6px;color:black;font-weight:bold;text-decoration:none;">⬅ Torna al Menu</a>

  <div class="gallery">
    <?php
    $directory = "immagini";
    $images = glob($directory . "/*.{jpg,jpeg,png}", GLOB_BRACE);

    $sorted = [];

    foreach ($images as $img) {
      $year = date("Y", filemtime($img));
      $sorted[$year][] = $img;
    }

    krsort($sorted); // Anni in ordine decrescente (dal più recente)

    foreach ($sorted as $year => $imgs) {
      echo "<div class='year-divider'>$year</div>";
      foreach ($imgs as $img) {
        echo "<img src='$img' alt='Foto' onclick='openModal(this.src)'>";
      }
    }
    ?>
  </div>

  <!-- Modal per ingrandimento -->
  <div id="modal" class="modal" onclick="closeModal()">
    <span class="modal-close">&times;</span>
    <img class="modal-content" id="modal-img">
  </div>

  <script>
    function openModal(src) {
      document.getElementById("modal").style.display = "block";
      document.getElementById("modal-img").src = src;
    }

    function closeModal() {
      document.getElementById("modal").style.display = "none";
    }

    // Chiudi anche con ESC
    window.addEventListener("keydown", function(e) {
      if (e.key === "Escape") closeModal();
    });
  </script>
</body>
</html>
