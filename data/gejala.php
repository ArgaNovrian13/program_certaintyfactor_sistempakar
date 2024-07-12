<?php

require '../read.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Gejala</title>
  <link rel="stylesheet" href="../style/gejala.css"/>
</head>
<body>
<div class="tableGejala">
  <table>
    <caption>Tabel Gejala</caption>
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

</body>
</html>