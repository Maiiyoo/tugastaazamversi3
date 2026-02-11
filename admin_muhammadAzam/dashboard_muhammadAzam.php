<?php
$judul_halaman_muhammadAzam = "Dashboard Admin";
$menu_active_muhammadAzam = "dashboard";

include "header_muhammadAzam.php";
include "sidebar_muhammadAzam.php";

$total_siswa_muhammadAzam = mysqli_fetch_assoc(mysqli_query($koneksi_muhammadAzam, "SELECT COUNT(*) as total_muhammadAzam FROM siswa_muhammadAzam"))['total_muhammadAzam'];
$total_guru_muhammadAzam = mysqli_fetch_assoc(mysqli_query($koneksi_muhammadAzam, "SELECT COUNT(*) as total_muhammadAzam FROM guru_muhammadAzam"))['total_muhammadAzam'];
$total_mapel_muhammadAzam = mysqli_fetch_assoc(mysqli_query($koneksi_muhammadAzam, "SELECT COUNT(*) as total_muhammadAzam FROM mapel_muhammadAzam"))['total_muhammadAzam'];
$total_nilai_muhammadAzam = mysqli_fetch_assoc(mysqli_query($koneksi_muhammadAzam, "SELECT COUNT(*) as total_muhammadAzam FROM nilai_muhammadAzam"))['total_muhammadAzam'];
?>

<div class="content_muhammadAzam" id="content_muhammadAzam">

    <div class="page_title_muhammadAzam">Dashboard</div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:18px;">

        <div class="box_muhammadAzam">
            <div style="font-size:13px;color:#666;margin-bottom:8px;">Total Siswa</div>
            <div style="font-size:30px;font-weight:900;color:#1e3c72;">
                <?php echo $total_siswa_muhammadAzam; ?>
            </div>
        </div>

        <div class="box_muhammadAzam">
            <div style="font-size:13px;color:#666;margin-bottom:8px;">Total Guru</div>
            <div style="font-size:30px;font-weight:900;color:#1e3c72;">
                <?php echo $total_guru_muhammadAzam; ?>
            </div>
        </div>

        <div class="box_muhammadAzam">
            <div style="font-size:13px;color:#666;margin-bottom:8px;">Total Mapel</div>
            <div style="font-size:30px;font-weight:900;color:#1e3c72;">
                <?php echo $total_mapel_muhammadAzam; ?>
            </div>
        </div>

        <div class="box_muhammadAzam">
            <div style="font-size:13px;color:#666;margin-bottom:8px;">Total Nilai</div>
            <div style="font-size:30px;font-weight:900;color:#1e3c72;">
                <?php echo $total_nilai_muhammadAzam; ?>
            </div>
        </div>

    </div>

    <div class="box_muhammadAzam" style="margin-top:20px;">
        <h3 style="font-size:16px;margin-bottom:8px;">Aksi Cepat</h3>
        <p style="font-size:13px;color:#666;line-height:1.6;">
            Tambahkan siswa baru dengan ID otomatis (SIS001, SIS002, dst).
        </p>

        <a href="siswa_tambah_muhammadAzam.php" class="btn_muhammadAzam btn-primary_muhammadAzam" style="margin-top:12px;">
            + Tambah Siswa
        </a>
    </div>

</div>

<?php include "footer_muhammadAzam.php"; ?>
