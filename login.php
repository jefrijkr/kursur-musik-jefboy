<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Gunakan prepared statement
  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $username;
    header('Location: index.php');
    exit;
  } else {
    $error = "Username atau Password salah!";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Kursus Musik Jef Boy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #1f4037, #99f2c8);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', sans-serif;
    }

    .login-card {
      background-color: #ffffff;
      border-radius: 12px;
      padding: 2rem;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
      width: 100%;
      max-width: 400px;
    }

    .login-title {
      font-weight: bold;
      color: #1f4037;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <h3 class="text-center login-title mb-4">🎵 Kursus Musik Jef Boy</h3>

    <?php if (isset($error)) echo "<div class='alert alert-danger text-center'>$error</div>"; ?>

    <form method="post">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" required class="form-control" autofocus>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" required class="form-control">
      </div>
      <button type="submit" class="btn btn-success w-100">Login</button>
    </form>
  </div>
</body>
</html>
