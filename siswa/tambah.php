<?php
include '../includes/auth.php';
include '../config/db.php';
include '../includes/header.php';

$kursus = $conn->query("SELECT * FROM kursus");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $id_kursus = $_POST['id_kursus'];

    if ($nama && $email && $id_kursus) {
        $stmt = $conn->prepare("INSERT INTO siswa (nama, email, telepon, id_kursus) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $nama, $email, $telepon, $id_kursus);
        $stmt->execute();
        header("Location: index.php");
    } else {
        $error = "Semua field wajib diisi.";
    }
}
?>

<div class="container mt-5">
    <h2>Tambah Siswa</h2>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="post">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" required class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" required class="form-control">
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control">
        </div>
        <div class="mb-3">
            <label>Pilih Kursus</label>
            <select name="id_kursus" class="form-select" required>
                <option value="">-- Pilih Kursus --</option>
                <?php while ($k = $kursus->fetch_assoc()) : ?>
                    <option value="<?= $k['id'] ?>"><?= htmlspecialchars($k['nama_kursus']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
