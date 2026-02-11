<?php
session_start();

if (!isset($_SESSION['login_muhammadAzam'])) {
    header("Location: login_muhammadAzam.php");
    exit;
}

if ($_SESSION['role_muhammadAzam'] == "admin") {
    header("Location: admin_muhammadAzam/dashboard_muhammadAzam.php");
    exit;
} else {
    header("Location: siswa_muhammadAzam/dashboard_muhammadAzam.php");
    exit;
}
?>
