<?php
require '../read.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aturan</title>
  <link rel="stylesheet" href="../style/aturan.css">
</head>
<body>
  <div class="tableAturan">
    <table>
    <caption>Tabel Rule</caption>
      <thead>
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
</body>
</html>