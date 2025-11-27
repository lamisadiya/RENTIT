<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rent IT – Featured Apartments</title>

  <!-- Bootstrap 5 + Font Awesome 6 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <style>
    :root {
      --primary: #8b5cf6;
      --dark: #0f172a;
      --light: #f8fafc;
      --accent: #ec4899;
    }
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
      margin: 0;
    }
    .navbar {
      background: var(--dark) !important;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    .hero {
      height: 85vh;
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('./R.jpeg') center/cover no-repeat;
      color: white;
      display: flex;
      align-items: center;
      border-radius: 0 0 50px 50px;
    }
    .hero h1 {
      font-size: 4.5rem;
      font-weight: 900;
      text-shadow: 0 10px 30px rgba(0,0,0,0.6);
    }
    .search-bar {
      background: white;
      border-radius: 50px;
      padding: 1rem;
      box-shadow: 0 20px 50px rgba(0,0,0,0.15);
      max-width: 600px;
    }
    .apartment-card {
      background: white;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 15px 40px rgba(0,0,0,0.1);
      transition: all 0.4s;
      height: 100%;
    }
    .apartment-card:hover {
      transform: translateY(-15px);
      box-shadow: 0 30px 60px rgba(139,92,246,0.3);
    }
    .apartment-card img {
      height: 220px;
      object-fit: cover;
      transition: all 0.4s;
    }
    .apartment-card:hover img {
      transform: scale(1.1);
    }
    .price-tag {
      background: var(--primary);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 50px;
      font-weight: 700;
    }
    .footer {
      background: var(--dark);
      color: #cbd5e1;
      padding: 6rem 0 2rem;
      margin-top: 8rem;
    }
    .footer a { color: #94a3b8; text-decoration: none; }
    .footer a:hover { color: white; }

    @media (max-width: 768px) {
      .hero { height: 70vh; border-radius: 0 0 30px 30px; }
      .hero h1 { font-size: 2.8rem; }
      .search-bar { margin: 1rem; }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand fw-bold fs-3" href="#">Rent IT</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item"><a class="nav-link" href="addapartment.html">Add Apartment</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
          <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Sign Out</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero text-center">
    <div class="container">
      <h1 class="display-1">Find Your Dream Home</h1>
      <p class="lead mb-4">Luxury apartments in Dhaka's best locations</p>

      <!-- Search Bar -->
      <div class="search-bar mx-auto">
        <div class="row g-3 align-items-center">
          <div class="col-md-8">
            <select id="location" class="form-select form-select-lg border-0 shadow-sm">
              <option value="">Choose Location...</option>
              <option value="gulshan">Gulshan</option>
              <option value="uttara">Uttara</option>
              <option value="bashundhara">Bashundhara</option>
            </select>
          </div>
          <div class="col-md-4">
            <button onclick="search()" class="btn btn-primary btn-lg w-100 rounded-pill fw-bold">
              Search
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Apartments -->
  <section class="container py-5">
    <h2 class="text-center display-5 fw-bold mb-5 text-primary">Featured Apartments</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      
      <div class="col">
        <a href="a6.html" class="text-decoration-none">
          <div class="apartment-card">
            <img src="1.webp" alt="Valeria" class="w-100">
            <div class="p-4">
              <h5 class="fw-bold">Valeria</h5>
              <p class="text-muted">Bashundhara R/A</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price-tag">৳55,000/month</span>
                <small class="text-success">Available</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col">
        <a href="a1.html" class="text-decoration-none">
          <div class="apartment-card">
            <img src="2.webp" alt="Edison Amour">
            <div class="p-4">
              <h5 class="fw-bold">Edison Amour</h5>
              <p class="text-muted">Bashundhara R/A</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price-tag">৳65,000/month</span>
                <small class="text-success">Available</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col">
        <a href="a2.html" class="text-decoration-none">
          <div class="apartment-card">
            <img src="3.webp" alt="Dulce Domi">
            <div class="p-4">
              <h5 class="fw-bold">Dulce Domi</h5>
              <p class="text-muted">Uttara</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price-tag">৳95,000/month</span>
                <small class="text-success">Available</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col">
        <a href="a3.html" class="text-decoration-none">
          <div class="apartment-card">
            <img src="4.webp" alt="Prime View">
            <div class="p-4">
              <h5 class="fw-bold">Prime View</h5>
              <p class="text-muted">Uttara</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price-tag">৳70,000/month</span>
                <small class="text-success">Available</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col">
        <a href="a4.html" class="text-decoration-none">
          <div class="apartment-card">
            <img src="2.webp" alt="Rose Cottage">
            <div class="p-4">
              <h5 class="fw-bold">Rose Cottage</h5>
              <p class="text-muted">Gulshan</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price-tag">৳85,000/month</span>
                <small class="text-success">Available</small>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col">
        <a href="a5.html" class="text-decoration-none">
          <div class="apartment-card">
            <img src="1.webp" alt="Magnifico">
            <div class="p-4">
              <h5 class="fw-bold">Magnifico</h5>
              <p class="text-muted">Gulshan</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="price-tag">৳75,000/month</span>
                <small class="text-success">Available</small>
              </div>
            </div>
          </div>
        </a>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4">
          <h5>Address</h5>
          <p>Plot 16 Aftab Uddin Ahmed Rd<br>Dhaka 1229, Bangladesh</p>
        </div>
        <div class="col-md-4 mb-4">
          <h5>Contact</h5>
          <p>info@rentit.com<br>Hotline: +880-23464</p>
        </div>
        <div class="col-md-4 mb-4">
          <h5>Customer Service</h5>
          <ul class="list-unstyled">
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
      </div>
      <hr class="border-secondary">
      <p class="text-center mb-0">© 2025 Rent IT – Dhaka's Premium Rental Platform</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function search() {
      const location = document.getElementById("location").value;
      const pages = {
        gulshan: "Gulshanprojects.html",
        uttara: "Uttaraprojects.html",
        bashundhara: "Bashundharaprojects.html"
      };
      if (pages[location]) {
        window.location.href = pages[location];
      } else {
        alert("Please select a location!");
      }
    }
  </script>
</body>
</html>