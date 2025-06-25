<?php
include '../includes/auth.php';
include '../config/db.php';
include '../includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kursus = $_POST['nama_kursus'];
    $pengajar = $_POST['pengajar'];
    $jadwal = $_POST['jadwal'];

    if ($nama_kursus && $pengajar && $jadwal) {
        $stmt = $conn->prepare("INSERT INTO kursus (nama_kursus, pengajar, jadwal) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama_kursus, $pengajar, $jadwal);
        $stmt->execute();
        header("Location: index.php");
    } else {
        $error = "Semua field wajib diisi.";
    }
}
?>

<div class="container mt-5">
    <h2>Tambah Kursus</h2>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="post">
        <div class="mb-3">
            <label>Nama Kursus</label>
            <input type="text" name="nama_kursus" required class="form-control">
        </div>
        <div class="mb-3">
            <label>Pengajar</label>
            <input type="text" name="pengajar" required class="form-control">
        </div>
        <div class="mb-3">
            <label>Jadwal</label>
            <input type="text" name="jadwal" required class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
