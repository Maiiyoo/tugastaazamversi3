<?php
session_start();
include "config_muhammadAzam/koneksi_muhammadAzam.php";

$pesan_muhammadAzam = "";

if (isset($_POST['login_muhammadAzam'])) {

    $uid_rfid_muhammadAzam = mysqli_real_escape_string(
        $koneksi_muhammadAzam,
        $_POST['uid_rfid_muhammadAzam']
    );

    $sql_muhammadAzam = "
        SELECT 
            u.id_user_muhammadAzam,
            u.username_muhammadAzam,
            u.nama_muhammadAzam,
            u.role_muhammadAzam,
            r.uid_rfid_muhammadAzam
        FROM rfid_muhammadAzam r
        JOIN user_muhammadAzam u ON r.id_user_muhammadAzam = u.id_user_muhammadAzam
        WHERE r.uid_rfid_muhammadAzam = '$uid_rfid_muhammadAzam'
        AND r.status_rfid_muhammadAzam = 'aktif'
        LIMIT 1
    ";

    $query_muhammadAzam = mysqli_query($koneksi_muhammadAzam, $sql_muhammadAzam);
    $data_muhammadAzam = mysqli_fetch_assoc($query_muhammadAzam);

    if ($data_muhammadAzam) {

        $_SESSION['login_muhammadAzam'] = true;
        $_SESSION['id_user_muhammadAzam'] = $data_muhammadAzam['id_user_muhammadAzam'];
        $_SESSION['nama_muhammadAzam'] = $data_muhammadAzam['nama_muhammadAzam'];
        $_SESSION['role_muhammadAzam'] = $data_muhammadAzam['role_muhammadAzam'];

        if ($data_muhammadAzam['role_muhammadAzam'] == "admin") {
            header("Location: admin_muhammadAzam/dashboard_muhammadAzam.php");
            exit;
        } elseif ($data_muhammadAzam['role_muhammadAzam'] == "siswa") {
            header("Location: siswa_muhammadAzam/dashboard_muhammadAzam.php");
            exit;
        } else {
            $pesan_muhammadAzam = "❌ Role tidak dikenali!";
        }

    } else {
        $pesan_muhammadAzam = "❌ UID RFID tidak ditemukan / tidak aktif!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login RFID | Sistem Akademik</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Inter',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg,#e3ebf6,#f6f8fb);
    padding:20px;
}

/* Container utama */
.container_muhammadAzam{
    width:900px;
    max-width:95%;
    background:#ffffff;
    display:flex;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 20px 45px rgba(0,0,0,0.12);
    animation: fadeIn_muhammadAzam 0.6s ease;
}

/* KIRI */
.left_muhammadAzam{
    flex:1;
    background: linear-gradient(135deg,#1e3c72,#2a5298);
    color:#ffffff;
    padding:55px 40px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
}

.left_muhammadAzam h1{
    font-size:34px;
    margin-bottom:16px;
    font-weight:700;
}

.left_muhammadAzam p{
    font-size:15px;
    line-height:1.7;
    opacity:0.9;
    margin-bottom:30px;
}

.left_muhammadAzam img{
    max-width:55%;
    transition:0.3s;
    filter: drop-shadow(0px 10px 18px rgba(0,0,0,0.2));
}

.left_muhammadAzam img:hover{
    transform:scale(1.03);
}

/* KANAN */
.right_muhammadAzam{
    flex:1;
    background:#f4f6fb;
    padding:55px 40px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.right_muhammadAzam h2{
    font-size:26px;
    color:#1d1f2f;
    margin-bottom:8px;
    font-weight:700;
}

.right_muhammadAzam p{
    font-size:14px;
    color:#555;
    margin-bottom:25px;
}

/* Input */
.right_muhammadAzam input{
    width:100%;
    padding:14px 15px;
    font-size:15px;
    border-radius:12px;
    border:1px solid #cfd3dd;
    outline:none;
    transition:0.3s;
    background:white;
}

.right_muhammadAzam input:focus{
    border-color:#1e3c72;
    box-shadow:0 0 6px rgba(30,60,114,0.25);
}

/* Info kecil */
.info_uid_muhammadAzam{
    margin-top:18px;
    font-size:13px;
    color:#666;
    line-height:1.6;
}

/* Alert error */
.alert_muhammadAzam{
    margin-top:18px;
    background:#ffe3e3;
    border-left:5px solid #e74c3c;
    padding:12px 14px;
    border-radius:10px;
    color:#c0392b;
    font-size:14px;
}

/* Animasi */
@keyframes fadeIn_muhammadAzam{
    from{opacity:0; transform:translateY(15px);}
    to{opacity:1; transform:translateY(0);}
}

/* Responsive */
@media(max-width:768px){
    .container_muhammadAzam{
        flex-direction:column;
    }

    .left_muhammadAzam{
        padding:40px 30px;
    }

    .right_muhammadAzam{
        padding:40px 30px;
    }
}
</style>
</head>

<body>

<div class="container_muhammadAzam">

    <!-- KIRI -->
    <div class="left_muhammadAzam">
        <h1>Sistem Akademik RFID</h1>
        <p>
            Sistem informasi sekolah berbasis RFID<br>
            untuk login siswa dan admin secara cepat dan aman.
        </p>

        <!-- Ganti nama file logo sesuai punyamu -->
        <img src="assets_muhammadAzam/img_muhammadAzam/logo_sekolah.png" alt="Logo Sekolah">
    </div>

    <!-- KANAN -->
    <div class="right_muhammadAzam">
        <h2>Scan Kartu RFID</h2>
        <p>Tempelkan kartu RFID Anda pada reader</p>

        <form method="POST" id="formRFID_muhammadAzam">
            <input type="text"
                   name="uid_rfid_muhammadAzam"
                   id="uid_rfid_muhammadAzam"
                   placeholder="Scan RFID"
                   autofocus
                   required>
            <input type="hidden" name="login_muhammadAzam" value="1">
        </form>

        <?php if ($pesan_muhammadAzam != "") { ?>
            <div class="alert_muhammadAzam">
                <?php echo $pesan_muhammadAzam; ?>
            </div>
        <?php } ?>

        <div class="info_uid_muhammadAzam">
            <b>UID Testing:</b><br>
            Admin UID: ADMIN123456<br>
            Siswa UID: SISWA123456
        </div>
    </div>

</div>

<script>
// Auto submit RFID (biasanya UID minimal 8 karakter)
const uid_muhammadAzam = document.getElementById("uid_rfid_muhammadAzam");

uid_muhammadAzam.addEventListener("input", function(){
    if(this.value.length >= 8){
        document.getElementById("formRFID_muhammadAzam").submit();
    }
});
</script>

</body>
</html>
