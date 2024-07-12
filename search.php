<?php
require 'koneksi.php';

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT 
    pasien.id_pasien,
    pasien.nama_pasien,
    GROUP_CONCAT(gejala.nama_gejala ORDER BY gejala.id_gejala SEPARATOR ', ') AS nama_gejala,
    hasil_diagnosa.certainty_factor,
    penyakit.nama_penyakit AS hasil_diagnosa,
    pasien.tanggal_kunjungan
FROM 
    hasil_diagnosa
JOIN 
    pasien ON hasil_diagnosa.id_pasien = pasien.id_pasien
JOIN 
    gejala ON hasil_diagnosa.id_gejala = gejala.id_gejala
JOIN 
    penyakit ON hasil_diagnosa.id_penyakit = penyakit.id_penyakit
WHERE 
    pasien.nama_pasien LIKE '%$searchTerm%' OR 
    penyakit.nama_penyakit LIKE '%$searchTerm%'
GROUP BY 
    pasien.id_pasien, pasien.nama_pasien, hasil_diagnosa.certainty_factor, penyakit.nama_penyakit, pasien.tanggal_kunjungan";

$result = mysqli_query($koneksi, $sql);
if (!$result) {
    die('Error: ' . mysqli_error($koneksi));
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>
