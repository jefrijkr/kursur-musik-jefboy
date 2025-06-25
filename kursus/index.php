<?php
include '../includes/auth.php';
include '../config/db.php';
include '../includes/header.php';

$result = $conn->query("SELECT * FROM kursus");
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">KURSUS MUSIK "JEF BOYS"</h1>
  <h2>Data Kursus</h2>
  <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Kursus</a>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Nama Kursus</th>
        <th>Pengajar</th>
        <th>Jadwal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['nama_kursus']) ?></td>
          <td><?= htmlspecialchars($row['pengajar']) ?></td>
          <td><?= htmlspecialchars($row['jadwal']) ?></td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<?php include '../includes/footer.php'; ?>
