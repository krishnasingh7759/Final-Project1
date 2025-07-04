<?php
include("db.php");
session_start();
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  $user = mysqli_fetch_assoc($result);

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION["user"] = $user;
    header("Location: index.php");
  } else {
    $msg = "Invalid credentials!";
  }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
  <?php include 'nav.php'; ?>
  <h1>🔐 Login</h1>
  <form method="post">
    <input type="email" name="email" placeholder="Email Address" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
    <p style="color: red;"><?php echo $msg; ?></p>
  </form>
</div>
</body>
</html>
