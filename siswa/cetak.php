<?php
require_once '../config/db.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Cetak Daftar Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @media print {
      .btn-cetak {
        display: none;
      }
    }
  </style>
</head>
<body class="p-4">
  <div class="container">
    <h2 class="text-center mb-4">Daftar Siswa Kursus Musik</h2>
    <button onclick="window.print()" class="btn btn-primary mb-3 btn-cetak">Cetak</button>

    <table class="table table-bordered table-striped">
      <thead class="table-secondary">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Email</th>
          <th>No HP</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $result = $conn->query("SELECT * FROM siswa");
        while ($row = $result->fetch_assoc()):
        ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= htmlspecialchars($row['nama']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($row['telepon']) ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
