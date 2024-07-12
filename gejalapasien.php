<?php
session_start();
require 'koneksi.php';
require 'read.php';

// Periksa apakah ada sesi id_pasien dan nama_pasien, jika tidak, redirect ke halaman pasien.php
if (!isset($_SESSION['id_pasien']) || !isset($_SESSION['nama_pasien'])) {
    header('Location:pasien.php');
    exit();
}

if (isset($_POST['submit'])) {
    $id_pasien = $_SESSION['id_pasien'];
    foreach ($_POST['gejala'] as $gejala) {
        $id_gejala = mysqli_real_escape_string($koneksi, htmlspecialchars($gejala));

        // Melakukan query untuk menyimpan data gejala pasien
        $sql = mysqli_query($koneksi, "INSERT INTO gejala_pasien (id_gejala_pasien,id_gejala, id_pasien) VALUES (NULL,'$id_gejala', '$id_pasien')");

        if ($sql) {
          echo "
          <script>
          document.addEventListener('DOMContentLoaded', function () {
              Swal.fire({
                  position: 'bottom-end',
                  icon: 'success',
                  title: 'Data Gejala Berhasil Di Simpan',
                  showConfirmButton: false,
                  timer: 1500
              }).then(() => {
                  // Redirect to proses.php after the alert is shown
                  setTimeout(() => {
                      window.location.href = 'proses.php';
                  },1000)
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
              text: 'Data Gagal Disimpan',
              icon: 'error'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = 'pasien.php';
              }
            });
          });
          </script>
          ";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gejala Pasien</title>
    <!-- Link AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Link CDN Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style/gejalaPasien.css">
</head>
<style>
  label {
    display: block;
  }
</style>
<body class="bg-dark">
  <div class="container mt-3 ">
    <div class="bg-success rounded-2" data-aos="fade-right" data-aos-duration="1000">
      <h2 class="text-center fs-3">NAMA PASIEN : <?= strtoupper($_SESSION['nama_pasien']) ?></h2>
    </div>
    <div class="table-responsive" >
      <table class="table  text-center table-hover border border-2 table-dark" data-aos="flip-right" data-aos-duration="1000">
        <thead class="border border-2">
          <tr >
            <th>No</th>
            <th>Nama Gejala</th>
          </tr>
        </thead>
        <tbody>
          <?php $counter = 1; ?>
          <?php foreach ($datagejala as $gejala) : ?>
            <tr>
              <td><?= $counter++ ?></td>
              <td>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                  <input type="checkbox"  id="gejala" class="form-check-input mb-2" name="gejala[]" value="<?= $gejala['id_gejala'] ?>" />
                 <span><?= $gejala['nama_gejala'] ?></span>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <button type="submit" name="submit"  class="btn btn-danger w-100 p-1 fs-2" >Kirim</button>
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
