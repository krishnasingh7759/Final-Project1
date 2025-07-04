<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Student Fee Management</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="container">
    <?php include('nav.php'); ?>

    <header class="header">
      <h1>🎓 Welcome to Student Fee Management System</h1>
      <p>Manage all your college fees with ease, transparency, and speed.</p>
    </header>

    <img src="money2.php" class="payment" alt="Payment Illustration" />

    <section class="intro">
      <h2>📘 About This System</h2>
      <p>
        This platform is built for simplifying student fee collection in colleges. It allows students and administrators to track and manage:
        <strong>Hostel Fees, Admission Fees, Exam Fees, and Registration Fees</strong> in one place.
      </p>
    </section>

    <section class="mission-vision">
      <h2>🎯 Our Mission & Vision</h2>
      <p><strong>Mission:</strong> To streamline the college fee management process with technology and transparency.</p>
      <p><strong>Vision:</strong> A paperless and efficient college administration for all educational institutions.</p>
    </section>

    <section class="features">
      <h2>✨ Key Features</h2>
      <div class="feature-grid">
        <div class="feature-card">📝 Easy Student Registration</div>
        <div class="feature-card">💰 Multi-type Fee Submission</div>
        <div class="feature-card">📄 Instant Status Tracking</div>
        <div class="feature-card">📱 Mobile Friendly Design</div>
        <div class="feature-card">🔐 Secure & Reliable</div>
        <div class="feature-card">☁️ Hosted Online</div>
      </div>
    </section>

    <section class="how-it-works">
      <h2>🛠️ How It Works</h2>
      <ol>
        <li>👉 Register a new student using their registration number.</li>
        <li>👉 Submit their fees (hostel, exam, admission, registration).</li>
        <li>👉 View fee payment status anytime.</li>
        <li>👉 Admin can track all fee collections easily.</li>
      </ol>
    </section>

    <section class="testimonials">
      <h2>💬 Testimonials</h2>
      <blockquote>"A really useful system for our college! Easy to use and saves time." – <em>Admin, ABC College</em></blockquote>
      <blockquote>"Finally no long queues at the fee counter!" – <em>Student, B.Tech</em></blockquote>
    </section>

    <section class="cta">
      <h2>🚀 Get Started Now!</h2>
      <p>Use the navigation menu above to register a student, submit fees, or check fee status.</p>
    </section>

    <footer class="footer">
      <p>&copy; <?php echo date("Y"); ?> Student Fee Management System. All rights reserved.</p>
    </footer>
  </div>
</body>
</html>
