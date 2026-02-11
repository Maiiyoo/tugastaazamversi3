<?php
$judul_halaman_muhammadAzam = "Data Siswa";
$menu_active_muhammadAzam = "siswa";

include "header_muhammadAzam.php";
include "sidebar_muhammadAzam.php";

/* =========================
   SEARCH
   ========================= */
$keyword_muhammadAzam = "";
if(isset($_GET['keyword_muhammadAzam'])){
    $keyword_muhammadAzam = mysqli_real_escape_string($koneksi_muhammadAzam, $_GET['keyword_muhammadAzam']);
}

/* =========================
   FILTER SORTING
   ========================= */
$sort_by_muhammadAzam = "id_siswa_muhammadAzam";
$sort_order_muhammadAzam = "DESC";

/* whitelist sorting (biar aman) */
$allowed_sort_muhammadAzam = [
    "id_siswa_muhammadAzam",
    "nis_muhammadAzam",
    "nama_siswa_muhammadAzam",
    "jenis_kelamin_muhammadAzam",
    "nama_kelas_muhammadAzam",
    "created_at_muhammadAzam"
];

if(isset($_GET['sort_by_muhammadAzam']) && in_array($_GET['sort_by_muhammadAzam'], $allowed_sort_muhammadAzam)){
    $sort_by_muhammadAzam = $_GET['sort_by_muhammadAzam'];
}

if(isset($_GET['sort_order_muhammadAzam'])){
    if($_GET['sort_order_muhammadAzam'] == "ASC"){
        $sort_order_muhammadAzam = "ASC";
    }else{
        $sort_order_muhammadAzam = "DESC";
    }
}

/* =========================
   QUERY DATA
   ========================= */
$sql_muhammadAzam = "
    SELECT siswa_muhammadAzam.*, kelas_muhammadAzam.nama_kelas_muhammadAzam
    FROM siswa_muhammadAzam
    LEFT JOIN kelas_muhammadAzam 
        ON siswa_muhammadAzam.id_kelas_muhammadAzam = kelas_muhammadAzam.id_kelas_muhammadAzam
";

if($keyword_muhammadAzam != ""){
    $sql_muhammadAzam .= "
        WHERE siswa_muhammadAzam.id_siswa_muhammadAzam LIKE '%$keyword_muhammadAzam%'
        OR siswa_muhammadAzam.nis_muhammadAzam LIKE '%$keyword_muhammadAzam%'
        OR siswa_muhammadAzam.nama_siswa_muhammadAzam LIKE '%$keyword_muhammadAzam%'
        OR kelas_muhammadAzam.nama_kelas_muhammadAzam LIKE '%$keyword_muhammadAzam%'
    ";
}

/* ORDER BY */
if($sort_by_muhammadAzam == "nama_kelas_muhammadAzam"){
    $sql_muhammadAzam .= " ORDER BY kelas_muhammadAzam.nama_kelas_muhammadAzam $sort_order_muhammadAzam";
}else{
    $sql_muhammadAzam .= " ORDER BY siswa_muhammadAzam.$sort_by_muhammadAzam $sort_order_muhammadAzam";
}

$data_muhammadAzam = mysqli_query($koneksi_muhammadAzam, $sql_muhammadAzam);
?>

