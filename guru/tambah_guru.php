<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}
include "../koneksi.php";

if ($_POST) {
  $nip = $_POST['nip'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $jabatan = $_POST['jabatan'];
  
  $query = "INSERT INTO Guru (NIP, NamaLengkap, Jabatan) VALUES ('$nip', '$nama_lengkap', '$jabatan')";
  
  if (mysqli_query($koneksi, $query)) {
    header("Location: guru.php");
    exit();
  } else {
    $error = "Error: " . mysqli_error($koneksi);
  }
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
        <a href="../dashboard.php" class="nav-link text-white active">
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
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2><i class="fas fa-plus me-2"></i> Tambah Guru</h2>
          <a href="guru.php" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
        </div>

        <?php if (isset($error)) { ?>
          <div class="alert alert-danger" role="alert">
            <?= $error; ?>
          </div>
        <?php } ?>

        <div class="card shadow-sm border-0">
          <div class="card-body">
            <form method="POST">
              <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control" id="nip" name="nip" required>
              </div>
              <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
              </div>
              <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
              </div>
              <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-save me-2"></i>Simpan
                </button>
                <a href="guru.php" class="btn btn-secondary">
                  <i class="fas fa-times me-2"></i>Batal
                </a>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>