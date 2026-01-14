<?php
// api/db.php
$host = getenv('DB_HOST');
$port = getenv('DB_PORT'); // 3306
$dbname = getenv('DB_NAME');
$user = getenv('DB_USER');
$password = getenv('DB_PASS');

try {
    // GANTI pgsql: MENJADI mysql:
    // HAPUS sslmode=require karena MySQL punya cara sendiri
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Koneksi Filess.io Gagal: " . $e->getMessage());
}
?>