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
  </div>
  <script>
    function logout() {
      window.location.href = "logout.php";
    }
  </script>
</body>
</html>
