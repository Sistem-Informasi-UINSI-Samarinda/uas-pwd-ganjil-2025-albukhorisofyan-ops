<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="../../assets/css/adminStyles.css">
</head>
<body>

  <div class="sidebar">
    <div class="logo"><img src="/UAS/assets/img/logo.webp" alt="">
      <h2>RMA <br>
      FC</h2>
    </div>
    <ul>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="Produk.php">Produk</a></li>
      <li><a href="../../index.php">Kembali ke Beranda</a></li>
      <li><a href="logout.php" class="logout">Logout</a></li>
    </ul>
  </div>

  <div class="main-content">
    <header>
      <h1>Selamat Datang, <?php echo $_SESSION['nama_lengkap']; ?>!</h1>
      <p>Anda sedang berada di halaman dashboard utama.</p>
      <!-- <button>☰ Menu</button> -->
    </header>

    <section class="cards">
      <div class="card">
        <h3>Produk Terjual</h3>
        <p>100</p>
      </div>
      <div class="card">
        <h3>Total Pengguna</h3>
        <p>45</p>
      </div>
      <div class="card">
        <h3>Produk Dikembalikan</h3>
        <p>03</p>
      </div>
     
    </section>
  </div>

</body>
</html>
