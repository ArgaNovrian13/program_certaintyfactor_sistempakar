<?php
session_start();
require 'koneksi.php';
require 'read.php';
if(!isset($_SESSION['username'])){
  echo "<script>
  alert('Harus Login Donk!');
  document.location.href='login.php';
  </script>";
}
if(isset($_SESSION['id_pasien'])){
    $id_pasien = $_SESSION['id_pasien'];

    // Mengambil data pasien
    $sql_pasien = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id_pasien = '$id_pasien'");
    $data_pasien = mysqli_fetch_assoc($sql_pasien);

    // Mengambil data gejala pasien
    $sql_gejala_pasien = "SELECT nama_gejala, kode_gejala 
                          FROM gejala_pasien 
                          INNER JOIN gejala ON gejala_pasien.id_gejala = gejala.id_gejala 
                          WHERE gejala_pasien.id_pasien = '$id_pasien'";
    $data_gejala_pasien = mysqli_query($koneksi, $sql_gejala_pasien);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proses Diagnosa</title>
  <!-- Link AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <!-- Link CDN Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="./style/proses.css">
</head>
<body class="bg-dark">
 <div class="container">
  <div class="bg-success p-4 rounded-2 mt-3" data-aos="fade-right" data-aos-duration="1000">
    <div class="mt-2 mb-4 ">
      <h2 class="fs-1 text-light">Data Pasien dan Gejala</h2>
    </div>
    <div class="bg-warning p-2 rounded-2" data-aos="fade-left" data-aos-duration="1000">
     <?php if(isset($data_pasien)): ?>
    <p class="mt-3 fs-3"><strong>NAMA PASIEN:</strong> <?= $data_pasien['nama_pasien']?></p>
    <?php else: ?>
    <p><strong>NAMA PASIEN:</strong> Data pasien tidak ditemukan</p>
    <?php endif; ?>
    </div>
  </div>
 <div class="mt-3 fs-3 bg-info rounded-2 p-2 mb-2" data-aos="zoom-in" data-aos-duration="1000">
    <p><strong>Gejala:</strong></p>

  <ul>
    <?php if(mysqli_num_rows($data_gejala_pasien) > 0): ?>
      <?php while($baris_gejala_pasien = mysqli_fetch_assoc($data_gejala_pasien)): ?>
        <li><?= $baris_gejala_pasien['nama_gejala'] . ' (' . $baris_gejala_pasien['kode_gejala'] . ')'; ?></li>
      <?php endwhile; ?>
    <?php else: ?>
      <li>Data gejala pasien tidak ditemukan</li>
    <?php endif; ?>
  </ul>
  </div>
  <!-- Menambahkan tombol "Hitung" -->
  
  <form action="hitung.php" method="POST" >
    <input type="hidden" name="id_pasien" value="<?= $id_pasien ?>">
    <button type="submit" name="hitung" class="btn btn-primary w-100 p-3 fs-3">Hitung</button>
  </form>

 </div>
  <!-- Link Script Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <!-- Link Script AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>
      