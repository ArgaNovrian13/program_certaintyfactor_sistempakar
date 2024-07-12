<?php
session_start();
if(!isset($_SESSION['username'])){
  echo "<script>
  alert('Harus Login Donk!');
  document.location.href='login.php';
  </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mulai</title>
   <!-- Link AOS -->
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Link Eksternal CSS -->
  <link rel="stylesheet" href="./style/index.css">
  <!-- link CDN  Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- link CDN Icon Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">   
</head>
<body class="bg-dark">
  <div class="container h-100vh">
    <div class="bg-primary rounded-2 p-3 mt-3 " data-aos="fade-left" data-aos-duration="1000">
      <h2 style="font-family:Arial, Helvetica, sans-serif"> <i class="bi bi-person-circle"></i>    Hai, <?=ucwords( $_SESSION['username']); ?></h2>
      <div class="d-flex justify-content-end align-items-center" >
        <a href="logout.php" class="btn btn-danger  position-absolute" style="bottom:20px"> <i class="bi bi-box-arrow-left me-2"></i>Log Out</a>
      </div>
    </div>
    <div  id="header" class="text-center mt-3 bg-danger mb-3 p-5 rounded-2 text-white" data-aos="fade-right" data-aos-duration="1000">
      <h2 style="font-size: 60px;text-shadow: 3px 3px 5px #000;">Sistem Pakar Metode Certainty Factor</h2>
    </div>
    <div id="content" class="bg-success p-5 rounded-2 text-white " data-aos="flip-down"  data-aos-duration="1000">
      <p>Certainty Factor adalah konsep dalam kecerdasan buatan yang digunakan untuk mengukur tingkat keyakinan atau kepercayaan dalam suatu pernyataan atau prediksi. Biasanya dinyatakan dalam rentang antara -1 hingga 1, di mana nilai positif menunjukkan keyakinan atau kepercayaan positif, nilai negatif menunjukkan ketidakpercayaan, dan nilai 0 menunjukkan ketidakpastian. Certainty Factor sering digunakan dalam sistem pakar untuk menggabungkan bukti-bukti dari berbagai sumber informasi dalam membuat keputusan atau melakukan penilaian.</p>
      <button class="btn btn-warning mt-2 p-3 me-4"><a href="data.php" class="text-white">Mulai Programnya</a></button>
      <button class="btn btn-info mt-2 p-3"><a href="diagnosapasien.php" class="text-dark">Lihat Data Pasien</a></button>
    </div>
    <div class="text-center mt-5 bg-secondary rounded-2">
    <p class="mt-2 " id="content">&copy;Copyright <?= date("Y")?></p>
    </div>
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
