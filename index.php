<?php 
session_start();
if (!isset($_SESSION['login'])) { header("Location: /login"); exit; }
include 'db.php'; 

// Proses Simpan Data
if(isset($_POST['simpan'])) {
    $id_siswa = $_POST['id_siswa'];
    $tipe = $_POST['tipe'];
    $jumlah = $_POST['jumlah'];
    $ket = $_POST['keterangan'];

    $stmt = $pdo->prepare("INSERT INTO transaksi (id_siswa, tipe, jumlah, keterangan) VALUES (?, ?, ?, ?)");
    $stmt->execute([$id_siswa, $tipe, $jumlah, $ket]);
    header("Location: index.php");
}

// Ambil Data Ringkasan (Saldo)
$masuk = $pdo->query("SELECT SUM(jumlah) FROM transaksi WHERE tipe='masuk'")->fetchColumn() ?: 0;
$keluar = $pdo->query("SELECT SUM(jumlah) FROM transaksi WHERE tipe='keluar'")->fetchColumn() ?: 0;
$saldo = $masuk - $keluar;
?>

<select name="id_siswa" required>
    <option value="">-- Pilih Nama Siswa --</option>
    <?php 
    $stmt = $pdo->query("SELECT * FROM siswa ORDER BY nama_siswa ASC");
    while($s = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='".$s['id_siswa']."'>".$s['nama_siswa']."</option>";
    }
    ?>
</select>

<?php
$stmt = $pdo->query("SELECT t.*, s.nama_siswa FROM transaksi t LEFT JOIN siswa s ON t.id_siswa = s.id_siswa ORDER BY id_transaksi DESC LIMIT 10");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // Logika tampilan tetap sama dengan versi sebelumnya
}
?>