<?php
include "../config_muhammadAzam/auth_muhammadAzam.php";
include "../config_muhammadAzam/koneksi_muhammadAzam.php";

if ($_SESSION['role_muhammadAzam'] != "admin") {
    header("Location: ../index_muhammadAzam.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Admin Panel - MuhammadAzam</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Inter',sans-serif;
}

body{
    background:#f4f6fb;
    min-height:100vh;
}

/* TOPBAR */
.topbar_muhammadAzam{
    height:64px;
    background: linear-gradient(135deg,#1e3c72,#2a5298);
    color:white;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 22px;
    position:fixed;
    top:0;
    left:0;
    right:0;
    z-index:1000;
    box-shadow:0 10px 30px rgba(0,0,0,0.12);
}

.brand_muhammadAzam{
    display:flex;
    align-items:center;
    gap:12px;
}

.hamburger_muhammadAzam{
    width:42px;
    height:42px;
    border-radius:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    background: rgba(255,255,255,0.15);
    transition:0.25s;
    user-select:none;
    font-size:20px;
}

.hamburger_muhammadAzam:hover{
    background: rgba(255,255,255,0.25);
    transform:scale(1.03);
}

.topbar_muhammadAzam h3{
    font-size:18px;
    font-weight:700;
}

.user_muhammadAzam{
    font-size:14px;
    opacity:0.95;
    font-weight:500;
}

/* SIDEBAR */
.sidebar_muhammadAzam{
    width:250px;
    height:100vh;
    position:fixed;
    top:0;
    left:-270px;
    background:#0f172a;
    padding-top:80px;
    transition:0.3s;
    z-index:999;
    box-shadow: 15px 0 40px rgba(0,0,0,0.12);
}

.sidebar_muhammadAzam.active{
    left:0;
}

.sidebar_muhammadAzam .menu-title_muhammadAzam{
    padding:0 20px;
    font-size:12px;
    letter-spacing:1px;
    text-transform:uppercase;
    color:rgba(255,255,255,0.55);
    margin-bottom:12px;
}

.sidebar_muhammadAzam a{
    display:flex;
    align-items:center;
    gap:10px;
    padding:13px 18px;
    color:white;
    text-decoration:none;
    margin:6px 12px;
    border-radius:14px;
    transition:0.25s;
    font-size:14px;
    font-weight:600;
}

.sidebar_muhammadAzam a:hover{
    background: rgba(255,255,255,0.10);
    transform: translateX(3px);
}

.sidebar_muhammadAzam a.logout_muhammadAzam{
    background: rgba(231, 76, 60, 0.15);
    color:#ffb4b4;
}

.sidebar_muhammadAzam a.logout_muhammadAzam:hover{
    background: rgba(231, 76, 60, 0.25);
}

/* CONTENT */
.content_muhammadAzam{
    padding:90px 22px 25px 22px;
    transition:0.3s;
}

.content_muhammadAzam.shift{
    margin-left:250px;
}

/* COMPONENT */
.box_muhammadAzam{
    background:white;
    padding:18px 18px;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    border:1px solid rgba(0,0,0,0.03);
    margin-bottom:16px;
}

.title_muhammadAzam{
    font-size:18px;
    font-weight:800;
    color:#111827;
    margin-bottom:14px;
}

.btn_muhammadAzam{
    display:inline-block;
    padding:11px 14px;
    border-radius:14px;
    text-decoration:none;
    font-weight:700;
    font-size:14px;
    transition:0.25s;
    border:none;
    cursor:pointer;
}

.btn-primary_muhammadAzam{
    background: linear-gradient(135deg,#1e3c72,#2a5298);
    color:white;
}

.btn-primary_muhammadAzam:hover{
    transform: translateY(-2px);
}

.btn-danger_muhammadAzam{
    background:#e74c3c;
    color:white;
}

.btn-danger_muhammadAzam:hover{
    opacity:0.9;
}

.btn-secondary_muhammadAzam{
    background:#eef2ff;
    color:#1e3c72;
}

.btn-secondary_muhammadAzam:hover{
    opacity:0.9;
}

.table_muhammadAzam{
    width:100%;
    border-collapse:collapse;
    overflow:hidden;
    border-radius:14px;
}

.table_muhammadAzam th{
    text-align:left;
    font-size:13px;
    padding:14px 12px;
    background:#f3f6ff;
    color:#1e3c72;
    font-weight:800;
}

.table_muhammadAzam td{
    padding:13px 12px;
    border-bottom:1px solid #f0f0f0;
    font-size:14px;
    color:#222;
}

.table_muhammadAzam tr:hover td{
    background:#fafbff;
}

.input_muhammadAzam, .select_muhammadAzam{
    width:100%;
    padding:12px 14px;
    border-radius:14px;
    border:1px solid #d8dce6;
    outline:none;
    font-size:14px;
    transition:0.25s;
    background:white;
}

.input_muhammadAzam:focus, .select_muhammadAzam:focus{
    border-color:#1e3c72;
    box-shadow:0 0 6px rgba(30,60,114,0.20);
}

.grid2_muhammadAzam{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:12px;
}

@media(max-width:900px){
    .content_muhammadAzam.shift{
        margin-left:0;
    }
    .grid2_muhammadAzam{
        grid-template-columns:1fr;
    }
}
</style>
</head>
<body>

<div class="topbar_muhammadAzam">
    <div class="brand_muhammadAzam">
        <div class="hamburger_muhammadAzam" onclick="toggleSidebar_muhammadAzam()">☰</div>
        <h3>Admin Panel</h3>
    </div>
    <div class="user_muhammadAzam">👤 <?php echo $_SESSION['nama_muhammadAzam']; ?></div>
</div>
