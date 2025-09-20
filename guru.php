<?php
include "koneksi.php";

$sql = "SELECT * FROM guru ORDER BY NIP ASC";
$result = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Guru - SMA NEGERI 1 MANCHESTER</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .hero-section {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      padding: 80px 0;
    }
    .menu-active {
      position: relative;
      font-weight: 600;
    }
    .menu-active::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 100%;
      height: 2px;
      background: white;
      border-radius: 2px;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }
    .section-title {
      position: relative;
      padding-bottom: 15px;
      margin-bottom: 30px;
    }
    .section-title::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 3px;
      background: linear-gradient(90deg, #667eea, #764ba2);
      border-radius: 2px;
    }
    .breadcrumb {
      background: transparent;
      padding: 0;
    }
    .breadcrumb-item a {
      text-decoration: none;
      color: #d1d1d1;
    }
    .breadcrumb-item.active {
      color: #fff;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="index.html">
        <div class="bg-white rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
          <i class="fas fa-graduation-cap text-primary"></i>
        </div>
        SMA NEGERI 1 MANCHESTER
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index.html">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="berita.html">Berita</a></li>
          <li class="nav-item"><a class="nav-link" href="galeri.html">Galeri</a></li>
          <li class="nav-item"><a class="nav-link" href="ekstrakurikuler.html">Ekstrakurikuler</a></li>
          <li class="nav-item"><a class="nav-link active menu-active" href="guru.php">Guru</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <section class="hero-section">
    <div class="container text-center">
      <h1 class="display-4 fw-bold mb-4">Data Guru</h1>
      <p class="lead opacity-75">Daftar guru SMA Negeri 1 Manchester</p>
      <nav aria-label="breadcrumb" class="mt-4">
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="index.html">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Guru</li>
        </ol>
      </nav>
    </div>
  </section>

  <!-- Konten Data Guru -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="section-title d-inline-block">Daftar Guru</h2>
        <p class="text-muted">Berikut adalah data guru yang dikelola melalui sistem admin</p>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="table-primary">
            <tr class="text-center">
              <th>No</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Jabatan</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td class='text-center'>{$no}</td>
                        <td>{$row['NIP']}</td>
                        <td>{$row['NamaLengkap']}</td>
                        <td>{$row['Jabatan']}</td>
                      </tr>";
                $no++;
              }
            } else {
              echo "<tr><td colspan='4' class='text-center text-muted'>Belum ada data guru</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white py-5">
    <div class="container">
      <div class="text-center">
        <p class="text-white-50 mb-0">© 2024 SMA NEGERI 1 MANCHESTER. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
