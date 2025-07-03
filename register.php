<?php include('db.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $reg = $_POST['registration_no'];
  $course = $_POST['course'];
  $conn->query("INSERT INTO students (name, registration_no, course) VALUES ('$name', '$reg', '$course')");
  echo "✅ Registration Successful!";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>📝 Register Student</h2>
  <?php include('nav.php'); ?>
  <form method="post">
    <input type="text" name="name" placeholder="Student Name" required><br>
    <input type="text" name="registration_no" placeholder="Registration Number" required><br>
    <input type="text" name="course" placeholder="Course" required><br>
    <button type="submit">Register</button>
  </form>
</div>
</body>
</html>
