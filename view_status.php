<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fee Status</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>📄 Fee Status</h2>
  <?php include('nav.php'); ?>
  <form method="get">
    <input type="text" name="registration_no" placeholder="Enter Registration Number" required>
    <button type="submit">View</button>
  </form>
  <?php
  if (isset($_GET['registration_no'])) {
    $reg = $_GET['registration_no'];
    $result = $conn->query("
      SELECT s.name, s.course,
        SUM(f.hostel_fee) AS hostel,
        SUM(f.admission_fee) AS admission,
        SUM(f.exam_fee) AS exam,
        SUM(f.registration_fee) AS regfee
      FROM students s
      JOIN fees f ON s.registration_no = f.registration_no
      WHERE s.registration_no = '$reg'
      GROUP BY s.name, s.course
    ");

    if ($row = $result->fetch_assoc()) {
      echo "<p><strong>Name:</strong> {$row['name']}</p>";
      echo "<p><strong>Course:</strong> {$row['course']}</p>";
      echo "<p><strong>Hostel Fee Paid:</strong> ₹{$row['hostel']}</p>";
      echo "<p><strong>Admission Fee Paid:</strong> ₹{$row['admission']}</p>";
      echo "<p><strong>Exam Fee Paid:</strong> ₹{$row['exam']}</p>";
      echo "<p><strong>Registration Fee Paid:</strong> ₹{$row['regfee']}</p>";
      $total = $row['hostel'] + $row['admission'] + $row['exam'] + $row['regfee'];
      echo "<p><strong>Total Paid:</strong> ₹{$total}</p>";
    } else {
      echo "<p>No records found for this registration number.</p>";
    }
  }
  ?>
</div>
</body>
</html>
