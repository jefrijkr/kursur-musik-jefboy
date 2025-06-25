<?php
include 'includes/auth.php';
include 'config/db.php';
include 'includes/header.php';

$total_siswa = $conn->query("SELECT COUNT(*) AS total FROM siswa")->fetch_assoc()['total'];
$total_kursus = $conn->query("SELECT COUNT(*) AS total FROM kursus")->fetch_assoc()['total'];
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">KURSUS MUSIK "JEF BOYS"</h2>


  
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Siswa</h5>
                    <p class="card-text display-4"><?= $total_siswa ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-info mb-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Kursus</h5>
                    <p class="card-text display-4"><?= $total_kursus ?></p>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row justify-content-center mt-5">
        <div class="col-md-4 text-center">
            <img src="gitar1.png" class="img-thumbnail rounded shadow-sm" style="max-height: 200px;" alt="Gambar Gitar">
            <p class="mt-2">Gitar</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="piano1.png" class="img-thumbnail rounded shadow-sm" style="max-height: 200px;" alt="Gambar Piano">
            <p class="mt-2">Piano</p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
