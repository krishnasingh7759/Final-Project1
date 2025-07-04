<?php session_start(); ?>
<nav class="navbar">
  <a href="index.php">🏠 Home</a>

  <?php if (isset($_SESSION['user'])): ?>
    <a href="register.php">📝 Register</a>
    <a href="submit_fee.php">💰 Submit Fee</a>
    <a href="view_status.php">📄 View Status</a>
    <a href="payment_chart.php">📊 Fee Chart</a>
    <span style="margin-left:auto;">👤 <?php echo $_SESSION['user']['name']; ?> | <a href="logout.php">Logout</a></span>
  <?php else: ?>
    <a href="login.php">🔐 Login</a>
    <a href="signup.php">📝 Sign Up</a>
  <?php endif; ?>
</nav>
