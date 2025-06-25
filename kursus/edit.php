<?php
include '../includes/auth.php';
include '../config/db.php';
include '../includes/header.php';

$id = $_GET['id'];
$kursus = $conn->query("SELECT * FROM kursus WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kursus = $_POST['nama_kursus'];
    $pengajar = $_POST['pengajar'];
    $jadwal = $_POST['jadwal'];

    if ($nama_kursus && $pengajar && $jadwal) {
        $stmt = $conn->prepare("UPDATE kursus SET nama_kursus=?, pengajar=?, jadwal=? WHERE id=?");
        $stmt->bind_param("sssi", $nama_kursus, $pengajar, $jadwal, $id);
        $stmt->execute();
        header("Location: index.php");
    } else {
        $error = "Semua field wajib diisi.";
    }
}
?>

<div class="container mt-5">
    <h2>Edit Kursus</h2>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="post">
        <div class="mb-3">
            <label>Nama Kursus</label>
            <input type="text" name="nama_kursus" value="<?= htmlspecialchars($kursus['nama_kursus']) ?>" required class="form-control">
        </div>
        <div class="mb-3">
            <label>Pengajar</label>
            <input type="text" name="pengajar" value="<?= htmlspecialchars($kursus['pengajar']) ?>" required class="form-control">
        </div>
        <div class="mb-3">
            <label>Jadwal</label>
            <input type="text" name="jadwal" value="<?= htmlspecialchars($kursus['jadwal']) ?>" required class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
