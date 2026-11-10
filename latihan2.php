<?php
// Latihan 2 - Variabel, operator, dan percabangan
$nama  = "Siti";
$tugas = 85;
$uts   = 78;
$uas   = 90;

$nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);

if ($nilaiAkhir >= 85) {
    $predikat = "A";
} elseif ($nilaiAkhir >= 75) {
    $predikat = "B";
} elseif ($nilaiAkhir >= 60) {
    $predikat = "C";
} else {
    $predikat = "D";
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 2</title><link rel="stylesheet" href="style.css"></head>
<body>
<nav><a href="index.php">&larr; Menu</a></nav>
<h2>Latihan 2 - Nilai Akhir</h2>
<?php
echo "Nama: " . htmlspecialchars($nama) . "<br>";
echo "Tugas: $tugas | UTS: $uts | UAS: $uas<br>";
echo "Nilai akhir: " . number_format($nilaiAkhir, 2) . "<br>";
echo "Predikat: " . $predikat;
?>
</body>
</html>