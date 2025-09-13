<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}
include "../koneksi.php";

if (isset($_GET['nip'])) {
  $nip = $_GET['nip'];
  
  $query = "DELETE FROM Guru WHERE NIP = '$nip'";
  
  if (mysqli_query($koneksi, $query)) {
    header("Location: guru.php?message=success");
  } else {
    header("Location: guru.php?message=error");
  }
} else {
  header("Location: guru.php");
}
exit();
?>