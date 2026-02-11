<?php
$host_muhammadAzam = "localhost";
$user_muhammadAzam = "root";
$pass_muhammadAzam = "";
$db_muhammadAzam   = "db_rfid_siswa_muhammadAzam";

$koneksi_muhammadAzam = mysqli_connect($host_muhammadAzam, $user_muhammadAzam, $pass_muhammadAzam, $db_muhammadAzam);

if (!$koneksi_muhammadAzam) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
