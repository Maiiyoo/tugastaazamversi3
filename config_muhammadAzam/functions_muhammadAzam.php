<?php
function hitungHurufNilai_muhammadAzam($nilai_angka_muhammadAzam) {
    if ($nilai_angka_muhammadAzam >= 90) return "A";
    if ($nilai_angka_muhammadAzam >= 80) return "B";
    if ($nilai_angka_muhammadAzam >= 70) return "C";
    if ($nilai_angka_muhammadAzam >= 60) return "D";
    return "E";
}

function generate_id_muhammadAzam($koneksi_muhammadAzam, $tabel_muhammadAzam, $kolom_muhammadAzam, $prefix_muhammadAzam){

    $query_muhammadAzam = mysqli_query(
        $koneksi_muhammadAzam,
        "SELECT $kolom_muhammadAzam AS id_muhammadAzam
         FROM $tabel_muhammadAzam
         ORDER BY $kolom_muhammadAzam DESC
         LIMIT 1"
    );

    $data_muhammadAzam = mysqli_fetch_assoc($query_muhammadAzam);

    if($data_muhammadAzam){
        $idTerakhir_muhammadAzam = $data_muhammadAzam['id_muhammadAzam'];
        $angka_muhammadAzam = (int) substr($idTerakhir_muhammadAzam, 3);
        $angka_muhammadAzam++;
    } else {
        $angka_muhammadAzam = 1;
    }

    return $prefix_muhammadAzam . str_pad($angka_muhammadAzam, 3, "0", STR_PAD_LEFT);
}
