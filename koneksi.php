<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "certainty_factor";

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengubah SQL mode
mysqli_query($koneksi, "SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");

// Menetapkan nilai group_concat_max_len untuk mencegah batasan query GROUP_CONCAT
mysqli_query($koneksi, "SET SESSION group_concat_max_len = 1000000;");
?>
