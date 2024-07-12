<?php
require 'koneksi.php';

// Initial data query
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
GROUP BY 
    pasien.id_pasien, pasien.nama_pasien, hasil_diagnosa.certainty_factor, penyakit.nama_penyakit, pasien.tanggal_kunjungan";

$result = mysqli_query($koneksi, $sql);
if (!$result) {
    die('Error: ' . mysqli_error($koneksi));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pasien</title>
   <!-- Link AOS -->
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- link CDN Icon Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Link CSS Eksternal -->
  <link rel="stylesheet" href="./style/datapasien.css">
  <!-- Link CDN Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success">
  <div class="container">
    <div class="bg-danger mt-3 p-3 rounded-2" >
    <div class="w-25 mt-3 position-absolute" style="top:10px" data-aos="fade-down">
      <a href="getstarted.php" class="text-white fw-bold btn btn-info p-3" style="text-decoration: none; letter-spacing: 3px;"> &LeftArrow; Kembali</a>
      
    </div>
      <div data-aos="zoom-out-right">
      <h2 class="text-center text-white">Data Pasien</h2>
      </div>
    </div>
    <div class="mt-3 p-0" data-aos="fade-left"
     data-aos-anchor="#example-anchor"
     data-aos-offset="500"
     data-aos-duration="1000">
      <form action="" id="searchForm">
        <input type="text" class="form-control" name="search" id="search" autofocus placeholder="Cari Data Pasien..." autocomplete="off"> 
      </form>
    </div>
    <div class="mt-3 table-responsive" data-aos="zoom-in-down" data-aos-duration="1500" >
      <table class="table table-bordered text-center table-striped table-hover">
        <thead class="table-dark">
          <tr>
            <th>No</th>
            <th>Nama Pasien</th>
            <th>Certainty Factor</th>
            <th>Hasil Diagnosa</th>
            <th>Waktu Pemeriksaan</th>
          </tr>
        </thead>
        <tbody id="dataPasien" class="table-dark">
          <?php 
          $no = 1;
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $no . "</td>";
              echo "<td>" . htmlspecialchars($row['nama_pasien']) . "</td>";
              echo "<td>" . htmlspecialchars($row['certainty_factor']) . "</td>";
              echo "<td>" . htmlspecialchars($row['hasil_diagnosa']) . "</td>";
              echo "<td>" . htmlspecialchars($row['tanggal_kunjungan']) . "</td>";
              echo "</tr>";
              $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('search').addEventListener('input', function() {
      let searchValue = this.value;
      let xhr = new XMLHttpRequest();
      xhr.open('GET', 'search.php?search=' + searchValue, true);
      xhr.onload = function() {
        if (this.status === 200) {
          let data = JSON.parse(this.responseText);
          let output = '';
          if (data.length > 0) {
            data.forEach((row, index) => {
              output += `
                <tr>
                  <td>${index + 1}</td>
                  <td>${row.nama_pasien}</td>
                  <td>${row.certainty_factor}</td>
                  <td>${row.hasil_diagnosa}</td>
                  <td>${row.tanggal_kunjungan}</td>
                </tr>
              `;
            });
          } else {
            output = '<tr><td colspan="5">Data Tidak Di Temukan</td></tr>';
          }
          document.getElementById('dataPasien').innerHTML = output;
        }
      };
      xhr.send();
    });
  </script>
   <!-- Link Script AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>
