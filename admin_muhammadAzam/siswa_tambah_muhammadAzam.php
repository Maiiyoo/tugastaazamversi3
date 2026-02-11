<?php
include "header_muhammadAzam.php";
include "sidebar_muhammadAzam.php";

$judul_halaman_muhammadAzam = "Tambah Siswa";
$menu_active_muhammadAzam = "siswa";
$pesan_muhammadAzam = "";

/* ==========================
   GENERATE ID SISWA (SIS001)
   ========================== */
function generate_id_siswa_muhammadAzam($koneksi_muhammadAzam){
    $cek_muhammadAzam = mysqli_query($koneksi_muhammadAzam, "
        SELECT id_siswa_muhammadAzam 
        FROM siswa_muhammadAzam 
        ORDER BY id_siswa_muhammadAzam DESC 
        LIMIT 1
    ");
    $data_muhammadAzam = mysqli_fetch_assoc($cek_muhammadAzam);

    if($data_muhammadAzam){
        $last_id_muhammadAzam = $data_muhammadAzam['id_siswa_muhammadAzam']; // SIS007
        $angka_muhammadAzam = (int) substr($last_id_muhammadAzam, 3);
        $angka_muhammadAzam++;
        return "SIS" . str_pad($angka_muhammadAzam, 3, "0", STR_PAD_LEFT);
    }else{
        return "SIS001";
    }
}

/* ==========================
   GENERATE ID USER (USR001)
   ========================== */
function generate_id_user_muhammadAzam($koneksi_muhammadAzam){
    $cek_muhammadAzam = mysqli_query($koneksi_muhammadAzam, "
        SELECT id_user_muhammadAzam 
        FROM user_muhammadAzam 
        ORDER BY id_user_muhammadAzam DESC 
        LIMIT 1
    ");
    $data_muhammadAzam = mysqli_fetch_assoc($cek_muhammadAzam);

    if($data_muhammadAzam){
        $last_id_muhammadAzam = $data_muhammadAzam['id_user_muhammadAzam']; // USR007
        $angka_muhammadAzam = (int) substr($last_id_muhammadAzam, 3);
        $angka_muhammadAzam++;
        return "USR" . str_pad($angka_muhammadAzam, 3, "0", STR_PAD_LEFT);
    }else{
        return "USR001";
    }
}

$id_siswa_baru_muhammadAzam = generate_id_siswa_muhammadAzam($koneksi_muhammadAzam);

/* Ambil data kelas */
$data_kelas_muhammadAzam = mysqli_query($koneksi_muhammadAzam, "
    SELECT * FROM kelas_muhammadAzam 
    ORDER BY nama_kelas_muhammadAzam ASC
");

if(isset($_POST['simpan_muhammadAzam'])){

    // ambil data dari form
    $id_siswa_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['id_siswa_muhammadAzam']);
    $nis_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['nis_muhammadAzam']);
    $username_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['username_muhammadAzam']);
    $nama_siswa_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['nama_siswa_muhammadAzam']);
    $jenis_kelamin_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['jenis_kelamin_muhammadAzam']);
    $tempat_lahir_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['tempat_lahir_muhammadAzam']);
    $tanggal_lahir_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['tanggal_lahir_muhammadAzam']);
    $alamat_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['alamat_muhammadAzam']);
    $no_hp_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['no_hp_muhammadAzam']);
    $id_kelas_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_POST['id_kelas_muhammadAzam']);

    // validasi simple
    if($id_kelas_muhammadAzam == ""){
        $pesan_muhammadAzam = "❌ Kelas wajib dipilih!";
    } elseif($username_muhammadAzam == ""){
        $pesan_muhammadAzam = "❌ Username wajib diisi!";
    } else {

        /* cek NIS unik */
        $cek_nis_muhammadAzam = mysqli_query($koneksi_muhammadAzam, "
            SELECT nis_muhammadAzam 
            FROM siswa_muhammadAzam 
            WHERE nis_muhammadAzam='$nis_muhammadAzam'
            LIMIT 1
        ");

        if(mysqli_num_rows($cek_nis_muhammadAzam) > 0){
            $pesan_muhammadAzam = "❌ NIS sudah terdaftar!";
        }else{

            /* cek username unik */
            $cek_username_muhammadAzam = mysqli_query($koneksi_muhammadAzam, "
                SELECT username_muhammadAzam
                FROM user_muhammadAzam
                WHERE username_muhammadAzam='$username_muhammadAzam'
                LIMIT 1
            ");

            if(mysqli_num_rows($cek_username_muhammadAzam) > 0){
                $pesan_muhammadAzam = "❌ Username sudah dipakai!";
            }else{

                // auto generate id user
                $id_user_baru_muhammadAzam = generate_id_user_muhammadAzam($koneksi_muhammadAzam);

                // role otomatis
                $role_user_muhammadAzam = "siswa";

                // mulai transaksi biar aman
                mysqli_begin_transaction($koneksi_muhammadAzam);

                try {

                    // 1) INSERT user
                    $sql_user_muhammadAzam = "
                        INSERT INTO user_muhammadAzam
                        (
                            id_user_muhammadAzam,
                            username_muhammadAzam,
                            nama_muhammadAzam,
                            role_muhammadAzam
                        )
                        VALUES
                        (
                            '$id_user_baru_muhammadAzam',
                            '$username_muhammadAzam',
                            '$nama_siswa_muhammadAzam',
                            '$role_user_muhammadAzam'
                        )
                    ";

                    $insert_user_muhammadAzam = mysqli_query($koneksi_muhammadAzam, $sql_user_muhammadAzam);

                    if(!$insert_user_muhammadAzam){
                        throw new Exception("Gagal insert user: " . mysqli_error($koneksi_muhammadAzam));
                    }

                    // 2) INSERT siswa
                    $sql_insert_muhammadAzam = "
                        INSERT INTO siswa_muhammadAzam
                        (
                            id_siswa_muhammadAzam,
                            id_user_muhammadAzam,
                            id_kelas_muhammadAzam,
                            nis_muhammadAzam,
                            nama_siswa_muhammadAzam,
                            jenis_kelamin_muhammadAzam,
                            tempat_lahir_muhammadAzam,
                            tanggal_lahir_muhammadAzam,
                            alamat_muhammadAzam,
                            no_hp_muhammadAzam
                        )
                        VALUES
                        (
                            '$id_siswa_muhammadAzam',
                            '$id_user_baru_muhammadAzam',
                            '$id_kelas_muhammadAzam',
                            '$nis_muhammadAzam',
                            '$nama_siswa_muhammadAzam',
                            '$jenis_kelamin_muhammadAzam',
                            '$tempat_lahir_muhammadAzam',
                            '$tanggal_lahir_muhammadAzam',
                            '$alamat_muhammadAzam',
                            '$no_hp_muhammadAzam'
                        )
                    ";

                    $insert_muhammadAzam = mysqli_query($koneksi_muhammadAzam, $sql_insert_muhammadAzam);

                    if(!$insert_muhammadAzam){
                        throw new Exception("Gagal insert siswa: " . mysqli_error($koneksi_muhammadAzam));
                    }

                    // commit
                    mysqli_commit($koneksi_muhammadAzam);

                    header("Location: siswa_list_muhammadAzam.php");
                    exit;

                } catch (Exception $e) {

                    // rollback
                    mysqli_rollback($koneksi_muhammadAzam);

                    $pesan_muhammadAzam = "❌ " . $e->getMessage();
                }
            }
        }
    }
}
?>

<div class="content_muhammadAzam" id="content_muhammadAzam">

    <div class="page_title_muhammadAzam">Tambah Siswa</div>

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
                    <input class="input_muhammadAzam" type="text" name="id_siswa_muhammadAzam"
                           value="<?php echo $id_siswa_baru_muhammadAzam; ?>" readonly>
                </div>

                <div>
                    <div class="label_muhammadAzam">NIS</div>
                    <input class="input_muhammadAzam" type="text" name="nis_muhammadAzam" required placeholder="Contoh: 2024001">
                </div>
            </div>

            <div style="margin-top:14px;">
                <div class="label_muhammadAzam">Username Login</div>
                <input class="input_muhammadAzam" type="text" name="username_muhammadAzam" required placeholder="Contoh: azam_rplb">
            </div>

            <div style="margin-top:14px;">
                <div class="label_muhammadAzam">Nama Siswa</div>
                <input class="input_muhammadAzam" type="text" name="nama_siswa_muhammadAzam" required placeholder="Nama lengkap siswa">
            </div>

            <div class="row_muhammadAzam" style="margin-top:14px;">
                <div>
                    <div class="label_muhammadAzam">Jenis Kelamin</div>
                    <select class="input_muhammadAzam" name="jenis_kelamin_muhammadAzam" required>
                        <option value="">-- Pilih --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div>
                    <div class="label_muhammadAzam">Kelas</div>
                    <select class="input_muhammadAzam" name="id_kelas_muhammadAzam" required>
                        <option value="">-- Pilih Kelas --</option>
                        <?php while($k_muhammadAzam = mysqli_fetch_assoc($data_kelas_muhammadAzam)){ ?>
                            <option value="<?php echo $k_muhammadAzam['id_kelas_muhammadAzam']; ?>">
                                <?php echo $k_muhammadAzam['nama_kelas_muhammadAzam']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row_muhammadAzam" style="margin-top:14px;">
                <div>
                    <div class="label_muhammadAzam">Tempat Lahir</div>
                    <input class="input_muhammadAzam" type="text" name="tempat_lahir_muhammadAzam" placeholder="Contoh: Bandung">
                </div>

                <div>
                    <div class="label_muhammadAzam">Tanggal Lahir</div>
                    <input class="input_muhammadAzam" type="date" name="tanggal_lahir_muhammadAzam">
                </div>
            </div>

            <div style="margin-top:14px;">
                <div class="label_muhammadAzam">No HP</div>
                <input class="input_muhammadAzam" type="text" name="no_hp_muhammadAzam" placeholder="Contoh: 08xxxxxxxxxx">
            </div>

            <div style="margin-top:14px;">
                <div class="label_muhammadAzam">Alamat</div>
                <textarea class="input_muhammadAzam" name="alamat_muhammadAzam" rows="4" placeholder="Alamat siswa"></textarea>
            </div>

            <div style="margin-top:18px;display:flex;gap:10px;flex-wrap:wrap;">
                <button type="submit" name="simpan_muhammadAzam" class="btn_muhammadAzam btn-primary_muhammadAzam" style="border:none;cursor:pointer;">
                    💾 Simpan
                </button>

                <a href="siswa_list_muhammadAzam.php" class="btn_muhammadAzam" style="background:#ddd;color:#333;">
                    ⬅ Kembali
                </a>
            </div>

        </form>

        <div style="margin-top:15px;font-size:13px;color:#666;">
            <b>Catatan:</b> Role otomatis = siswa. Username digunakan untuk identitas akun user (beda dari NIS).
        </div>

    </div>

</div>

<?php include "footer_muhammadAzam.php"; ?>
