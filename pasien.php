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
if(isset($_POST['submit'])){
    $nama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama']));
    // Validasi nama pasien 
  //   if(!preg_match("/^[a-zA-Z\s']+$/", $nama)){
  //     // Jika nama pasien tidak sesuai dengan format yang diinginkan
  //     echo '<script>
  //             alert("Nama pasien hanya boleh terdiri dari huruf dan spasi, tanpa tanda baca atau karakter khusus.");
  //             </script>';
  // }
    // Melakukan query untuk menyimpan data pasien ke dalam tabel pasien
    $sql = mysqli_query($koneksi, "INSERT INTO pasien (nama_pasien, tanggal_kunjungan) VALUES ('$nama', NOW())");
    
    // Mendapatkan ID pasien yang baru saja di-generate oleh database
    $id_pasien = mysqli_insert_id($koneksi);
    
    if($sql){
        $_SESSION['id_pasien'] = $id_pasien;
        $_SESSION['nama_pasien'] = $nama;
        echo  "
       <script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Data Berhasil Di Simpan',
        showConfirmButton: false,
        timer: 1500
    }).then(() => {
        // Redirect to gejalapasien.php after the alert is shown
        window.location.href = 'gejalapasien.php';
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/pasien.css">
  <title>Pasien</title>
  <!-- Link AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark">
  <div class="container">
    <div class="mt-5 bg-success p-4 rounded-2 mb-5" data-aos="fade-right" data-aos-duration="1000">
      <h2 class="text-center text-light">Data Pasien</h2>
    </div>
    <div>
      <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST">
        <label for="nama" class="form-label text-light" data-aos="fade-up" data-aos-duration="1000">Nama</label>
        <input type="text" class="form-control p-3" name="nama" id="namaPasien" autocomplete="off" required autofocus placeholder="Nama Pasien" data-aos="zoom-in" data-aos-duration="1000">
        <button type="submit"  class="btn btn-primary w-100 mt-5 p-3 fs-3" name="submit" data-aos="fade-left" data-aos-duration="1000">Kirim</button>
      </form>
    </div>
  </div>
  <!-- Link Sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Link Script Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- Link Eksternal Javascript -->
  <script src="./js/ValidationPasien.js"></script>
   <!-- Link Script AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>