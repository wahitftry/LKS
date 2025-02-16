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
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    table, th, td { border: 1px solid #ccc; }
    th, td { padding: 10px; text-align: left; }
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
    $result = mysqli_query($conn, "SELECT id, email, created_at FROM users");
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Email</th><th>Created At</th><th>Actions</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['created_at']}</td>";
            echo "<td><a href='edit.php?id={$row['id']}'>Edit</a> | <a href='delete.php?id={$row['id']}'>Hapus</a></td>";
            echo "</tr>";
        }
        echo "</table>";
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
