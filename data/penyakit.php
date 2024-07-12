<?php
require '../read.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Penyakit</title>
  <link rel="stylesheet" href="../style/penyakit.css">
</head>
<body>
<div class="tablePenyakit">
  <table>
    <caption>Tabel Gejala</caption>
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

</body>
</html>