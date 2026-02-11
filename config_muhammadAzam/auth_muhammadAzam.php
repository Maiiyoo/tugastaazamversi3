<?php
session_start();

if (!isset($_SESSION['login_muhammadAzam'])) {
    header("Location: ../login_muhammadAzam.php");
    exit;
}
?>
