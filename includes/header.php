<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kursus Musik Jef Boy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .navbar-custom {
      background-color: #1f4037;
    }

    .navbar-custom .nav-link,
    .navbar-custom .navbar-brand {
      color: #ffffff;
    }

    .navbar-custom .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 5px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
  <div class="container">
    
    <a class="navbar-brand d-flex align-items-center" href="https://www.instagram.com/jef_131/">
      <img src="/kursus-musik/logo.png" alt="Logo" width="60" height="60" class="rounded-circle me-2">
    </a>

    <!-- Tombol toggle untuk tampilan mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
       <span class="navbar-toggler-icon"></span>
    </button>

 
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link fw-semibold px-3" href="/kursus-musik/">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold px-3" href="/kursus-musik/siswa/">Siswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold px-3" href="/kursus-musik/kursus/">Kursus</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold px-3" href="/kursus-musik/logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

