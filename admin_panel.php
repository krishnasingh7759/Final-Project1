<?php
include("db.php");
session_start();

// Redirect if not logged in or not admin
if (!isset($_SESSION["user"]) || $_SESSION["user"]["role"] != "admin") {
    header("Location: login.php");
    exit();
}

// Fetch fee records
$fees = [];
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Enable detailed SQL errors

try {
    $query = "SELECT registration_no, admission_fee, registration_fee, exam_fee, hostel_fee, fee_month, fee_date
              FROM fees
              ORDER BY fee_date DESC";
    $result = mysqli_query($conn, $query);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $fees[] = $row;
    }
} catch (mysqli_sql_exception $e) {
    die("Query failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Fee Records</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            color: #222;
        }
        th, td {
            border: 1px solid #999;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #990000;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f7f7f7;
        }
        tr:nth-child(odd) {
            background-color: #f7f7f7;
        }
        .container {
            padding: 20px;
            
        }
        h1 {
            color: #990000;
        }
    </style>
</head>
<body>
<div class="container">
    <?php include("nav.php"); ?>
    <h1>🛠 Admin Panel - All Student Fee Records</h1>

    <?php if (count($fees) > 0): ?>
    <table>
        <tr>
            <th>Registration No</th>
            <th>Month</th>
            <th>Admission Fee</th>
            <th>Registration Fee</th>
            <th>Exam Fee</th>
            <th>Hostel Fee</th>
            <th>Payment Date</th>
        </tr>
        <?php foreach ($fees as $fee): ?>
        <tr>
            <td><?= htmlspecialchars($fee['registration_no']) ?></td>
            <td><?= htmlspecialchars($fee['fee_month']) ?></td>
            <td>₹<?= number_format($fee['admission_fee'], 2) ?></td>
            <td>₹<?= number_format($fee['registration_fee'], 2) ?></td>
            <td>₹<?= number_format($fee['exam_fee'], 2) ?></td>
            <td>₹<?= number_format($fee['hostel_fee'], 2) ?></td>
            <td><?= date("d-m-Y", strtotime($fee['fee_date'])) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php else: ?>
        <p style="color:red;">❌ No fee records found.</p>
    <?php endif; ?>
</div>
</body>
</html>
