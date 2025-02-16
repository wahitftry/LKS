<?php
session_start();
// ...existing code for database connection...
$host = 'localhost';
$user = 'root';
$pass = '260704';
$db   = 'login_db';

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validasi sederhana
    if (empty($email) || empty($password)) {
        echo 'Email dan password harus diisi.';
        exit;
    }

    // Periksa apakah email sudah terdaftar
    $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo 'Email sudah terdaftar.';
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        exit;
    }
    mysqli_stmt_close($stmt);

    // Masukkan user baru
    $stmt = mysqli_prepare($conn, "INSERT INTO users (email, password) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    if (mysqli_stmt_execute($stmt)) {
        echo 'Register berhasil! Anda dapat <a href="login.html">login</a> sekarang.';
    } else {
        echo 'Terjadi kesalahan: ' . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
