<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Fee Chart</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="container">
    <?php include('nav.php'); ?>

    <h1>📊 College Fee Structure Chart</h1>

    <p style="text-align:center;">Here is the official breakdown of fees for the current academic year.</p>

    <table class="fee-chart">
  <thead>
    <tr>
      <th>Fee Type</th>
      <th>Description</th>
      <th>Amount (₹)</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>🎓 Admission Fee</td>
      <td>₹2,630 for General/OBC<br>₹2,510 for SC/ST</td>
      <td>Varies</td>
    </tr>
    <p style="text-align:center; margin-top: 15px;">
  <em>Note:</em> Admission and Exam fees vary depending on the student’s caste category (GEN/OBC/SC/ST).
</p>

    <tr>
      <td>📋 Registration Fee</td>
      <td>Annual registration and ID processing</td>
      <td>₹1,000</td>
    </tr>
    <tr>
      <td>📝 Exam Fee</td>
      <td>₹3,700 per semester for General/OBC<br>₹700 per semester for SC/ST</td>
      <td>Varies</td>
    </tr>
    <p style="text-align:center; margin-top: 15px;">
  <em>Note:</em> Exam fees depend on the student’s category as per college rules.
</p>

    <tr>
      <td>🏠 Hostel Fee</td>
      <td>₹3,500 (food) + ₹1,200 (maintenance) per month × 6 months</td>
      <td>₹28,200</td>
    </tr>
  </tbody>
</table>

    <p style="text-align:center; margin-top: 20px;">Note: Fee amounts are subject to change based on college policies.</p>
  </div>
</body>
</html>
