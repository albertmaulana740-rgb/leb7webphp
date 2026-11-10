<?php
// ===== Eksperimen Mandiri =====

// 3. Function format Rupiah
function rupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}

// 1. Rata-rata tiga komponen nilai
function rataRata(array $nilai) {
    return array_sum($nilai) / count($nilai);
}
$tugas = 85; $uts = 78; $uas = 90;
$rata = rataRata([$tugas, $uts, $uas]);

// 2. Pencarian nama dari array (GET)
$daftarNama = ["Alya", "Bima", "Citra", "Doni", "Eka", "Fajar", "Gita", "Bimo"];
$kata  = trim($_GET["kata"] ?? "");
$hasil = [];
if ($kata !== "") {
    foreach ($daftarNama as $n) {
        if (stripos($n, $kata) !== false) {
            $hasil[] = $n;
        }
    }
}

// 4. Validasi NIM (angka saja, 8-12 digit) via POST
$pesanNim = "";
$nimVal = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nimVal = trim($_POST["nim"] ?? "");
    if (!ctype_digit($nimVal)) {
        $pesanNim = "NIM hanya boleh berisi angka.";
    } elseif (strlen($nimVal) < 8 || strlen($nimVal) > 12) {
        $pesanNim = "Panjang NIM harus 8-12 digit.";
    } else {
        $pesanNim = "NIM valid.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Eksperimen Mandiri</title><link rel="stylesheet" href="style.css"></head>
<body>
<nav><a href="index.php">&larr; Menu</a></nav>
<h2>Eksperimen Mandiri</h2>

<h3>1. Rata-rata nilai</h3>
<p>Tugas <?= $tugas ?>, UTS <?= $uts ?>, UAS <?= $uas ?> &rarr; rata-rata <strong><?= number_format($rata, 2) ?></strong></p>

<h3>2. Cari nama (GET)</h3>
<form method="GET">
    <input name="kata" value="<?= htmlspecialchars($kata, ENT_QUOTES, 'UTF-8') ?>" placeholder="Cari nama...">
    <button type="submit">Cari</button>
</form>
<?php if ($kata !== ""): ?>
    <?php if ($hasil): ?>
        <p>Ditemukan: <?= htmlspecialchars(implode(", ", $hasil), ENT_QUOTES, "UTF-8") ?></p>
    <?php else: ?>
        <p class="error">Nama tidak ditemukan.</p>
    <?php endif; ?>
<?php endif; ?>

<h3>3. Format Rupiah</h3>
<p><?= rupiah(150000) ?> | <?= rupiah(2500000) ?> | <?= rupiah(999) ?></p>

<h3>4 &amp; 5. Validasi NIM dan tombol reset</h3>
<form method="POST">
    <label for="nim">NIM</label>
    <input id="nim" name="nim" value="<?= htmlspecialchars($nimVal, ENT_QUOTES, 'UTF-8') ?>">
    <button type="submit">Cek NIM</button>
    <button type="reset">Reset</button>
</form>
<?php if ($pesanNim !== ""): ?>
    <p class="<?= $pesanNim === 'NIM valid.' ? 'sukses' : 'error' ?>"><?= htmlspecialchars($pesanNim) ?></p>
<?php endif; ?>
<p><small><strong>Reset</strong> hanya mengosongkan isian form di browser (client-side) tanpa mengirim apa pun ke server.
Sedangkan <strong>Cek NIM / refresh setelah submit</strong> mengirim ulang data ke server sehingga PHP memproses ulang
dan nilai yang dikirim bisa tampil kembali.</small></p>
</body>
</html>