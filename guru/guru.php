<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
include "../koneksi.php";

// ambil data guru
$result = mysqli_query($koneksi, "SELECT * FROM Guru ORDER BY NamaLengkap ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Guru - Web Sekolah</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body { min-height: 100vh; display: flex; }
    .sidebar { width: 250px; background: #343a40; color: white; flex-shrink: 0; }
    .sidebar .nav-link { color: #adb5bd; }
    .sidebar .nav-link.active { background: #495057; color: #fff; font-weight: bold; }
    .sidebar .nav-link:hover { background: #495057; color: #fff; }
    .content { flex-grow: 1; background: #f8f9fa; padding: 20px; }
    .navbar { background: #fff; border-bottom: 1px solid #dee2e6; }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column p-3">
    <h4 class="text-white mb-4">Web Sekolah</h4>
    <ul class="nav nav-pills flex-column mb-auto">
      <li><a href="../dashboard.php" class="nav-link"><i class="fas fa-home me-2"></i> Dashboard</a></li>
      <li><a href="guru.php" class="nav-link active"><i class="fas fa-users me-2"></i> Data Guru</a></li>
      <li><a href="siswa.php" class="nav-link"><i class="fas fa-user-graduate me-2"></i> Data Siswa</a></li>
    </ul>
    <hr>
    <a href="../logout.php" class="btn btn-danger w-100"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
  </div>

  <!-- Content -->
  <div class="content">
    <!-- Top Navbar -->
    <nav class="navbar navbar-light px-3">
      <span class="navbar-text ms-auto">
        <i class="fas fa-user-circle me-2"></i> <?php echo $_SESSION['nama']; ?>
      </span>
    </nav>

    <!-- Data Guru -->
    <div class="container-fluid mt-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-users me-2"></i> Data Guru</h2>
        <a href="tambah_guru.php" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Tambah Guru</a>
      </div>

      <div class="card shadow-sm border-0">
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $row['NIP']; ?></td>
                  <td><?= $row['NamaLengkap']; ?></td>
                  <td><?= $row['Jabatan']; ?></td>
                  <td>
                    <a href="edit_guru.php?nip=<?= $row['NIP']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    <a href="hapus_guru.php?nip=<?= $row['NIP']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus guru ini?');"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
