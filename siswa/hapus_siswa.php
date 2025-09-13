<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}
include "../koneksi.php";

if (isset($_GET['nis'])) {
  $nis = $_GET['nis'];
  
  $query = "DELETE FROM Siswa WHERE NIS = '$nis'";
  
  if (mysqli_query($koneksi, $query)) {
    header("Location: siswa.php?message=success");
  } else {
    header("Location: siswa.php?message=error");
  }
} else {
  header("Location: siswa.php");
}
exit();
?>