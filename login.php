<?php 
require 'koneksi.php';
session_start();

if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_nama = $id");
  $row = mysqli_fetch_assoc($result);
  if($key === password_hash($row['sandi'],PASSWORD_DEFAULT)){
    $_SESSION['login'] = true;
  }
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE nama = '$username'");
    if(mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row['sandi'])){
        $_SESSION['username'] = $username;

        // Check if "Remember Me" is checked
        if(isset($_POST['remember'])){
          // Create cookies
          setcookie('id', $row['id_nama'], time() + 3600, '/');
          setcookie('key', hash('sha256', $row['sandi']), time() + 3600, '/');
        } else {
          // Remove cookies if "Remember Me" is not checked
          setcookie('id', '', time() - 3600, '/');
          setcookie('key', '', time() - 3600, '/');
        }

        echo"
      <script>
      document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
          title: 'Good job!',
          text: 'Login Suksess',
          icon: 'success'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'index.php';
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
          text: 'Login Gagal',
          icon: 'error'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'login.php';
          }
        });
      });
      </script>
      ";
      }
    } else {
      echo "<script>
            alert('Username tidak ditemukan. Silakan coba lagi.');
            </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Link AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <!-- Link Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Link Icon Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Link Eksternal CSS -->
  <link rel="stylesheet" href="./style/login.css">
</head>
<body class="bg-dark">
  <div class="container mt-5">
    <h2 class="text-center mt-5 bg-warning p-3 rounded-2 " id="login" data-aos="fade-right" data-aos-duration="1000">Login</h2>
    <div>
      <form action="" method="POST">
          <label for="username" class="form-label text-light" data-aos="zoom-in" data-aos-duration="1000">Username</label>
          <i class="bi bi-person"></i>
          <input type="text" name="username" id="username" class="form-control border-dark mb-2 p-3" autocomplete="off" spellcheck="false" required placeholder="Username..." data-aos="flip-right" data-aos-duration="1000" >
          <label for="password" class="form-label text-light" data-aos="zoom-in" data-aos-duration="1000">Password</label>
          <i class="bi bi-shield-lock"></i>
          <input type="password" name="password" id="password" class="form-control border-dark mb-2 p-3" required spellcheck="false" placeholder="Password..." data-aos="flip-right" data-aos-duration="1000">
          <input type="checkbox" name="showPassword" id="showPassword" class="form-check-input mb-3" data-aos="fade-right" data-aos-duration="1000">
          <label for="showPassword" class="form-label-check text-light" data-aos="zoom-in-up" data-aos-duration="1000">Show Password</label>
          <label for="remember" class=" float-end form-label-check text-light" data-aos="zoom-in-up" data-aos-duration="1000" style="text-indent: 5px;">Remember Me</label>
          <input type="checkbox" name="remember" id="remember" class="float-end form-check-input mb-3" data-aos="fade-right" data-aos-duration="1000">
          <br>
          <button type="submit" class="btn btn-primary w-100 focus-ring mb-2 p-3 fs-3 text-dark fw-bold" name="login" id="loginMasuk" data-aos="fade-left" data-aos-duration="1000">Login</button>
          <div data-aos="zoom-out-down" data-aos-duration="1000" ><span class="text-light" >Belum Punya Akun  ?
          Daftar Di Sini <i class="bi bi-hand-index text-light"></i></span>
          <a href="register.php" class="text-decoration-none">Register</a>
          </div>
      </form>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Link Script Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Link Script AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Link Eksternal Javascript -->
<script src="./js/validationLogin.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>