<?php
session_start();
require 'koneksi.php';
if(!isset($_SESSION['username'])){
  echo "<script>
  alert('Harus Login Donk!');
  document.location.href='login.php';
  </script>";
}
if (isset($_POST['hitung'])) {
    $id_pasien = $_POST['id_pasien'];

    // Ambil nama pasien
    $sql_nama_pasien = mysqli_query($koneksi, "SELECT nama_pasien FROM pasien WHERE id_pasien = '$id_pasien'");
    $nama_pasien = mysqli_fetch_assoc($sql_nama_pasien)['nama_pasien'];

    // Ambil gejala pasien
    $sql_gejala_pasien = mysqli_query($koneksi, "SELECT gejala.nama_gejala 
                                                  FROM gejala_pasien 
                                                  JOIN gejala ON gejala_pasien.id_gejala = gejala.id_gejala 
                                                  WHERE gejala_pasien.id_pasien = '$id_pasien'");
    
    if (!$sql_gejala_pasien) {
        echo "Error: " . mysqli_error($koneksi) . "<br>";
        exit();
    }
    
    $gejala_pasien = array();
    while ($row = mysqli_fetch_assoc($sql_gejala_pasien)) {
        $gejala_pasien[] = $row['nama_gejala'];
    }

    if (empty($gejala_pasien)) {
        echo "Tidak ada gejala yang ditemukan untuk pasien ini.";
        exit();
    }

    // Inisialisasi array untuk menyimpan CF setiap penyakit
    $cf_penyakit = [];
    $detail_perhitungan = [];

    // Mengambil aturan yang sesuai dengan gejala pasien
    $sql_aturan = mysqli_query($koneksi, "SELECT id_penyakit, id_gejala, certainty_factor 
                                          FROM aturan 
                                          WHERE id_gejala IN (
                                          SELECT id_gejala FROM gejala_pasien WHERE id_pasien = '$id_pasien')");

    if (!$sql_aturan) {
        echo "Error: " . mysqli_error($koneksi) . "<br>";
        exit();
    }

    // Proses perhitungan CF
    while ($row = mysqli_fetch_assoc($sql_aturan)) {
        $id_penyakit = $row['id_penyakit'];
        $id_gejala = $row['id_gejala'];
        $cf_aturan = $row['certainty_factor'];

        if (!isset($cf_penyakit[$id_penyakit])) {
            $cf_penyakit[$id_penyakit] = $cf_aturan;
            $detail_perhitungan[$id_penyakit] = "CF($id_gejala) = $cf_aturan";
        } else {
            $cf_penyakit[$id_penyakit] = $cf_penyakit[$id_penyakit] + $cf_aturan * (1 - $cf_penyakit[$id_penyakit]);
            $detail_perhitungan[$id_penyakit] .= " + $cf_aturan * (1 - $cf_penyakit[$id_penyakit])";
        }
    }

    // Mencari penyakit dengan CF terbesar
    $cf_terbesar = 0;
    $id_penyakit_terbesar = null;
    foreach ($cf_penyakit as $id_penyakit => $cf) {
        if ($cf > $cf_terbesar) {
            $cf_terbesar = $cf;
            $id_penyakit_terbesar = $id_penyakit;
        }
    }

    if ($id_penyakit_terbesar !== null) {
        $sql_nama_penyakit = mysqli_query($koneksi, "SELECT nama_penyakit FROM penyakit WHERE id_penyakit = '$id_penyakit_terbesar'");
        $nama_penyakit_terbesar = mysqli_fetch_assoc($sql_nama_penyakit)['nama_penyakit'];

        $sql_insert_hasil = "INSERT INTO hasil_diagnosa (id_hasil,id_pasien, id_gejala,id_penyakit, certainty_factor) 
                             VALUES (NULL,'$id_pasien', $id_gejala,'$id_penyakit_terbesar', '$cf_terbesar')";
        $result = mysqli_query($koneksi, $sql_insert_hasil);

        if ($result) {
          echo"
          <script>
          document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
              title: 'Good job!',
              text: 'Hasil Diagnosa Berhasil Di Tambahkan',
              icon: 'success',
              timer: 1500
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = 'hasildiagnosa.php';
              }
            });
          });
          </script>
          ";
        } else {
          echo "
          <script>
          document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
              title: 'Oops...',
              text: 'Data Gagal Di Tambahkan',
              icon: 'error'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = 'hitung.php';
              }
            });
          });
          </script>
          ";
        }
    } else {
        echo '<script>alert("Tidak ada aturan diagnosa yang sesuai dengan gejala pasien.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hasil Diagnosa</title>
  <!-- Link AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Link CDN Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Link EKsternal CSS -->
  <link rel="stylesheet" href="./style/hitung.css">
</head>
<body class="bg-dark">
  <div class="container">
 <div class="bg-primary rounded-2 p-3 mt-3 "  data-aos="fade-right" data-aos-duration="1000">
 <h2 class="fs-2 mt-2 text-center">Hasil Diagnosa Pasien</h2>
 </div>
 <div class="bg-warning p-2 rounded-2 mt-3" data-aos="zoom-in-up" data-aos-duration="1000">
  <h3>Data Pasien</h3>
  <p>Nama Pasien: <?php echo htmlspecialchars($nama_pasien); ?></p>
</div>
<div class="bg-danger p-2 rounded-2 mt-3" data-aos="zoom-in" data-aos-duration="1000">
  <h3>Data Gejala</h3>
  <ul>
    <?php foreach ($gejala_pasien as $gejala) : ?>
      <li><?php echo htmlspecialchars($gejala); ?></li>
    <?php endforeach; ?>
  </ul>
</div>
 <div class="bg-success p-2 rounded-2 mt-3" data-aos="fade-left" data-aos-duration="1000">
 <h3 class="mt-2">Hasil Diagnosa </h3>
 </div>
 <div class="mt-3 table-responsive"  data-aos="flip-right" data-aos-duration="1000">
 <table class="table table-hover border  border-white border-2 table-dark  table-responsive text-center">
  <thead class="border border-2 border-white">
    <tr>
      <th>Nama Penyakit</th>
      <th>Certainty Factor</th>
      <th>Detail Perhitungan</th>
    </tr>
  </thead>
   <tbody>
    <tr>
      <td><?php echo htmlspecialchars($nama_penyakit_terbesar); ?></td>
      <td><?php echo htmlspecialchars($cf_terbesar); ?></td>
      <td><?php echo htmlspecialchars($detail_perhitungan[$id_penyakit_terbesar]); ?></td>
    </tr>
   </tbody>
  </table>
  
 </div>
 <div data-aos="fade-up"
     data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
 <form action="hasildiagnosa.php" method="POST">
    <input type="hidden" name="id_pasien" value="<?php echo htmlspecialchars($id_pasien); ?>">
    <button type="submit" name="lihat_hasil" class="btn btn-secondary w-100 p-1 fs-2">Lihat Hasil Diagnosa</button>
  </form>
 </div>
 
  </div>
  <!-- Link Script Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Link Script Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- Link Script AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>
