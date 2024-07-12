<?php
require 'read.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Informasi Diagnosa Penyakit</title>
  <!-- Link AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <!-- Link EKsternal CSS -->
   <link rel="stylesheet" href="./style/data.css">
   <!-- Link Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark">
  <div class="container" >
    <div id="header" class="bg-light text-center rounded-2 p-3 mt-2" data-aos="fade-right" data-aos-duration="1000">
      <h2>Sistem Informasi Diagnosa Penyakit</h2>
    </div>
    <div>
      <div id="carouselExample" class="carousel slide" data-aos="zoom-in-down" data-aos-duration="1000">
      <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container w-50 p-2">
          <div class="bg-success p-2 mb-1">
            <h2 class="text-center">Table Gejala</h2>
          </div>
            <table class="table table-hover table-striped  border border-2 text-center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Gejala</th>
                  <th>Kode Gejala</th>
                </tr>
              </thead>
              <tbody>
                <?php $no= 1;?>
                <?php foreach($datagejala as $data => $value):?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td>
                     <?= $value['nama_gejala'] ?>
                  </td>
                  <td><?= $value['kode_gejala'] ?></td>
                </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
        </div>
    </div>
<!-- Table Aturan -->
    <div class="carousel-item">
      <div class="container w-50 mt-1" style="max-height: 80vh; overflow-y: scroll;" >
        <table class="table table-hover table-striped  border border-2 text-center ">
          <div class="bg-success p-2 mb-1 position-sticky top-0">
            <h2 class="text-center">Table Aturan</h2>
          </div>
          <thead style="position: sticky; top:60px">
            <tr>
              <th>No</th>
              <th>Kode Gejala</th>
              <th>Kode Penyakit</th>
              <th>Certainty Factor</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1;?>
            <?php  foreach($dataaturan as $data => $value) : ?>
            <tr>
              <td>
                <?= $no++?>
              </td>
              <td>
                <?= $value['id_penyakit'];?>
              </td>
              <td>
                <?= $value['id_gejala'];?>
              </td>
              <td>
                <?= $value['certainty_factor'];?>
              </td>
            </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Table Penyakit -->
    <div class="carousel-item">
        <div class="container w-50 mt-5">
          <div class="bg-success p-2 mb-1">
            <h2 class="text-center">Table Penyakit</h2>
          </div>
          <table class="table table-hover table-striped  border border-2 text-center">
            <thead>
              <tr>
               <th>No</th>
               <th>Nama Penyakit</th>
               <th>Kode Penyakit</th>
             </tr>
            </thead>
            <tbody>
              <?php $no= 1;?>
              <?php foreach($datapenyakit as $data => $value):?>
              <tr>
                <td><?= $no++ ?></td>
                <td>
                  <?= $value['nama_penyakit'] ?>
                </td>
                <td><?= $value['kode_penyakit'] ?></td>
              </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
  </div>
        <button class="carousel-control-prev " type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <div>
      <button class="btn btn-warning w-50"><a href="pasien.php" class="text-white fs-3" style="text-decoration: none;">Mulai Diagnosa</a></button>
      </div>
    </div>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- Link Script AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>