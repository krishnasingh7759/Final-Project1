<?php
include("db.php");
session_start();

// Only allow logged-in students to access
if (!isset($_SESSION["user"]) || $_SESSION["user"]["role"] != "student") {
    header("Location: login.php");
    exit();
}

$msg = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $registration_no = $_POST["registration_no"];
    $admission_fee = $_POST["admission_fee"];
    $registration_fee = $_POST["registration_fee"];
    $exam_fee = $_POST["exam_fee"];
    $hostel_fee = $_POST["hostel_fee"];
    $fee_month = $_POST["month"];
    $fee_date = $_POST["fee_date"];

    // Insert into database
    $sql = "INSERT INTO fees (registration_no, admission_fee, registration_fee, exam_fee, hostel_fee, fee_month, fee_date)
            VALUES ('$registration_no', '$admission_fee', '$registration_fee', '$exam_fee', '$hostel_fee', '$fee_month', '$fee_date')";

    if (mysqli_query($conn, $sql)) {
        $msg = "<p style='color:green;'>✅ Fee submitted successfully for $fee_month ($fee_date).</p>";
    } else {
        $msg = "<p style='color:red;'>❌ Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Fee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <?php include("nav.php"); ?>
    <h1>💳 Submit Your Fees</h1>

    <?php echo $msg; ?>

    <form method="post">

        <label>🔢 Registration Number:</label><br>
        <input type="text" name="registration_no" required><br><br>

        <label>📌 Admission Fee:</label><br>
        <input type="number" name="admission_fee" required><br><br>

        <label>📌 Registration Fee:</label><br>
        <input type="number" name="registration_fee" required><br><br>

        <label>📌 Exam Fee:</label><br>
        <input type="number" name="exam_fee" required><br><br>

        <label>📌 Hostel Fee:</label><br>
        <input type="number" name="hostel_fee" required><br><br>

        <label>📆 Select Month:</label><br>
        <select name="month" required>
            <option value="">--Select Month--</option>
            <?php
            $months = ["January", "February", "March", "April", "May", "June",
                       "July", "August", "September", "October", "November", "December"];
            foreach ($months as $m) {
                echo "<option value='$m'>$m</option>";
            }
            ?>
        </select><br><br>

        <label>📅 Payment Date:</label><br>
        <input type="date" name="fee_date" required><br><br>

        <button type="submit">💾 Submit Fee</button>
    </form>
</div>
</body>
</html>
