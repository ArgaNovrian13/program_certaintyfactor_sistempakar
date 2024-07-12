<?php

require 'koneksi.php';
//  Read Data Gejala
$gejala = mysqli_query($koneksi, "SELECT * FROM gejala");
$num_rows_gejala = mysqli_num_rows($gejala);
if ($num_rows_gejala > 0) {
    while ($baris_gejala = mysqli_fetch_assoc($gejala)) {
        $datagejala[] = $baris_gejala;
    }
}
//  Read Data Aturan /Rule
$aturan = mysqli_query($koneksi, "SELECT * FROM aturan");
$num_rows_aturan = mysqli_num_rows($aturan);
if ($num_rows_aturan > 0) {
    while ($baris_aturan = mysqli_fetch_assoc($aturan)) {
        $dataaturan[] = $baris_aturan;
    }
}
//  Read Data Penyakit
$penyakit = mysqli_query($koneksi, "SELECT * FROM penyakit");
$num_rows_penyakit = mysqli_num_rows($penyakit);
if ($num_rows_penyakit > 0) {
    while ($baris_penyakit = mysqli_fetch_assoc($penyakit)) {
        $datapenyakit[] = $baris_penyakit;
    }
}
//  Read Data Pasien
$pasien = mysqli_query($koneksi, "SELECT * FROM pasien");
$num_rows_pasien = mysqli_num_rows($pasien);
if ($num_rows_pasien > 0) {
    while ($baris_pasien = mysqli_fetch_assoc($pasien)) {
        $datapasien[] = $baris_pasien;
    }
}
//  Read Data Admin
$admin = mysqli_query($koneksi,"SELECT * FROM admin");
$num_rows_admin  = mysqli_num_rows($admin);
if($num_rows_admin > 0){
    while ($baris_admin = mysqli_fetch_assoc($admin)) {
        $dataadmin[] = $baris_admin;
    }
}
// Read Data Pasien
// $datapasien = mysqli_query($koneksi, "SELECT nama_pasien")