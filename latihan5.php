<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 5 - GET</title><link rel="stylesheet" href="style.css"></head>
<body>
<nav><a href="index.php">&larr; Menu</a></nav>
<h2>Latihan 5 - Form GET</h2>
<form method="GET" action="">
    <label for="kata">Kata kunci:</label>
    <input id="kata" name="kata" type="text">
    <button type="submit">Cari</button>
</form>
<?php
if (isset($_GET["kata"])) {
    $kata = trim($_GET["kata"]);
    echo "<p>Kata kunci: " . htmlspecialchars($kata, ENT_QUOTES, "UTF-8") . "</p>";
}
?>
<p><small>Perhatikan URL berubah menjadi <code>?kata=...</code>. Jangan gunakan GET untuk kata sandi atau data sensitif.</small></p>
</body>
</html>