<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit;
}
$host = 'localhost';
$user = 'root';
$pass = '260704';
$db   = 'login_db';
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id       = $_POST['id'];
    $email    = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    if (empty($email)) {
        echo "Email harus diisi.";
        exit;
    }
    
    if (!empty($password)) {
        $stmt = mysqli_prepare($conn, "UPDATE users SET email = ?, password = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "ssi", $email, $password, $id);
    } else {
        $stmt = mysqli_prepare($conn, "UPDATE users SET email = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "si", $email, $id);
    }
    
    if (mysqli_stmt_execute($stmt)) {
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Update gagal: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = mysqli_prepare($conn, "SELECT email FROM users WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $email);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    } else {
        echo "User id tidak ditemukan.";
        exit;
    }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit User</title>
  <style>
    /* Simple styling for edit form */
    .container { width: 400px; margin: 50px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    input { width: 100%; padding: 10px; margin: 10px 0; }
    button { padding: 10px; width: 100%; background: #5563DE; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Edit User</h2>
    <form method="POST" action="">
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
      <label>Email:</label>
      <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
      <label>Password (isi jika ingin diubah):</label>
      <input type="password" name="password">
      <button type="submit">Update</button>
    </form>
  </div>
</body>
</html>
