<?php
require 'koneksi.php';
 if(isset($_POST['register'])){
  $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
  $email = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['email']));
  // Validasi Email
  $pesanEmail = "";
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $pesanEmail = 'Email Tidak Valid';
  exit();
  }
  $password = mysqli_real_escape_string($koneksi, htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT)));
  $confirmPassword = mysqli_real_escape_string($koneksi, htmlspecialchars(password_hash($_POST['confirmPassword'],PASSWORD_DEFAULT)));

  // Validasi Password
  $pesanPassword = "";
  if(strlen($password) > 9 ){
    $pesanPassword = "";
 }else if(strlen($password) > 8){
  $pesanPassword = "Password Baik";
 }else if(strlen($password) > 6){
  $pesanPassword = "Password Lemah";
 }else if(strlen($password) > 5){
  $pesanPassword = "Password Buruk";
 }
 // Validasi Konfirmasi Password
 $pesanKonfirmasiPassword = "";
 if($password !== $confirmPassword){
  $pesanKonfirmasiPassword = "Password Tidak Sama";
 }else {
  $pesanKonfirmasiPassword = "Password Sesuai";
 }
 $sql = mysqli_query($koneksi, "INSERT INTO admin (id_nama,nama, email, sandi) VALUES (NULL,'$username', '$email', '$password')");
 if($sql !== false){
  echo "<script>
  alert('Registrasi Berhasil Disimpan');
  document.location.href='login.php';
  </script>";
 }else {
  echo "<script>
  alert('Registrasi Gagal ');
  document.location.href='register.php';
  </script>";
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
   <!-- Link Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <!-- Link AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- Link Icon Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Link Eksternal CSS -->
  <link rel="stylesheet" href="./style/register.css">
</head>
<body>
  <div class="container">
    <h2 class="text-center mt-3 bg-danger p-3 rounded-2" data-aos="fade-right" data-aos-duration="1000">Register</h2>
    <form action="" method="POST">
      <label for="username" class="form-label " data-aos="fade-down-left" data-aos-duration="500">Username</label>
      <input type="text" name="username" id="username" class="form-control border-dark " autocomplete="off" placeholder="Your Username...." required data-aos="flip-right" data-aos-duration="1000" >
      <label for="email" class="form-label"  data-aos="fade-down-left" data-aos-duration="500">Email</label>
      <input type="email" name="email" id="email" class="form-control border-dark " autocomplete="off" placeholder="Your Email..." required data-aos="flip-right" data-aos-duration="1000" >
      <?php if (isset($email)) :?>
        <div class="alert alert-danger" role="alert">
        <?= $pesanEmail; ?>
        </div>
      <?php endif;?>
      <label for="password" class="form-label"  data-aos="fade-down-left" data-aos-duration="500">Password</label>
      <input type="password" name="password" id="password" class="form-control border-dark " placeholder="Your Password..." required data-aos="flip-right" data-aos-duration="1000" >
      <div class="form-text">Password Harus Lebih 5 Karakter</div>
      <p id="pesan"></p>
      <label for="password" class="form-label"  data-aos="fade-down-left" data-aos-duration="500">Confirm Password</label>
      <input type="password" name="confirmPassword" id="confirmPassword" class="form-control border-dark " placeholder="Confirm Your Password... " required data-aos="flip-right" data-aos-duration="1000" >
      <?php if(isset($confirmPassword)): ?>
        <div class="alert alert-success" role="alert">
        <?= $pesanKonfirmasiPassword; ?>
        </div>
      <?php endif;?>
      <p id="confirmPassword"></p>
      <input type="checkbox" class="form-check-input" id="showPassword">
      <label for="showPassword" class="form-label">Show Password</label>
      <?php if (isset($error)) : ?>
        <div class="alert alert-danger" role="alert">
        <?= $error; ?>
        </div>
      <?php endif; ?>
      <button type="submit" name="register" class="btn btn-success w-100 mb-2 p-3 fs-3" data-aos="fade-left" data-aos-duration="1000">Register</button>
      <span>Sudah Punya Akun? Masuk Di Sini <i class="bi bi-hand-index"></i></span>
      <a href="login.php" class="text-decoration-none">Login</a>
    </form>

  </div>
  <!-- Link CDN Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- Link SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Link Eksternal Javascript -->
<script src="./js/validationRegister.js"></script>
<!-- Link Script AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>;