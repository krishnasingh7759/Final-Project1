<?php
include("db.php");
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  if (mysqli_num_rows($check) > 0) {
    $msg = "Email already registered.";
  } else {
    mysqli_query($conn, "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
    $msg = "Registration successful! <a href='login.php'>Login here</a>";
  }
}
?>

<!DOCTYPE html>
<html>
<head><title>Sign Up</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
  <?php include 'nav.php'; ?>
  <h1>📝 Sign Up</h1>
  <form method="post">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email Address" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Sign Up</button>
    <p style="color: red;"><?php echo $msg; ?></p>
  </form>
</div>
</body>
</html>