<div class="content_muhammadAzam" id="content_muhammadAzam">

    <div style="display:flex;justify-content:space-between;align-items:center;gap:12px;flex-wrap:wrap;">
        <div class="page_title_muhammadAzam">Data Siswa</div>

        <a href="siswa_tambah_muhammadAzam.php" class="btn_muhammadAzam btn-primary_muhammadAzam">
            ➕ Tambah Siswa
        </a>
    </div>

    <div class="box_muhammadAzam" style="margin-top:14px;">

        <!-- SEARCH + SORT -->
        <form method="GET" style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:14px;align-items:center;">

            <input type="text" name="keyword_muhammadAzam"
                   value="<?php echo htmlspecialchars($keyword_muhammadAzam); ?>"
                   class="input_muhammadAzam"
                   placeholder="Cari: ID / NIS / Nama / Kelas">

            <select name="sort_by_muhammadAzam" class="input_muhammadAzam" style="max-width:210px;">
                <option value="id_siswa_muhammadAzam" <?php echo ($sort_by_muhammadAzam=="id_siswa_muhammadAzam") ? "selected" : ""; ?>>Urutkan: ID</option>
                <option value="nis_muhammadAzam" <?php echo ($sort_by_muhammadAzam=="nis_muhammadAzam") ? "selected" : ""; ?>>Urutkan: NIS</option>
                <option value="nama_siswa_muhammadAzam" <?php echo ($sort_by_muhammadAzam=="nama_siswa_muhammadAzam") ? "selected" : ""; ?>>Urutkan: Nama</option>
                <option value="nama_kelas_muhammadAzam" <?php echo ($sort_by_muhammadAzam=="nama_kelas_muhammadAzam") ? "selected" : ""; ?>>Urutkan: Kelas</option>
                <option value="jenis_kelamin_muhammadAzam" <?php echo ($sort_by_muhammadAzam=="jenis_kelamin_muhammadAzam") ? "selected" : ""; ?>>Urutkan: JK</option>
                <option value="created_at_muhammadAzam" <?php echo ($sort_by_muhammadAzam=="created_at_muhammadAzam") ? "selected" : ""; ?>>Urutkan: Terbaru</option>
            </select>

            <select name="sort_order_muhammadAzam" class="input_muhammadAzam" style="max-width:140px;">
                <option value="ASC" <?php echo ($sort_order_muhammadAzam=="ASC") ? "selected" : ""; ?>>A - Z</option>
                <option value="DESC" <?php echo ($sort_order_muhammadAzam=="DESC") ? "selected" : ""; ?>>Z - A</option>
            </select>

            <button type="submit" class="btn_muhammadAzam btn-primary_muhammadAzam" style="border:none;cursor:pointer;">
                🔍 Terapkan
            </button>

            <?php if($keyword_muhammadAzam != "" || $sort_by_muhammadAzam != "id_siswa_muhammadAzam" || $sort_order_muhammadAzam != "DESC"){ ?>
                <a href="siswa_list_muhammadAzam.php" class="btn_muhammadAzam" style="background:#ddd;color:#333;">
                    ❌ Reset
                </a>
            <?php } ?>

        </form>

        <div style="overflow-x:auto;">
            <table class="table_muhammadAzam">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>JK</th>
                        <th>Kelas</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                $no_muhammadAzam = 1;
                if(mysqli_num_rows($data_muhammadAzam) > 0){
                    while($row_muhammadAzam = mysqli_fetch_assoc($data_muhammadAzam)){
                ?>
                    <tr>
                        <td><?php echo $no_muhammadAzam++; ?></td>
                        <td><b><?php echo $row_muhammadAzam['id_siswa_muhammadAzam']; ?></b></td>
                        <td><?php echo $row_muhammadAzam['nis_muhammadAzam']; ?></td>
                        <td><?php echo $row_muhammadAzam['nama_siswa_muhammadAzam']; ?></td>
                        <td>
                            <?php
                                if($row_muhammadAzam['jenis_kelamin_muhammadAzam'] == "L"){
                                    echo "Laki-laki";
                                }else{
                                    echo "Perempuan";
                                }
                            ?>
                        </td>
                        <td><?php echo $row_muhammadAzam['nama_kelas_muhammadAzam']; ?></td>
                        <td><?php echo $row_muhammadAzam['alamat_muhammadAzam']; ?></td>
                        <td style="white-space:nowrap;">
                            <a href="siswa_edit_muhammadAzam.php?id=<?php echo $row_muhammadAzam['id_siswa_muhammadAzam']; ?>"
                               class="btn_muhammadAzam"
                               style="background:#f1c40f;color:#000;font-weight:700;">
                                ✏ Edit
                            </a>

                            <a href="siswa_hapus_muhammadAzam.php?id=<?php echo $row_muhammadAzam['id_siswa_muhammadAzam']; ?>"
                               class="btn_muhammadAzam"
                               style="background:#e74c3c;color:#fff;font-weight:700;"
                               onclick="return confirm('Yakin mau hapus siswa ini?')">
                                🗑 Hapus
                            </a>
                        </td>
                    </tr>
                <?php
                    }
                }else{
                ?>
                    <tr>
                        <td colspan="8" style="text-align:center;padding:20px;font-weight:700;color:#777;">
                            Data siswa masih kosong.
                        </td>
                    </tr>
                <?php } ?>
                </tbody>

            </table>
        </div>

    </div>

</div>

<?php include "footer_muhammadAzam.php"; ?>
