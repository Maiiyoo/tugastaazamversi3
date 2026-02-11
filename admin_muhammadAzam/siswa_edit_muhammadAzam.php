<?php
$judul_halaman_muhammadAzam = "Edit Siswa";
$menu_active_muhammadAzam = "siswa";

include "header_muhammadAzam.php";
include "sidebar_muhammadAzam.php";

$pesan_muhammadAzam = "";

/* =========================
   VALIDASI ID DARI URL
   ========================= */
if(!isset($_GET['id']) || $_GET['id'] == ""){
    echo "<script>
        alert('ID siswa tidak ditemukan!');
        window.location='siswa_list_muhammadAzam.php';
    </script>";
    exit;
}

$id_siswa_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_GET['id']);

/* =========================
   AMBIL DATA SISWA
   ========================= */
$data_siswa_muhammadAzam = mysqli_query($koneksi_muhammadAzam, "
    SELECT * FROM siswa_muhammadAzam 
    WHERE id_siswa_muhammadAzam='$id_siswa_muhammadAzam'
");
$siswa_muhammadAzam = mysqli_fetch_assoc($data_siswa_muhammadAzam);

if(!$siswa_muhammadAzam){
    echo "<script>
        alert('Data siswa tidak ditemukan!');
        window.location='siswa_list_muhammadAzam.php';
    </script>";
    exit;
}

/* =========================
   AMBIL DATA KELAS
   ========================= */
$data_kelas_muhammadAzam = mysqli_query($koneksi_muhammadAzam, "
    SELECT * FROM kelas_muhammadAzam 
    ORDER BY nama_kelas_muhammadAzam ASC
");

/* =========================
   PROSES UPDATE
   ========================= */
if(isset($_POST['update_muhammadAzam'])){

    $nis_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['nis_muhammadAzam']);
    $nama_siswa_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['nama_siswa_muhammadAzam']);
    $jenis_kelamin_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['jenis_kelamin_muhammadAzam']);
    $alamat_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['alamat_muhammadAzam']);
    $id_kelas_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['id_kelas_muhammadAzam']);

    $tempat_lahir_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['tempat_lahir_muhammadAzam']);
    $tanggal_lahir_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['tanggal_lahir_muhammadAzam']);
    $no_hp_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['no_hp_muhammadAzam']);

    /* cek NIS unik (kecuali dirinya sendiri) */
    $cek_nis_muhammadAzam = mysqli_query($koneksi_muhammadAzam, "
        SELECT * FROM siswa_muhammadAzam 
        WHERE nis_muhammadAzam='$nis_muhammadAzam' 
        AND id_siswa_muhammadAzam != '$id_siswa_muhammadAzam'
    ");

    if(mysqli_num_rows($cek_nis_muhammadAzam) > 0){
        $pesan_muhammadAzam = "❌ NIS sudah dipakai siswa lain!";
    }else{

        $update_muhammadAzam = mysqli_query($koneksi_muhammadAzam, "
            UPDATE siswa_muhammadAzam SET
                id_kelas_muhammadAzam='$id_kelas_muhammadAzam',
                nis_muhammadAzam='$nis_muhammadAzam',
                nama_siswa_muhammadAzam='$nama_siswa_muhammadAzam',
                jenis_kelamin_muhammadAzam='$jenis_kelamin_muhammadAzam',
                tempat_lahir_muhammadAzam='$tempat_lahir_muhammadAzam',
                tanggal_lahir_muhammadAzam='$tanggal_lahir_muhammadAzam',
                alamat_muhammadAzam='$alamat_muhammadAzam',
                no_hp_muhammadAzam='$no_hp_muhammadAzam'
            WHERE id_siswa_muhammadAzam='$id_siswa_muhammadAzam'
        ");

        if($update_muhammadAzam){
            echo "<script>
                alert('Data siswa berhasil diupdate!');
                window.location='siswa_list_muhammadAzam.php';
            </script>";
            exit;
        }else{
            $pesan_muhammadAzam = "❌ Gagal update data! (" . mysqli_error($koneksi_muhammadAzam) . ")";
        }
    }
}
?>

<div class="content_muhammadAzam" id="content_muhammadAzam">

    <div class="page_title_muhammadAzam">Edit Siswa</div>

    <div class="box_muhammadAzam">

        <?php if($pesan_muhammadAzam != ""){ ?>
            <div style="background:#ffe5e5;padding:12px;border-radius:12px;color:#c0392b;font-weight:700;margin-bottom:15px;">
                <?php echo $pesan_muhammadAzam; ?>
            </div>
        <?php } ?>

        <form method="POST">

            <div class="row_muhammadAzam">
                <div>
                    <div class="label_muhammadAzam">ID Siswa</div>
                    <input class="input_muhammadAzam" type="text"
                           value="<?php echo $siswa_muhammadAzam['id_siswa_muhammadAzam']; ?>" readonly>
                </div>

                <div>
                    <div class="label_muhammadAzam">NIS</div>
                    <input class="input_muhammadAzam" type="text" name="nis_muhammadAzam"
                           value="<?php echo $siswa_muhammadAzam['nis_muhammadAzam']; ?>" required>
                </div>
            </div>

            <div style="margin-top:14px;">
                <div class="label_muhammadAzam">Nama Siswa</div>
                <input class="input_muhammadAzam" type="text" name="nama_siswa_muhammadAzam"
                       value="<?php echo $siswa_muhammadAzam['nama_siswa_muhammadAzam']; ?>" required>
            </div>

            <div class="row_muhammadAzam" style="margin-top:14px;">
                <div>
                    <div class="label_muhammadAzam">Jenis Kelamin</div>
                    <select class="input_muhammadAzam" name="jenis_kelamin_muhammadAzam" required>
                        <option value="">-- Pilih --</option>
                        <option value="L" <?php echo ($siswa_muhammadAzam['jenis_kelamin_muhammadAzam']=="L") ? "selected" : ""; ?>>Laki-laki</option>
                        <option value="P" <?php echo ($siswa_muhammadAzam['jenis_kelamin_muhammadAzam']=="P") ? "selected" : ""; ?>>Perempuan</option>
                    </select>
                </div>

                <div>
                    <div class="label_muhammadAzam">Kelas</div>
                    <select class="input_muhammadAzam" name="id_kelas_muhammadAzam" required>
                        <option value="">-- Pilih Kelas --</option>
                        <?php while($k_muhammadAzam = mysqli_fetch_assoc($data_kelas_muhammadAzam)){ ?>
                            <option value="<?php echo $k_muhammadAzam['id_kelas_muhammadAzam']; ?>"
                                <?php echo ($siswa_muhammadAzam['id_kelas_muhammadAzam']==$k_muhammadAzam['id_kelas_muhammadAzam']) ? "selected" : ""; ?>>
                                <?php echo $k_muhammadAzam['nama_kelas_muhammadAzam']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row_muhammadAzam" style="margin-top:14px;">
                <div>
                    <div class="label_muhammadAzam">Tempat Lahir</div>
                    <input class="input_muhammadAzam" type="text" name="tempat_lahir_muhammadAzam"
                           value="<?php echo $siswa_muhammadAzam['tempat_lahir_muhammadAzam']; ?>" placeholder="Contoh: Bandung">
                </div>

                <div>
                    <div class="label_muhammadAzam">Tanggal Lahir</div>
                    <input class="input_muhammadAzam" type="date" name="tanggal_lahir_muhammadAzam"
                           value="<?php echo $siswa_muhammadAzam['tanggal_lahir_muhammadAzam']; ?>">
                </div>
            </div>

            <div style="margin-top:14px;">
                <div class="label_muhammadAzam">No HP</div>
                <input class="input_muhammadAzam" type="text" name="no_hp_muhammadAzam"
                       value="<?php echo $siswa_muhammadAzam['no_hp_muhammadAzam']; ?>" placeholder="Contoh: 08xxxx">
            </div>

            <div style="margin-top:14px;">
                <div class="label_muhammadAzam">Alamat</div>
                <textarea class="input_muhammadAzam" name="alamat_muhammadAzam" rows="4" placeholder="Alamat siswa"><?php echo $siswa_muhammadAzam['alamat_muhammadAzam']; ?></textarea>
            </div>

            <div style="margin-top:18px;display:flex;gap:10px;flex-wrap:wrap;">
                <button type="submit" name="update_muhammadAzam" class="btn_muhammadAzam btn-primary_muhammadAzam" style="border:none;cursor:pointer;">
                    💾 Update
                </button>

                <a href="siswa_list_muhammadAzam.php" class="btn_muhammadAzam" style="background:#ddd;color:#333;">
                    ⬅ Kembali
                </a>
            </div>

        </form>

    </div>

</div>

<?php include "footer_muhammadAzam.php"; ?>
