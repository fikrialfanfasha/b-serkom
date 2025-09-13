<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Web Sekolah</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="d-flex">
  <div class="bg-dark text-white p-3 min-vh-100" style="width:250px;">
    <h4 class="mb-4">Web Sekolah</h4>
    <ul class="nav flex-column mb-auto">
      <li class="nav-item">
        <a href="dashboard.php" class="nav-link text-white active">
          <i class="fas fa-home me-2"></i> Dashboard
        </a>
      </li>
      <li>
        <a href="/guru/guru.php" class="nav-link text-white">
          <i class="fas fa-users me-2"></i> Data Guru
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">
          <i class="fas fa-user-graduate me-2"></i> Data Siswa
        </a>
      </li>
    </ul>
    <hr>
    <a href="logout.php" class="btn btn-danger w-100">
      <i class="fas fa-sign-out-alt me-2"></i> Logout
    </a>
  </div>
  <div class="flex-grow-1 d-flex flex-column">
    <nav class="navbar bg-white border-bottom px-3">
      <span class="ms-auto">
        <i class="fas fa-user-circle me-2"></i> <?php echo $_SESSION['nama']; ?>
      </span>
    </nav>
    <div class="container-fluid mt-4">
      <h2 class="mb-4">Dashboard</h2>
      <div class="row g-4">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body d-flex align-items-center">
              <div class="bg-primary text-white p-3 rounded-circle me-3">
                <i class="fas fa-users fa-2x"></i>
              </div>
              <div>
                <h5 class="card-title mb-0">Data Guru</h5>
                <small class="text-muted">Jumlah guru: 20 Orang</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body d-flex align-items-center">
              <div class="bg-success text-white p-3 rounded-circle me-3">
                <i class="fas fa-user-graduate fa-2x"></i>
              </div>
              <div>
                <h5 class="card-title mb-0">Data Siswa</h5>
                <small class="text-muted">Jumlah siswa: 300 Orang</small>
              </div>
            </div>
          </div>
        </div>
      </div>      
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>