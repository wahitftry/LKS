<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <style>
    body { margin: 0; padding: 0; font-family: sans-serif; background-color: #f4f4f4; }
    .header { background: #333; color: #fff; padding: 10px; text-align: center; }
    .container { padding: 20px; }
    .button-logout { background: #e74c3c; color: #fff; border: none; padding: 10px 20px; cursor: pointer; }
  </style>
</head>
<body>
  <div class="header">
    <h1>Dashboard</h1>
    <button class="button-logout" onclick="logout()">Logout</button>
  </div>
  <div class="container">
    <p>Selamat datang di Dashboard!</p>
    <?php
    // Koneksi ke database dan query user
    $host = 'localhost';
    $user = 'root';
    $pass = '260704';
    $db   = 'login_db';
    $conn = mysqli_connect($host, $user, $pass, $db);
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }
    $result = mysqli_query($conn, "SELECT email, created_at FROM users");
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h2>Daftar User:</h2>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>{$row['email']} - {$row['created_at']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Tidak ada user yang terdaftar.</p>";
    }
    mysqli_close($conn);
    ?>
  </div>
  <script>
    function logout() {
      window.location.href = "logout.php";
    }
  </script>
</body>
</html>
