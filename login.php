<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $nama = $_POST['nama_siswa'];
    $password = $_POST['password'];

    // Menggunakan Prepared Statement PDO untuk keamanan
    $stmt = $pdo->prepare("SELECT * FROM siswa WHERE nama_siswa = ?");
    $stmt->execute([$nama]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && $password == $row['password']) {
        $_SESSION['login'] = true;
        $_SESSION['nama'] = $row['nama_siswa'];
        $_SESSION['id_siswa'] = $row['id_siswa'];
        header("Location: /");
        exit;
    }
    $error = true;
}
?>