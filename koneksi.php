<?php
$host = "localhost";   // biasanya localhost
$user = "root";        // user MySQL (default: root)
$pass = "";            // password MySQL (kosong kalau default XAMPP)
$db   = "web_sekolah"; // nama database

$koneksi = mysqli_connect($host, $user, $pass, $db);

// cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
