<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title>Carica Contenuto</title>
  <link rel="stylesheet" href="style.css">
  <style>
    form {
      background: #ffffffaa;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
      margin-top: 40px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    input[type="file"] {
      margin: 10px 0;
    }
    button {
      background: linear-gradient(60deg, #42a5f5, #66bb6a);
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      color: white;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
    }
    button:hover {
      background: linear-gradient(60deg, #1e88e5, #43a047);
    }
    .message {
      margin-top: 20px;
      font-weight: bold;
      color: green;
    }
    .back-button {
      margin-top: 20px;
      display: inline-block;
      text-decoration: none;
      padding: 10px 20px;
      background: #ccc;
      border-radius: 6px;
      color: black;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <h1 class="gradient-text">Carica una Foto</h1>
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {
      $file = $_FILES['foto'];
      $targetDir = 'uploads/pending/';
      if (!is_dir($targetDir)) {
          mkdir($targetDir, 0777, true);
      }
      $fileName = basename($file['name']);
      $targetFile = $targetDir . $fileName;

      if (move_uploaded_file($file['tmp_name'], $targetFile)) {
          echo "<p class='message'>✅ Foto caricata. In attesa di approvazione.</p>";
      } else {
          echo "<p class='message' style='color:red;'>❌ Errore nel caricamento.</p>";
      }
  }
  ?>
  <form method="POST" enctype="multipart/form-data">
    <label for="foto"><strong>Seleziona una foto da caricare:</strong></label>
    <input type="file" name="foto" accept="image/*" required>
    <button type="submit">Carica Foto</button>
  </form>
  <a href="index.php" class="back-button">⬅ Torna al Menu</a>
</body>
</html>
