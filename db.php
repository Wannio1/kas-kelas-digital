<?php
$host = "localhossql206.infinityfree.comt";
$user = "if0_40879866";
$password = "ridwan241127"; 
$dbname = "if0_40879866_db_kas_kelas_digital"; 

try {
    // Gunakan mysql untuk XAMPP
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Koneksi Localhost Gagal: " . $e->getMessage());
}
?>