<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Inbox – Messages | Rent IT</title>

  <!-- Bootstrap 5 + Font Awesome 6 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <style>
    :root {
      --primary: #8b5cf6;
      --dark: #0f172a;
      --light: #f8fafc;
      --success: #10b981;
      --warning: #f59e0b;
    }
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
      min-height: 100vh;
    }
    .navbar {
      background: var(--dark) !important;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    .page-header {
      background: white;
      border-radius: 20px;
      padding: 2rem;
      box-shadow: 0 15px 40px rgba(139,92,246,0.15);
      margin: -5rem auto 3rem;
      max-width: 1100px;
      position: relative;
      z-index: 10;
    }
    .message-card {
      background: white;
      border-radius: 18px;
      padding: 1.8rem;
      margin-bottom: 1.5rem;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
      transition: all 0.4s;
      border-left: 5px solid var(--primary);
    }
    .message-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 50px rgba(139,92,246,0.25);
    }
    .message-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
    }
    .sender-name {
      font-size: 1.3rem;
      font-weight: 700;
      color: var(--dark);
    }
    .timestamp {
      color: #64748b;
      font-size: 0.9rem;
    }
    .contact-info {
      color: var(--primary);
      font-weight: 600;
    }
    .message-body {
      background: #f8f9fa;
      padding: 1.2rem;
      border-radius: 12px;
      margin-top: 1rem;
      line-height: 1.7;
      color: #374151;
    }
    .empty-state {
      text-align: center;
      padding: 5rem 2rem;
      color: #64748b;
    }
    .empty-state i {
      font-size: 5rem;
      color: #cbd5e1;
      margin-bottom: 1.5rem;
    }
    footer {
      background: var(--dark);
      color: #cbd5e1;
      padding: 4rem 0 2rem;
      margin-top: 8rem;
    }

    @media (max-width: 768px) {
      .page-header { margin: 1rem; border-radius: 16px; padding: 1.5rem; }
      .message-card { padding: 1.5rem; }
      .sender-name { font-size: 1.2rem; }
      h1 { font-size: 2.2rem; }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand fw-bold fs-3" href="admin_dashboard.html">
        Rent IT Admin
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="admin_dashboard.html">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <div class="container">
    <div class="page-header text-center">
      <h1 class="display-4 fw-bold text-primary mb-3">
        Inbox Messages
      </h1>
      <p class="lead text-muted">All customer inquiries and contact form submissions</p>
    </div>
  </div>

  <!-- Messages List -->
  <div class="container pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">

        <?php
        $connection = mysqli_connect("localhost", "root", "", "rentitdb");
        if (!$connection) {
            die("<div class='alert alert-danger text-center'>Database connection failed!</div>");
        }

        $query = "SELECT *, CONCAT(FirstName, ' ', LastName) AS full_name, DATE_FORMAT(created_at, '%M %d, %Y at %l:%i %p') AS formatted_date 
                  FROM contact_information 
                  ORDER BY created_at DESC";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="message-card">
                  <div class="message-header">
                    <div>
                      <div class="sender-name">' . htmlspecialchars($row['full_name']) . '</div>
                      <div class="contact-info">
                        <i class="fas fa-phone me-2"></i>' . htmlspecialchars($row['Phone']) . ' 
                        <i class="fas fa-envelope ms-4 me-2"></i>' . htmlspecialchars($row['Email']) . '
                      </div>
                    </div>
                    <div class="timestamp">
                      <i class="far fa-clock me-1"></i> ' . $row['formatted_date'] . '
                    </div>
                  </div>
                  <div class="message-body">
                    ' . nl2br(htmlspecialchars($row['Message'])) . '
                  </div>
                  <div class="mt-3 text-end">
                    <a href="mailto:' . htmlspecialchars($row['Email']) . '?subject=Re: Your Inquiry to Rent IT" 
                       class="btn btn-outline-primary btn-sm rounded-pill px-4">
                      Reply via Email
                    </a>
                  </div>
                </div>';
            }
        } else {
            echo '
            <div class="empty-state">
              <i class="fas fa-envelope-open-text"></i>
              <h3>No Messages Yet</h3>
              <p>All new contact form submissions will appear here.</p>
            </div>';
        }
        mysqli_close($connection);
        ?>

      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center text-white">
    <div class="container">
      <p class="mb-0">© 2025 Rent IT – Admin Panel | Secure & Modern Property Management</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>