<?php
include("db.php");
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'student') {
    header("Location: login.php");
    exit();
}

$registration_no = '';
$fees = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $registration_no = $_POST['registration_no'];
    
    $query = "SELECT fee_month, admission_fee, registration_fee, exam_fee, hostel_fee, fee_date 
              FROM fees 
              WHERE registration_no = '$registration_no' 
              ORDER BY fee_date DESC";
    
    $result = mysqli_query($conn, $query);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $fees[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Fee Status</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <?php include("nav.php"); ?>
  <h1>📄 View Fee Status</h1>

  <form method="post">
    <label>Enter Your Registration Number:</label><br>
    <input type="text" name="registration_no" required value="<?= htmlspecialchars($registration_no) ?>"><br><br>
    <button type="submit">🔍 Check Status</button>
  </form>

  <?php if (!empty($fees)): ?>
  <h3>Fee History for <?= htmlspecialchars($registration_no) ?>:</h3>
  <table border="1" cellpadding="8">
    <tr>
      <th>Month</th>
      <th>Admission Fee</th>
      <th>Registration Fee</th>
      <th>Exam Fee</th>
      <th>Hostel Fee</th>
      <th>Payment Date</th>
    </tr>
    <?php foreach ($fees as $row): ?>
    <tr>
      <td><?= $row['fee_month'] ?></td>
      <td>₹<?= $row['admission_fee'] ?></td>
      <td>₹<?= $row['registration_fee'] ?></td>
      <td>₹<?= $row['exam_fee'] ?></td>
      <td>₹<?= $row['hostel_fee'] ?></td>
      <td><?= date("d-m-Y", strtotime($row['fee_date'])) ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <p style="color:red;">❌ No fee records found for registration number: <?= htmlspecialchars($registration_no) ?></p>
  <?php endif; ?>
</div>
</body>
</html>
