<?php
include "header_muhammadAzam.php";

if(!isset($_GET['id'])){
    header("Location: siswa_list_muhammadAzam.php");
    exit;
}

$id_siswa_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_GET['id']);

/* hapus siswa */
$hapus_muhammadAzam = mysqli_query($koneksi_muhammadAzam, "DELETE FROM siswa_muhammadAzam WHERE id_siswa_muhammadAzam='$id_siswa_muhammadAzam'");

header("Location: siswa_list_muhammadAzam.php");
exit;
