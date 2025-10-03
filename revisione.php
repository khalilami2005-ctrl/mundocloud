<?php
$pendingDir = "uploads/pending/";
$publicDir = "immagini/";
$rejectedDir = "uploads/rifiutate/";

if (isset($_GET['action']) && isset($_GET['file'])) {
    $file = basename($_GET['file']);
    $src = $pendingDir . $file;
    if ($_GET['action'] === 'approve') {
        rename($src, $publicDir . $file);
    } elseif ($_GET['action'] === 'reject') {
        if (!is_dir($rejectedDir)) mkdir($rejectedDir, 0777, true);
        rename($src, $rejectedDir . $file);
    }
    header("Location: revisione.php");
    exit;
} elseif (isset($_GET['delete']) && isset($_GET['img'])) {
    $toDelete = $publicDir . basename($_GET['img']);
    if (file_exists($toDelete)) {
        unlink($toDelete);
    }
    header("Location: revisione.php");
    exit;
}

$pendingImages = glob($pendingDir . "*.{jpg,jpeg,png}", GLOB_BRACE);
$publicImages = glob($publicDir . "*.{jpg,jpeg,png}", GLOB_BRACE);
?>
<h2>Foto in attesa di approvazione</h2>
<?php if (count($pendingImages) === 0): ?>
  <p>Nessuna foto in attesa.</p>
<?php endif; ?>
<div style="display: flex; flex-wrap: wrap; gap: 20px;">
<?php foreach ($pendingImages as $img): $filename = basename($img); ?>
  <div style="text-align: center;">
    <img src="<?= $img ?>" width="150" style="border-radius: 8px;"><br>
    <a href="?action=approve&file=<?= $filename ?>" style="color: green;">✅ Approva</a> |
    <a href="?action=reject&file=<?= $filename ?>" style="color: red;">❌ Rifiuta</a>
  </div>
<?php endforeach; ?>
</div>

<h2>Foto pubblicate</h2>
<?php if (count($publicImages) === 0): ?>
  <p>Nessuna foto pubblicata.</p>
<?php endif; ?>
<div style="display: flex; flex-wrap: wrap; gap: 20px;">
<?php foreach ($publicImages as $img): $filename = basename($img); ?>
  <div style="text-align: center;">
    <img src="<?= $img ?>" width="150" style="border-radius: 8px;"><br>
    <a href="?delete=1&img=<?= $filename ?>" style="color: red;">🗑 Elimina</a>
  </div>
<?php endforeach; ?>
</div>
