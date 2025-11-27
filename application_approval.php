<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Application Approval | Rent IT</title>

  <!-- Bootstrap 5 + Font Awesome 6 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <style>
    :root {
      --primary: #6366f1;
      --danger: #ef4444;
      --success: #10b981;
      --dark: #1e293b;
      --light: #f8fafc;
    }
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
      min-height: 100vh;
    }
    .navbar {
      background: var(--dark) !important;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    .admin-card {
      background: white;
      border-radius: 20px;
      box-shadow: 0 20px 50px rgba(0,0,0,0.1);
      overflow: hidden;
      margin-top: -4rem;
    }
    .table thead {
      background: var(--primary);
      color: white;
    }
    .table tbody tr:hover {
      background: #f1f5f9;
      transform: scale(1.01);
      transition: all 0.3s;
    }
    .btn-disapprove {
      background: var(--danger);
      color: white;
      border: none;
      padding: 0.6rem 1.2rem;
      border-radius: 50px;
      font-weight: 600;
      transition: all 0.3s;
    }
    .btn-disapprove:hover {
      background: #dc2626;
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(239,68,68,0.4);
    }
    .badge-pending {
      background: #fbbf24;
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 50px;
      font-size: 0.9rem;
    }
    .empty-state {
      text-align: center;
      padding: 4rem 2rem;
      color: #64748b;
    }
    footer {
      background: var(--dark);
      color: #cbd5e1;
      padding: 3rem 0;
      margin-top: 6rem;
    }

    @media (max-width: 768px) {
      .table-responsive {
        border-radius: 15px;
        overflow-x: auto;
      }
      .admin-card { margin: 1rem; border-radius: 15px; }
      h1 { font-size: 2rem; }
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

  <div class="container py-5">
    <div class="text-center mb-5">
      <h1 class="display-4 fw-bold text-primary">Application Approval</h1>
      <p class="lead text-muted">Review and manage pending apartment owner applications</p>
    </div>

    <div class="admin-card">
      <?php
      // Secure database connection
      $connection = mysqli_connect("localhost", "root", "", "rentitdb");
      if (!$connection) {
          die("<div class='alert alert-danger text-center'>Database connection failed!</div>");
      }

      // Prevent SQL injection
      $query = "SELECT * FROM apartment_ownerstb WHERE status = 'pending' ORDER BY OwnerID DESC";
      $result = mysqli_query($connection, $query);

      if (mysqli_num_rows($result) > 0) {
          echo '<div class="table-responsive p-4">';
          echo '<table class="table table-hover align-middle">';
          echo '<thead><tr>
                  <th>ID</th>
                  <th>Owner Name</th>
                  <th>Apartment</th>
                  <th>Rent</th>
                  <th>Rooms</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>City</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr></thead><tbody>';

          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                  <td><strong>#{$row['OwnerID']}</strong></td>
                  <td>{$row['name']}</td>
                  <td><strong>{$row['Ap_name']}</strong></td>
                  <td>৳{$row['rent']}</td>
                  <td>{$row['roomNo']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['phone']}</td>
                  <td>{$row['City']}</td>
                  <td><span class='badge-pending'>Pending</span></td>
                  <td>
                    <button onclick='disapproveApplication({$row['OwnerID']})' class='btn btn-disapprove btn-sm'>
                      Disapprove
                    </button>
                  </td>
                </tr>";
          }
          echo '</tbody></table></div>';
      } else {
          echo '<div class="empty-state">
                  <i class="fas fa-check-circle fa-5x text-success mb-4"></i>
                  <h3>No Pending Applications</h3>
                  <p>All applications have been processed. Great job!</p>
                </div>';
      }
      mysqli_close($connection);
      ?>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center">
    <div class="container">
      <p class="mb-0">© 2025 Rent IT – Admin Panel | All applications securely managed</p>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function disapproveApplication(ownerID) {
      if (confirm("Are you sure you want to DISAPPROVE this application?\nThis will permanently delete the record.")) {
        // Secure deletion with confirmation
        window.location.href = `delete_application.php?ownerID=${ownerID}&action=disapprove`;
      }
    }

    // Auto-refresh every 30 seconds (optional)
    // setInterval(() => location.reload(), 30000);
  </script>
</body>
</html>