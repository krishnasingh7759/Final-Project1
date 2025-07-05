<?php
session_start();

// ✅ Check for admin access
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
  header("Location: login.php?redirected=1");
  exit();
}

// ✅ Include DB connection
include("db.php");

// ✅ Debugging: Show SQL errors if any
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $query = "SELECT f.id, s.name, s.registration_no, f.admission_fee, f.registration_fee, f.exam_fee, f.hostel_fee, f.date
              FROM fees f
              JOIN students s ON f.registration_no = s.registration_no
              ORDER BY f.date DESC";
    $result = mysqli_query($conn, $query);
} catch (mysqli_sql_exception $e) {
    die("Query failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel - All Payments</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <?php include 'nav.php'; ?>
  <h1>📋 All Student Payment Records</h1>

  <table class="fee-chart">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Registration No</th>
        <th>Admission Fee</th>
        <th>Registration Fee</th>
        <th>Exam Fee</th>
        <th>Hostel Fee</th>
        <th>Payment Date</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['registration_no']) ?></td>
        <td>₹<?= $row['admission_fee'] ?></td>
        <td>₹<?= $row['registration_fee'] ?></td>
        <td>₹<?= $row['exam_fee'] ?></td>
        <td>₹<?= $row['hostel_fee'] ?></td>
        <td><?= date("d-m-Y", strtotime($row['date'])) ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>
