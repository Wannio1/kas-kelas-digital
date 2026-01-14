<?php
// api/db.php untuk LOCALHOST (XAMPP)
$host = "localhost";
$user = "root";
$password = ""; // Kosongkan jika menggunakan XAMPP standar
$dbname = "nama_database_anda"; // Ganti dengan nama database di phpMyAdmin

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