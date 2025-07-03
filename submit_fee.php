<?php include('db.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $reg = $_POST['registration_no'];
  $hostel = $_POST['hostel_fee'];
  $admission = $_POST['admission_fee'];
  $exam = $_POST['exam_fee'];
  $registration = $_POST['registration_fee'];

  $conn->query("INSERT INTO fees (registration_no, hostel_fee, admission_fee, exam_fee, registration_fee)
                VALUES ('$reg', '$hostel', '$admission', '$exam', '$registration')");
  echo "✅ Fees Submitted Successfully!";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Fees</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>💰 Submit Fees</h2>
  <?php include('nav.php'); ?>
  <form method="post">
    <input type="text" name="registration_no" placeholder="Registration Number" required><br>
    <input type="number" name="hostel_fee" placeholder="Hostel Fee" value="0"><br>
    <input type="number" name="admission_fee" placeholder="Admission Fee" value="0"><br>
    <input type="number" name="exam_fee" placeholder="Exam Fee" value="0"><br>
    <input type="number" name="registration_fee" placeholder="Registration Fee" value="0"><br>
    <button type="submit">Submit</button>
  </form>
</div>
</body>
</html>
