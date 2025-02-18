<?php
session_start();
// Koneksi ke database
$host = 'localhost';
$user = 'root';
$pass = '260704';
$db   = 'login_db';

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validasi sederhana
    if (empty($email) || empty($password)) {
        echo 'Email dan password harus diisi.';
        exit;
    }

    // Siapkan query untuk mencegah SQL injection
    $stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ? AND `password` = ?");
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $userId);
        mysqli_stmt_fetch($stmt);
        // Set session dan redirect ke dashboard
        $_SESSION['user_id'] = $userId;
        header('Location: dashboard.php');
        exit;
    } else {
        echo 'Email atau password salah.';
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
