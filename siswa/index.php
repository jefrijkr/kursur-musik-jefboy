<?php
include '../includes/auth.php';
include '../config/db.php';
include '../includes/header.php';

$result = $conn->query("SELECT siswa.*, kursus.nama_kursus FROM siswa LEFT JOIN kursus ON siswa.id_kursus = kursus.id");
?>

<div class="container mt-5">
<h1 class="text-center mb-4">KURSUS MUSIK "JEF BOYS"</h1>
  <h2>Data Siswa</h2>
  <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Siswa</a>
  <a href="cetak.php" class="btn btn-secondary mb-3">Cetak PDF</a>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Telepon</th>
        <th>Kursus</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['nama']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($row['telepon']) ?></td>
          <td><?= htmlspecialchars($row['nama_kursus']) ?></td>
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
