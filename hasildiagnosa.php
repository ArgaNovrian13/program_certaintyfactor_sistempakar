<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['username'])) {
    echo "<script>
    alert('Harus Login Donk!');
    document.location.href='login.php';
    </script>";
    exit();
}

$hasil_diagnosa = null;
$id_pasien = null;

if (isset($_POST['lihat_hasil'])) {
    $id_pasien = $_POST['id_pasien'];

    // Query untuk mengambil hasil diagnosa dan gejala terkait pasien
    $sql_hasil_diagnosa = "SELECT 
    pasien.id_pasien,
    pasien.nama_pasien,
    GROUP_CONCAT(gejala.nama_gejala ORDER BY gejala.id_gejala SEPARATOR ', ') AS nama_gejala,
    hasil_diagnosa.certainty_factor,
    penyakit.nama_penyakit,
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
    hasil_diagnosa.id_pasien = '$id_pasien'
GROUP BY 
    pasien.id_pasien, pasien.nama_pasien, hasil_diagnosa.certainty_factor, penyakit.nama_penyakit, pasien.tanggal_kunjungan;";

    $query_result = mysqli_query($koneksi, $sql_hasil_diagnosa);

    if (!$query_result) {
        echo "Error: " . mysqli_error($koneksi);
        exit();
    }

    $hasil_diagnosa = mysqli_fetch_assoc($query_result);

    if (!$hasil_diagnosa) {
        echo "Tidak ada hasil diagnosa untuk pasien ini.";
        exit();
    }
}

if (isset($_POST['simpan'])) {
    $id_pasien = $_POST['id_pasien'];

    // Insert data pasien ke data_pasien
    $sql_insert_data_pasien = "INSERT INTO data_pasien (id_pasien, id_gejala, id_penyakit, certainty_factor, waktu_pemeriksaan)
                               SELECT id_pasien, id_gejala, id_penyakit, certainty_factor, CURRENT_TIMESTAMP
                               FROM hasil_diagnosa
                               WHERE id_pasien = '$id_pasien'";

    $result = mysqli_query($koneksi, $sql_insert_data_pasien);

    if (!$result) {
        echo "Error: " . mysqli_error($koneksi);
        exit();
    }

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
                      window.location.href = 'diagnosapasien.php';
                  },1000)
              });
          });
          </script>
      ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Diagnosa</title>
    <!-- Link Icon Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Link AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Link CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link CSS Eksternal -->
    <link rel="stylesheet" href="style/gejalaPasien.css">
</head>
<body class="bg-dark">
<div class="container">
    <div class="bg-light p-4 rounded-2 mt-3" data-aos="fade-right" data-aos-duration="1000">
        <h2 class="text-dark text-center" style="letter-spacing: 2px;">Hasil Diagnosa</h2>
    </div>
    <div class="bg-info p-2 rounded-2 mt-3" data-aos="zoom-in-left" data-aos-duration="1000">
        <h3 style="letter-spacing: 2px;">Data Pasien</h3>
        <p style="letter-spacing: 2px;">Nama Pasien: <?php echo isset($hasil_diagnosa['nama_pasien']) ? htmlspecialchars($hasil_diagnosa['nama_pasien']) : ''; ?></p>

    </div>
    <div class="bg-success p-2 rounded-2 mt-3 p-4" data-aos="zoom-in-left" data-aos-duration="1000">
        <h3 class="mt-2" style="letter-spacing: 2px;">Hasil Diagnosa</h3>
    </div>
    <div class="mt-3 table-responsive" data-aos="flip-right" data-aos-duration="1000">
        <table class="table table-hover table-bordered border border-2 text-center table-dark" style="letter-spacing: 2px;">
            <thead>
            <tr>
                <th>Nama Penyakit</th>
                <th>Certainty Factor</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo isset($hasil_diagnosa['nama_penyakit']) ? htmlspecialchars($hasil_diagnosa['nama_penyakit']) : ''; ?></td>
                <td><?php echo isset($hasil_diagnosa['certainty_factor']) ? htmlspecialchars($hasil_diagnosa['certainty_factor']) : ''; ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="mt-3" data-aos="fade-left" data-aos-duration="1000">
        <form action="" method="POST">
            <input type="hidden" name="id_pasien" value="<?php echo isset($id_pasien) ? $id_pasien : ''; ?>">
            <button type="submit" name="simpan" class="btn btn-secondary w-100 p-1 fs-2"><span class="text-white">Simpan Data Pasien</span></button>
        </form>
    </div>
</div>
<!-- Link Script Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Link CDN Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Link AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
